<?= $this->extend('templates/main') ?>

<?= $this->section('custom_style') ?>
<style>
    /* Animasi fadeIn untuk preview gambar */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-in-out forwards;
    }

    /* Styling untuk countdown */
    .countdown-container {
        filter: drop-shadow(0 4px 3px rgb(0 0 0 / 0.07));
    }

    /* Styling untuk preview container */
    #image-preview-container {
        transition: all 0.3s ease;
    }

    #image-preview {
        transition: all 0.3s ease;
    }

    #remove-image {
        transition: all 0.2s ease;
        opacity: 0.8;
    }

    #remove-image:hover {
        transform: scale(1.1);
        opacity: 1;
    }

    /* Pulse animation untuk countdown */
    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }
    }

    #seconds {
        animation: pulse 1s infinite;
    }

    /* Animasi pulse untuk countdown hampir habis */
    .animate-pulse {
        animation: pulse-critical 1s infinite;
    }

    @keyframes pulse-critical {

        0%,
        100% {
            opacity: 1;
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
        }

        50% {
            opacity: 0.9;
            box-shadow: 0 0 0 5px rgba(239, 68, 68, 0);
        }
    }

    /* Progress bar animation */
    #progress-bar {
        transition: width 1s linear, background-color 1s ease;
    }

    /* Animasi untuk alert messages */
    .fixed.top-4.right-4 {
        animation: slideIn 0.3s ease-out forwards;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animasi untuk spinner */
    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .animate-spin {
        animation: spin 1s linear infinite;
    }

    /* Animasi untuk modal expired */
    .modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(3px);
        transition: opacity 0.3s ease;
    }

    .modal-content {
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .modal-active .modal-content {
        transform: scale(1);
        opacity: 1;
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        10%,
        30%,
        50%,
        70%,
        90% {
            transform: translateX(-5px);
        }

        20%,
        40%,
        60%,
        80% {
            transform: translateX(5px);
        }
    }

    .shake {
        animation: shake 0.8s cubic-bezier(.36, .07, .19, .97) both;
    }

    /* Animasi untuk modal sukses */
    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-20px);
        }

        60% {
            transform: translateY(-10px);
        }
    }

    .bounce {
        animation: bounce 1s ease;
    }

    /* Animasi konfeti untuk modal sukses */
    @keyframes confetti-slow {
        0% {
            transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        }

        100% {
            transform: translate3d(25px, 105px, 0) rotateX(360deg) rotateY(180deg);
        }
    }

    @keyframes confetti-medium {
        0% {
            transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        }

        100% {
            transform: translate3d(100px, 140px, 0) rotateX(100deg) rotateY(360deg);
        }
    }

    @keyframes confetti-fast {
        0% {
            transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        }

        100% {
            transform: translate3d(-50px, 150px, 0) rotateX(10deg) rotateY(250deg);
        }
    }

    /* Upload area animations */
    @keyframes uploadBounce {
        0%, 100% {
            transform: scale(1) rotate(0deg);
        }
        50% {
            transform: scale(1.05) rotate(2deg);
        }
    }

    @keyframes uploadPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 102, 204, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(0, 102, 204, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(0, 102, 204, 0);
        }
    }

    .upload-active {
        animation: uploadPulse 1.5s infinite;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-simple" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem 0 4rem; position: relative; overflow: hidden;">
    <!-- Decorative Elements -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'40\' height=\'40\' viewBox=\'0 0 40 40\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Ccircle cx=\'10\' cy=\'10\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'10\' r=\'1\'/%3E%3Ccircle cx=\'10\' cy=\'30\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E') repeat;"></div>
    
    <div class="container">
        <div class="text-center text-white">
            <h1 class="section-title" style="color: white; font-size: 2.5rem; margin-bottom: 1rem; font-weight: 700;">
                💳 Pembayaran Booking
            </h1>
            <p class="section-description" style="color: rgba(255, 255, 255, 0.9); font-size: 1.125rem; max-width: 600px; margin: 0 auto 2rem;">
                Silakan lakukan pembayaran untuk menyelesaikan proses booking Anda
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="<?= site_url('customer/booking') ?>" class="btn btn-outline" style="background: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.3); color: white; padding: 0.75rem 1.5rem; border-radius: 50px; text-decoration: none; backdrop-filter: blur(10px);">
                    ← Kembali ke Riwayat
                </a>
        </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <div class="section-header" style="margin-bottom: 3rem;">
            <h2 class="section-title">💰 Detail Pembayaran</h2>
            <p class="section-description">
                Periksa detail booking Anda dan lakukan pembayaran sesuai instruksi
            </p>
        </div>

        <div class="card animate-fade-in-up" style="padding: 2rem; margin-bottom: 2rem;">
            <!-- Detail Booking Card -->
            <div style="background: var(--white); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200); margin-bottom: 2rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 1.5rem; color: white;">📋</span>
                    </div>
                    <h2 style="font-size: 1.5rem; font-weight: 600; color: var(--text-primary);">📋 Detail Booking</h2>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="display: flex; flex-direction: column; border-bottom: 1px solid var(--gray-200); padding-bottom: 1rem; transition: all 0.3s ease;">
                        <div style="font-weight: 600; color: var(--text-secondary); margin-bottom: 0.5rem;">Kode Booking</div>
                        <div style="color: var(--text-primary); font-weight: 700; font-size: 1.125rem;"><?= $booking['kdbooking'] ?></div>
                    </div>
                    <div style="display: flex; flex-direction: column; border-bottom: 1px solid var(--gray-200); padding-bottom: 1rem; transition: all 0.3s ease;">
                        <div style="font-weight: 600; color: var(--text-secondary); margin-bottom: 0.5rem;">Tanggal Booking</div>
                        <div style="color: var(--text-primary); font-weight: 500;"><?= date('d F Y', strtotime($booking['tanggal_booking'])) ?></div>
                    </div>
                    <div style="display: flex; flex-direction: column; border-bottom: 1px solid var(--gray-200); padding-bottom: 1rem; transition: all 0.3s ease;">
                        <div style="font-weight: 600; color: var(--text-secondary); margin-bottom: 0.5rem;">Jam</div>
                        <div style="color: var(--text-primary); font-weight: 500;">
                            <?php if (!empty($details)): ?>
                                <?php foreach ($details as $index => $detail): ?>
                                    <?= $detail['jamstart'] . ' - ' . $detail['jamend'] ?>
                                    <?php if ($index < count($details) - 1): ?>
                                        <br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; border-bottom: 1px solid var(--gray-200); padding-bottom: 1rem; transition: all 0.3s ease;">
                        <div style="font-weight: 600; color: var(--text-secondary); margin-bottom: 0.5rem;">Paket</div>
                        <div style="color: var(--text-primary); font-weight: 500;">
                            <?php if (!empty($details)): ?>
                                <?php foreach ($details as $index => $detail): ?>
                                    <?= $detail['nama_paket'] ?>
                                    <?php if ($index < count($details) - 1): ?>
                                        <br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; padding-bottom: 1rem;">
                        <div style="font-weight: 600; color: var(--text-secondary); margin-bottom: 0.5rem;">Total Pembayaran</div>
                        <div style="color: var(--primary-color); font-weight: 800; font-size: 1.5rem;">Rp <?= number_format($booking['total'] ?? 0, 0, ',', '.') ?></div>
                    </div>
                </div>
            </div>

            <!-- Form Pembayaran Card -->
            <div style="background: var(--white); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--accent-color), #FFD23F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 1.5rem; color: white;">💳</span>
                    </div>
                    <h2 style="font-size: 1.5rem; font-weight: 600; color: var(--text-primary);">💳 Form Pembayaran</h2>
                </div>

                <form id="paymentForm" action="<?= site_url('customer/booking/savePayment') ?>" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <input type="hidden" name="kdbooking" value="<?= $booking['kdbooking'] ?>">

                    <!-- Jenis Pembayaran -->
                    <div class="form-group">
                        <label for="jenispembayaran" class="form-label">💰 Jenis Pembayaran</label>
                        <select id="jenispembayaran" name="jenis_pembayaran" class="form-select" required>
                            <option value="DP">💳 DP (50% dari total)</option>
                            <option value="Lunas">✨ Lunas (Bayar Penuh)</option>
                            </select>
                        <p id="payment-description" style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--text-light);">💡 DP minimal 50% dari total pembayaran</p>
                    </div>

                    <!-- Jumlah Pembayaran -->
                    <div id="paymentAmountContainer" class="form-group">
                        <label for="payment_amount" class="form-label" id="payment-label">Jumlah DP (Rp)</label>
                        <div style="position: relative;">
                            <div style="position: absolute; top: 50%; left: 1rem; transform: translateY(-50%); color: var(--text-secondary);">
                                <span>Rp</span>
                            </div>
                            <input type="text" id="payment_amount" name="payment_amount_display" value="<?= number_format($booking['total'] * 0.5, 0, '', '') ?>" class="form-input" style="padding-left: 3rem; background: var(--gray-100);" readonly>
                            <input type="hidden" id="payment_amount_raw" name="payment_amount" value="<?= $booking['total'] * 0.5 ?>">
                        </div>
                        <p id="payment-info" style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--text-light);">Minimal Rp <?= number_format($booking['total'] * 0.5, 0, ',', '.') ?></p>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="form-group">
                        <label for="metode_pembayaran" class="form-label">🏦 Metode Pembayaran</label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="form-select" required>
                            <option value="transfer">🏦 Transfer Bank</option>
                            <option value="qris">📱 QRIS</option>
                            </select>
                        <p style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--text-light);">📋 Pilih metode pembayaran yang tersedia</p>
                    </div>

                    <!-- Informasi Rekening -->
                    <div id="transferInfo" style="background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <span style="font-size: 1.25rem; color: white;">🏦</span>
                        </div>
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary);">🏦 Informasi Rekening</h3>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            <p style="color: var(--text-primary);">
                                <span style="font-weight: 600;">Bank BCA:</span> 1234567890
                            </p>
                            <p style="color: var(--text-primary);">
                                <span style="font-weight: 600;">A/N:</span> Vixs Barbershop
                            </p>
                            <div style="margin-top: 1rem; background: rgba(0, 102, 204, 0.1); padding: 1rem; border-radius: var(--radius-md); border: 1px solid rgba(0, 102, 204, 0.2);">
                                <p style="color: var(--primary-color); font-size: 0.875rem; font-weight: 500;">💡 Harap transfer sesuai nominal yang tertera.</p>
                            </div>
                        </div>
                    </div>

                    <!-- QRIS Info -->
                    <div id="qrisInfo" style="display: none; background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200); text-align: center;">
                        <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; margin-bottom: 1rem;">
                                                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--secondary-color), #00D4AA); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <span style="font-size: 1.25rem; color: white;">📱</span>
                            </div>
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary);">📱 Scan QRIS</h3>
                        </div>
                        <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">Silakan scan kode QRIS di bawah ini untuk melakukan pembayaran:</p>
                        <div style="background: var(--white); padding: 1rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200); display: inline-block; margin-bottom: 1rem;">
                            <!-- Placeholder untuk QRIS -->
                            <div style="width: 280px; height: 280px; background: var(--gray-100); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;">
                                <div style="text-align: center;">
                                    <img src="<?= base_url('assets/images/payment/qrisku.jpg') ?>" alt="QRIS Code" style="height: 280px; width: 280px; object-fit: cover; border-radius: var(--radius-md);">
                                    <p style="margin-top: 0.75rem; font-size: 0.875rem; color: var(--text-light);">QRIS Vixs Barbershop</p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 1rem; background: rgba(0, 102, 204, 0.1); padding: 1rem; border-radius: var(--radius-md); border: 1px solid rgba(0, 102, 204, 0.2);">
                            <p style="color: var(--primary-color); font-size: 0.875rem; font-weight: 500;">💡 Harap transfer sesuai nominal yang tertera.</p>
                        </div>
                    </div>

                    <!-- Countdown Timer -->
                    <div style="background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200); margin-bottom: 1.5rem;">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--warning-color), #F59E0B); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-size: 1.25rem; color: white;">⏰</span>
                                </div>
                                <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary);">⏰ Batas Waktu Pembayaran</h3>
                            </div>
                            <div class="countdown-container" style="display: flex; align-items: center; gap: 0.5rem;">
                                <span style="background: var(--white); border: 1px solid var(--gray-300); color: var(--text-primary); font-size: 0.875rem; font-weight: 600; padding: 0.5rem; border-radius: var(--radius-sm); min-width: 2rem; text-align: center;" id="hours">00</span>
                                <span style="font-size: 0.875rem; color: var(--text-light);">:</span>
                                <span style="background: var(--white); border: 1px solid var(--gray-300); color: var(--text-primary); font-size: 0.875rem; font-weight: 600; padding: 0.5rem; border-radius: var(--radius-sm); min-width: 2rem; text-align: center;" id="minutes">00</span>
                                <span style="font-size: 0.875rem; color: var(--text-light);">:</span>
                                <span style="background: var(--white); border: 1px solid var(--gray-300); color: var(--text-primary); font-size: 0.875rem; font-weight: 600; padding: 0.5rem; border-radius: var(--radius-sm); min-width: 2rem; text-align: center;" id="seconds">00</span>
                        </div>
                        </div>
                        <div style="width: 100%; background: var(--gray-200); border-radius: 50px; height: 0.5rem; overflow: hidden;">
                            <div style="background: var(--warning-color); height: 100%; border-radius: 50px; transition: all 1s ease;" id="progress-bar"></div>
                        </div>
                        <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">⚡ Segera lakukan pembayaran sebelum batas waktu berakhir.</p>
                    </div>

                    <!-- Upload Bukti -->
                    <div id="buktiContainer" class="form-group">
                        <label for="bukti_pembayaran" class="form-label">📷 Upload Bukti Pembayaran</label>

                        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
                            <div>
                                <div style="position: relative;">
                                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" style="display: none;" required>
                                    <label for="bukti_pembayaran" id="upload-label" style="display: flex; align-items: center; justify-content: center; width: 100%; padding: 2rem 1rem; background: var(--white); border: 2px dashed var(--gray-300); border-radius: var(--radius-lg); cursor: pointer; transition: all 0.3s ease; text-align: center;">
                                        <div style="display: flex; flex-direction: column; align-items: center; gap: 0.75rem;">
                                            <div id="upload-icon" style="font-size: 3rem; color: var(--primary-color); transition: all 0.3s ease;">📤</div>
                                            <span id="file-name" style="color: var(--text-secondary); font-weight: 600; font-size: 1rem;">Klik untuk pilih file bukti pembayaran</span>
                                            <span style="font-size: 0.875rem; color: var(--text-light); font-style: italic;">atau drag & drop file di sini</span>
                                        </div>
                                    </label>
                                </div>
                                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--text-light);">Format: JPG, PNG, JPEG. Maks 2MB</p>
                                
                                <div id="image-preview-container" class="hidden" style="position: relative; margin-top: 1rem;">
                                    <div id="image-preview" style="height: 8rem; background: var(--gray-100); border-radius: var(--radius-md); border: 1px solid var(--gray-300); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                        <img id="preview-img" src="#" alt="Preview" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            </div>
                                    <button type="button" id="remove-image" style="position: absolute; top: 0.5rem; right: 0.5rem; background: var(--error-color); color: white; border-radius: 50%; padding: 0.25rem; transition: all 0.2s ease; border: none; cursor: pointer;">
                                        ×
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div style="display: flex; flex-direction: column; gap: 1rem; padding-top: 2rem;">
                        <button type="submit" id="submitBtn" class="btn btn-primary btn-enhanced" style="padding: 1rem 2rem;">
                            <span class="btn-text">✨ Konfirmasi Pembayaran</span>
                            <span class="btn-icon" style="margin-left: 8px; font-size: 1.2rem; transition: transform 0.3s ease;">💳</span>
                            <span class="btn-shine"></span>
                        </button>
                        <a href="<?= site_url('customer/booking') ?>" class="btn btn-secondary" style="text-align: center; padding: 1rem 2rem;">
                            ← Kembali ke Daftar Booking
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Alert Container -->
<div id="alertContainer" style="position: fixed; top: 1rem; right: 1rem; z-index: 50;"></div>

