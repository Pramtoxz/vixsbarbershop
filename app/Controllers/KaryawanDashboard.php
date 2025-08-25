<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class KaryawanDashboard extends BaseController
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
        
        try {
            $karyawan = $this->karyawanModel->getKaryawanByUserId($userId);
        } catch (\Exception $e) {
            // Jika ada error (misalnya field user_id belum ada)
            log_message('error', 'Error getting karyawan data: ' . $e->getMessage());
            return redirect()->to('auth')->with('error', 'Sistem karyawan belum dikonfigurasi. Silakan hubungi administrator.');
        }

        if (!$karyawan) {
            return redirect()->to('auth')->with('error', 'Data karyawan tidak ditemukan atau belum dikaitkan dengan akun ini.');
        }

        // Get jadwal minggu ini
        try {
            $jadwal = $this->karyawanModel->getJadwalKaryawan($userId);
        } catch (\Exception $e) {
            log_message('error', 'Error getting jadwal data: ' . $e->getMessage());
            $jadwal = [];
        }
        
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
            'title' => 'Dashboard Karyawan',
            'karyawan' => $karyawan,
            'jadwal' => $jadwal,
            'jadwalGrouped' => $jadwalGrouped,
            'totalJadwalMingguIni' => count($jadwal),
            'jadwalHariIni' => $this->getJadwalHariIni($userId),
            'statistik' => $this->getStatistikKaryawan($userId)
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
        
        try {
            $karyawan = $this->karyawanModel->getKaryawanByUserId($userId);
        } catch (\Exception $e) {
            log_message('error', 'Error getting karyawan in jadwal: ' . $e->getMessage());
            return redirect()->to('auth')->with('error', 'Sistem karyawan belum dikonfigurasi.');
        }

        if (!$karyawan) {
            return redirect()->to('auth')->with('error', 'Data karyawan tidak ditemukan');
        }

        // Get filter tanggal dari request
        $tanggal = $this->request->getGet('tanggal');
        $minggu = $this->request->getGet('minggu');

        try {
            if ($minggu) {
                // Get jadwal by week
                $startOfWeek = date('Y-m-d', strtotime($minggu));
                $endOfWeek = date('Y-m-d', strtotime($minggu . ' +6 days'));
                $jadwal = $this->getJadwalByDateRange($userId, $startOfWeek, $endOfWeek);
            } else {
                // Get jadwal by specific date or current week
                $jadwal = $this->karyawanModel->getJadwalKaryawan($userId, $tanggal);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error getting jadwal: ' . $e->getMessage());
            $jadwal = [];
        }
        
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
            'karyawan' => $karyawan,
            'jadwal' => $jadwal,
            'jadwalGrouped' => $jadwalGrouped,
            'filterTanggal' => $tanggal,
            'filterMinggu' => $minggu
        ];

        return view('karyawan/jadwal', $data);
    }

    public function getJadwal()
    {
        // AJAX endpoint untuk mengambil jadwal
        if (!session()->get('logged_in') || session()->get('role') !== 'karyawan') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Akses ditolak'
            ]);
        }

        $userId = session()->get('user_id');
        $tanggal = $this->request->getGet('tanggal');
        $minggu = $this->request->getGet('minggu');

        try {
            if ($minggu) {
                $startOfWeek = date('Y-m-d', strtotime($minggu));
                $endOfWeek = date('Y-m-d', strtotime($minggu . ' +6 days'));
                $jadwal = $this->getJadwalByDateRange($userId, $startOfWeek, $endOfWeek);
            } else {
                $jadwal = $this->karyawanModel->getJadwalKaryawan($userId, $tanggal);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in getJadwal AJAX: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Error mengambil data jadwal: ' . $e->getMessage()
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'jadwal' => $jadwal
        ]);
    }

    private function getJadwalHariIni($userId)
    {
        try {
            $today = date('Y-m-d');
            return $this->karyawanModel->getJadwalKaryawan($userId, $today);
        } catch (\Exception $e) {
            log_message('error', 'Error getting jadwal hari ini: ' . $e->getMessage());
            return [];
        }
    }

    private function getStatistikKaryawan($userId)
    {
        try {
            $karyawan = $this->karyawanModel->getKaryawanByUserId($userId);
            if (!$karyawan) {
                return [
                    'totalBookingBulanIni' => 0,
                    'totalBookingSelesai' => 0,
                    'totalBookingPending' => 0
                ];
            }
        } catch (\Exception $e) {
            log_message('error', 'Error getting statistik karyawan: ' . $e->getMessage());
            return [
                'totalBookingBulanIni' => 0,
                'totalBookingSelesai' => 0,
                'totalBookingPending' => 0
            ];
        }

        $db = \Config\Database::connect();
        
        // Total booking bulan ini
        $startOfMonth = date('Y-m-01');
        $endOfMonth = date('Y-m-t');
        
        $totalBookingBulanIni = $db->table('detail_booking')
            ->where('idkaryawan', $karyawan['idkaryawan'])
            ->where('tgl >=', $startOfMonth)
            ->where('tgl <=', $endOfMonth)
            ->where('status !=', '4') // Exclude cancelled
            ->countAllResults();

        // Total booking selesai
        $totalBookingSelesai = $db->table('detail_booking')
            ->where('idkaryawan', $karyawan['idkaryawan'])
            ->where('status', '3') // Selesai
            ->countAllResults();

        // Total booking pending
        $totalBookingPending = $db->table('detail_booking')
            ->where('idkaryawan', $karyawan['idkaryawan'])
            ->whereIn('status', ['1', '2']) // Pending & Dikonfirmasi
            ->where('tgl >=', date('Y-m-d')) // From today
            ->countAllResults();

        return [
            'totalBookingBulanIni' => $totalBookingBulanIni,
            'totalBookingSelesai' => $totalBookingSelesai,
            'totalBookingPending' => $totalBookingPending
        ];
    }

    private function getJadwalByDateRange($userId, $startDate, $endDate)
    {
        $karyawan = $this->karyawanModel->getKaryawanByUserId($userId);
        if (!$karyawan) {
            return [];
        }

        $db = \Config\Database::connect();
        return $db->table('detail_booking db')
            ->select('db.*, b.kdbooking, b.idpelanggan, p.nama_lengkap as namapelanggan, pk.namapaket, CASE WHEN db.status = "1" THEN "Pending" WHEN db.status = "2" THEN "Dikonfirmasi" WHEN db.status = "3" THEN "Selesai" WHEN db.status = "4" THEN "Dibatalkan" ELSE "Unknown" END as status_text')
            ->join('booking b', 'db.kdbooking = b.kdbooking')
            ->join('pelanggan p', 'b.idpelanggan = p.idpelanggan')
            ->join('paket pk', 'db.kdpaket = pk.idpaket')
            ->where('db.idkaryawan', $karyawan['idkaryawan'])
            ->where('db.status !=', '4') // Exclude cancelled bookings
            ->where('db.tgl >=', $startDate)
            ->where('db.tgl <=', $endDate)
            ->orderBy('db.tgl', 'ASC')
            ->orderBy('db.jamstart', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function profile()
    {
        // Pastikan user sudah login dan memiliki role karyawan
        if (!session()->get('logged_in') || session()->get('role') !== 'karyawan') {
            return redirect()->to('auth')->with('error', 'Akses ditolak');
        }

        $userId = session()->get('user_id');
        $karyawan = $this->karyawanModel->getKaryawanWithUser(null);
        
        // Find karyawan by user_id
        $currentKaryawan = null;
        foreach ($karyawan as $k) {
            if ($k['user_id'] == $userId) {
                $currentKaryawan = $k;
                break;
            }
        }

        if (!$currentKaryawan) {
            return redirect()->to('auth/logout')->with('error', 'Data karyawan tidak ditemukan');
        }

        $data = [
            'title' => 'Profil Saya',
            'karyawan' => $currentKaryawan
        ];

        return view('karyawan/profile', $data);
    }
}
