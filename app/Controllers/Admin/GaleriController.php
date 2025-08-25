<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    protected $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Galeri',
            'galeri' => $this->galeriModel->findAll()
        ];

        return view('admin/galeri/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Galeri'
        ];

        return view('admin/galeri/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama galeri harus diisi',
                    'min_length' => 'Nama galeri minimal 3 karakter',
                    'max_length' => 'Nama galeri maksimal 100 karakter'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar harus diupload',
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validation->getErrors()
            ]);
        }

        $file = $this->request->getFile('gambar');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            
            // Buat direktori jika belum ada
            $uploadPath = FCPATH . 'uploads/galeri/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $file->move($uploadPath, $newName);

            $data = [
                'nama' => $this->request->getPost('nama'),
                'gambar' => $newName
            ];

            if ($this->galeriModel->insert($data)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Galeri berhasil ditambahkan'
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal menyimpan galeri'
        ]);
    }

    public function edit($id)
    {
        $galeri = $this->galeriModel->find($id);
        
        if (!$galeri) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Galeri tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Galeri',
            'galeri' => $galeri
        ];

        return view('admin/galeri/edit', $data);
    }

    public function update($id)
    {
        $galeri = $this->galeriModel->find($id);
        
        if (!$galeri) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Galeri tidak ditemukan'
            ]);
        }

        $validation = \Config\Services::validation();
        
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama galeri harus diisi',
                    'min_length' => 'Nama galeri minimal 3 karakter',
                    'max_length' => 'Nama galeri maksimal 100 karakter'
                ]
            ]
        ];

        // Jika ada file gambar baru
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $rules['gambar'] = [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validation->getErrors()
            ]);
        }

        $data = [
            'nama' => $this->request->getPost('nama')
        ];

        // Handle upload gambar baru
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            
            // Buat direktori jika belum ada
            $uploadPath = FCPATH . 'uploads/galeri/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $file->move($uploadPath, $newName);

            // Hapus gambar lama
            if ($galeri['gambar'] && file_exists($uploadPath . $galeri['gambar'])) {
                unlink($uploadPath . $galeri['gambar']);
            }

            $data['gambar'] = $newName;
        }

        if ($this->galeriModel->update($id, $data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Galeri berhasil diperbarui'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal memperbarui galeri'
        ]);
    }

    public function delete($id)
    {
        $galeri = $this->galeriModel->find($id);
        
        if (!$galeri) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Galeri tidak ditemukan'
            ]);
        }

        // Hapus file gambar
        $uploadPath = FCPATH . 'uploads/galeri/';
        if ($galeri['gambar'] && file_exists($uploadPath . $galeri['gambar'])) {
            unlink($uploadPath . $galeri['gambar']);
        }

        if ($this->galeriModel->delete($id)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Galeri berhasil dihapus'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal menghapus galeri'
        ]);
    }
}