<!-- Modal Sukses Pembayaran -->
<div style="position: fixed; inset: 0; z-index: 50; display: none; align-items: center; justify-content: center;" id="successModal">
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(3px);"></div>
    <div class="card animate-fade-in-up" style="max-width: 28rem; width: 100%; margin: 1rem; overflow: hidden; transform: scale(1); transition: all 0.3s ease; position: relative; z-index: 10;" id="successModalContent">
        <!-- Konfeti -->
        <div class="confetti-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; pointer-events: none;">
            <div class="confetti" style="background: var(--error-color); width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 10%; animation: confetti-slow 3s linear infinite;"></div>
            <div class="confetti" style="background: var(--accent-color); width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 20%; animation: confetti-medium 2s linear infinite;"></div>
            <div class="confetti" style="background: var(--primary-color); width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 30%; animation: confetti-fast 1.5s linear infinite;"></div>
            <div class="confetti" style="background: var(--success-color); width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 40%; animation: confetti-slow 2.5s linear infinite;"></div>
            <div class="confetti" style="background: #9333EA; width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 50%; animation: confetti-medium 1.8s linear infinite;"></div>
            <div class="confetti" style="background: #EC4899; width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 60%; animation: confetti-fast 2.2s linear infinite;"></div>
            <div class="confetti" style="background: #3B82F6; width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 70%; animation: confetti-slow 2.8s linear infinite;"></div>
            <div class="confetti" style="background: #FBBF24; width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 80%; animation: confetti-medium 2.4s linear infinite;"></div>
            <div class="confetti" style="background: #F87171; width: 0.5rem; height: 0.5rem; border-radius: 2px; position: absolute; top: 0; left: 90%; animation: confetti-fast 1.9s linear infinite;"></div>
        </div>

        <div style="background: var(--success-color); padding: 1rem 1.5rem;">
            <h5 style="color: white; font-weight: 600; display: flex; align-items: center;">
                <span style="font-size: 1.25rem; margin-right: 0.5rem;">✅</span>
                ✨ Pembayaran Berhasil
            </h5>
        </div>
        <div style="padding: 2rem; text-align: center;">
            <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, var(--success-color), #10B981); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);">
                <span style="font-size: 2.5rem; color: white;">✅</span>
            </div>
            <h4 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1rem;">🎉 Pembayaran Berhasil Dikonfirmasi!</h4>
            <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">Terima kasih! Pembayaran Anda telah berhasil diproses. Bukti pembayaran akan segera diverifikasi oleh admin.</p>
            <div style="width: 100%; background: var(--gray-200); border-radius: 50px; height: 0.5rem; margin-bottom: 1rem; overflow: hidden;">
                <div style="background: var(--success-color); height: 100%; border-radius: 50px; animation: pulse 2s infinite; width: 100%;"></div>
            </div>
            <p style="font-size: 0.875rem; color: var(--text-light); margin-bottom: 1.5rem;">Anda akan dialihkan ke halaman detail booking dalam <span id="successRedirectCountdown" style="font-weight: 600; color: var(--success-color);">3</span> detik...</p>
            <a href="#" id="goToBookingDetail" class="btn btn-primary btn-enhanced" style="width: 100%; padding: 0.75rem 1.5rem;">
                <span class="btn-text">📋 Lihat Detail Booking</span>
                <span class="btn-shine"></span>
            </a>
        </div>
    </div>
