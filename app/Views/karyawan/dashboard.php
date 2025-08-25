<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        border-left: 4px solid #667eea;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .jadwal-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .jadwal-item {
        padding: 1rem;
        border-left: 4px solid #28a745;
        margin-bottom: 1rem;
        background: #f8f9fa;
        border-radius: 0 10px 10px 0;
    }

    .jadwal-time {
        font-weight: bold;
        color: #495057;
    }

    .jadwal-customer {
        color: #6c757d;
        margin-top: 0.5rem;
    }

    .jadwal-service {
        color: #28a745;
        font-weight: 500;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="dashboard-container">
    <!-- Welcome Card -->
    <div class="welcome-card">
        <h1>Selamat Datang, <?= esc($karyawan['namakaryawan'] ?? 'Karyawan') ?>!</h1>
        <p>Dashboard karyawan untuk melihat jadwal kerja Anda</p>
    </div>

    <!-- Statistics -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number"><?= $totalJadwalMingguIni ?? 0 ?></div>
            <div class="stat-label">Jadwal Minggu Ini</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?= count($jadwalHariIni ?? []) ?></div>
            <div class="stat-label">Jadwal Hari Ini</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?= $statistik['totalBookingSelesai'] ?? 0 ?></div>
            <div class="stat-label">Total Selesai</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?= $statistik['totalBookingPending'] ?? 0 ?></div>
            <div class="stat-label">Booking Pending</div>
        </div>
    </div>

    <!-- Jadwal Hari Ini -->
    <div class="jadwal-card">
        <h3>Jadwal Hari Ini</h3>
        <?php if (!empty($jadwalHariIni)): ?>
            <?php foreach ($jadwalHariIni as $jadwal): ?>
                <div class="jadwal-item">
                    <div class="jadwal-time"><?= $jadwal['jamstart'] ?> - <?= $jadwal['jamend'] ?></div>
                    <div class="jadwal-customer"><?= esc($jadwal['namapelanggan']) ?></div>
                    <div class="jadwal-service"><?= esc($jadwal['namapaket']) ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Tidak ada jadwal hari ini.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    console.log('Karyawan Dashboard loaded');
</script>
<?= $this->endSection() ?>
