<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<style>
    .report-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .report-item {
        display: flex;
        align-items: center;
        padding: 20px 25px;
        margin-bottom: 15px;
        border-radius: 12px;
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .report-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 5px;
        background: var(--accent-color);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .report-item:hover {
        transform: translateX(10px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .report-item:hover::before {
        transform: scaleY(1);
    }

    .report-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--accent-color);
        color: white;
        font-size: 24px;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .report-content {
        flex-grow: 1;
    }

    .report-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 5px;
        color: #2c3e50;
    }

    .report-desc {
        font-size: 14px;
        color: #7f8c8d;
    }

    .report-action {
        margin-left: 20px;
    }

    .report-btn {
        background: var(--accent-color);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .report-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        color: white;
    }

    .report-btn i {
        margin-right: 8px;
    }

    /* Color variations */
    .report-item.primary {
        --accent-color: #4e73df;
    }

    .report-item.success {
        --accent-color: #1cc88a;
    }

    .report-item.info {
        --accent-color: #36b9cc;
    }

    .report-item.warning {
        --accent-color: #f6c23e;
    }

    .report-item.danger {
        --accent-color: #e74a3b;
    }

    /* Animation */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .report-item {
        animation: slideIn 0.5s ease forwards;
        opacity: 0;
    }

    .report-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .report-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    .report-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    .report-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    .report-item:nth-child(5) {
        animation-delay: 0.5s;
    }

    .report-item:nth-child(6) {
        animation-delay: 0.6s;
    }

    .report-item:nth-child(7) {
        animation-delay: 0.7s;
    }

    .report-item:nth-child(8) {
        animation-delay: 0.8s;
    }

    .report-item:nth-child(9) {
        animation-delay: 0.9s;
    }

    .report-item:nth-child(10) {
        animation-delay: 1.0s;
    }

    .report-item:nth-child(11) {
        animation-delay: 1.1s;
    }

    .report-item:nth-child(12) {
        animation-delay: 1.2s;
    }
</style>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan</h6>
    </div>
    <div class="card-body">
        <ul class="report-list">
            <!-- Laporan Karyawan -->
            <li class="report-item primary">
                <div class="report-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Karyawan</h3>
                    <p class="report-desc">Data Karyawan</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/karyawan') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Paket -->
            <li class="report-item success">
                <div class="report-icon">
                    <i class="fas fa-cut"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Paket</h3>
                    <p class="report-desc">Data Paket Layanan</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/paket') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Pelanggan -->
            <li class="report-item info">
                <div class="report-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Pelanggan</h3>
                    <p class="report-desc">Data Pelanggan</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pelanggan') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Booking Pertanggal -->
            <li class="report-item warning">
                <div class="report-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Booking Pertanggal</h3>
                    <p class="report-desc">Data Booking Pertanggal</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/booking') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Booking Bulanan -->
            <li class="report-item warning">
                <div class="report-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Booking Bulanan</h3>
                    <p class="report-desc">Data Booking Per Bulan</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/booking-bulanan') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Pembayaran Perbulan -->
            <li class="report-item danger">
                <div class="report-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Pembayaran Perbulan</h3>
                    <p class="report-desc">Data Pembayaran Per Bulan</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pembayaran') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Pembayaran Pertanggal -->
            <li class="report-item danger">
                <div class="report-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Pembayaran Pertanggal</h3>
                    <p class="report-desc">Data Pembayaran Per Tanggal</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pembayaran-pertanggal') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Pembayaran Pertahun -->
            <li class="report-item danger">
                <div class="report-icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Pembayaran Pertahun</h3>
                    <p class="report-desc">Data Pembayaran Per Tahun</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pembayaran-pertahun') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Uang Masuk Bulanan -->
            <li class="report-item primary">
                <div class="report-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Uang Masuk Bulanan</h3>
                    <p class="report-desc">Uang Masuk Bulanan</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pendapatan-bulanan') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Uang Masuk Tahunan -->
            <li class="report-item success">
                <div class="report-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Uang Masuk Tahunan</h3>
                    <p class="report-desc">Uang Masuk Per Tahun</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pendapatan-tahunan') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Pengeluaran Bulanan -->
            <li class="report-item danger">
                <div class="report-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Pengeluaran Bulanan</h3>
                    <p class="report-desc">Data Uang Keluar Per Bulan</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pengeluaran-bulanan') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>

            <!-- Laporan Pengeluaran Tahunan -->
            <li class="report-item danger">
                <div class="report-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="report-content">
                    <h3 class="report-title">Laporan Pengeluaran Tahunan</h3>
                    <p class="report-desc">Data Uang Keluar Per Tahun</p>
                </div>
                <div class="report-action">
                    <a href="<?= site_url('admin/reports/pengeluaran-tahunan') ?>" class="report-btn">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<?= $this->endSection() ?>