</div>

<!-- Modal Expired -->
<div style="position: fixed; inset: 0; z-index: 50; display: none; align-items: center; justify-content: center;" id="expiredModal">
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(3px);"></div>
    <div class="card animate-fade-in-up" style="max-width: 28rem; width: 100%; margin: 1rem; overflow: hidden; transform: scale(1); transition: all 0.3s ease; position: relative; z-index: 10;" id="expiredModalContent">
        <div style="background: var(--error-color); padding: 1rem 1.5rem;">
            <h5 style="color: white; font-weight: 600; display: flex; align-items: center;">
                <span style="font-size: 1.25rem; margin-right: 0.5rem;">⚠️</span>
                ⏰ Waktu Pembayaran Habis
            </h5>
        </div>
        <div style="padding: 2rem; text-align: center;">
            <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, var(--error-color), #EF4444); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);">
                <span style="font-size: 2.5rem; color: white;">⏰</span>
            </div>
            <h4 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1rem;">❌ Booking Anda Telah Expired</h4>
            <p style="color: var(--text-secondary); margin-bottom: 1rem; line-height: 1.6;">Maaf, waktu untuk melakukan pembayaran telah habis. Booking Anda telah dibatalkan secara otomatis.</p>
            <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">Silahkan lakukan booking ulang jika Anda masih ingin menggunakan layanan kami.</p>
            <div style="width: 100%; background: var(--gray-200); border-radius: 50px; height: 0.5rem; margin-bottom: 1rem; overflow: hidden;">
                <div style="background: var(--error-color); height: 100%; border-radius: 50px; animation: pulse 2s infinite; width: 100%;"></div>
            </div>
            <p style="font-size: 0.875rem; color: var(--text-light); margin-bottom: 1.5rem;">Anda akan dialihkan dalam <span id="redirectCountdown" style="font-weight: 600; color: var(--error-color);">5</span> detik...</p>
            <a href="<?= base_url('customer/booking') ?>" class="btn btn-primary btn-enhanced" style="width: 100%; padding: 0.75rem 1.5rem;">
                <span class="btn-text">← Kembali ke Daftar Booking</span>
                <span class="btn-shine"></span>
            </a>
        </div>
    </div>
