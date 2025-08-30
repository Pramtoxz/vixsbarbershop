<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\UserModel;

class Karyawan extends BaseController
{
    protected $karyawanModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $title = 'Manajemen Karyawan';
        return view('admin/karyawan/index', compact('title'));
    }

    public function getKaryawan()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Invalid request'
            ]);
        }

        $request = $this->request;

        $start = (int) $request->getGet('start');
        $length = (int) $request->getGet('length');
        $search = trim($request->getGet('search')['value'] ?? '');
        $order = $request->getGet('order') ?? [];

        // Use join to get user information
        $builder = $this->db->table('karyawan k')
            ->select('k.*, u.email, u.username, u.status as user_status')
            ->join('users u', 'k.user_id = u.id', 'left');

        $totalRecords = $this->db->table('karyawan')->countAllResults();

        if (!empty($search)) {
            $searchValue = $this->db->escapeLikeString($search);

            $builder->groupStart()
                ->orLike('k.idkaryawan', $searchValue, 'both', null, true)
                ->orLike('k.namakaryawan', $searchValue, 'both', null, true)
                ->orLike('k.alamat', $searchValue, 'both', null, true)
                ->orLike('k.nohp', $searchValue, 'both', null, true)
                ->orLike('u.email', $searchValue, 'both', null, true)
                ->orLike('u.username', $searchValue, 'both', null, true)
                ->groupEnd();
        }

        $totalFiltered = $builder->countAllResults(false);

        $columns = ['k.idkaryawan', 'k.namakaryawan', 'k.jenkel', 'k.alamat', 'k.nohp', 'u.email'];
        $orderColumn = isset($order[0]['column']) ? (int) $order[0]['column'] : 1;
        $orderDir = isset($order[0]['dir']) ? strtoupper($order[0]['dir']) : 'ASC';
        $orderField = $columns[$orderColumn - 1] ?? 'k.idkaryawan';

        $results = $builder->orderBy($orderField, $orderDir)
            ->limit($length, $start)
            ->get()
            ->getResultArray();

        return $this->response->setJSON([
            'draw' => (int) $request->getGet('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFiltered,
            'data' => $results
        ]);
    }

    public function getNewId()
    {
        $newId = $this->karyawanModel->generateId();
        return $this->response->setJSON(['idkaryawan' => $newId]);
    }

    public function getById($id = null)
    {
        $karyawan = $this->karyawanModel->getKaryawanWithUser($id);

        if (!$karyawan) {
            return $this->response->setStatusCode(404)->setJSON([
                'status' => 'error',
                'message' => 'Karyawan tidak ditemukan'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $karyawan
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Validate required fields for karyawan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'idkaryawan' => 'required|max_length[10]|is_unique[karyawan.idkaryawan]',
            'namakaryawan' => 'required|min_length[3]|max_length[100]',
            'alamat' => 'required',
            'nohp' => 'required|max_length[15]|numeric',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ], [
            'idkaryawan' => [
                'required' => 'ID Karyawan harus diisi',
                'max_length' => 'ID Karyawan maksimal 10 karakter',
                'is_unique' => 'ID Karyawan sudah digunakan'
            ],
            'namakaryawan' => [
                'required' => 'Nama Karyawan harus diisi',
                'min_length' => 'Nama Karyawan minimal 3 karakter',
                'max_length' => 'Nama Karyawan maksimal 100 karakter'
            ],
            'alamat' => [
                'required' => 'Alamat harus diisi'
            ],
            'nohp' => [
                'required' => 'No HP harus diisi',
                'max_length' => 'Nomor HP maksimal 15 karakter',
                'numeric' => 'Nomor HP hanya boleh berisi angka'
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Format email tidak valid',
                'is_unique' => 'Email sudah digunakan'
            ],
            'password' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 6 karakter'
            ],
            'confirm_password' => [
                'required' => 'Konfirmasi password harus diisi',
                'matches' => 'Konfirmasi password tidak cocok'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validation->getErrors()
            ]);
        }

        // Prepare user data
        $userData = [
            'username' => $data['email'], // Use email as username
            'email' => $data['email'],
            'password' => $data['password'],
            'name' => $data['namakaryawan'],
            'role' => 'karyawan',
            'status' => 'active'
        ];

        // Prepare karyawan data
        $karyawanData = [
            'idkaryawan' => $data['idkaryawan'],
            'namakaryawan' => $data['namakaryawan'],
            'jenkel' => $data['jenkel'] ?? null,
            'alamat' => $data['alamat'],
            'nohp' => $data['nohp'],
            'status' => 'aktif'
        ];

        try {
            // Log the data being processed
            log_message('info', 'Creating karyawan with data: ' . json_encode($karyawanData));
            log_message('info', 'Creating user with data: ' . json_encode(array_merge($userData, ['password' => '***HIDDEN***'])));

            $result = $this->karyawanModel->createKaryawanWithUser($karyawanData, $userData);

            if ($result === true) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Karyawan berhasil ditambahkan dengan akun user'
                ]);
            } else {
                // Handle specific errors
                if (is_array($result)) {
                    $allErrors = [];

                    if (isset($result['karyawan_errors'])) {
                        $allErrors = array_merge($allErrors, $result['karyawan_errors']);
                    }

                    if (isset($result['user_errors'])) {
                        $allErrors = array_merge($allErrors, $result['user_errors']);
                    }

                    if (isset($result['system_error'])) {
                        log_message('error', 'System error: ' . $result['system_error']);
                        return $this->response->setStatusCode(400)->setJSON([
                            'status' => 'error',
                            'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
                        ]);
                    }

                    if (!empty($allErrors)) {
                        return $this->response->setStatusCode(400)->setJSON([
                            'status' => 'error',
                            'message' => 'Validasi gagal',
                            'errors' => $allErrors
                        ]);
                    }
                }

                return $this->response->setStatusCode(400)->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal menambahkan karyawan. Silakan coba lagi.'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error creating karyawan: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ]);
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();

        if (empty($id)) {
            $id = $data['idkaryawan'];
        } else {
            $data['idkaryawan'] = $id;
        }

        if (empty($id)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'message' => 'ID Karyawan tidak valid'
            ]);
        }

        $existingKaryawan = $this->karyawanModel->getKaryawanWithUser($id);
        if (!$existingKaryawan) {
            return $this->response->setStatusCode(404)->setJSON([
                'status' => 'error',
                'message' => 'Karyawan tidak ditemukan'
            ]);
        }

        // Prepare karyawan data
        $karyawanData = [
            'idkaryawan' => $data['idkaryawan'],
            'namakaryawan' => $data['namakaryawan'],
            'jenkel' => $data['jenkel'] ?? null,
            'alamat' => $data['alamat'],
            'nohp' => $data['nohp']
        ];

        $userData = null;

        // If email is provided, update user data
        if (!empty($data['email'])) {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => 'required|valid_email|is_unique[users.email,id,' . ($existingKaryawan['user_id'] ?? 0) . ']'
            ], [
                'email' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Format email tidak valid',
                    'is_unique' => 'Email sudah digunakan'
                ]
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => 'error',
                    'message' => 'Validasi gagal',
                    'errors' => $validation->getErrors()
                ]);
            }

            $userData = [
                'username' => $data['email'],
                'email' => $data['email'],
                'name' => $data['namakaryawan']
            ];

            // If password is provided, add it to user data
            if (!empty($data['password'])) {
                if (empty($data['confirm_password']) || $data['password'] !== $data['confirm_password']) {
                    return $this->response->setStatusCode(400)->setJSON([
                        'status' => 'error',
                        'message' => 'Konfirmasi password tidak cocok'
                    ]);
                }
                $userData['password'] = $data['password'];
            }
        } else if (!empty($existingKaryawan['user_id'])) {
            // If email is not provided but user exists, update only name
            $userData = [
                'name' => $data['namakaryawan']
            ];
        }

        if ($this->karyawanModel->updateKaryawanWithUser($id, $karyawanData, $userData)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Karyawan berhasil diperbarui'
            ]);
        }

        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'message' => 'Gagal memperbarui karyawan'
        ]);
    }

    public function delete($id = null)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Get karyawan data first
            $karyawan = $this->karyawanModel->find($id);
            if (!$karyawan) {
                return $this->response->setStatusCode(404)->setJSON([
                    'status' => 'error',
                    'message' => 'Karyawan tidak ditemukan'
                ]);
            }

            // Delete user account if exists
            if (!empty($karyawan['user_id'])) {
                $this->userModel->delete($karyawan['user_id']);
            }

            // Delete karyawan
            $this->karyawanModel->delete($id);

            $db->transComplete();

            if ($db->transStatus()) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Karyawan berhasil dihapus'
                ]);
            } else {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => 'error',
                    'message' => 'Gagal menghapus karyawan'
                ]);
            }
        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'message' => 'Gagal menghapus karyawan'
            ]);
        }
    }
}
