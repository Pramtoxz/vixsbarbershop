<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .booking-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .booking-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #f0f0f0;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .booking-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .booking-card .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-bottom: none;
        padding: 1.5rem 2rem;
        position: relative;
        color: white;
    }

    .booking-card .card-header h5 {
        margin: 0;
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .booking-card .card-body {
        padding: 2rem;
    }

    /* Styling untuk pemilihan jam */
    .time-slots-container {
        margin-top: 20px;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 15px;
    }

    .time-slot {
        display: block;
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 8px;
        border: 2px solid #e9ecef;
        border-radius: 50px;
        background: white;
        color: #495057;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .time-slot::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .time-slot:hover::before {
        left: 100%;
    }

    .time-slot:hover {
        background: linear-gradient(135deg, var(--light-color) 0%, var(--light-gray) 100%);
        border-color: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px var(--secondary-light);
    }

    .time-slot.active {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
        color: white;
        border-color: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px var(--secondary-light);
    }

    .time-slot.booked {
        background: linear-gradient(135deg, var(--danger-color), var(--accent-orange));
        color: white;
        border-color: var(--danger-color);
        cursor: not-allowed;
        opacity: 0.8;
    }

    .time-slot.partial-booked {
        background: linear-gradient(135deg, var(--warning-color), var(--accent-orange));
        color: var(--text-primary);
        border-color: var(--warning-color);
        cursor: pointer;
    }

    .time-slot.disabled {
        background: #f8f9fa;
        color: #6c757d;
        border-color: #dee2e6;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .booking-date-display {
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 15px;
        padding: 1rem;
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        border-left: 4px solid var(--secondary-color);
    }

    .status-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 20px;
        padding: 1rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .legend-item {
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 0.5rem 1rem;
        background: #f8f9fa;
        border-radius: 25px;
        border: 1px solid #e9ecef;
    }

    .legend-color {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        margin-right: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .date-picker-container {
        position: relative;
    }

    .date-picker-container .form-control {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 1rem 1rem 1rem 3rem;
        height: auto;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .date-picker-container .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 4px 20px var(--secondary-light);
        transform: translateY(-2px);
    }

    .date-picker-container .calendar-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--secondary-color);
        z-index: 4;
        font-size: 1.2rem;
    }

    .form-section-title {
        font-weight: 700;
        color: #2c3e50;
        margin-top: 2rem;
        margin-bottom: 1rem;
        padding: 1rem 0 0.5rem 0;
        border-bottom: 2px solid #667eea;
        position: relative;
    }

    .form-section-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 50px;
        height: 2px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .customer-info-display {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #e9ecef;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .customer-info-display p {
        margin-bottom: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .customer-info-display strong {
        color: #2c3e50;
        font-weight: 600;
        min-width: 100px;
    }

    .switch-container {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .form-switch {
        padding-left: 3em;
        position: relative;
    }

    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
        background-color: #e9ecef;
        border: none;
        border-radius: 2em;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .form-switch .form-check-input:checked {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
        border-color: var(--secondary-color);
    }

    .form-switch .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
    }

    .form-check-label {
        font-weight: 600;
        color: #2c3e50;
        cursor: pointer;
    }

    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
        border-radius: 15px;
    }

    .legend-available {
        background: white;
        border: 2px solid #e9ecef;
    }

    .legend-selected {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
    }

    .legend-booked {
        background: linear-gradient(135deg, var(--danger-color), var(--accent-orange));
    }

    .legend-partial {
        background: linear-gradient(135deg, var(--warning-color), var(--accent-orange));
    }

    .legend-disabled {
        background: #f8f9fa;
        border: 2px solid #dee2e6;
    }

    /* Modern Form Controls */
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 0.8rem 1.2rem;
        transition: all 0.3s ease;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 4px 20px var(--secondary-light);
        transform: translateY(-2px);
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Modern Buttons */
    .btn {
        border-radius: 50px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
        color: white;
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--warning-color), var(--accent-orange));
        color: var(--text-primary);
    }

    .btn-outline-secondary {
        background: white;
        border: 2px solid #6c757d;
        color: #6c757d;
    }

    .btn-outline-secondary:hover {
        background: #6c757d;
        color: white;
    }

    .btn-sm {
        padding: 0.5rem 1.5rem;
        font-size: 0.9rem;
    }

    .btn-lg {
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
    }

    /* Alert Styling */
    .alert {
        border-radius: 15px;
        border: none;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .alert-warning {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        color: #856404;
        border-left: 4px solid #ffc107;
    }

    /* Card Styling for Selected Items */
    .card.border-0.bg-light {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
        border: 1px solid #e9ecef !important;
        border-radius: 15px !important;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05) !important;
    }

    .card-body.p-3 {
        padding: 1.5rem !important;
    }

    .card-title {
        color: #2c3e50 !important;
        font-weight: 700 !important;
    }

    .card-text {
        color: #6c757d !important;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .booking-card .card-body {
            padding: 1.5rem;
        }
        
        .time-slot {
            padding: 10px 15px;
            font-size: 0.9rem;
        }
        
        .switch-container {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="booking-container">
        <form id="editBookingForm">
            <input type="hidden" name="kdbooking" value="<?= $booking['kdbooking'] ?>">
            <input type="hidden" name="idpelanggan" value="<?= $booking['idpelanggan'] ?>">

            <div class="row">
                <div class="col-md-8">
                    <!-- Pelanggan Info Card -->
                    <div class="card booking-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5><i class="fas fa-user-circle"></i> Informasi Pelanggan</h5>
                        </div>
                        <div class="card-body">
                            <div class="customer-info-display">
                                <p><strong>Nama:</strong> <?= $booking['nama_lengkap'] ?></p>
                                <p><strong>No. HP:</strong> <?= $booking['no_hp'] ?></p>
                                <p><strong>Email:</strong> <?= $booking['email'] ?></p>
                                <p><strong>Alamat:</strong> <?= $booking['alamat'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Booking Card -->
                    <div class="card booking-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5><i class="fas fa-calendar-check"></i> Detail Booking</h5>
                            <div class="form-check form-switch switch-container">
                                <input class="form-check-input" type="checkbox" id="editDetailsSwitch" name="update_details" value="yes">
                                <label class="form-check-label" for="editDetailsSwitch">Edit Detail</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="detailDisplaySection">
                                <?php foreach ($details as $detail): ?>
                                    <div class="mb-3 p-3 border rounded">
                                        <p><strong>Paket:</strong> <?= $detail['nama_paket'] ?></p>
                                        <p><strong>Deskripsi:</strong> <?= $detail['deskripsi'] ?></p>
                                        <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($detail['tgl'])) ?></p>
                                        <p><strong>Jam:</strong> <?= $detail['jamstart'] ?> - <?= $detail['jamend'] ?></p>
                                        <p><strong>Harga:</strong> Rp <?= number_format($detail['harga'], 0, ',', '.') ?></p>
                                        <?php
                                        $karyawanModel = new \App\Models\KaryawanModel();
                                        $karyawan = $karyawanModel->find($detail['idkaryawan']);
                                        ?>
                                        <p><strong>Karyawan:</strong> <?= $karyawan ? $karyawan['namakaryawan'] : 'Belum ditentukan' ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div id="detailEditSection" style="display: none;">
                                <div class="form-group mb-3">
                                    <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                                    <div class="date-picker-container">
                                        <i class="bi bi-calendar calendar-icon"></i>
                                        <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" value="<?= $booking['tanggal_booking'] ?>" min="<?= date('Y-m-d') ?>">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Jam</label>
                                    <?php
                                    $jamstart = '';
                                    $jamend = '';
                                    if (!empty($details) && isset($details[0])) {
                                        $jamstart = $details[0]['jamstart'] ?? '';
                                        $jamend = $details[0]['jamend'] ?? '';
                                    }
                                    ?>
                                    <input type="hidden" id="jamstart" name="jamstart" value="<?= $jamstart ?>">
                                    <input type="hidden" id="jamend" name="jamend" value="<?= $jamend ?>">

                                    <div class="booking-date-display" id="bookingDateDisplay">
                                        <?php if (!empty($jamstart) && !empty($jamend)): ?>
                                            <i class="bi bi-info-circle"></i> Jam saat ini: <?= $jamstart ?> - <?= $jamend ?>
                                        <?php else: ?>
                                            <i class="bi bi-info-circle"></i> Silakan pilih jam booking
                                        <?php endif; ?>
                                    </div>

                                    <div id="timeSlotContainer" class="time-slots-container">
                                        <div class="time-slot" data-time="09:00">09:00</div>
                                        <div class="time-slot" data-time="10:00">10:00</div>
                                        <div class="time-slot" data-time="11:00">11:00</div>
                                        <div class="time-slot" data-time="12:00">12:00</div>
                                        <div class="time-slot" data-time="13:00">13:00</div>
                                        <div class="time-slot" data-time="14:00">14:00</div>
                                        <div class="time-slot" data-time="15:00">15:00</div>
                                        <div class="time-slot" data-time="16:00">16:00</div>
                                        <div class="time-slot" data-time="17:00">17:00</div>
                                        <div class="time-slot" data-time="18:00">18:00</div>
                                        <div class="time-slot" data-time="19:00">19:00</div>
                                        <div class="time-slot" data-time="20:00">20:00</div>
                                        <div class="time-slot" data-time="21:00">21:00</div>
                                    </div>

                                    <div class="status-legend mt-3">
                                        <div class="legend-item">
                                            <div class="legend-color legend-available"></div>
                                            <span>Tersedia</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-selected"></div>
                                            <span>Dipilih</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-booked"></div>
                                            <span>Penuh</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-partial"></div>
                                            <span>Sebagian</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-disabled"></div>
                                            <span>Tidak tersedia</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="idpaket">Paket</label>
                                    <div class="selected-paket">
                                        <div class="paket-card mb-2">
                                            <?php
                                            $selectedPaket = null;
                                            foreach ($paketList as $paket) {
                                                if (!empty($details) && isset($details[0]) && isset($details[0]['kdpaket']) && $details[0]['kdpaket'] == $paket['idpaket']) {
                                                    $selectedPaket = $paket;
                                                    break;
                                                }
                                            }
                                            // Jika tidak ditemukan, coba cari berdasarkan $booking['idpaket'] jika ada
                                            if (!$selectedPaket && isset($booking['kdpaket'])) {
                                                foreach ($paketList as $paket) {
                                                    if ($booking['kdpaket'] == $paket['idpaket']) {
                                                        $selectedPaket = $paket;
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                            <div id="selectedPaketInfo">
                                                <?php if ($selectedPaket): ?>
                                                    <div class="card border-0 bg-light">
                                                        <div class="card-body p-3">
                                                            <h6 class="card-title mb-2"><i class="bi bi-list text-primary"></i> <strong><?= $selectedPaket['namapaket'] ?></strong></h6>
                                                            <p class="card-text mb-1"><?= $selectedPaket['deskripsi'] ?></p>
                                                            <p class="card-text mb-0"><strong>Harga:</strong> Rp <?= number_format($selectedPaket['harga'], 0, ',', '.') ?></p>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="alert alert-warning">
                                                        <i class="bi bi-exclamation-triangle"></i> Paket tidak ditemukan. Silakan klik tombol "Pilih Paket" di bawah.
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <input type="hidden" id="idpaket" name="kdpaket" value="<?= $selectedPaket ? $selectedPaket['idpaket'] : (isset($booking['kdpaket']) ? $booking['kdpaket'] : (isset($details[0]['kdpaket']) ? $details[0]['kdpaket'] : '')) ?>">
                                            <input type="hidden" id="total" name="total" value="<?= $selectedPaket ? $selectedPaket['harga'] : $booking['total'] ?>">
                                        </div>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="btnSearchPaket">
                                            <i class="bi bi-search"></i> Ganti Paket
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="idkaryawan">Karyawan</label>
                                    <div class="selected-karyawan">
                                        <div class="karyawan-card mb-2">
                                            <?php
                                            $selectedKaryawan = null;
                                            if (!empty($details) && isset($details[0]) && isset($details[0]['idkaryawan'])) {
                                                foreach ($karyawanList as $karyawan) {
                                                    if ($details[0]['idkaryawan'] == $karyawan['idkaryawan']) {
                                                        $selectedKaryawan = $karyawan;
                                                        break;
                                                    }
                                                }
                                            }

                                            // Jika tidak ditemukan, coba cari berdasarkan $booking['idkaryawan'] jika ada
                                            if (!$selectedKaryawan && isset($booking['idkaryawan'])) {
                                                foreach ($karyawanList as $karyawan) {
                                                    if ($booking['idkaryawan'] == $karyawan['idkaryawan']) {
                                                        $selectedKaryawan = $karyawan;
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                            <div id="selectedKaryawanInfo">
                                                <?php if ($selectedKaryawan): ?>
                                                    <div class="card border-0 bg-light">
                                                        <div class="card-body p-3">
                                                            <h6 class="card-title mb-0"><i class="bi bi-person text-primary"></i> <strong><?= $selectedKaryawan['namakaryawan'] ?></strong></h6>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="alert alert-warning">
                                                        <i class="bi bi-exclamation-triangle"></i> Karyawan tidak ditemukan. Silakan klik tombol "Pilih Karyawan" di bawah.
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <input type="hidden" id="idkaryawan" name="idkaryawan" value="<?= $selectedKaryawan ? $selectedKaryawan['idkaryawan'] : (isset($booking['idkaryawan']) ? $booking['idkaryawan'] : '') ?>">
                                        </div>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="btnSearchKaryawan">
                                            <i class="bi bi-search"></i> Ganti Karyawan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pembayaran Card -->
                    <div class="card booking-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5><i class="fas fa-credit-card"></i> Pembayaran</h5>
                            <div class="form-check form-switch switch-container">
                                <input class="form-check-input" type="checkbox" id="editPaymentSwitch" name="update_payment" value="yes">
                                <label class="form-check-label" for="editPaymentSwitch">Edit Pembayaran</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="paymentDisplaySection">
                                <p><strong>Status Pembayaran:</strong> <?= $booking['jenispembayaran'] ?></p>
                                <p><strong>Total:</strong> Rp <?= number_format($booking['total'], 0, ',', '.') ?></p>
                                <p><strong>Jumlah Bayar:</strong> Rp <?= number_format($booking['jumlahbayar'], 0, ',', '.') ?></p>
                                <p><strong>Sisa:</strong> Rp <?= number_format($booking['total'] - $booking['jumlahbayar'], 0, ',', '.') ?></p>
                                <?php if ($pembayaran): ?>
                                    <p><strong>Metode Pembayaran:</strong> <?= $pembayaran['metode'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div id="paymentEditSection" style="display: none;">
                                <div class="form-group mb-3">
                                    <label for="jenispembayaran">Jenis Pembayaran</label>
                                    <select class="form-control" id="jenispembayaran" name="jenispembayaran">
                                        <option value="DP" <?= $booking['jenispembayaran'] == 'DP' ? 'selected' : '' ?>>DP (50%)</option>
                                        <option value="Lunas" <?= $booking['jenispembayaran'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="total">Total</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="total_display" value="<?= $booking['total'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="jumlahbayar">Jumlah Bayar</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="jumlahbayar" name="jumlahbayar" value="<?= $booking['jumlahbayar'] ?>">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                    <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                                        <option value="Tunai" <?= ($pembayaran['metode'] ?? '') == 'Tunai' ? 'selected' : '' ?>>Tunai</option>
                                        <option value="Transfer" <?= ($pembayaran['metode'] ?? '') == 'Transfer' ? 'selected' : '' ?>>Transfer</option>
                                        <option value="QRIS" <?= ($pembayaran['metode'] ?? '') == 'QRIS' ? 'selected' : '' ?>>QRIS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Status Card -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h5><i class="fas fa-info-circle"></i> Status Booking</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="pending" <?= $booking['status'] == 'pending' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                                    <option value="confirmed" <?= $booking['status'] == 'confirmed' ? 'selected' : '' ?>>Terkonfirmasi</option>
                                    <option value="completed" <?= $booking['status'] == 'completed' ? 'selected' : '' ?>>Selesai</option>
                                    <option value="cancelled" <?= $booking['status'] == 'cancelled' ? 'selected' : '' ?>>Dibatalkan</option>
                                    <option value="no-show" <?= $booking['status'] == 'no-show' ? 'selected' : '' ?>>Tidak Hadir</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Card -->
                    <div class="card booking-card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnSubmit">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="<?= site_url('admin/booking/show/' . $booking['kdbooking']) ?>" class="btn btn-outline-secondary btn-block mt-2">
                                <i class="fas fa-times-circle"></i> Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(function() {
        // Setup toastr options
        toastr.options = {
            closeButton: true,
            newestOnTop: true,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };

        // Toggle edit details section
        $('#editDetailsSwitch').on('change', function() {
            if ($(this).is(':checked')) {
                $('#detailDisplaySection').hide();
                $('#detailEditSection').show();
                checkTimeSlotAvailability();
            } else {
                $('#detailDisplaySection').show();
                $('#detailEditSection').hide();
            }
        });

        // Toggle edit payment section
        $('#editPaymentSwitch').on('change', function() {
            if ($(this).is(':checked')) {
                $('#paymentDisplaySection').hide();
                $('#paymentEditSection').show();

                // Update total dan jumlah bayar
                const totalHarga = parseInt($('#total').val() || 0);
                $('#total_display').val(totalHarga);
                updateJumlahBayar();
            } else {
                $('#paymentDisplaySection').show();
                $('#paymentEditSection').hide();
            }
        });

        // Event ketika tanggal berubah
        $('#tanggal_booking').on('change', function() {
            const selectedDate = $(this).val();

            if (selectedDate) {
                // Format tanggal untuk tampilan
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const formattedDate = new Date(selectedDate).toLocaleDateString('id-ID', options);
                $('#bookingDateDisplay').html(`<strong>${formattedDate}</strong>`);

                // Tampilkan container time slot jika tersembunyi
                $('#timeSlotContainer').fadeIn(500);

                // Reset semua slot waktu
                $('.time-slot').removeClass('active booked disabled partial-booked');
                $('.time-slot').removeAttr('title');

                // Periksa ketersediaan slot waktu
                checkTimeSlotAvailability();
            } else {
                $('#bookingDateDisplay').html(`
                    <i class="bi bi-info-circle"></i> Silakan pilih tanggal terlebih dahulu
                `);

                // Sembunyikan container time slot
                $('#timeSlotContainer').hide();

                // Reset input jam
                $('#jamstart').val('');
                $('#jamend').val('');
            }
        });

        // Handle klik pada time slot
        $(document).on('click', '.time-slot', function() {
            if ($(this).hasClass('booked') || $(this).hasClass('disabled')) {
                return;
            }

            $('.time-slot').removeClass('active');
            $(this).addClass('active');

            // Set jam mulai & selesai
            const startTime = $(this).data('time');
            const [startHour, startMinute] = startTime.split(':');
            const endHour = parseInt(startHour) + 1;
            const endTime = `${endHour.toString().padStart(2, '0')}:${startMinute}`;

            $('#jamstart').val(startTime);
            $('#jamend').val(endTime);

            // Jika karyawan dipilih, cek ketersediaan karyawan
            if ($('#idkaryawan').length) {
                checkAvailableKaryawan();
            }
        });

        // Fungsi untuk memeriksa ketersediaan slot waktu
        function checkTimeSlotAvailability() {
            const tanggalBooking = $('#tanggal_booking').val();
            const kdbooking = $('input[name="kdbooking"]').val();

            if (!tanggalBooking) return;

            // Tambahkan loading indicator
            $('#timeSlotContainer').addClass('position-relative');
            $('#timeSlotContainer').append('<div class="loading-overlay"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            $.ajax({
                url: '<?= site_url('admin/booking/check-availability') ?>',
                type: 'GET',
                data: {
                    date: tanggalBooking,
                    exclude_booking: kdbooking // Exclude current booking for edit mode
                },
                dataType: 'json',
                success: function(response) {
                    // Hapus loading indicator
                    $('.loading-overlay').remove();
                    $('#timeSlotContainer').removeClass('position-relative');

                    if (response.success) {
                        const bookedSlots = response.bookedSlots || [];
                        const slotStatus = response.slotStatus || [];
                        const totalKaryawan = response.totalKaryawan || 0;

                        // Tandai slot yang sudah terisi penuh
                        bookedSlots.forEach(function(time) {
                            const timeSlot = $(`.time-slot[data-time="${time}"]`);
                            timeSlot.addClass('booked');
                            timeSlot.attr('title', 'Slot sudah terisi penuh');
                        });

                        // Tandai slot yang terisi sebagian
                        slotStatus.forEach(function(slot) {
                            if (!slot.isFull) {
                                const timeSlot = $(`.time-slot[data-time="${slot.time}"]`);
                                timeSlot.addClass('partial-booked');
                                timeSlot.attr('data-available', slot.available);
                                timeSlot.attr('title', `Tersedia ${slot.available} dari ${totalKaryawan} karyawan - Klik untuk memilih`);
                            }
                        });

                        // Disable slot waktu yang sudah lewat hari ini
                        if (tanggalBooking === '<?= date('Y-m-d') ?>') {
                            const now = new Date();
                            const currentHour = now.getHours();

                            $('.time-slot').each(function() {
                                const slotHour = parseInt($(this).data('time').split(':')[0]);
                                if (slotHour <= currentHour) {
                                    $(this).addClass('disabled');
                                    $(this).attr('title', 'Waktu sudah lewat');
                                }
                            });
                        }

                        // Tambahkan tooltip untuk semua time slot yang masih kosong
                        $('.time-slot:not(.disabled):not(.booked):not(.partial-booked)').attr('title', 'Tersedia - Klik untuk memilih');

                        // Set active class pada jam booking saat ini jika ada
                        const currentStartTime = $('#jamstart').val();
                        if (currentStartTime) {
                            const timeSlot = $(`.time-slot[data-time="${currentStartTime}"]`);
                            if (!timeSlot.hasClass('booked') && !timeSlot.hasClass('disabled')) {
                                timeSlot.addClass('active');
                            }
                        }
                    } else {
                        if (response.message) {
                            toastr.error(response.message);
                        } else {
                            toastr.error('Gagal memuat ketersediaan waktu');
                        }
                    }
                },
                error: function() {
                    // Hapus loading indicator
                    $('.loading-overlay').remove();
                    $('#timeSlotContainer').removeClass('position-relative');
                    toastr.error('Gagal memeriksa ketersediaan slot waktu');
                }
            });
        }

        // Fungsi untuk mengecek karyawan yang tersedia
        function checkAvailableKaryawan() {
            const tanggal = $('#tanggal_booking').val();
            const jamstart = $('#jamstart').val();

            if (tanggal && jamstart) {
                $.ajax({
                    url: '<?= site_url('admin/booking/getAvailableKaryawan') ?>',
                    type: 'GET',
                    data: {
                        tanggal: tanggal,
                        jamstart: jamstart
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            const karyawanList = response.data;

                            // Update opsi karyawan
                            $('#idkaryawan').empty().append('<option value="">-- Pilih Karyawan --</option>');

                            if (karyawanList && karyawanList.length > 0) {
                                $.each(karyawanList, function(i, karyawan) {
                                    $('#idkaryawan').append(`<option value="${karyawan.idkaryawan}">${karyawan.namakaryawan}</option>`);
                                });

                                // Set kembali karyawan yang dipilih sebelumnya jika masih tersedia
                                const selectedKaryawan = '<?= isset($details[0]['idkaryawan']) ? $details[0]['idkaryawan'] : '' ?>';
                                if (selectedKaryawan) {
                                    $('#idkaryawan').val(selectedKaryawan);
                                }

                                toastr.success('Daftar karyawan tersedia telah diperbarui');
                            } else {
                                toastr.warning('Tidak ada karyawan yang tersedia pada waktu tersebut');
                            }
                        } else {
                            toastr.error('Gagal mendapatkan data karyawan');
                        }
                    },
                    error: function() {
                        toastr.error('Gagal memuat data karyawan');
                    }
                });
            }
        }

        // Update total saat paket berubah
        $('#idpaket').on('change', function() {
            const selectedOption = $(this).find('option:selected');
            const harga = selectedOption.data('harga') || 0;
            $('#total').val(harga);

            updateJumlahBayar();
        });

        // Update jumlah bayar saat jenis pembayaran berubah
        $('#jenispembayaran').on('change', function() {
            updateJumlahBayar();
        });

        function updateJumlahBayar() {
            const total = parseFloat($('#total').val()) || 0;
            const jenisPembayaran = $('#jenispembayaran').val();

            if (jenisPembayaran === 'Lunas') {
                $('#jumlahbayar').val(total);
            } else if (jenisPembayaran === 'DP') {
                $('#jumlahbayar').val(total * 0.5);
            }
        }

        // Form submission
        $('#editBookingForm').on('submit', function(e) {
            e.preventDefault();

            // Validasi
            if ($('#editDetailsSwitch').is(':checked')) {
                if (!$('#tanggal_booking').val()) {
                    toastr.error('Silakan pilih tanggal booking');
                    return false;
                }

                if (!$('#jamstart').val()) {
                    toastr.error('Silakan pilih jam booking');
                    return false;
                }

                // Validasi paket (tetap menggunakan ID form yang sama meskipun name sudah diubah)
                if (!$('#idpaket').val()) {
                    // Coba ambil nilai dari URL parameter atau data booking
                    const urlParams = new URLSearchParams(window.location.search);
                    const paketIdFromUrl = urlParams.get('idpaket') || urlParams.get('kdpaket');
                    const paketIdFromBooking = '<?= isset($booking["kdpaket"]) ? $booking["kdpaket"] : '' ?>';

                    if (paketIdFromUrl || paketIdFromBooking) {
                        // Jika ada nilai paket dari URL atau data booking, gunakan nilai tersebut
                        $('#idpaket').val(paketIdFromUrl || paketIdFromBooking);
                        console.log('Menggunakan paket ID dari sumber alternatif:', $('#idpaket').val());
                    } else {
                        // Jika tidak ada nilai paket, tampilkan error
                        toastr.error('Silakan pilih paket');
                        return false;
                    }
                }
            }

            if ($('#editPaymentSwitch').is(':checked')) {
                if (!$('#jenispembayaran').val()) {
                    toastr.error('Silakan pilih jenis pembayaran');
                    return false;
                }

                if (!$('#jumlahbayar').val()) {
                    toastr.error('Silakan masukkan jumlah pembayaran');
                    return false;
                }
            }

            // Disable submit button
            $('#btnSubmit').prop('disabled', true).html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Menyimpan...
            `);

            // Submit form
            let formData = $(this).serialize();
            console.log('Form data:', formData); // Debug log

            // Periksa apakah kdpaket ada dalam form data
            if ($('#editDetailsSwitch').is(':checked') && !formData.includes('kdpaket=')) {
                // Tambahkan input hidden tambahan jika kdpaket tidak ada
                $('<input>').attr({
                    type: 'hidden',
                    name: 'kdpaket',
                    value: $('#idpaket').val()
                }).appendTo('#editBookingForm');

                // Update formData setelah menambahkan input baru
                formData = $('#editBookingForm').serialize();
                console.log('Updated form data:', formData);
            }

            $.ajax({
                url: '<?= site_url('admin/booking/update') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        setTimeout(function() {
                            window.location.href = '<?= site_url('admin/booking/show/') ?>' + response.kdbooking;
                        }, 1500);
                    } else {
                        toastr.error(response.message);
                        $('#btnSubmit').prop('disabled', false).html('<i class="bi bi-save"></i> Simpan Perubahan');

                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                toastr.error(value);
                            });
                        }
                    }
                },
                error: function() {
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                    $('#btnSubmit').prop('disabled', false).html('<i class="bi bi-save"></i> Simpan Perubahan');
                }
            });
        });

        // Event handler untuk tombol Pilih/Ganti Paket
        $('#btnSearchPaket').on('click', function(e) {
            e.preventDefault();
            const paketModal = new bootstrap.Modal(document.getElementById('paketModal'));
            paketModal.show();
        });

        // Event untuk pencarian paket
        $('#paketSearch').on('keyup', function() {
            const keyword = $(this).val().toLowerCase().trim();

            if (keyword.length > 0) {
                $('#paketTableBody tr').filter(function() {
                    const namaPaket = $(this).find('td:first-child').text().toLowerCase();
                    const deskripsi = $(this).find('td:nth-child(2)').text().toLowerCase();
                    $(this).toggle(namaPaket.indexOf(keyword) > -1 || deskripsi.indexOf(keyword) > -1);
                });

                // Tampilkan pesan jika tidak ada hasil
                if ($('#paketTableBody tr:visible').length === 0) {
                    $('#paketEmpty').show();
                } else {
                    $('#paketEmpty').hide();
                }
            } else {
                $('#paketTableBody tr').show();
                $('#paketEmpty').hide();
            }
        });

        // Event untuk memilih paket dari modal
        $(document).on('click', '.select-paket', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const deskripsi = $(this).data('deskripsi');
            const harga = $(this).data('harga');

            // Set nilai untuk input paket
            $('#idpaket').val(id);

            // Tambahkan log debug
            console.log('Paket terpilih:', {
                id: id,
                nama: nama,
                deskripsi: deskripsi,
                harga: harga,
                inputValue: $('#idpaket').val()
            });

            $('#total').val(harga);
            $('#selectedPaketInfo').html(`
                <div class="card border-0 bg-light">
                    <div class="card-body p-3">
                        <h6 class="card-title mb-2"><i class="bi bi-list text-primary"></i> <strong>${nama}</strong></h6>
                        <p class="card-text mb-1">${deskripsi}</p>
                        <p class="card-text mb-0"><strong>Harga:</strong> Rp ${formatNumber(harga)}</p>
                    </div>
                </div>
            `);

            // Ubah teks tombol menjadi "Ganti Paket"
            $('#btnSearchPaket').html('<i class="bi bi-search"></i> Ganti Paket');

            // Update total display dan jumlah bayar
            $('#total_display').val(harga);
            updateJumlahBayar();

            // Tutup modal
            const paketModal = bootstrap.Modal.getInstance(document.getElementById('paketModal'));
            if (paketModal) paketModal.hide();
        });

        // Event untuk jenis pembayaran
        $('#jenispembayaran').on('change', function() {
            updateJumlahBayar();
        });

        // Event handler untuk tombol Pilih/Ganti Karyawan
        $('#btnSearchKaryawan').on('click', function(e) {
            e.preventDefault();

            // Pastikan ada tanggal dan jam yang dipilih
            if (!$('#tanggal_booking').val() || !$('#jamstart').val()) {
                toastr.warning('Silakan pilih tanggal dan jam booking terlebih dahulu');
                return;
            }

            // Tampilkan loading spinner di dalam modal sebelum membuka modal
            $('#karyawanTableBody').html(`
                <tr>
                    <td colspan="2" class="text-center py-3">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="ms-2">Memuat data karyawan...</span>
                    </td>
                </tr>
            `);

            // Tampilkan modal
            const karyawanModal = new bootstrap.Modal(document.getElementById('karyawanModal'));
            karyawanModal.show();

            // Muat data karyawan yang tersedia
            const tanggal = $('#tanggal_booking').val();
            const jamstart = $('#jamstart').val();

            $.ajax({
                url: '<?= site_url('admin/booking/getAvailableKaryawan') ?>',
                type: 'GET',
                data: {
                    tanggal: tanggal,
                    jamstart: jamstart
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const karyawanList = response.data;
                        $('#karyawanTableBody').empty();

                        if (karyawanList && karyawanList.length > 0) {
                            $.each(karyawanList, function(i, karyawan) {
                                const row = `
                                    <tr>
                                        <td>${karyawan.namakaryawan}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary select-karyawan" 
                                                data-id="${karyawan.idkaryawan}" 
                                                data-nama="${karyawan.namakaryawan}">
                                                <i class="bi bi-check"></i> Pilih
                                            </button>
                                        </td>
                                    </tr>
                                `;
                                $('#karyawanTableBody').append(row);
                            });
                        } else {
                            $('#karyawanTableBody').html(`
                                <tr>
                                    <td colspan="2" class="text-center py-3">
                                        <i class="bi bi-exclamation-triangle text-warning"></i> 
                                        Tidak ada karyawan yang tersedia pada waktu yang dipilih
                                    </td>
                                </tr>
                            `);
                        }
                    } else {
                        $('#karyawanTableBody').html(`
                            <tr>
                                <td colspan="2" class="text-center py-3">
                                    <i class="bi bi-exclamation-circle text-danger"></i> 
                                    Gagal mendapatkan data karyawan
                                </td>
                            </tr>
                        `);
                    }
                },
                error: function() {
                    $('#karyawanTableBody').html(`
                        <tr>
                            <td colspan="2" class="text-center py-3">
                                <i class="bi bi-exclamation-circle text-danger"></i> 
                                Terjadi kesalahan saat memuat data karyawan
                            </td>
                        </tr>
                    `);
                }
            });
        });

        // Event untuk memilih karyawan dari modal
        $(document).on('click', '.select-karyawan', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            $('#idkaryawan').val(id);
            $('#selectedKaryawanInfo').html(`
                <div class="card border-0 bg-light">
                    <div class="card-body p-3">
                        <h6 class="card-title mb-0"><i class="bi bi-person text-primary"></i> <strong>${nama}</strong></h6>
                    </div>
                </div>
            `);

            // Ubah teks tombol menjadi "Ganti Karyawan"
            $('#btnSearchKaryawan').html('<i class="bi bi-search"></i> Ganti Karyawan');

            // Tutup modal
            const karyawanModal = bootstrap.Modal.getInstance(document.getElementById('karyawanModal'));
            if (karyawanModal) karyawanModal.hide();
        });

        // Format number to rupiah
        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        // Fungsi untuk update jumlah bayar berdasarkan jenis pembayaran
        function updateJumlahBayar() {
            const total = parseInt($('#total').val() || 0);
            const jenisPembayaran = $('#jenispembayaran').val();

            if (jenisPembayaran === 'DP') {
                $('#jumlahbayar').val(total / 2);
            } else if (jenisPembayaran === 'Lunas') {
                $('#jumlahbayar').val(total);
            }
        }

        // Inisialisasi status awal
        if ($('#editDetailsSwitch').is(':checked')) {
            $('#detailDisplaySection').hide();
            $('#detailEditSection').show();
            checkTimeSlotAvailability();
        }

        if ($('#editPaymentSwitch').is(':checked')) {
            $('#paymentDisplaySection').hide();
            $('#paymentEditSection').show();
        }
    });
</script>

<!-- Modal Paket -->
<div class="modal fade" id="paketModal" tabindex="-1" aria-labelledby="paketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paketModalLabel">Pilih Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="search-input mb-3">
                    <input type="text" class="form-control" id="paketSearch" placeholder="Cari paket berdasarkan nama...">
                    <span class="search-icon"><i class="bi bi-search"></i></span>
                </div>

                <div class="table-container">
                    <table class="table table-bordered table-sm paket-table">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="paketTableBody">
                            <?php foreach ($paketList as $paket): ?>
                                <tr>
                                    <td><?= $paket['namapaket'] ?></td>
                                    <td><?= $paket['deskripsi'] ?></td>
                                    <td>Rp <?= number_format($paket['harga'], 0, ',', '.') ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary select-paket"
                                            data-id="<?= $paket['idpaket'] ?>"
                                            data-nama="<?= $paket['namapaket'] ?>"
                                            data-deskripsi="<?= $paket['deskripsi'] ?>"
                                            data-harga="<?= $paket['harga'] ?>">
                                            <i class="bi bi-check"></i> Pilih
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div id="paketEmpty" class="text-center py-3" style="display: none;">
                        <span class="text-muted">Tidak ada paket yang ditemukan</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Karyawan -->
<div class="modal fade" id="karyawanModal" tabindex="-1" aria-labelledby="karyawanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="karyawanModalLabel">Pilih Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-container">
                    <table class="table table-bordered table-sm karyawan-table">
                        <thead>
                            <tr>
                                <th>Nama Karyawan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="karyawanTableBody">
                            <!-- Data karyawan akan diisi melalui AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>