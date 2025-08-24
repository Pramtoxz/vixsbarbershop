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

    /* Styling untuk tanggal booking */
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

    input[type="date"] {
        cursor: pointer;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0;
        cursor: pointer;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Loading overlay */
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
        border-radius: 15px;
    }

    .customer-card,
    .paket-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 1px solid #e9ecef;
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .customer-card:hover,
    .paket-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .customer-card h6,
    .paket-card h6 {
        margin-top: 0;
        color: #2c3e50;
        font-weight: 700;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .search-input {
        position: relative;
    }

    .search-input .form-control {
        padding-right: 40px;
    }

    .search-input .search-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--secondary-color);
        font-size: 1.1rem;
    }

    .table-container {
        max-height: 400px;
        overflow-y: auto;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .customer-table,
    .paket-table {
        margin: 0;
        border-radius: 15px;
        overflow: hidden;
    }

    .customer-table thead,
    .paket-table thead {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
        color: white;
    }

    .customer-table th,
    .paket-table th {
        border: none;
        font-weight: 600;
        padding: 1rem;
    }

    .customer-table tr,
    .paket-table tr {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .customer-table tr:hover,
    .paket-table tr:hover {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        transform: scale(1.01);
    }

    .selected-customer,
    .selected-paket {
        display: none;
    }

    .btn-action {
        min-width: 120px;
    }

    .payment-details {
        display: none;
        padding: 1.5rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        margin-top: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
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

    .btn-success {
        background: linear-gradient(135deg, var(--success-color), var(--accent-green));
        color: white;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
        color: white;
    }

    .btn-outline-primary {
        background: white;
        border: 2px solid var(--secondary-color);
        color: var(--secondary-color);
    }

    .btn-outline-primary:hover {
        background: var(--secondary-color);
        color: white;
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

    .btn-outline-danger {
        background: white;
        border: 2px solid #dc3545;
        color: #dc3545;
    }

    .btn-outline-danger:hover {
        background: #dc3545;
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
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert-info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        color: #0c5460;
        border-left: 4px solid #17a2b8;
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

    /* Input Group Styling */
    .input-group-text {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
        border: 2px solid var(--secondary-color);
        color: white;
        font-weight: 600;
        border-radius: 15px 0 0 15px;
    }

    .input-group .form-control {
        border-left: none;
        border-radius: 0 15px 15px 0;
    }

    /* Booking Summary Styling */
    .booking-summary {
        background: linear-gradient(135deg, var(--light-color) 0%, var(--light-gray) 100%);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        border: 1px solid var(--light-gray);
    }

    .summary-item {
        padding: 0.8rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.5);
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .summary-item .d-flex {
        align-items: center;
    }

    .summary-item .badge {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
    }

    .bg-info {
        background: linear-gradient(135deg, var(--info-color), var(--accent-blue)) !important;
    }

    .bg-success {
        background: linear-gradient(135deg, var(--success-color), var(--accent-green)) !important;
    }

    /* Responsivitas */
    @media (max-width: 768px) {
        .booking-card .card-body {
            padding: 1.5rem;
        }
        
        .time-slot {
            padding: 10px 15px;
            font-size: 0.9rem;
        }
        
        .btn {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .time-slot {
            padding: 8px 12px;
            font-size: 0.9rem;
        }
        
        .booking-card .card-body {
            padding: 1rem;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="booking-container">
        <form id="bookingForm">
            <div class="row">
                <div class="col-md-8">
                    <!-- Pelanggan Card -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h5><i class="fas fa-user-circle"></i> Informasi Pelanggan</h5>
                        </div>
                        <div class="card-body">
                            <div class="search-customer">
                                <!-- Button untuk membuka modal -->
                                <a href="javascript:void(0);" class="btn btn-primary mb-3" id="btnSearchCustomer">
                                    <i class="fas fa-search"></i> Cari Pelanggan
                                </a>

                                <div class="selected-customer">
                                    <div class="customer-card">
                                        <h6>Pelanggan Terpilih</h6>
                                        <div id="selectedCustomerInfo">
                                            <div class="alert alert-warning">
                                                <i class="fas fa-exclamation-triangle"></i> Belum ada pelanggan yang dipilih. Silakan klik tombol "Cari Pelanggan" di atas.
                                            </div>
                                        </div>
                                        <input type="hidden" id="idpelanggan" name="idpelanggan">

                                        <!-- Tombol untuk membuka modal kembali jika ingin mengganti pelanggan -->
                                        <div class="text-end mt-2">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary" id="btnChangePelanggan" style="display: none;">
                                                <i class="fas fa-exchange-alt"></i> Ganti
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger ms-1" id="btnRemovePelanggan" style="display: none;">
                                                <i class="fas fa-times"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal & Jam Card -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h5><i class="fas fa-calendar-check"></i> Tanggal & Jam</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                                <div class="date-picker-container">
                                    <i class="fas fa-calendar calendar-icon"></i>
                                    <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" min="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Jam Mulai</label>
                                <input type="hidden" id="jamstart" name="jamstart" required>
                                <input type="hidden" id="jamend" name="jamend">

                                <div class="booking-date-display" id="bookingDateDisplay">
                                    <i class="fas fa-info-circle"></i> Silakan pilih tanggal terlebih dahulu
                                </div>

                                <div id="timeSlotContainer" style="display: none;" class="time-slots-container">
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

                                    <div class="status-legend">
                                        <div class="legend-item">
                                            <div class="legend-color legend-available"></div> Tersedia
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-selected"></div> Dipilih
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-partial"></div> Tersedia Sebagian
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-booked"></div> Sudah Penuh
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color legend-disabled"></div> Tidak Tersedia
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Paket Card -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h5><i class="fas fa-cut"></i> Paket Layanan</h5>
                        </div>
                        <div class="card-body">
                            <!-- Button untuk membuka modal -->
                            <a href="javascript:void(0);" class="btn btn-primary mb-3" id="btnSearchPaket">
                                <i class="fas fa-search"></i> Pilih Paket
                            </a>

                            <div class="selected-paket">
                                <div class="paket-card">
                                    <h6>Paket Terpilih</h6>
                                    <div id="selectedPaketInfo">
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle"></i> Belum ada paket yang dipilih. Silakan klik tombol "Pilih Paket" di atas.
                                        </div>
                                    </div>
                                    <input type="hidden" id="idpaket" name="idpaket">
                                    <input type="hidden" id="total" name="total">

                                    <!-- Tombol untuk membuka modal kembali jika ingin mengganti paket -->
                                    <div class="text-end mt-2">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary" id="btnChangePaket" style="display: none;">
                                            <i class="fas fa-exchange-alt"></i> Ganti
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pembayaran Card -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h5><i class="fas fa-credit-card"></i> Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenispembayaran">Jenis Pembayaran</label>
                                <select class="form-control" id="jenispembayaran" name="jenispembayaran" required>
                                    <option value="">-- Pilih Jenis Pembayaran --</option>
                                    <option value="DP">DP (50%)</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                            </div>

                            <div class="payment-details mt-3">
                                <div class="form-group">
                                    <label for="jumlahbayar">Jumlah Bayar</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control" id="jumlahbayar" name="jumlahbayar" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                    <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                                        <option value="cash">Cash</option>
                                        <option value="transfer">Transfer Bank</option>
                                        <option value="qris">QRIS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Karyawan Card -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h5><i class="fas fa-users"></i> Karyawan</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info" id="karyawanAlert">
                                <i class="fas fa-info-circle"></i> Silakan pilih tanggal dan jam terlebih dahulu.
                            </div>

                            <div id="karyawanContainer" style="display: none;">
                                <!-- Button untuk membuka modal -->
                                <a href="javascript:void(0);" class="btn btn-primary mb-3" id="btnSearchKaryawan">
                                    <i class="fas fa-search"></i> Pilih Karyawan
                                </a>

                                <div class="selected-karyawan">
                                    <div class="customer-card">
                                        <h6>Karyawan Terpilih</h6>
                                        <div id="selectedKaryawanInfo">
                                            <div class="alert alert-warning">
                                                <i class="fas fa-exclamation-triangle"></i> Belum ada karyawan yang dipilih. Silakan klik tombol "Pilih Karyawan" di atas.
                                            </div>
                                        </div>
                                        <input type="hidden" id="idkaryawan" name="idkaryawan" required>

                                        <!-- Tombol untuk membuka modal kembali jika ingin mengganti karyawan -->
                                        <div class="text-end mt-2">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary" id="btnChangeKaryawan" style="display: none;">
                                                <i class="fas fa-exchange-alt"></i> Ganti
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ringkasan Booking Card -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h5><i class="fas fa-clipboard-list"></i> Ringkasan Booking</h5>
                        </div>
                        <div class="card-body">
                            <div class="booking-summary">
                                <div class="summary-item mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold text-muted">Total Durasi:</span>
                                        <span id="totalDurasi" class="badge bg-info">0 menit</span>
                                    </div>
                                </div>
                                <div class="summary-item mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold text-muted">Total Harga:</span>
                                        <span id="totalHarga" class="badge bg-success">Rp 0</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle"></i> 
                                        Informasi akan diperbarui setelah memilih paket
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Card -->
                    <div class="card booking-card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnSubmit">
                                <i class="fas fa-save"></i> Simpan Booking
                            </button>
                            <a href="<?= site_url('admin/booking') ?>" class="btn btn-outline-secondary btn-block mt-2">
                                <i class="fas fa-arrow-left"></i> Kembali
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
        // Konfigurasi toastr
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 5000,
            extendedTimeOut: 2000,
            preventDuplicates: true
        };

        // Debug: Verifikasi jQuery dan Bootstrap
        console.log('jQuery version:', $.fn.jquery);

        // Load pelanggan saat halaman dimuat
        loadCustomers();

        // Periksa apakah ada pelanggan yang sudah dipilih
        if ($('#idpelanggan').val()) {
            $('.selected-customer').show();
            $('#btnChangePelanggan').show();
            $('#btnRemovePelanggan').show();
            $('#btnSearchCustomer').hide();
        }

        // Buat instance modal Bootstrap 5
        const pelangganModal = new bootstrap.Modal(document.getElementById('pelangganModal'));

        // Event handler untuk tombol Cari Pelanggan
        $('#btnSearchCustomer').on('click', function(e) {
            e.preventDefault();
            console.log('Tombol Cari Pelanggan diklik');
            pelangganModal.show();
        });

        // Event handler untuk tombol Ganti Pelanggan
        $('#btnChangePelanggan').on('click', function(e) {
            e.preventDefault();
            console.log('Tombol Ganti Pelanggan diklik');
            pelangganModal.show();
        });

        // Konfigurasi modal
        document.getElementById('pelangganModal').addEventListener('show.bs.modal', function() {
            // Reset pencarian
            $('#customerSearch').val('');
            // Tampilkan tabel dan sembunyikan form tambah pelanggan
            $('.table-container').show();
            $('#newCustomerForm').hide();
            // Muat ulang data pelanggan
            loadCustomers();
        });

        // Pastikan modal dapat ditutup dengan benar
        $(document).on('click', '[data-bs-dismiss="modal"]', function() {
            const modalEl = $(this).closest('.modal');
            const modal = bootstrap.Modal.getInstance(modalEl[0]);
            if (modal) modal.hide();
        });

        // Event untuk pencarian pelanggan
        $('#customerSearch').on('keyup', function() {
            const keyword = $(this).val().trim();
            if (keyword.length >= 2 || keyword.length === 0) {
                loadCustomers(keyword);
            }
        });

        // Fungsi untuk memuat data pelanggan
        function loadCustomers(search = '') {
            $('#customerLoading').show();
            $('#customerEmpty').hide();
            $('#customerTableBody').empty();

            $.ajax({
                url: '<?= site_url('admin/booking/getAllPelanggan') ?>',
                type: 'GET',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(response) {
                    $('#customerLoading').hide();

                    if (response.status === 'success' && response.data.length > 0) {
                        $.each(response.data, function(i, customer) {
                            const row = `
                                <tr>
                                    <td>${customer.nama}</td>
                                    <td>${customer.nohp}</td>
                                    <td>${customer.email}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary select-customer" 
                                            data-id="${customer.id}" 
                                            data-nama="${customer.nama}" 
                                            data-nohp="${customer.nohp}" 
                                            data-email="${customer.email}">
                                            <i class="fas fa-check"></i> Pilih
                                        </button>
                                    </td>
                                </tr>
                            `;
                            $('#customerTableBody').append(row);
                        });
                    } else {
                        $('#customerEmpty').show();
                    }
                },
                error: function() {
                    $('#customerLoading').hide();
                    $('#customerEmpty').show().text('Gagal memuat data pelanggan');
                }
            });
        }

        // Event untuk memilih pelanggan
        $(document).on('click', '.select-customer', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const nohp = $(this).data('nohp');
            const email = $(this).data('email');

            $('#idpelanggan').val(id);
            $('#selectedCustomerInfo').html(`
                <div class="card border-0 bg-light">
                    <div class="card-body p-3">
                        <h6 class="card-title mb-2"><i class="fas fa-user text-primary"></i> <strong>${nama}</strong></h6>
                        <p class="card-text mb-1"><i class="fas fa-phone-alt text-secondary"></i> ${nohp}</p>
                        <p class="card-text mb-0"><i class="fas fa-envelope text-secondary"></i> ${email}</p>
                    </div>
                </div>
            `);

            // Tampilkan tombol ganti dan hapus pelanggan
            $('#btnChangePelanggan').fadeIn();
            $('#btnRemovePelanggan').fadeIn();

            // Tampilkan div selected-customer dan sembunyikan tombol cari
            $('.selected-customer').show();
            $('#btnSearchCustomer').hide();

            // Tutup modal
            pelangganModal.hide();
        });

        // Tombol untuk menampilkan form tambah pelanggan baru
        $('#btnAddNewCustomer').on('click', function() {
            $('.table-container').hide();
            $('#newCustomerForm').show();
        });

        // Tombol batal tambah pelanggan baru
        $('#btnCancelNewCustomer').on('click', function() {
            $('#newCustomerForm').hide();
            $('.table-container').show();
            // Reset form
            $('#newCustomerForm input, #newCustomerForm textarea').val('');
        });

        // Tombol simpan pelanggan baru
        $('#btnSaveNewCustomer').on('click', function() {
            const nama = $('#new_nama').val();
            const nohp = $('#new_nohp').val();
            const email = $('#new_email').val();
            const alamat = $('#new_alamat').val();

            // Validasi form
            if (!nama) {
                toastr.error('Nama pelanggan harus diisi');
                return;
            }
            if (!nohp) {
                toastr.error('Nomor HP harus diisi');
                return;
            }
            if (!email) {
                toastr.error('Email harus diisi');
                return;
            }

            // Disable tombol simpan
            $(this).prop('disabled', true).html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Menyimpan...
            `);

            // Simpan data pelanggan baru
            $.ajax({
                url: '<?= site_url('admin/booking/storePelanggan') ?>',
                type: 'POST',
                data: {
                    nama: nama,
                    nohp: nohp,
                    email: email,
                    alamat: alamat
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success('Pelanggan berhasil ditambahkan');

                        // Set pelanggan yang baru ditambahkan sebagai pelanggan terpilih
                        $('#idpelanggan').val(response.id);
                        $('#selectedCustomerInfo').html(`
                            <div class="card border-0 bg-light">
                                <div class="card-body p-3">
                                    <h6 class="card-title mb-2"><i class="fas fa-user text-primary"></i> <strong>${nama}</strong></h6>
                                    <p class="card-text mb-1"><i class="fas fa-phone-alt text-secondary"></i> ${nohp}</p>
                                    <p class="card-text mb-0"><i class="fas fa-envelope text-secondary"></i> ${email}</p>
                                </div>
                            </div>
                        `);

                        // Tampilkan tombol ganti dan hapus pelanggan
                        $('#btnChangePelanggan').fadeIn();
                        $('#btnRemovePelanggan').fadeIn();

                        // Tampilkan div selected-customer
                        $('.selected-customer').show();
                        $('#btnSearchCustomer').hide();

                        // Tutup modal
                        pelangganModal.hide();
                    } else {
                        toastr.error(response.message || 'Gagal menambahkan pelanggan');

                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                toastr.error(value);
                            });
                        }
                    }
                },
                error: function() {
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                },
                complete: function() {
                    // Enable tombol simpan
                    $('#btnSaveNewCustomer').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan');
                }
            });
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

                // Tampilkan container time slot dengan animasi
                $('#timeSlotContainer').fadeIn(500);

                // Reset semua slot waktu
                $('.time-slot').removeClass('active booked disabled');

                // Periksa ketersediaan slot waktu
                checkTimeSlotAvailability();
            } else {
                $('#bookingDateDisplay').html(`
                    <i class="fas fa-info-circle"></i> Silakan pilih tanggal terlebih dahulu
                `);

                // Sembunyikan container time slot
                $('#timeSlotContainer').hide();

                // Reset semua slot waktu
                $('.time-slot').removeClass('active booked disabled');
            }
        });

        // Event untuk memilih time slot
        $(document).on('click', '.time-slot', function() {
            if (!$(this).hasClass('disabled') && !$(this).hasClass('booked')) {
                $('.time-slot').removeClass('active');
                $(this).addClass('active');

                const selectedTime = $(this).data('time');
                $('#jamstart').val(selectedTime);

                // Set jam selesai 1 jam setelah jam mulai
                const startHour = parseInt(selectedTime.split(':')[0]);
                const endHour = startHour + 1;
                const endTimeStr = endHour.toString().padStart(2, '0') + ':00';
                $('#jamend').val(endTimeStr);

                // Cek ketersediaan karyawan
                checkAvailableKaryawan();
            }
        });

        // Event untuk memilih paket
        $(document).on('click', '.select-paket', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const deskripsi = $(this).data('deskripsi');
            const harga = $(this).data('harga');

            console.log('Paket dipilih:', id, nama, harga);

            $('#idpaket').val(id);
            $('#total').val(harga);
            $('#selectedPaketInfo').html(`
                <div class="card border-0 bg-light">
                    <div class="card-body p-3">
                        <h6 class="card-title mb-2"><i class="fas fa-list text-primary"></i> <strong>${nama}</strong></h6>
                        <p class="card-text mb-1">${deskripsi}</p>
                        <p class="card-text mb-0"><strong>Harga:</strong> Rp ${formatNumber(harga)}</p>
                    </div>
                </div>
            `);

            // Tampilkan tombol ganti paket
            $('#btnChangePaket').fadeIn();

            // Sembunyikan tombol pilih paket
            $('#btnSearchPaket').hide();

            // Tampilkan div selected-paket
            $('.selected-paket').show();

            // Update jumlah bayar jika jenis pembayaran sudah dipilih
            updateJumlahBayar();

            // Update ringkasan booking
            updateBookingSummary(harga);

            // Tutup modal
            const paketModal = bootstrap.Modal.getInstance(document.getElementById('paketModal'));
            if (paketModal) paketModal.hide();
        });

        // Fungsi untuk mengupdate ringkasan booking
        function updateBookingSummary(harga) {
            // Update total harga
            $('#totalHarga').text('Rp ' + formatNumber(harga));
            
            // Estimasi durasi berdasarkan jenis paket (bisa disesuaikan)
            let estimasiDurasi = 60; // default 60 menit
            $('#totalDurasi').text(estimasiDurasi + ' menit');
        }

        // Event untuk jenis pembayaran
        $('#jenispembayaran').on('change', function() {
            const jenispembayaran = $(this).val();

            if (jenispembayaran === 'DP' || jenispembayaran === 'Lunas') {
                $('.payment-details').show();
                updateJumlahBayar();
            } else {
                $('.payment-details').hide();
                $('#jumlahbayar').val('');
            }
        });

        // Fungsi untuk update jumlah bayar
        function updateJumlahBayar() {
            const jenispembayaran = $('#jenispembayaran').val();
            const total = parseFloat($('#total').val()) || 0;

            if (jenispembayaran === 'DP') {
                $('#jumlahbayar').val(Math.round(total * 0.5)); // 50% dari total
            } else if (jenispembayaran === 'Lunas') {
                $('#jumlahbayar').val(total);
            }
        }

        // Format number to rupiah
        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        // Fungsi untuk mengecek ketersediaan slot waktu
        function checkTimeSlotAvailability() {
            const tanggal = $('#tanggal_booking').val();

            if (tanggal) {
                // Reset semua slot waktu
                $('.time-slot').removeClass('disabled booked partial-booked active');
                $('.time-slot').removeAttr('data-available');

                // Tambahkan loading indicator
                $('#timeSlotContainer').addClass('position-relative');
                $('#timeSlotContainer').append('<div class="loading-overlay"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                $.ajax({
                    url: '<?= site_url('admin/booking/check-availability') ?>',
                    type: 'GET',
                    data: {
                        date: tanggal
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

                            console.log('Slot status:', slotStatus);
                            console.log('Total karyawan:', totalKaryawan);

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
                            if (tanggal === '<?= date('Y-m-d') ?>') {
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
                        toastr.error('Gagal memuat ketersediaan waktu');
                    }
                });
            }
        }

        // Fungsi untuk mengecek karyawan yang tersedia
        function checkAvailableKaryawan() {
            const tanggal = $('#tanggal_booking').val();
            const jamstart = $('#jamstart').val();

            if (tanggal && jamstart) {
                $('#karyawanAlert').html(`
                    <div class="spinner-border spinner-border-sm text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="ml-2">Memeriksa ketersediaan karyawan...</span>
                `);

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

                            if (karyawanList && karyawanList.length > 0) {
                                // Tampilkan container karyawan
                                $('#karyawanAlert').hide();
                                $('#karyawanContainer').show();

                                // Simpan data karyawan untuk modal
                                window.availableKaryawan = karyawanList;
                            } else {
                                // Tampilkan pesan tidak ada karyawan tersedia
                                $('#karyawanContainer').hide();
                                $('#karyawanAlert').show().html(`
                                    <i class="fas fa-exclamation-triangle"></i> Tidak ada karyawan yang tersedia pada waktu yang dipilih. Silakan pilih waktu lain.
                                `).removeClass('alert-info').addClass('alert-warning');
                            }
                        } else {
                            $('#karyawanContainer').hide();
                            $('#karyawanAlert').show().html(`
                                <i class="fas fa-exclamation-circle"></i> Gagal mendapatkan data karyawan.
                            `).removeClass('alert-info').addClass('alert-danger');
                        }
                    },
                    error: function() {
                        $('#karyawanContainer').hide();
                        $('#karyawanAlert').show().html(`
                            <i class="fas fa-exclamation-circle"></i> Gagal mendapatkan data karyawan.
                        `).removeClass('alert-info').addClass('alert-danger');
                    }
                });
            }
        }

        // Event handler untuk tombol Pilih Karyawan
        $('#btnSearchKaryawan').on('click', function(e) {
            e.preventDefault();

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

            // Isi tabel karyawan dengan data yang sudah diambil
            setTimeout(function() {
                $('#karyawanTableBody').empty();

                if (window.availableKaryawan && window.availableKaryawan.length > 0) {
                    $.each(window.availableKaryawan, function(i, karyawan) {
                        const row = `
                            <tr>
                                <td>${karyawan.namakaryawan}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary select-karyawan" 
                                        data-id="${karyawan.idkaryawan}" 
                                        data-nama="${karyawan.namakaryawan}">
                                        <i class="fas fa-check"></i> Pilih
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
                                <i class="fas fa-exclamation-triangle text-warning"></i> 
                                Tidak ada karyawan yang tersedia pada waktu yang dipilih
                            </td>
                        </tr>
                    `);
                }
            }, 300);
        });

        // Event untuk memilih karyawan
        $(document).on('click', '.select-karyawan', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            $('#idkaryawan').val(id);
            $('#selectedKaryawanInfo').html(`
                <div class="card border-0 bg-light">
                    <div class="card-body p-3">
                        <h6 class="card-title mb-2"><i class="fas fa-user-tie text-primary"></i> <strong>${nama}</strong></h6>
                    </div>
                </div>
            `);

            // Tampilkan tombol ganti karyawan
            $('#btnChangeKaryawan').fadeIn();

            // Tampilkan div selected-karyawan dan sembunyikan tombol cari
            $('.selected-karyawan').show();
            $('#btnSearchKaryawan').hide();

            // Tutup modal
            const karyawanModal = bootstrap.Modal.getInstance(document.getElementById('karyawanModal'));
            if (karyawanModal) karyawanModal.hide();
        });

        // Event handler untuk tombol Ganti Karyawan
        $('#btnChangeKaryawan').on('click', function(e) {
            e.preventDefault();

            // Tampilkan modal
            const karyawanModal = new bootstrap.Modal(document.getElementById('karyawanModal'));
            karyawanModal.show();
        });

        // Event handler untuk tombol Hapus Pelanggan
        $('#btnRemovePelanggan').on('click', function(e) {
            e.preventDefault();
            // Reset data pelanggan
            $('#idpelanggan').val('');
            $('#selectedCustomerInfo').html(`
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> Belum ada pelanggan yang dipilih. Silakan klik tombol "Cari Pelanggan" di atas.
                </div>
            `);

            // Sembunyikan tombol ganti dan hapus
            $('#btnChangePelanggan').hide();
            $('#btnRemovePelanggan').hide();

            // Sembunyikan div selected-customer dan tampilkan tombol cari
            $('.selected-customer').hide();
            $('#btnSearchCustomer').show();
        });

        // Form submission
        $('#bookingForm').on('submit', function(e) {
            e.preventDefault();

            // Validasi form
            if (!$('#idpelanggan').val()) {
                toastr.error('Silakan pilih pelanggan terlebih dahulu');
                return false;
            }

            if (!$('#tanggal_booking').val()) {
                toastr.error('Silakan pilih tanggal booking');
                return false;
            }

            if (!$('#jamstart').val()) {
                toastr.error('Silakan pilih jam mulai');
                return false;
            }

            if (!$('#idpaket').val()) {
                toastr.error('Silakan pilih paket');
                return false;
            }

            if (!$('#idkaryawan').val()) {
                toastr.error('Silakan pilih karyawan');
                return false;
            }

            if (!$('#jenispembayaran').val()) {
                toastr.error('Silakan pilih jenis pembayaran');
                return false;
            }

            if (($('#jenispembayaran').val() === 'DP' || $('#jenispembayaran').val() === 'Lunas') && !$('#jumlahbayar').val()) {
                toastr.error('Silakan masukkan jumlah pembayaran');
                return false;
            }

            // Disable submit button
            $('#btnSubmit').prop('disabled', true).html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Menyimpan...
            `);

            // Submit form
            $.ajax({
                url: '<?= site_url('admin/booking/store') ?>',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        setTimeout(function() {
                            window.location.href = '<?= site_url('admin/booking/show/') ?>' + response.kdbooking;
                        }, 1500);
                    } else {
                        toastr.error(response.message);
                        $('#btnSubmit').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan Booking');

                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                toastr.error(value);
                            });
                        }
                    }
                },
                error: function() {
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                    $('#btnSubmit').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan Booking');
                }
            });
        });

        // Event handler untuk tombol Pilih Paket
        $('#btnSearchPaket, #btnChangePaket').on('click', function(e) {
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
    });
