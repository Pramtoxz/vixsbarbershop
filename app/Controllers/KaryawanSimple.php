<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class KaryawanSimple extends BaseController
{
    protected $karyawanModel;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        // Pastikan user sudah login dan memiliki role karyawan
        if (!session()->get('logged_in') || session()->get('role') !== 'karyawan') {
            return redirect()->to('auth')->with('error', 'Akses ditolak');
        }

        $userId = session()->get('user_id');
        
        // Simple data without complex queries
        $data = [
            'title' => 'Dashboard Karyawan',
            'karyawan' => [
                'namakaryawan' => session()->get('name'),
                'idkaryawan' => 'K-' . $userId
            ],
            'totalJadwalMingguIni' => 0,
            'jadwalHariIni' => [],
            'statistik' => [
                'totalBookingBulanIni' => 0,
                'totalBookingSelesai' => 0,
                'totalBookingPending' => 0
            ],
            'jadwal' => [],
            'jadwalGrouped' => []
        ];

        return view('karyawan/dashboard', $data);
    }

    public function jadwal()
    {
        // Pastikan user sudah login dan memiliki role karyawan
        if (!session()->get('logged_in') || session()->get('role') !== 'karyawan') {
            return redirect()->to('auth')->with('error', 'Akses ditolak');
        }

        $userId = session()->get('user_id');
        
        // Get filter dari request
        $tanggal = $this->request->getGet('tanggal');
        $minggu = $this->request->getGet('minggu');
        
        // Get jadwal dengan query sederhana tanpa CASE statement
        $jadwal = $this->getJadwalSederhana($userId, $tanggal, $minggu);
        
        // Group jadwal by date
        $jadwalGrouped = [];
        foreach ($jadwal as $item) {
            $date = $item['tgl'];
            if (!isset($jadwalGrouped[$date])) {
                $jadwalGrouped[$date] = [];
            }
            $jadwalGrouped[$date][] = $item;
        }

        $data = [
            'title' => 'Jadwal Kerja',
            'karyawan' => [
                'namakaryawan' => session()->get('name'),
                'idkaryawan' => 'K-' . $userId
            ],
            'jadwal' => $jadwal,
            'jadwalGrouped' => $jadwalGrouped,
            'filterTanggal' => $this->request->getGet('tanggal'),
            'filterMinggu' => $this->request->getGet('minggu')
        ];

        return view('karyawan/jadwal', $data);
    }

    public function profile()
    {
        // Pastikan user sudah login dan memiliki role karyawan
        if (!session()->get('logged_in') || session()->get('role') !== 'karyawan') {
            return redirect()->to('auth')->with('error', 'Akses ditolak');
        }

        $userId = session()->get('user_id');
        
        // Try to get karyawan data, fallback to session data
        try {
            $karyawan = $this->karyawanModel->getKaryawanByUserId($userId);
            if (!$karyawan) {
                // Fallback ke data session
                $karyawan = [
                    'namakaryawan' => session()->get('name'),
                    'idkaryawan' => 'K-' . $userId,
                    'jenkel' => '',
                    'alamat' => '',
                    'nohp' => '',
                    'status' => 'aktif',
                    'username' => session()->get('username'),
                    'email' => session()->get('email')
                ];
            }
        } catch (\Exception $e) {
            // Fallback ke data session jika error
            $karyawan = [
                'namakaryawan' => session()->get('name'),
                'idkaryawan' => 'K-' . $userId,
                'jenkel' => '',
                'alamat' => '',
                'nohp' => '',
                'status' => 'aktif',
                'username' => session()->get('username'),
                'email' => session()->get('email')
            ];
        }

        $data = [
            'title' => 'Profil Saya',
            'karyawan' => $karyawan
        ];

        return view('karyawan/profile', $data);
    }

    private function getJadwalSederhana($userId, $tanggal = null, $minggu = null)
    {
        try {
            // Get karyawan data first
            $karyawan = $this->karyawanModel->getKaryawanByUserId($userId);
            if (!$karyawan) {
                // Fallback: cari berdasarkan user_id langsung jika field user_id tidak ada
                $db = \Config\Database::connect();
                $karyawanFallback = $db->table('karyawan')
                    ->where('idkaryawan', 'KRW' . str_pad($userId, 4, '0', STR_PAD_LEFT))
                    ->get()
                    ->getRowArray();
                
                if (!$karyawanFallback) {
                    log_message('info', 'Karyawan not found for user_id: ' . $userId);
                    return [];
                }
                $karyawan = $karyawanFallback;
            }

            $db = \Config\Database::connect();
            
            // Query tanpa CASE statement - ambil status sebagai string biasa
            $builder = $db->table('detail_booking db')
                ->select('db.*, b.kdbooking, b.idpelanggan, p.nama_lengkap as namapelanggan, pk.namapaket, db.status')
                ->join('booking b', 'db.kdbooking = b.kdbooking')
                ->join('pelanggan p', 'b.idpelanggan = p.idpelanggan')
                ->join('paket pk', 'db.kdpaket = pk.idpaket')
                ->where('db.idkaryawan', $karyawan['idkaryawan'])
                ->where('db.status !=', '4'); // Exclude cancelled bookings

            // Handle filter berdasarkan parameter
            if ($tanggal) {
                // Filter berdasarkan tanggal tertentu
                $builder->where('db.tgl', $tanggal);
            } elseif ($minggu) {
                // Filter berdasarkan minggu
                $startOfWeek = date('Y-m-d', strtotime($minggu));
                $endOfWeek = date('Y-m-d', strtotime($minggu . ' +6 days'));
                $builder->where('db.tgl >=', $startOfWeek)
                       ->where('db.tgl <=', $endOfWeek);
            } else {
                // Default show current week
                $startOfWeek = date('Y-m-d', strtotime('monday this week'));
                $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
                $builder->where('db.tgl >=', $startOfWeek)
                       ->where('db.tgl <=', $endOfWeek);
            }

            $result = $builder->orderBy('db.tgl', 'ASC')
                            ->orderBy('db.jamstart', 'ASC')
                            ->get()
                            ->getResultArray();

            // Manual status conversion
            foreach ($result as &$item) {
                switch ($item['status']) {
                    case '1':
                        $item['status_text'] = 'Pending';
                        break;
                    case '2':
                        $item['status_text'] = 'Dikonfirmasi';
                        break;
                    case '3':
                        $item['status_text'] = 'Selesai';
                        break;
                    case '4':
                        $item['status_text'] = 'Dibatalkan';
                        break;
                    default:
                        $item['status_text'] = 'Unknown';
                        break;
                }
            }

            return $result;

        } catch (\Exception $e) {
            log_message('error', 'Error in getJadwalSederhana: ' . $e->getMessage());
            return [];
        }
    }
}
