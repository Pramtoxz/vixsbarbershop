<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\GaleriModel;

class Home extends BaseController
{
    protected $paketModel;
    protected $galeriModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
        $this->galeriModel = new GaleriModel();
    }

    public function index(): string
    {
        $data = [
            'pakets' => $this->paketModel->findAll(),
            'galeri' => $this->galeriModel->getActiveGaleri(6) // Ambil 6 galeri terbaru
        ];

        return view('landing', $data);
    }
}
