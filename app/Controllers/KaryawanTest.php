<?php

namespace App\Controllers;

class KaryawanTest extends BaseController
{
    public function index()
    {
        // Simple test untuk karyawan login
        if (!session()->get('logged_in') || session()->get('role') !== 'karyawan') {
            return redirect()->to('auth')->with('error', 'Akses ditolak - harus login sebagai karyawan');
        }

        $data = [
            'title' => 'Test Dashboard Karyawan',
            'karyawan' => [
                'namakaryawan' => session()->get('name'),
                'idkaryawan' => 'TEST-001'
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

    public function info()
    {
        // Debug info
        echo "<h2>Session Info:</h2>";
        echo "<pre>";
        print_r([
            'logged_in' => session()->get('logged_in'),
            'role' => session()->get('role'),
            'user_id' => session()->get('user_id'),
            'username' => session()->get('username'),
            'name' => session()->get('name')
        ]);
        echo "</pre>";

        echo "<h2>Database Check:</h2>";
        $db = \Config\Database::connect();
        
        // Check if user_id column exists in karyawan table
        try {
            $query = $db->query("DESCRIBE karyawan");
            $fields = $query->getResultArray();
            echo "<h3>Karyawan Table Structure:</h3>";
            echo "<pre>";
            foreach ($fields as $field) {
                echo $field['Field'] . " - " . $field['Type'] . "\n";
            }
            echo "</pre>";
        } catch (\Exception $e) {
            echo "Error checking karyawan table: " . $e->getMessage();
        }
    }
}
