<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
    }

    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 3rem;
    }

    .profile-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .info-item {
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 10px;
        border-left: 4px solid #667eea;
    }

    .info-label {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .info-value {
        font-weight: 600;
        color: #495057;
    }

    .status-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-aktif {
        background: #d4edda;
        color: #155724;
    }

    .status-inactive {
        background: #f8d7da;
        color: #721c24;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="bi bi-person-fill"></i>
            </div>
            <h2><?= esc($karyawan['namakaryawan'] ?? 'Nama Karyawan') ?></h2>
            <p class="text-muted">ID: <?= esc($karyawan['idkaryawan'] ?? '-') ?></p>
        </div>

        <div class="profile-info">
            <div class="info-item">
                <div class="info-label">Nama Lengkap</div>
                <div class="info-value"><?= esc($karyawan['namakaryawan'] ?? '-') ?></div>
            </div>

            <div class="info-item">
                <div class="info-label">ID Karyawan</div>
                <div class="info-value"><?= esc($karyawan['idkaryawan'] ?? '-') ?></div>
            </div>

            <div class="info-item">
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value"><?= ($karyawan['jenkel'] ?? '') == 'L' ? 'Laki-laki' : (($karyawan['jenkel'] ?? '') == 'P' ? 'Perempuan' : '-') ?></div>
            </div>

            <div class="info-item">
                <div class="info-label">Alamat</div>
                <div class="info-value"><?= esc($karyawan['alamat'] ?? '-') ?></div>
            </div>

            <div class="info-item">
                <div class="info-label">No. HP</div>
                <div class="info-value"><?= esc($karyawan['nohp'] ?? '-') ?></div>
            </div>

            <div class="info-item">
                <div class="info-label">Status</div>
                <div class="info-value">
                    <span class="status-badge status-<?= strtolower($karyawan['status'] ?? 'inactive') ?>">
                        <?= ucfirst($karyawan['status'] ?? 'Inactive') ?>
                    </span>
                </div>
            </div>

            <?php if (isset($karyawan['username'])): ?>
            <div class="info-item">
                <div class="info-label">Username</div>
                <div class="info-value"><?= esc($karyawan['username']) ?></div>
            </div>
            <?php endif; ?>

            <?php if (isset($karyawan['email'])): ?>
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value"><?= esc($karyawan['email']) ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    console.log('Profile page loaded');
</script>
<?= $this->endSection() ?>