</div>

<!-- Tambahkan WebSocket client -->
<script src="<?= base_url('assets/js/booking-socket.js') ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi WebSocket client
        const bookingSocket = new BookingSocket({
            debug: true
        });

        // Countdown timer untuk waktu expired
        const progressBar = document.getElementById('progress-bar');
        const expiredAt = new Date('<?= $booking['expired_at'] ?>').getTime();
        const now = new Date().getTime();
        const totalDuration = expiredAt - now;
        const kdbooking = '<?= $booking['kdbooking'] ?>';

        // Connect ke WebSocket server
        const wsProtocol = window.location.protocol === 'https:' ? 'wss://' : 'ws://';
        const wsHost = window.location.hostname;
        const wsPort = '8080'; // Port default, sesuaikan dengan konfigurasi server WebSocket
        const wsUrl = `${wsProtocol}${wsHost}:${wsPort}`;

        bookingSocket.connect(wsUrl);

        // Register event listener untuk koneksi berhasil terbuka
        bookingSocket.on('onOpen', function() {
            console.log('WebSocket connected, registering for booking updates...');
            // Register untuk menerima update tentang booking ini
            bookingSocket.send({
                type: 'register',
                booking_code: kdbooking
            });
        });

        // Register event listener untuk booking expired
        bookingSocket.on('onBookingExpired', function(data) {
            if (data.booking_code === kdbooking) {
                console.log('Booking expired notification received via WebSocket');
                showExpiredModal();
            }
        });

        // Periksa status booking secara periodik jika WebSocket tidak tersedia
        function checkExpiredBooking() {
            const currentTime = new Date().getTime();

            if (currentTime > expiredAt) {
                // Coba gunakan WebSocket jika terhubung
                if (bookingSocket.isConnected) {
                    bookingSocket.checkBookingStatus(kdbooking);
                } else {
                    // Fallback ke AJAX jika WebSocket tidak tersedia
                    fetch('<?= site_url('customer/booking/expire/') ?>' + kdbooking, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                console.log('Booking berhasil diperbarui menjadi expired');
                                showExpiredModal();
                            } else {
                                console.error('Gagal memperbarui status booking:', data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            }
        }

        // Tambahkan pemeriksaan global menggunakan cron endpoint sebagai fallback
        function checkAllExpiredBookings() {
            fetch('<?= site_url('cron/check-expired-bookings') ?>?key=awanbarbershop_secret_key', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success' && data.processed > 0) {
                        console.log('Berhasil memperbarui ' + data.processed + ' booking yang expired');
                        // Cek apakah booking yang dilihat termasuk yang expired
                        fetch('<?= site_url('customer/booking/detail/') ?>' + kdbooking, {
                                method: 'GET',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.json())
                            .then(bookingData => {
                                if (bookingData.status === 'expired') {
                                    showExpiredModal();
                                }
                            })
                            .catch(error => {
                                console.error('Error checking specific booking:', error);
                            });
                    }
                })
                .catch(error => {
                    console.error('Error checking expired bookings:', error);
                });
        }

        // Tampilkan modal expired
        function showExpiredModal() {
            const modal = document.getElementById('expiredModal');
            const modalContent = document.getElementById('expiredModalContent');

            if (modal) {
                // Tampilkan modal
                modal.classList.remove('hidden');

                // Tambahkan efek animasi shake pada modal content
                if (modalContent) {
                    setTimeout(() => {
                        modalContent.classList.add('shake');
                    }, 100);
                }

                // Nonaktifkan form pembayaran
                const form = document.getElementById('paymentForm');
                if (form) {
                    const inputs = form.querySelectorAll('input, select, button');
                    inputs.forEach(input => {
                        input.disabled = true;
                    });
                }

                // Update tampilan countdown
                const countdownElements = document.querySelectorAll('#hours, #minutes, #seconds');
                countdownElements.forEach(el => {
                    el.textContent = '00';
                    el.classList.remove('border-gray-300', 'text-gray-800');
                    el.classList.add('border-red-400', 'bg-red-500', 'text-white');
                });

                if (progressBar) {
                    progressBar.style.width = '0%';
                    progressBar.classList.remove('bg-orange-500');
                    progressBar.classList.add('bg-red-500');
                }

                // Countdown untuk redirect
                let redirectSeconds = 5;
                const redirectCountdown = document.getElementById('redirectCountdown');
                if (redirectCountdown) {
                    redirectCountdown.textContent = redirectSeconds;
                    const redirectInterval = setInterval(() => {
                        redirectSeconds--;
                        redirectCountdown.textContent = redirectSeconds;
                        if (redirectSeconds <= 0) {
                            clearInterval(redirectInterval);
                            window.location.href = '<?= base_url('customer/booking') ?>';
                        }
                    }, 1000);
                }
            }
        }

        // Jalankan pemeriksaan saat halaman dimuat
        checkExpiredBooking();

        // Jalankan pemeriksaan setiap 30 detik sebagai fallback
        setInterval(checkExpiredBooking, 30000);
        // Jalankan pemeriksaan global setiap 60 detik sebagai fallback tambahan
        setInterval(checkAllExpiredBookings, 60000);

        // Fungsi untuk memperbarui countdown
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = expiredAt - now;

            if (distance <= 0) {
                // Waktu habis
                clearInterval(countdownInterval);
                const expiredElements = document.querySelectorAll('#hours, #minutes, #seconds');
                expiredElements.forEach(el => {
                    el.textContent = '00';
                    el.classList.remove('border-gray-300', 'text-gray-800');
                    el.classList.add('border-red-400', 'bg-red-500', 'text-white');
                });
                progressBar.style.width = '0%';
                progressBar.classList.remove('bg-orange-500');
                progressBar.classList.add('bg-red-500');

                // Periksa status booking
                checkExpiredBooking();
                return;
            }

            // Hitung waktu yang tersisa
            const hours = Math.floor(distance / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Perbarui tampilan countdown
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');

            // Perbarui progress bar
            const percentLeft = (distance / totalDuration) * 100;
            progressBar.style.width = percentLeft + '%';

            // Ubah warna progress bar berdasarkan waktu yang tersisa
            const countdownBoxes = document.querySelectorAll('#hours, #minutes, #seconds');
            if (percentLeft < 25) {
                progressBar.classList.remove('bg-orange-500', 'bg-yellow-500');
                progressBar.classList.add('bg-red-500');
                
                // Ubah style countdown boxes menjadi merah dan tambahkan pulse
                countdownBoxes.forEach(el => {
                    el.classList.remove('border-gray-300', 'text-gray-800');
                    el.classList.add('border-red-400', 'bg-red-500', 'text-white', 'animate-pulse');
                });
            } else if (percentLeft < 50) {
                progressBar.classList.remove('bg-orange-500', 'bg-red-500');
                progressBar.classList.add('bg-yellow-500');
                
                // Ubah style countdown boxes menjadi kuning
                countdownBoxes.forEach(el => {
                    el.classList.remove('border-red-400', 'bg-red-500', 'text-white', 'animate-pulse');
                    el.classList.add('border-yellow-400', 'bg-yellow-500', 'text-white');
                });
            } else {
                progressBar.classList.remove('bg-red-500', 'bg-yellow-500');
                progressBar.classList.add('bg-orange-500');
                
                // Style normal untuk countdown boxes
                countdownBoxes.forEach(el => {
                    el.classList.remove('border-red-400', 'bg-red-500', 'border-yellow-400', 'bg-yellow-500', 'text-white', 'animate-pulse');
                    el.classList.add('border-gray-300', 'text-gray-800');
                });
            }
        }

        // Jalankan countdown
        updateCountdown();
        const countdownInterval = setInterval(updateCountdown, 1000);

        // Tutup WebSocket ketika halaman ditutup
        window.addEventListener('beforeunload', function() {
            if (bookingSocket.isConnected) {
                bookingSocket.send({
                    type: 'unregister',
                    booking_code: kdbooking
                });
                bookingSocket.close();
            }
        });

        // Form submission dengan AJAX
        const paymentForm = document.getElementById('paymentForm');
        const submitBtn = document.getElementById('submitBtn');
        const loadingSpinner = document.getElementById('loadingSpinner') || document.createElement('div');



        paymentForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Periksa apakah booking sudah expired
            const currentTime = new Date().getTime();
            if (currentTime > expiredAt) {
                showAlert('Waktu pembayaran telah habis. Silakan buat booking baru.', 'error');
                showExpiredModal();
                return;
            }

            // Tampilkan loading spinner
            submitBtn.disabled = true;
            submitBtn.style.background = 'linear-gradient(135deg, var(--primary-color), var(--primary-dark))';
            submitBtn.innerHTML = `
                <span class="loading-spinner" style="display: inline-block; margin-right: 0.5rem; font-size: 1.2rem; animation: spin 1s linear infinite;">⏳</span>
                Memproses Pembayaran...
            `;

            // Kirim form dengan AJAX
            const formData = new FormData(this);

            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Tampilkan modal sukses pembayaran
                        showSuccessModal(data.redirect);
                    } else {
                        showAlert('Terjadi kesalahan: ' + data.message, 'error');
                        submitBtn.disabled = false;
                        submitBtn.style.background = '';
                        submitBtn.innerHTML = `
                            <span class="btn-text">✨ Konfirmasi Pembayaran</span>
                            <span class="btn-icon" style="margin-left: 8px; font-size: 1.2rem; transition: transform 0.3s ease;">💳</span>
                            <span class="btn-shine"></span>
                        `;
                    }
                })
                .catch(error => {
                    showAlert('Terjadi kesalahan: ' + error, 'error');
                    submitBtn.disabled = false;
                    submitBtn.style.background = '';
                    submitBtn.innerHTML = `
                        <span class="btn-text">✨ Konfirmasi Pembayaran</span>
                        <span class="btn-icon" style="margin-left: 8px; font-size: 1.2rem; transition: transform 0.3s ease;">💳</span>
                        <span class="btn-shine"></span>
                    `;
                });
        });

        // Fungsi untuk menampilkan modal sukses pembayaran
        function showSuccessModal(redirectUrl) {
            const modal = document.getElementById('successModal');
            const modalContent = document.getElementById('successModalContent');
            const goToBookingDetailBtn = document.getElementById('goToBookingDetail');

            if (modal && modalContent) {
                // Tampilkan modal
                modal.classList.remove('hidden');

                // Tambahkan efek animasi bounce pada modal content
                setTimeout(() => {
                    modalContent.classList.add('bounce');
                    modalContent.style.opacity = '1';
                    modalContent.style.transform = 'scale(1)';
                }, 100);

                // Perbarui link tombol detail booking
                if (goToBookingDetailBtn) {
                    goToBookingDetailBtn.href = redirectUrl;
                }

                // Membuat konfeti tambahan secara dinamis
                createDynamicConfetti();

                // Countdown untuk redirect otomatis
                let seconds = 3;
                const countdownElement = document.getElementById('successRedirectCountdown');

                if (countdownElement) {
                    const interval = setInterval(() => {
                        seconds--;
                        countdownElement.textContent = seconds;

                        if (seconds <= 0) {
                            clearInterval(interval);
                            window.location.href = redirectUrl;
                        }
                    }, 1000);
                }
            }
        }

        // Fungsi untuk membuat konfeti dinamis
        function createDynamicConfetti() {
            const container = document.querySelector('.confetti-container');
            if (!container) return;

            const colors = ['bg-red-500', 'bg-yellow-500', 'bg-green-500', 'bg-blue-500', 'bg-purple-500', 'bg-pink-500'];
            const animations = ['confetti-slow', 'confetti-medium', 'confetti-fast'];

            // Tambahkan 20 konfeti secara acak
            for (let i = 0; i < 20; i++) {
                const confetti = document.createElement('div');
                const color = colors[Math.floor(Math.random() * colors.length)];
                const animation = animations[Math.floor(Math.random() * animations.length)];
                const size = Math.random() * 5 + 3; // Ukuran antara 3-8px
                const left = Math.random() * 100; // Posisi horizontal 0-100%

                confetti.className = `confetti ${color} absolute top-0 rounded-sm`;
                confetti.style.width = `${size}px`;
                confetti.style.height = `${size}px`;
                confetti.style.left = `${left}%`;
                confetti.style.animation = `${animation} ${Math.random() * 3 + 2}s linear infinite`;
                confetti.style.animationDelay = `${Math.random() * 2}s`;

                container.appendChild(confetti);
            }
        }

        // Fungsi untuk menampilkan alert
        function showAlert(message, type) {
            const alertContainer = document.getElementById('alertContainer');
            const alertClass = type === 'success' ? 'bg-green-100 text-green-800 border-green-300' : 'bg-red-100 text-red-800 border-red-300';
            const alertIcon = type === 'success' ?
                '<span style="font-size: 1.25rem;">✅</span>' :
                '<span style="font-size: 1.25rem;">❌</span>';

            const alert = document.createElement('div');
            alert.className = `flex items-center p-4 mb-4 border rounded-lg ${alertClass}`;
            alert.innerHTML = `
                <div class="mr-2">${alertIcon}</div>
                <div>${message}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg p-1.5 inline-flex h-8 w-8 focus:outline-none" onclick="this.parentElement.remove()">
                    <span class="sr-only">Close</span>
                    <span style="font-size: 1rem;">✖️</span>
                </button>
            `;

            alertContainer.appendChild(alert);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (alert.parentElement) {
                    alert.remove();
                }
            }, 5000);
        }

        // Image preview and upload enhancements
        const imageInput = document.getElementById('bukti_pembayaran');
        const previewContainer = document.getElementById('image-preview-container');
        const previewImg = document.getElementById('preview-img');
        const fileNameDisplay = document.getElementById('file-name');
        const removeButton = document.getElementById('remove-image');
        const uploadLabel = document.getElementById('upload-label');
        const uploadIcon = document.getElementById('upload-icon');

        // Hover effects for upload area
        uploadLabel.addEventListener('mouseenter', function() {
            this.style.borderColor = 'var(--primary-color)';
            this.style.backgroundColor = 'rgba(0, 102, 204, 0.02)';
            this.classList.add('upload-active');
            uploadIcon.style.transform = 'scale(1.15) rotate(10deg)';
            uploadIcon.style.color = 'var(--primary-dark)';
        });

        uploadLabel.addEventListener('mouseleave', function() {
            this.style.borderColor = 'var(--gray-300)';
            this.style.backgroundColor = 'var(--white)';
            this.classList.remove('upload-active');
            uploadIcon.style.transform = 'scale(1) rotate(0deg)';
            uploadIcon.style.color = 'var(--primary-color)';
        });

        // Drag and drop effects
        uploadLabel.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--success-color)';
            this.style.backgroundColor = 'rgba(16, 185, 129, 0.05)';
            uploadIcon.textContent = '⬇️';
            uploadIcon.style.transform = 'scale(1.2)';
            uploadIcon.style.color = 'var(--success-color)';
        });

        uploadLabel.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--gray-300)';
            this.style.backgroundColor = 'var(--white)';
            uploadIcon.textContent = '📤';
            uploadIcon.style.transform = 'scale(1)';
            uploadIcon.style.color = 'var(--primary-color)';
        });

        uploadLabel.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--gray-300)';
            this.style.backgroundColor = 'var(--white)';
            uploadIcon.textContent = '📤';
            uploadIcon.style.transform = 'scale(1)';
            uploadIcon.style.color = 'var(--primary-color)';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                imageInput.files = files;
                handleFileSelection(files[0]);
            }
        });

        function handleFileSelection(file) {
            if (file) {
                // Show loading state
                uploadIcon.textContent = '⏳';
                uploadIcon.style.transform = 'scale(1.1)';
                fileNameDisplay.textContent = 'Memproses file...';
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Success state
                    uploadIcon.textContent = '✅';
                    uploadIcon.style.color = 'var(--success-color)';
                    fileNameDisplay.textContent = `✨ ${file.name}`;
                    fileNameDisplay.style.color = 'var(--success-color)';
                    
                    previewImg.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    previewContainer.classList.add('animate-fadeIn');
                    
                    // Reset to upload icon after 2 seconds
                    setTimeout(() => {
                        uploadIcon.textContent = '📤';
                        uploadIcon.style.color = 'var(--primary-color)';
                        uploadIcon.style.transform = 'scale(1)';
                    }, 2000);
                }
                reader.readAsDataURL(file);
            }
        }

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            handleFileSelection(file);
        });

        removeButton.addEventListener('click', function() {
            imageInput.value = '';
            previewContainer.classList.add('hidden');
            fileNameDisplay.textContent = 'Klik untuk pilih file bukti pembayaran';
            fileNameDisplay.style.color = 'var(--text-secondary)';
            uploadIcon.textContent = '📤';
            uploadIcon.style.color = 'var(--primary-color)';
            uploadIcon.style.transform = 'scale(1)';
        });

        // Jenis pembayaran change handler
        const jenispembayaran = document.getElementById('jenispembayaran');
        const paymentAmountContainer = document.getElementById('paymentAmountContainer');
        const paymentAmountInput = document.getElementById('payment_amount');
        const paymentAmountRaw = document.getElementById('payment_amount_raw');
        const paymentLabel = document.getElementById('payment-label');
        const paymentInfo = document.getElementById('payment-info');
        const paymentDescription = document.getElementById('payment-description');

        const totalBooking = <?= $booking['total'] ?>;
        const dpAmount = Math.round(totalBooking * 0.5);

        function formatNumberID(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function updatePaymentAmount() {
            const jenisValue = jenispembayaran.value;
            
            if (jenisValue === 'DP') {
                // Untuk DP - 50% dari total
                paymentLabel.textContent = '💳 Jumlah DP (Rp)';
                paymentAmountInput.value = formatNumberID(dpAmount);
                paymentAmountRaw.value = dpAmount;
                paymentInfo.textContent = `💡 Minimal Rp ${formatNumberID(dpAmount)} (50% dari total Rp ${formatNumberID(totalBooking)})`;
                paymentDescription.textContent = '💡 DP minimal 50% dari total pembayaran';
                paymentAmountContainer.style.display = 'block';
                
                // Visual feedback
                paymentAmountInput.style.borderColor = 'var(--accent-color)';
                paymentAmountInput.style.backgroundColor = '#FFF9E6';
            } else if (jenisValue === 'Lunas') {
                // Untuk Lunas - total penuh
                paymentLabel.textContent = '✨ Jumlah Pembayaran Lunas (Rp)';
                paymentAmountInput.value = formatNumberID(totalBooking);
                paymentAmountRaw.value = totalBooking;
                paymentInfo.textContent = `💰 Total pembayaran lunas Rp ${formatNumberID(totalBooking)}`;
                paymentDescription.textContent = '✨ Pembayaran lunas untuk semua layanan';
                paymentAmountContainer.style.display = 'block';
                
                // Visual feedback
                paymentAmountInput.style.borderColor = 'var(--success-color)';
                paymentAmountInput.style.backgroundColor = '#F0FDF4';
            }
        }

        jenispembayaran.addEventListener('change', updatePaymentAmount);

        // Metode pembayaran change handler
        const metodePembayaran = document.getElementById('metode_pembayaran');
        const transferInfo = document.getElementById('transferInfo');
        const qrisInfo = document.getElementById('qrisInfo');

        function updatePaymentMethod() {
            const metodeValue = metodePembayaran.value;
            
            if (metodeValue === 'transfer') {
                transferInfo.style.display = 'block';
                qrisInfo.style.display = 'none';
                
                // Visual feedback
                transferInfo.style.borderColor = 'var(--primary-color)';
                transferInfo.style.boxShadow = '0 0 0 2px rgba(0, 102, 204, 0.1)';
            } else if (metodeValue === 'qris') {
                transferInfo.style.display = 'none';
                qrisInfo.style.display = 'block';
                
                // Visual feedback
                qrisInfo.style.borderColor = 'var(--secondary-color)';
                qrisInfo.style.boxShadow = '0 0 0 2px rgba(0, 212, 170, 0.1)';
            }
        }

        metodePembayaran.addEventListener('change', updatePaymentMethod);

        // Initialize form on page load
        console.log('🚀 Initializing payment form...');
        console.log(`📊 Total Booking: Rp ${formatNumberID(totalBooking)}`);
        console.log(`💳 DP Amount: Rp ${formatNumberID(dpAmount)}`);
        
        updatePaymentAmount();
        updatePaymentMethod();
        
        console.log('✅ Payment form initialized successfully!');
    });
</script>
<?= $this->endSection() ?>