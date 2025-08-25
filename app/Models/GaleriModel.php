<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table            = 'galeri';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'gambar'];

 
    // Validation
    protected $validationRules      = [
        'nama'   => 'required|min_length[3]|max_length[100]',
        'gambar' => 'permit_empty|max_length[255]'
    ];
    protected $validationMessages   = [
        'nama' => [
            'required'    => 'Nama galeri harus diisi',
            'min_length'  => 'Nama galeri minimal 3 karakter',
            'max_length'  => 'Nama galeri maksimal 100 karakter'
        ]
    ];
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Get galeri yang aktif (untuk landing page)
     */
    public function getActiveGaleri($limit = null)
    {
        $builder = $this->orderBy('id', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->findAll();
    }

    /**
     * Get galeri dengan pagination
     */
    public function getGaleriPaginated($perPage = 10)
    {
        return $this->orderBy('id', 'DESC')
                   ->paginate($perPage);
    }

    /**
     * Search galeri by nama
     */
    public function searchGaleri($keyword, $limit = null)
    {
        $builder = $this->like('nama', $keyword)
                       ->orderBy('id', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->findAll();
    }

    /**
     * Get total count
     */
    public function getTotalCount()
    {
        return $this->countAll();
    }

    /**
     * Get random galeri for display
     */
    public function getRandomGaleri($limit = 6)
    {
        return $this->orderBy('RAND()')
                   ->limit($limit)
                   ->findAll();
    }
}
