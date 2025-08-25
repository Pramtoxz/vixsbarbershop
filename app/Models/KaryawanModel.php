<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'karyawan';
    protected $primaryKey       = 'idkaryawan';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idkaryawan', 'namakaryawan', 'jenkel', 'alamat', 'nohp', 'status', 'user_id'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function __construct()
    {
        parent::__construct();
        $this->initValidationRules();
    }

    protected function initValidationRules()
    {
        $this->validationRules = [
            'idkaryawan' => [
                'rules' => 'required|max_length[10]|is_unique[karyawan.idkaryawan]',
                'errors' => [
                    'required' => 'ID Karyawan harus diisi',
                    'max_length' => 'ID Karyawan maksimal 10 karakter',
                    'is_unique' => 'ID Karyawan sudah digunakan'
                ]
            ],
            'namakaryawan' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama Karyawan harus diisi',
                    'min_length' => 'Nama Karyawan minimal 3 karakter',
                    'max_length' => 'Nama Karyawan maksimal 100 karakter'
                ]
            ],
            'jenkel' => [
                'rules' => 'permit_empty|in_list[L,P]',
                'errors' => [
                    'in_list' => 'Jenis Kelamin harus L atau P'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'nohp' => [
                'rules' => 'required|max_length[15]|numeric',
                'errors' => [
                    'max_length' => 'Nomor HP maksimal 15 karakter',
                    'numeric' => 'Nomor HP hanya boleh berisi angka',
                    'required' => 'Nomor HP harus diisi'
                ]
            ],







        ];
    }

    public function generateId()
    {
        $prefix = 'KRW';
        $lastId = $this->select('idkaryawan')
            ->orderBy('idkaryawan', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();

        if (!$lastId) {
            return $prefix . '0001';
        }

        $lastNumber = (int) substr($lastId->idkaryawan, 3);
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        return $prefix . $newNumber;
    }

    public function save($data): bool
    {

        if (!empty($data['idkaryawan'])) {
            $this->validationRules['idkaryawan']['rules'] = 'required|max_length[10]|is_unique[karyawan.idkaryawan,idkaryawan,' . $data['idkaryawan'] . ']';
        }

        return parent::save($data);
    }

    /**
     * Mendapatkan karyawan yang aktif dan tersedia pada waktu tertentu
     *
     * @param string $tanggal
     * @param string $jamstart
     * @return array
     */
    public function getAvailableKaryawan($tanggal, $jamstart)
    {
        $db = \Config\Database::connect();


        $subQuery = $db->table('detail_booking')
            ->select('idkaryawan')
            ->where('tgl', $tanggal)
            ->where('jamstart', $jamstart)
            ->where('status !=', '4'); // 4 = Dibatalkan


        return $this->where('status', 'aktif')
            ->whereNotIn('idkaryawan', $subQuery)
            ->findAll();
    }

    /**
     * Mendapatkan karyawan dengan informasi user
     *
     * @param string|null $idkaryawan
     * @return array
     */
    public function getKaryawanWithUser($idkaryawan = null)
    {
        $builder = $this->db->table('karyawan k')
            ->select('k.*, u.username, u.email, u.status as user_status')
            ->join('users u', 'k.user_id = u.id', 'left');

        if ($idkaryawan) {
            $builder->where('k.idkaryawan', $idkaryawan);
            return $builder->get()->getRowArray();
        }

        return $builder->get()->getResultArray();
    }

    /**
     * Mendapatkan karyawan berdasarkan user_id
     *
     * @param int $userId
     * @return array|null
     */
    public function getKaryawanByUserId($userId)
    {
        return $this->where('user_id', $userId)->first();
    }

    /**
     * Mendapatkan jadwal karyawan berdasarkan user_id
     *
     * @param int $userId
     * @param string|null $tanggal
     * @return array
     */
    public function getJadwalKaryawan($userId, $tanggal = null)
    {
        $karyawan = $this->getKaryawanByUserId($userId);
        if (!$karyawan) {
            return [];
        }

        $db = \Config\Database::connect();
        $builder = $db->table('detail_booking db')
            ->select('db.*, b.kdbooking, b.idpelanggan, p.nama_lengkap as namapelanggan, pk.namapaket, CASE WHEN db.status = "1" THEN "Pending" WHEN db.status = "2" THEN "Dikonfirmasi" WHEN db.status = "3" THEN "Selesai" WHEN db.status = "4" THEN "Dibatalkan" ELSE "Unknown" END as status_text')
            ->join('booking b', 'db.kdbooking = b.kdbooking')
            ->join('pelanggan p', 'b.idpelanggan = p.idpelanggan')
            ->join('paket pk', 'db.kdpaket = pk.idpaket')
            ->where('db.idkaryawan', $karyawan['idkaryawan'])
            ->where('db.status !=', '4'); // Exclude cancelled bookings

        if ($tanggal) {
            $builder->where('db.tgl', $tanggal);
        } else {
            // Default show current week
            $startOfWeek = date('Y-m-d', strtotime('monday this week'));
            $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
            $builder->where('db.tgl >=', $startOfWeek)
                   ->where('db.tgl <=', $endOfWeek);
        }

        return $builder->orderBy('db.tgl', 'ASC')
                      ->orderBy('db.jamstart', 'ASC')
                      ->get()
                      ->getResultArray();
    }

    /**
     * Create user account for karyawan
     *
     * @param array $karyawanData
     * @param array $userData
     * @return bool
     */
    public function createKaryawanWithUser($karyawanData, $userData)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Create user first
            $userModel = new \App\Models\UserModel();
            $userData['role'] = 'karyawan';
            $userData['status'] = 'active';
            
            if ($userModel->insert($userData)) {
                $userId = $userModel->getInsertID();
                
                // Create karyawan with user_id
                $karyawanData['user_id'] = $userId;
                $this->insert($karyawanData);
                
                $db->transComplete();
                return $db->transStatus();
            }
            
            $db->transRollback();
            return false;
            
        } catch (\Exception $e) {
            $db->transRollback();
            return false;
        }
    }

    /**
     * Update karyawan with user info
     *
     * @param string $idkaryawan
     * @param array $karyawanData
     * @param array $userData
     * @return bool
     */
    public function updateKaryawanWithUser($idkaryawan, $karyawanData, $userData = null)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Update karyawan
            $this->update($idkaryawan, $karyawanData);
            
            // Update user if provided and user_id exists
            if ($userData && isset($karyawanData['user_id']) && $karyawanData['user_id']) {
                $userModel = new \App\Models\UserModel();
                $userModel->update($karyawanData['user_id'], $userData);
            }
            
            $db->transComplete();
            return $db->transStatus();
            
        } catch (\Exception $e) {
            $db->transRollback();
            return false;
        }
    }
}
