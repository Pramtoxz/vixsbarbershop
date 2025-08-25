<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    .jadwal-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .filter-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .jadwal-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .jadwal-date {
        font-size: 1.2rem;
        font-weight: bold;
        color: #495057;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e9ecef;
    }

    .jadwal-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-left: 4px solid #28a745;
        margin-bottom: 1rem;
        background: #f8f9fa;
        border-radius: 0 10px 10px 0;
    }

    .jadwal-time {
        flex: 0 0 120px;
        font-weight: bold;
        color: #495057;
    }

    .jadwal-info {
        flex: 1;
        margin-left: 1rem;
    }

    .jadwal-customer {
        font-weight: 600;
        color: #343a40;
        margin-bottom: 0.25rem;
    }

    .jadwal-service {
        color: #28a745;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }

    .jadwal-status {
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-dikonfirmasi {
        background: #d1ecf1;
        color: #0c5460;
    }

    .status-selesai {
        background: #d4edda;
        color: #155724;
    }

    .no-jadwal {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="jadwal-container">
    <h1>Jadwal Kerja</h1>
    
    <!-- Filter -->
    <div class="filter-card">
        <form method="GET">
            <div class="row">
                <div class="col-md-4">
                    <label for="tanggal" class="form-label">Tanggal Tertentu</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $filterTanggal ?? '' ?>">
                </div>
                <div class="col-md-4">
                    <label for="minggu" class="form-label">Minggu</label>
                    <input type="week" class="form-control" id="minggu" name="minggu" value="<?= $filterMinggu ?? '' ?>">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                    <a href="<?= site_url('karyawan/jadwal') ?>" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Jadwal -->
    <?php if (!empty($jadwalGrouped)): ?>
        <?php foreach ($jadwalGrouped as $tanggal => $jadwalHari): ?>
            <div class="jadwal-card">
                <div class="jadwal-date"><?= date('l, d F Y', strtotime($tanggal)) ?></div>
                <?php foreach ($jadwalHari as $jadwal): ?>
                    <div class="jadwal-item">
                        <div class="jadwal-time"><?= $jadwal['jamstart'] ?> - <?= $jadwal['jamend'] ?></div>
                        <div class="jadwal-info">
                            <div class="jadwal-customer"><?= esc($jadwal['namapelanggan']) ?></div>
                            <div class="jadwal-service"><?= esc($jadwal['namapaket']) ?></div>
                            <span class="jadwal-status status-<?= strtolower(str_replace(' ', '', $jadwal['status_text'])) ?>">
                                <?= $jadwal['status_text'] ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="jadwal-card">
            <div class="no-jadwal">
                <i class="bi bi-calendar-x" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                <h4>Tidak Ada Jadwal</h4>
                <p>Tidak ada jadwal untuk periode yang dipilih.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$(document).ready(function() {
    console.log('Jadwal page loaded');
    
    // Set default values jika tidak ada filter
    const today = new Date();
    const currentWeek = getWeekString(today);
    
    // Set default week jika field kosong
    if (!$('#minggu').val()) {
        $('#minggu').val(currentWeek);
    }
    
    // Handle form submission
    $('form').on('submit', function(e) {
        const tanggal = $('#tanggal').val();
        const minggu = $('#minggu').val();
        
        // Jika keduanya kosong, set minggu ke current week
        if (!tanggal && !minggu) {
            $('#minggu').val(currentWeek);
        }
        
        // Jika keduanya diisi, prioritaskan tanggal
        if (tanggal && minggu) {
            $('#minggu').val('');
        }
    });
    
    // Clear other field when one is selected
    $('#tanggal').on('change', function() {
        if ($(this).val()) {
            $('#minggu').val('');
        }
    });
    
    $('#minggu').on('change', function() {
        if ($(this).val()) {
            $('#tanggal').val('');
        }
    });
});

function getWeekString(date) {
    const year = date.getFullYear();
    const week = getWeekNumber(date);
    return year + '-W' + (week < 10 ? '0' + week : week);
}

function getWeekNumber(date) {
    const d = new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()));
    const dayNum = d.getUTCDay() || 7;
    d.setUTCDate(d.getUTCDate() + 4 - dayNum);
    const yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
    return Math.ceil((((d - yearStart) / 86400000) + 1)/7);
}
</script>
<?= $this->endSection() ?>
