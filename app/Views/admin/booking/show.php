<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    .booking-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 0;
        border-radius: 15px;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .booking-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }

    .booking-header .container {
        position: relative;
        z-index: 1;
    }

    .booking-id-badge {
        font-size: 2rem;
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        margin-bottom: 0.5rem;
    }

    .booking-meta {
        display: flex;
        gap: 2rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .modern-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #f0f0f0;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .modern-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .card-header-modern {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.5rem 2rem;
        border-bottom: none;
        border-radius: 20px 20px 0 0;
        position: relative;
    }

    .card-header-modern h5 {
        margin: 0;
        color: #2c3e50;
        font-weight: 700;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .card-body-modern {
        padding: 2rem;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #f8f9fa;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-value {
        font-weight: 500;
        color: #2c3e50;
    }

    .status-badge {
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .status-pending {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        color: #212529;
    }

    .status-confirmed {
        background: linear-gradient(135deg, #0dcaf0 0%, #0d6efd 100%);
        color: white;
    }

    .status-completed {
        background: linear-gradient(135deg, #198754 0%, #20c997 100%);
        color: white;
    }

    .status-cancelled,
    .status-rejected {
        background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
        color: white;
    }

    .status-no-show {
        background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
        color: white;
    }

    .service-table {
        margin: 0;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .service-table thead {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
    }

    .service-table th {
        font-weight: 600;
        padding: 1.2rem 1rem;
        border: none;
        text-align: center;
    }

    .service-table td {
        padding: 1rem;
        vertical-align: middle;
        border-color: #f8f9fa;
    }

    .service-table tbody tr:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .payment-history {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }

    .btn-modern {
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-warning-modern {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        color: #212529;
    }

    .btn-info-modern {
        background: linear-gradient(135deg, #0dcaf0 0%, #0d6efd 100%);
        color: white;
    }

    .btn-secondary-modern {
        background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
        color: white;
    }

    .total-section {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 15px;
        text-align: center;
        margin-top: 1rem;
    }

    .total-amount {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .company-info {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        margin: 2rem 0;
    }

    .company-logo {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 1rem;
    }

    @media print {
        .no-print {
            display: none !important;
        }
        .modern-card {
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .booking-header {
            background: #667eea;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }

    @media (max-width: 768px) {
        .booking-meta {
            flex-direction: column;
            gap: 1rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn-modern {
            justify-content: center;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Header Section dengan Gradient -->
    <div class="booking-header" id="invoice-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="booking-id-badge">#<?= $booking['kdbooking'] ?></div>
                    <div class="booking-meta">
                        <div>
                            <i class="fas fa-calendar-alt me-2"></i>
                            <?= date('d F Y', strtotime($booking['tanggal_booking'])) ?>
                        </div>
                        <div>
                            <span class="status-badge status-<?= $booking['status'] ?>">
                                <?php
                                $statusMap = [
                                    'pending' => 'Menunggu Konfirmasi',
                                    'confirmed' => 'Terkonfirmasi',
                                    'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan',
                                    'no-show' => 'Tidak Hadir',
                                    'rejected' => 'Ditolak'
                                ];
                                echo $statusMap[$booking['status']] ?? $booking['status'];
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <h5 class="mb-2">Vixs Barbershop</h5>
                    <p class="mb-1">Jl. Dr. Moh. Hatta No.3kel, RT.01</p>
                    <p class="mb-1">Cupak Tangah, Kec. Pauh</p>
                    <p class="mb-0">Telp: 081234567890</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons no-print">
        <a href="<?= site_url('admin/booking') ?>" class="btn btn-modern btn-secondary-modern">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="<?= site_url('admin/booking/edit/' . $booking['kdbooking']) ?>" class="btn btn-modern btn-warning-modern">
            <i class="fas fa-edit"></i> Edit Booking
        </a>
        <button class="btn btn-modern btn-primary-modern" id="btnPrintInvoice">
            <i class="fas fa-print"></i> Cetak Faktur
        </button>
        <div class="dropdown">
            <button class="btn btn-modern btn-info-modern dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown">
                <i class="fas fa-exchange-alt"></i> Ubah Status
            </button>
            <ul class="dropdown-menu shadow-lg" aria-labelledby="statusDropdown">
                <li><a class="dropdown-item status-action" href="#" data-status="pending"><i class="fas fa-clock me-2"></i>Pending</a></li>
                <li><a class="dropdown-item status-action" href="#" data-status="confirmed"><i class="fas fa-check me-2"></i>Konfirmasi</a></li>
                <li><a class="dropdown-item status-action" href="#" data-status="completed"><i class="fas fa-check-circle me-2"></i>Selesai</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item status-action" href="#" data-status="cancelled"><i class="fas fa-times me-2"></i>Batalkan</a></li>
                <li><a class="dropdown-item status-action" href="#" data-status="no-show"><i class="fas fa-user-times me-2"></i>Tidak Hadir</a></li>
                <li><a class="dropdown-item status-action" href="#" data-status="rejected"><i class="fas fa-ban me-2"></i>Tolak</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row" id="invoice-content">

        <!-- Informasi Booking dan Pelanggan -->
        <div class="col-md-6">
            <div class="modern-card">
                <div class="card-header-modern">
                    <h5><i class="fas fa-calendar-check"></i> Informasi Booking</h5>
                </div>
                <div class="card-body-modern">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-hashtag"></i> ID Booking
                        </div>
                        <div class="info-value"><?= $booking['kdbooking'] ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-calendar"></i> Tanggal Booking
                        </div>
                        <div class="info-value"><?= date('d F Y', strtotime($booking['tanggal_booking'])) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-clock"></i> Dibuat
                        </div>
                        <div class="info-value"><?= date('d/m/Y H:i', strtotime($booking['created_at'])) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-credit-card"></i> Metode Pembayaran
                        </div>
                        <div class="info-value">
                            <span class="badge bg-info"><?= ucfirst($booking['jenispembayaran']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="modern-card">
                <div class="card-header-modern">
                    <h5><i class="fas fa-user-circle"></i> Informasi Pelanggan</h5>
                </div>
                <div class="card-body-modern">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-user"></i> Nama Lengkap
                        </div>
                        <div class="info-value"><?= $booking['nama_lengkap'] ?? 'Data tidak tersedia' ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-phone"></i> No. HP
                        </div>
                        <div class="info-value">
                            <?php if (!empty($booking['no_hp'])): ?>
                                <a href="tel:<?= $booking['no_hp'] ?>" class="text-decoration-none">
                                    <?= $booking['no_hp'] ?>
                                </a>
                            <?php else: ?>
                                Data tidak tersedia
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-envelope"></i> Email
                        </div>
                        <div class="info-value">
                            <?php if (!empty($booking['email'])): ?>
                                <a href="mailto:<?= $booking['email'] ?>" class="text-decoration-none">
                                    <?= $booking['email'] ?>
                                </a>
                            <?php else: ?>
                                Data tidak tersedia
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-map-marker-alt"></i> Alamat
                        </div>
                        <div class="info-value"><?= $booking['alamat'] ?? 'Data tidak tersedia' ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Layanan -->
    <div class="row">
        <div class="col-12">
            <div class="modern-card">
                <div class="card-header-modern">
                    <h5><i class="fas fa-cut"></i> Detail Layanan</h5>
                </div>
                <div class="card-body-modern">
                    <div class="table-responsive">
                        <table class="table service-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Paket Layanan</th>
                                    <th>Deskripsi</th>
                                    <th>Waktu</th>
                                    <th>Karyawan</th>
                                    <th class="text-end">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                $counter = 1; ?>
                                <?php foreach ($details as $detail): ?>
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge bg-primary"><?= $counter++ ?></span>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-primary"><?= $detail['nama_paket'] ?></div>
                                        </td>
                                        <td>
                                            <small class="text-muted"><?= $detail['deskripsi'] ?></small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-clock me-2 text-info"></i>
                                                <span class="badge bg-light text-dark">
                                                    <?= $detail['jamstart'] ?> - <?= $detail['jamend'] ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-user me-2 text-success"></i>
                                                <?php
                                                $karyawanModel = new \App\Models\KaryawanModel();
                                                $karyawan = $karyawanModel->find($detail['idkaryawan']);
                                                echo $karyawan ? $karyawan['namakaryawan'] : '<span class="text-muted">Belum ditentukan</span>';
                                                ?>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="fw-bold text-success">
                                                Rp <?= number_format($detail['harga'], 0, ',', '.') ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $total += $detail['harga']; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Total Section -->
                    <div class="total-section">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="mb-0">Total Booking</h6>
                            </div>
                            <div class="col-md-4">
                                <div class="total-amount">Rp <?= number_format($booking['total'], 0, ',', '.') ?></div>
                            </div>
                        </div>
                        <hr class="my-3" style="border-color: rgba(255,255,255,0.3);">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center">
                                    <h6 class="mb-1">Sudah Dibayar</h6>
                                    <div class="h5">Rp <?= number_format($booking['jumlahbayar'], 0, ',', '.') ?></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <h6 class="mb-1">Sisa Pembayaran</h6>
                                    <div class="h5 <?= ($booking['total'] - $booking['jumlahbayar']) > 0 ? 'text-warning' : 'text-success' ?>">
                                        Rp <?= number_format($booking['total'] - $booking['jumlahbayar'], 0, ',', '.') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Riwayat Pembayaran -->
    <?php if (!empty($pembayaran) && is_array($pembayaran)): ?>
    <div class="row">
        <div class="col-12">
            <div class="modern-card">
                <div class="card-header-modern">
                    <h5><i class="fas fa-credit-card"></i> Riwayat Pembayaran</h5>
                </div>
                <div class="card-body-modern">
                    <div class="payment-history">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th><i class="fas fa-calendar me-2"></i>Tanggal</th>
                                        <th><i class="fas fa-money-bill me-2"></i>Metode</th>
                                        <th><i class="fas fa-check-circle me-2"></i>Status</th>
                                        <th><i class="fas fa-tags me-2"></i>Jenis</th>
                                        <th class="text-end"><i class="fas fa-dollar-sign me-2"></i>Jumlah</th>
                                        <th><i class="fas fa-receipt me-2"></i>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembayaran as $bayar): ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-clock me-2 text-muted"></i>
                                                    <?= date('d/m/Y H:i', strtotime($bayar['created_at'])) ?>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-info"><?= ucfirst($bayar['metode']) ?></span>
                                            </td>
                                            <td>
                                                <span class="badge <?= $bayar['status'] == 'paid' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                                    <i class="fas <?= $bayar['status'] == 'paid' ? 'fa-check' : 'fa-clock' ?> me-1"></i>
                                                    <?= $bayar['status'] == 'paid' ? 'Dibayar' : 'Belum Dibayar' ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge <?= ($bayar['jenis'] ?? '') == 'DP' ? 'bg-warning text-dark' : 'bg-success' ?>">
                                                    <?= ($bayar['jenis'] ?? 'Lunas') ?>
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <span class="fw-bold text-success">
                                                    Rp <?= number_format($bayar['total_bayar'], 0, ',', '.') ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if (!empty($bayar['bukti'])): ?>
                                                    <button type="button" class="btn btn-sm btn-primary view-bukti no-print"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#buktiModal"
                                                        data-bukti="<?= base_url('uploads/bukti_pembayaran/' . $bayar['bukti']) ?>"
                                                        data-id="<?= $bayar['id'] ?>">
                                                        <i class="fas fa-eye me-1"></i> Lihat Bukti
                                                    </button>
                                                    <span class="d-none print-only">
                                                        <i class="fas fa-check text-success"></i> Ada
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">
                                                        <i class="fas fa-times me-1"></i> Tidak ada
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Company Info & Notes -->
    <div class="row">
        <div class="col-md-8">
            <div class="modern-card">
                <div class="card-header-modern">
                    <h5><i class="fas fa-sticky-note"></i> Catatan Penting</h5>
                </div>
                <div class="card-body-modern">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-clock text-warning me-3 mt-1"></i>
                                <div>
                                    <strong>Kedatangan</strong>
                                    <p class="mb-0 text-muted">Harap datang 10 menit sebelum waktu yang dijadwalkan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-ban text-danger me-3 mt-1"></i>
                                <div>
                                    <strong>Pembatalan</strong>
                                    <p class="mb-0 text-muted">Pembatalan harus dilakukan minimal 2 jam sebelum jadwal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-receipt text-info me-3 mt-1"></i>
                                <div>
                                    <strong>Bukti Pembayaran</strong>
                                    <p class="mb-0 text-muted">Faktur ini sebagai bukti sah pembayaran dan layanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="company-info">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Vixs Barbershop" class="company-logo" onerror="this.src='https://via.placeholder.com/100x100?text=LOGO'">
                <h4 class="text-primary mb-3">Vixs Barbershop</h4>
                <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Jl. Dr. Moh. Hatta No.3kel, RT.01</p>
                <p class="mb-2"><i class="fas fa-phone me-2"></i>081234567890</p>
                <p class="mb-3"><i class="fas fa-envelope me-2"></i>info@vixsbarbershop.com</p>
                <div class="text-primary">
                    <strong>Terima kasih atas kepercayaan Anda!</strong>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        // Handle status update
        $('.status-action').on('click', function(e) {
            e.preventDefault();

            const status = $(this).data('status');
            const kdbooking = '<?= $booking['kdbooking'] ?>';

            // Jika status completed, cek sisa pembayaran dulu
            if (status === 'completed') {
                // Cek apakah ada sisa pembayaran
                $.ajax({
                    url: '<?= site_url('admin/booking/getPaymentInfo') ?>',
                    type: 'POST',
                    data: {
                        kdbooking: kdbooking
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            const data = response.data;

                            // Set nilai kdbooking dan status pada modal
                            $('#kdbooking').val(kdbooking);
                            $('#status').val(status);

                            // Jika ada sisa pembayaran, tampilkan form pelunasan
                            if (parseFloat(data.sisa) > 0) {
                                $('#booking_id_pembayaran').val(kdbooking);
                                $('#sisa_pembayaran').val(data.sisa);

                                // Format currency
                                $('#totalBooking').text('Rp ' + formatRupiah(data.total));
                                $('#sudahDibayar').text('Rp ' + formatRupiah(data.jumlahbayar));
                                $('#sisaPembayaran').text('Rp ' + formatRupiah(data.sisa));

                                // Tampilkan info sisa pembayaran
                                $('#sisaPembayaranInfo').show();
                                $('#formPelunasan').show();
                            } else {
                                $('#sisaPembayaranInfo').hide();
                                $('#formPelunasan').hide();
                            }

                            // Tampilkan modal status
                            $('#statusModal').modal('show');
                        } else {
                            console.error("Error fetching payment info:", response.message);
                            showStatusConfirmation(kdbooking, status);
                        }
                    },
                    error: function() {
                        console.error("AJAX Error fetching payment info");
                        showStatusConfirmation(kdbooking, status);
                    }
                });
            } else {
                // Untuk status selain completed, langsung tampilkan modal
                $('#kdbooking').val(kdbooking);
                $('#status').val(status);
                $('#sisaPembayaranInfo').hide();
                $('#formPelunasan').hide();
                $('#statusModal').modal('show');
            }
        });

        // Helper function untuk menampilkan konfirmasi status
        function showStatusConfirmation(kdbooking, status) {
            $('#kdbooking').val(kdbooking);
            $('#status').val(status);
            $('#sisaPembayaranInfo').hide();
            $('#formPelunasan').hide();
            $('#statusModal').modal('show');
        }

        // Handle form status submit
        $('#statusForm').on('submit', function(e) {
            e.preventDefault();

            const kdbooking = $('#kdbooking').val();
            const status = $('#status').val();

            // Data untuk update status
            let data = {
                kdbooking: kdbooking,
                status: status,
                update_payment: (status === 'completed' || status === 'cancelled' || status === 'rejected')
            };

            // Tambahkan data pelunasan jika status completed dan pelunasan dicentang
            if (status === 'completed' && $('#formPelunasan').is(':visible') && $('#lunaskan').is(':checked')) {
                data.pelunasan = true;
                data.metode_pembayaran = $('#metode_pembayaran').val();
                data.jumlah_pembayaran = $('#sisa_pembayaran').val();
            }

            // Tutup modal
            $('#statusModal').modal('hide');

            // Kirim request update status
            $.ajax({
                url: '<?= site_url('admin/booking/updateStatus') ?>',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Status berhasil diperbarui',
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal memperbarui status: ' + response.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat memperbarui status'
                    });
                }
            });
        });

        // Helper function untuk format angka ke format Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID').format(angka);
        }

        // Handle cetak faktur
        $('#btnPrintInvoice').on('click', function() {
            cetakFaktur();
        });

        // Handle tampilan bukti pembayaran
        $('.view-bukti').on('click', function() {
            var buktiUrl = $(this).data('bukti');
            var id = $(this).data('id');

            $('#buktiImage').attr('src', buktiUrl);
            $('#buktiModalLabel').text('Bukti Pembayaran #' + id);
            $('#downloadBukti').attr('href', buktiUrl);

            // Reset zoom state
            $('#buktiImage').css('max-height', '500px').removeClass('zoomed');
            $('#zoomBukti').find('span').text('Perbesar');
            $('#zoomBukti').find('i').removeClass('bi-zoom-out').addClass('bi-zoom-in');

            // Preload gambar
            var img = new Image();
            img.onload = function() {
                // Gambar berhasil dimuat
                $('#buktiImage').removeClass('d-none');
            };
            img.onerror = function() {
                // Gambar gagal dimuat
                $('#buktiImage').addClass('d-none');
                $('.modal-body').append('<div class="alert alert-danger">Gambar tidak dapat dimuat</div>');
            };
            img.src = buktiUrl;
        });

        // Handle zoom gambar
        $('#zoomBukti').on('click', function() {
            var $img = $('#buktiImage');
            var $icon = $(this).find('i');
            var $text = $(this).find('span');

            if ($img.hasClass('zoomed')) {
                // Kecilkan gambar
                $img.css('max-height', '500px').removeClass('zoomed');
                $icon.removeClass('bi-zoom-out').addClass('bi-zoom-in');
                $text.text('Perbesar');
            } else {
                // Perbesar gambar
                $img.css('max-height', 'none').addClass('zoomed');
                $icon.removeClass('bi-zoom-in').addClass('bi-zoom-out');
                $text.text('Kecilkan');
            }
        });

        // Reset modal saat ditutup
        $('#buktiModal').on('hidden.bs.modal', function() {
            $('#buktiImage').attr('src', '').css('max-height', '500px').removeClass('zoomed');
            $('.alert').remove();
        });
    });

    // Fungsi untuk mencetak faktur ke halaman baru
    function cetakFaktur() {
        try {
            // Gabungkan content dari header dan content
            var headerContent = document.getElementById('invoice-header').innerHTML;
            var mainContent = document.getElementById('invoice-content').innerHTML;
            var invoiceContent = '<div class="booking-header">' + headerContent + '</div>' + mainContent;
            var printWindow = window.open('', '_blank', 'height=600,width=800');

            if (!printWindow) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Popup blocker mungkin menghalangi jendela cetak. Mohon izinkan popup untuk situs ini.'
                });
                return;
            }

            printWindow.document.write('<!DOCTYPE html>');
            printWindow.document.write('<html lang="id">');
            printWindow.document.write('<head>');
            printWindow.document.write('<meta charset="UTF-8">');
            printWindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
            printWindow.document.write('<title>Faktur Booking - <?= $booking['kdbooking'] ?></title>');
            printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">');
            printWindow.document.write('<style>');
            printWindow.document.write('body { font-family: Arial, sans-serif; margin: 0; padding: 10px; font-size: 12px; }');
            printWindow.document.write('.container { max-width: 100%; padding: 0; }');
            printWindow.document.write('.booking-detail-container { max-width: 100%; margin: 0 auto; }');
            printWindow.document.write('.row { margin-right: -5px; margin-left: -5px; }');
            printWindow.document.write('.col-md-6, .col-md-8, .col-md-4, .col-12 { padding-right: 5px; padding-left: 5px; }');
            printWindow.document.write('.info-card { margin-bottom: 10px; border-radius: 5px; overflow: hidden; box-shadow: 0 0 5px rgba(0,0,0,0.1); }');
            printWindow.document.write('.info-card .card-header { background-color: #f8f9fa; border-bottom: 1px solid #e9ecef; padding: 8px 10px; }');
            printWindow.document.write('.info-card .card-header h5 { margin: 0; color: #495057; font-weight: 600; font-size: 14px; }');
            printWindow.document.write('.info-card .card-body { padding: 10px; }');
            printWindow.document.write('.booking-id { font-size: 18px; font-weight: 700; color: #007bff; margin-bottom: 3px; }');
            printWindow.document.write('.booking-date { font-size: 12px; color: #6c757d; margin-bottom: 10px; }');
            printWindow.document.write('.booking-status { display: inline-block; padding: 3px 8px; border-radius: 15px; font-weight: 500; font-size: 11px; text-transform: uppercase; }');
            printWindow.document.write('.status-pending { background-color: #ffc107; color: #212529; }');
            printWindow.document.write('.status-confirmed { background-color: #0dcaf0; color: #fff; }');
            printWindow.document.write('.status-completed { background-color: #198754; color: #fff; }');
            printWindow.document.write('.status-cancelled { background-color: #dc3545; color: #fff; }');
            printWindow.document.write('.status-no-show { background-color: #6c757d; color: #fff; }');
            printWindow.document.write('.status-rejected { background-color: #dc3545; color: #fff; }');
            printWindow.document.write('.detail-table { margin-bottom: 0; }');
            printWindow.document.write('.detail-table th, .detail-table td { padding: 4px; font-size: 12px; }');
            printWindow.document.write('.detail-table th { width: 35%; font-weight: 600; }');
            printWindow.document.write('.service-table { margin-bottom: 5px; }');
            printWindow.document.write('.service-table th, .service-table td { padding: 5px; vertical-align: middle; font-size: 11px; }');
            printWindow.document.write('.service-table th { font-size: 11px; }');
            printWindow.document.write('.table>:not(caption)>*>* { padding: 5px; }');
            printWindow.document.write('.payment-info { border-top: 1px solid #dee2e6; margin-top: 10px; padding-top: 10px; }');
            printWindow.document.write('.payment-info h6 { font-weight: 600; margin-bottom: 8px; font-size: 13px; }');
            printWindow.document.write('.total-section { font-size: 14px; font-weight: 700; }');
            printWindow.document.write('.invoice-header { margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center; }');
            printWindow.document.write('.invoice-header img { max-width: 70px; height: auto; }');
            printWindow.document.write('.invoice-header h4 { font-size: 16px; margin-bottom: 2px; }');
            printWindow.document.write('.invoice-header p { font-size: 11px; margin-bottom: 2px; }');
            printWindow.document.write('.invoice-title { font-size: 18px; font-weight: 700; color: #212529; margin-bottom: 2px; text-align: right; }');
            printWindow.document.write('.invoice-number { font-size: 13px; color: #6c757d; text-align: right; }');
            printWindow.document.write('.mt-4 { margin-top: 10px !important; }');
            printWindow.document.write('.mb-4 { margin-bottom: 10px !important; }');
            printWindow.document.write('p { margin-bottom: 3px; font-size: 11px; }');
            printWindow.document.write('h6 { font-size: 13px; margin-bottom: 5px; }');
            printWindow.document.write('.print-only { display: none; }');
            printWindow.document.write('@media print { body { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; } .no-print { display: none !important; } .print-only { display: inline-block !important; } @page { size: A4 portrait; margin: 5mm; } }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head>');
            printWindow.document.write('<body>');
            printWindow.document.write('<div class="container">');
            printWindow.document.write(invoiceContent);
            printWindow.document.write('</div>');
            printWindow.document.write('<script>');
            printWindow.document.write('window.onload = function() {');
            printWindow.document.write('  setTimeout(function() { ');
            printWindow.document.write('    window.print();');
            printWindow.document.write('    // Tambahkan listener untuk deteksi selesai mencetak');
            printWindow.document.write('    window.addEventListener("afterprint", function() {');
            printWindow.document.write('      // Tanya pengguna apakah ingin menutup jendela setelah mencetak');
            printWindow.document.write('      if(confirm("Apakah Anda ingin menutup jendela faktur?")) {');
            printWindow.document.write('        window.close();');
            printWindow.document.write('      }');
            printWindow.document.write('    });');
            printWindow.document.write('  }, 1000);');
            printWindow.document.write('};');
            printWindow.document.write('<\/script>');
            printWindow.document.write('</body>');
            printWindow.document.write('</html>');

            printWindow.document.close();
            printWindow.focus();

        } catch (error) {
            console.error('Error cetak faktur:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Terjadi kesalahan saat mencetak faktur: ' + error.message
            });
        }
    }
</script>
<!-- Modal Bukti Pembayaran -->
<div class="modal fade" id="buktiModal" tabindex="-1" aria-labelledby="buktiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buktiModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="buktiImage" src="" alt="Bukti Pembayaran" class="img-fluid" style="max-height: 500px;">
                <div class="mt-3">
                    <a href="#" id="downloadBukti" class="btn btn-sm btn-success" download>
                        <i class="bi bi-download"></i> Download Gambar
                    </a>
                    <button type="button" id="zoomBukti" class="btn btn-sm btn-info">
                        <i class="bi bi-zoom-in"></i> <span>Perbesar</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">
                    <i class="bi bi-arrow-repeat me-2"></i> Ubah Status Booking
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="statusForm">
                <div class="modal-body">
                    <input type="hidden" id="kdbooking" name="kdbooking">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending">Menunggu Konfirmasi</option>
                            <option value="confirmed">Terkonfirmasi</option>
                            <option value="completed">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                            <option value="no-show">Tidak Hadir</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>

                    <!-- Informasi sisa pembayaran -->
                    <div id="sisaPembayaranInfo" class="mt-3" style="display: none;">
                        <div class="alert alert-info">
                            <h6 class="mb-2"><i class="bi bi-info-circle"></i> Informasi Pembayaran</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless mb-0">
                                    <tr>
                                        <td>Total</td>
                                        <td>:</td>
                                        <td class="text-end" id="totalBooking">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td>Sudah Dibayar</td>
                                        <td>:</td>
                                        <td class="text-end" id="sudahDibayar">Rp 0</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td>Sisa</td>
                                        <td>:</td>
                                        <td class="text-end" id="sisaPembayaran">Rp 0</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Form pelunasan -->
                        <div id="formPelunasan" class="mt-3">
                            <h6 class="mb-2">Pelunasan Pembayaran</h6>
                            <input type="hidden" id="booking_id_pembayaran" name="booking_id_pembayaran">
                            <input type="hidden" id="sisa_pembayaran" name="sisa_pembayaran">

                            <div class="form-group mb-2">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="qris">QRIS</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="lunaskan" name="lunaskan" value="1" checked>
                                    <label class="custom-control-label" for="lunaskan">Lunaskan pembayaran</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>