</script>

<!-- Modal Pelanggan -->
<div class="modal fade" id="pelangganModal" tabindex="-1" aria-labelledby="pelangganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pelangganModalLabel">Pilih Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="search-input mb-3">
                    <input type="text" class="form-control" id="customerSearch" placeholder="Cari pelanggan berdasarkan nama atau nomor HP...">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                </div>

                <div class="table-container">
                    <table class="table table-bordered table-sm customer-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="customerTableBody">
                            <!-- Data pelanggan akan diisi melalui AJAX -->
                        </tbody>
                    </table>
                    <div id="customerLoading" class="text-center py-3">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="ms-2">Memuat data pelanggan...</span>
                    </div>
                    <div id="customerEmpty" class="text-center py-3" style="display: none;">
                        <span class="text-muted">Tidak ada pelanggan yang ditemukan</span>
                        <div class="mt-3">
                            <button type="button" class="btn btn-success" id="btnAddNewCustomer">
                                <i class="fas fa-plus"></i> Tambah Pelanggan Baru
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Form tambah pelanggan baru -->
                <div id="newCustomerForm" style="display: none;">
                    <h5 class="mb-3">Tambah Pelanggan Baru</h5>
                    <div class="mb-3">
                        <label for="new_nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="new_nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_nohp" class="form-label">Nomor HP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="new_nohp" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="new_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="new_alamat" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" id="btnSaveNewCustomer">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <button type="button" class="btn btn-secondary" id="btnCancelNewCustomer">
                            <i class="fas fa-times"></i> Batal
                        </button>
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
                    <span class="search-icon"><i class="fas fa-search"></i></span>
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
                                            <i class="fas fa-check"></i> Pilih
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
<?= $this->endSection() ?>