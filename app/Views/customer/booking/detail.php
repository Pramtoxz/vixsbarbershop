<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-simple" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); padding: 6rem 0 4rem; position: relative; overflow: hidden;">
    <!-- Decorative Elements -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.1;">
        <div style="position: absolute; top: 20%; left: 10%; width: 100px; height: 100px; background: var(--white); border-radius: 50%; opacity: 0.1;"></div>
        <div style="position: absolute; top: 60%; right: 15%; width: 60px; height: 60px; background: var(--white); border-radius: 50%; opacity: 0.1;"></div>
        <div style="position: absolute; bottom: 30%; left: 20%; width: 80px; height: 80px; background: var(--white); border-radius: 50%; opacity: 0.1;"></div>
    </div>
    
    <div class="container">
        <div style="text-align: center; color: var(--white);">
            <h1 style="color: var(--white); font-size: 2.5rem; margin-bottom: 1rem; font-weight: 700; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                📋 Detail Booking
            </h1>
            <p style="color: rgba(255, 255, 255, 0.9); font-size: 1.125rem; max-width: 600px; margin: 0 auto 2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.2);">
                Kode Booking: <strong><?= $booking['kdbooking'] ?></strong>
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="<?= site_url('customer/booking') ?>" class="btn btn-outline" style="background: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.3); color: white; padding: 0.75rem 1.5rem; border-radius: 50px; text-decoration: none; backdrop-filter: blur(10px); transition: all 0.3s ease;">
                    ← Kembali ke Riwayat
                </a>
                <?php
                // Cek apakah booking expired berdasarkan field expired_at
                $isExpired = isset($booking['expired_at']) && strtotime($booking['expired_at']) < time() && $booking['jenispembayaran'] == 'Belum Bayar';
                $needsPayment = $booking['total'] > $booking['jumlahbayar'] && $booking['jenispembayaran'] !== 'Lunas';

                if ($needsPayment && !$isExpired && $booking['status'] !== 'expired'):
                ?>
                    <a href="<?= site_url('customer/booking/payment/' . $booking['kdbooking']) ?>" class="btn btn-primary btn-enhanced" style="background: var(--accent-color); color: var(--text-primary); padding: 0.75rem 1.5rem; border-radius: 50px; text-decoration: none;">
                        <span class="btn-text">💳 Lanjutkan Pembayaran</span>
                        <span class="btn-shine"></span>
                    </a>
                <?php endif; ?>
                <button id="btnPrint" class="btn btn-primary btn-enhanced" style="padding: 0.75rem 1.5rem; border-radius: 50px; border: none; cursor: pointer;" onclick="printFaktur()">
                    <span class="btn-text">🖨️ Cetak Faktur</span>
                    <span class="btn-shine"></span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <?php if ($isExpired || $booking['status'] === 'expired'): ?>
            <div class="card animate-fade-in-up" style="background: var(--error-light); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--error-color); margin-bottom: 2rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 40px; height: 40px; background: var(--error-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <span style="font-size: 1.25rem; color: var(--white);">⚠️</span>
                    </div>
                    <div>
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--error-dark); margin-bottom: 0.5rem;">Booking Telah Expired</h3>
                        <p style="color: var(--error-color); font-size: 0.875rem;">
                            Waktu pembayaran telah habis dan booking otomatis dibatalkan. 
                            <a href="<?= site_url('customer/booking/create') ?>" style="font-weight: 600; text-decoration: underline; color: var(--error-dark);">Buat booking baru</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Detail Booking Card -->
        <div class="card animate-fade-in-up" style="padding: 2rem; margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <span style="font-size: 1.5rem; color: white;">📋</span>
                </div>
                <h2 style="font-size: 1.5rem; font-weight: 600; color: var(--text-primary);">📋 Detail Booking</h2>
            </div>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="p-4 sm:p-6">
                <div id="printArea">
                    <!-- Faktur untuk dicetak -->
                    <div id="fakturPrint">
                        <!-- Header -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-4 sm:pb-6 border-b gap-4">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center w-full sm:w-auto">
                                <!-- <div class="mr-0 sm:mr-4 mb-2 sm:mb-0">
                                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="h-8 sm:h-10">
                                </div> -->
                                <div>
                                    <h2 class="text-lg sm:text-xl font-bold text-black">Vixs Barbershop</h2>
                                    <p class="text-xs sm:text-sm text-gray-700">Jl. Adinegoro No.16, Batang Kabung Ganting, Kec. Koto Tangah Kota Padang, Sumatera Barat 25586</p>
                                    <p class="text-xs sm:text-sm text-gray-700">Telp: (021) 123-4567</p>
                                </div>
                            </div>
                            <div class="text-left sm:text-right w-full sm:w-auto">
                                <h3 class="text-lg sm:text-xl font-bold text-gray-800">INVOICE #<?= $booking['kdbooking'] ?></h3>
                                <p class="text-xs sm:text-sm text-gray-700">
                                    Tanggal Invoice: <?= date('d F Y') ?><br>
                                    Tanggal Booking: <?= date('d F Y', strtotime($booking['tanggal_booking'])) ?>
                                </p>
                                <span class="inline-block mt-2 py-1 px-3 
                                    <?php
                                    switch ($booking['status']) {
                                        case 'pending':
                                            echo 'bg-yellow-100 text-yellow-800';
                                            break;
                                        case 'confirmed':
                                            echo 'bg-blue-100 text-blue-800';
                                            break;
                                        case 'completed':
                                            echo 'bg-green-100 text-green-800';
                                            break;
                                        case 'cancelled':
                                            echo 'bg-red-100 text-red-800';
                                            break;
                                        case 'no-show':
                                            echo 'bg-gray-100 text-gray-800';
                                            break;
                                        default:
                                            echo 'bg-gray-100 text-gray-800';
                                    }
                                    ?>
                                    text-xs font-medium rounded-full">
                                    <?php
                                    switch ($booking['status']) {
                                        case 'pending':
                                            echo 'Menunggu Konfirmasi';
                                            break;
                                        case 'confirmed':
                                            echo 'Terkonfirmasi';
                                            break;
                                        case 'completed':
                                            echo 'Selesai';
                                            break;
                                        case 'cancelled':
                                            echo 'Dibatalkan';
                                            break;
                                        case 'no-show':
                                            echo 'Tidak Hadir';
                                            break;
                                        default:
                                            echo $booking['status'];
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>

                        <!-- Watermark -->
                        <?php if ($booking['total'] <= $booking['jumlahbayar']): ?>
                            <div class="faktur-watermark lunas text-green-500 font-bold">LUNAS</div>
                        <?php else: ?>
                            <div class="faktur-watermark belum-lunas text-red-500 font-bold">BELUM LUNAS</div>
                        <?php endif; ?>

                <!-- Informasi Booking -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                    <!-- Info Pelanggan -->
                    <div style="background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                            <span style="font-size: 1.25rem; color: var(--primary-color);">👤</span>
                            <h4 style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">👤 Informasi Pelanggan</h4>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">Nama:</span>
                                <span style="color: var(--text-primary); font-size: 0.875rem; font-weight: 600;"><?= $booking['nama_lengkap'] ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">No HP:</span>
                                <span style="color: var(--text-primary); font-size: 0.875rem;"><?= $booking['no_hp'] ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">Email:</span>
                                <span style="color: var(--text-primary); font-size: 0.875rem;"><?= $booking['email'] ?? '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Info Booking -->
                    <div style="background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                            <span style="font-size: 1.25rem; color: var(--primary-color);">📅</span>
                            <h4 style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">📅 Informasi Booking</h4>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">Kode:</span>
                                <span style="color: var(--text-primary); font-size: 0.875rem; font-weight: 600;"><?= $booking['kdbooking'] ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">Tanggal:</span>
                                <span style="color: var(--text-primary); font-size: 0.875rem;"><?= date('d F Y', strtotime($booking['tanggal_booking'])) ?></span>
                            </div>
                            <?php if (!empty($details) && isset($details[0])): ?>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="color: var(--text-secondary); font-size: 0.875rem;">Waktu:</span>
                                    <span style="color: var(--text-primary); font-size: 0.875rem;"><?= $details[0]['jamstart'] ?> - <?= $details[0]['jamend'] ?></span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="color: var(--text-secondary); font-size: 0.875rem;">Karyawan:</span>
                                    <span style="color: var(--text-primary); font-size: 0.875rem;"><?= $details[0]['idkaryawan'] ? ($details[0]['nama_karyawan'] ?? 'Unknown') : 'Belum ditentukan' ?></span>
                                </div>
                            <?php endif; ?>

                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">Status Bayar:</span>
                                <?php if ($booking['jenispembayaran'] == 'Belum Bayar'): ?>
                                    <span style="display: inline-block; padding: 0.25rem 0.5rem; border-radius: 50px; font-size: 0.75rem; background: var(--error-light); color: var(--error-dark);">Belum Bayar</span>
                                <?php elseif ($booking['jenispembayaran'] == 'DP' && $booking['total'] > $booking['jumlahbayar']): ?>
                                    <span style="display: inline-block; padding: 0.25rem 0.5rem; border-radius: 50px; font-size: 0.75rem; background: var(--warning-light); color: var(--warning-dark);">DP (<?= round(($booking['jumlahbayar'] / $booking['total']) * 100) ?>%)</span>
                                <?php elseif ($booking['total'] <= $booking['jumlahbayar']): ?>
                                    <span style="display: inline-block; padding: 0.25rem 0.5rem; border-radius: 50px; font-size: 0.75rem; background: var(--success-light); color: var(--success-dark);">Lunas</span>
                                <?php else: ?>
                                    <span style="display: inline-block; padding: 0.25rem 0.5rem; border-radius: 50px; font-size: 0.75rem; background: var(--error-light); color: var(--error-dark);">Belum Bayar</span>
                                <?php endif; ?>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">Status:</span>
                                <span style="display: inline-block; padding: 0.25rem 0.5rem; border-radius: 50px; font-size: 0.75rem; 
                                <?php
                                // Cek apakah booking expired berdasarkan field expired_at
                                $isExpired = isset($booking['expired_at']) && strtotime($booking['expired_at']) < time() && $booking['jenispembayaran'] == 'Belum Bayar';

                                if ($isExpired) {
                                    echo 'background: var(--error-light); color: var(--error-dark);';
                                } else {
                                    switch ($booking['status']) {
                                        case 'pending':
                                            echo 'background: var(--warning-light); color: var(--warning-dark);';
                                            break;
                                        case 'confirmed':
                                            echo 'background: var(--info-light); color: var(--info-dark);';
                                            break;
                                        case 'completed':
                                            echo 'background: var(--success-light); color: var(--success-dark);';
                                            break;
                                        case 'cancelled':
                                            echo 'background: var(--error-light); color: var(--error-dark);';
                                            break;
                                        case 'expired':
                                            echo 'background: var(--error-light); color: var(--error-dark);';
                                            break;
                                        case 'no-show':
                                            echo 'background: var(--gray-200); color: var(--text-secondary);';
                                            break;
                                        default:
                                            echo 'background: var(--gray-200); color: var(--text-secondary);';
                                    }
                                }
                                ?>">
                                    <?php
                                    if ($isExpired) {
                                        echo 'Expired';
                                    } else {
                                        switch ($booking['status']) {
                                            case 'pending':
                                                echo 'Pending';
                                                break;
                                            case 'confirmed':
                                                echo 'Terkonfirmasi';
                                                break;
                                            case 'completed':
                                                echo 'Selesai';
                                                break;
                                            case 'cancelled':
                                                echo 'Dibatalkan';
                                                break;
                                            case 'expired':
                                                echo 'Expired';
                                                break;
                                            case 'no-show':
                                                echo 'Tidak Hadir';
                                                break;
                                            default:
                                                echo $booking['status'];
                                        }
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Layanan -->
                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200); margin-bottom: 2rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <span style="font-size: 1.25rem; color: var(--primary-color);">✂️</span>
                        <h4 style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">✂️ Detail Layanan</h4>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <?php if (!empty($details)): ?>
                            <?php foreach ($details as $detail): ?>
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid var(--gray-200);">
                                    <div>
                                        <div style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);"><?= $detail['nama_paket'] ?></div>
                                        <div style="font-size: 0.75rem; color: var(--text-secondary);"><?= $detail['deskripsi'] ?></div>
                                    </div>
                                    <div style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">Rp <?= number_format($detail['harga'], 0, ',', '.') ?></div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div style="text-align: center; color: var(--text-secondary); padding: 1.5rem;">Tidak ada data layanan</div>
                        <?php endif; ?>
                        
                        <!-- Total -->
                        <div style="border-top: 1px solid var(--gray-300); padding-top: 1rem; display: flex; flex-direction: column; gap: 0.75rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">Total:</span>
                                <span style="font-size: 0.875rem; font-weight: 700; color: var(--text-primary);">Rp <?= number_format($booking['total'] ?? 0, 0, ',', '.') ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">Dibayar:</span>
                                <span style="font-size: 0.875rem; font-weight: 600; color: var(--success-color);">Rp <?= number_format($booking['jumlahbayar'] ?? 0, 0, ',', '.') ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">Sisa:</span>
                                <span style="font-size: 0.875rem; font-weight: 600; color: <?= (($booking['total'] ?? 0) - ($booking['jumlahbayar'] ?? 0) > 0) ? 'var(--error-color)' : 'var(--success-color)' ?>;">Rp <?= number_format(($booking['total'] ?? 0) - ($booking['jumlahbayar'] ?? 0), 0, ',', '.') ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                            <!-- Ringkasan Status Pembayaran -->
                            <div style="margin-bottom: 2rem;">
                                <h4 style="font-size: 0.875rem; text-transform: uppercase; color: var(--text-secondary); font-weight: 600; margin-bottom: 0.75rem;">💳 Status Pembayaran</h4>
                                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
                                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                                        <!-- Status -->
                                        <div style="flex: 1;">
                                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                                                <div style="border-radius: 50%; padding: 0.5rem; <?php if ($booking['total'] <= $booking['jumlahbayar']): ?>background: var(--success-light); color: var(--success-color);<?php elseif ($booking['jenispembayaran'] == 'DP'): ?>background: var(--warning-light); color: var(--warning-color);<?php else: ?>background: var(--error-light); color: var(--error-color);<?php endif; ?>">
                                                    <?php if ($booking['total'] <= $booking['jumlahbayar']): ?>
                                                        <span style="font-size: 1.25rem;">✅</span>
                                                    <?php elseif ($booking['jenispembayaran'] == 'DP'): ?>
                                                        <span style="font-size: 1.25rem;">⏰</span>
                                                    <?php else: ?>
                                                        <span style="font-size: 1.25rem;">💰</span>
                                                    <?php endif; ?>
                                                </div>
                                                <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary);">
                                                    <?php if ($booking['total'] <= $booking['jumlahbayar']): ?>
                                                        Pembayaran Lunas
                                                    <?php elseif ($booking['jenispembayaran'] == 'DP'): ?>
                                                        Pembayaran DP (<?= round(($booking['jumlahbayar'] / $booking['total']) * 100) ?>%)
                                                    <?php else: ?>
                                                        Belum Bayar
                                                    <?php endif; ?>
                                                </h3>
                                            </div>
                                            <p style="color: var(--text-secondary); margin-left: 2.5rem;">
                                                <?php if ($booking['total'] <= $booking['jumlahbayar']): ?>
                                                    Anda telah melunasi seluruh pembayaran untuk booking ini.
                                                <?php elseif ($booking['jenispembayaran'] == 'DP'): ?>
                                                    Anda telah membayar DP sebesar Rp <?= number_format($booking['jumlahbayar'], 0, ',', '.') ?>.
                                                    Sisa pembayaran: Rp <?= number_format($booking['total'] - $booking['jumlahbayar'], 0, ',', '.') ?>.
                                                <?php else: ?>
                                                    Anda belum melakukan pembayaran untuk booking ini.
                                                <?php endif; ?>
                                            </p>
                                        </div>

                                        <!-- Progress Bar -->
                                        <div style="flex: 1;">
                                            <div style="margin-bottom: 0.75rem;">
                                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                                    <span style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">📊 Progress Pembayaran</span>
                                                    <span style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">
                                                        <?php
                                                        $percentage = $booking['total'] > 0 ?
                                                            round(($booking['jumlahbayar'] / $booking['total']) * 100) : 0;
                                                        echo $percentage . '%';
                                                        ?>
                                                    </span>
                                                </div>
                                                <div style="width: 100%; background: var(--gray-200); border-radius: 50px; height: 0.75rem; overflow: hidden;">
                                                    <div style="<?php if ($booking['total'] <= $booking['jumlahbayar']): ?>background: var(--success-color);<?php elseif ($booking['jenispembayaran'] == 'DP'): ?>background: var(--warning-color);<?php else: ?>background: var(--error-color);<?php endif; ?> height: 100%; border-radius: 50px; transition: width 0.3s ease; width: <?= $percentage ?>%;"></div>
                                                </div>
                                            </div>
                                            <div style="display: flex; justify-content: space-between; font-size: 0.875rem; color: var(--text-secondary);">
                                                <span>Rp 0</span>
                                                <span>Rp <?= number_format($booking['total'], 0, ',', '.') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if (!empty($pembayaran)): ?>
                                <!-- Payment History -->
                                <div style="margin-bottom: 2rem;">
                                    <h4 style="font-size: 0.875rem; text-transform: uppercase; color: var(--text-secondary); font-weight: 600; margin-bottom: 0.75rem;">💰 Riwayat Pembayaran</h4>
                                    <div style="background: var(--gray-50); border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--gray-200);">
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <thead>
                                                <tr style="background: var(--gray-100);">
                                                    <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: var(--text-primary); text-transform: uppercase;">Tanggal</th>
                                                    <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: var(--text-primary); text-transform: uppercase;">Metode</th>
                                                    <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: var(--text-primary); text-transform: uppercase;">Status</th>
                                                    <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: var(--text-primary); text-transform: uppercase;">Jenis</th>
                                                    <th style="padding: 0.75rem 1rem; text-align: right; font-size: 0.75rem; font-weight: 600; color: var(--text-primary); text-transform: uppercase;">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pembayaran as $bayar): ?>
                                                    <tr style="border-top: 1px solid var(--gray-200);">
                                                        <td style="padding: 0.75rem 1rem; color: var(--text-primary);"><?= date('d/m/Y H:i', strtotime($bayar['created_at'])) ?></td>
                                                        <td style="padding: 0.75rem 1rem; color: var(--text-primary);"><?= ucfirst($bayar['metode']) ?></td>
                                                        <td style="padding: 0.75rem 1rem;">
                                                            <span style="display: inline-block; padding: 0.25rem 0.5rem; border-radius: 50px; font-size: 0.75rem; <?= $bayar['status'] == 'paid' ? 'background: var(--success-light); color: var(--success-dark);' : 'background: var(--warning-light); color: var(--warning-dark);' ?>">
                                                                <?= $bayar['status'] == 'paid' ? 'Dibayar' : 'Belum Dibayar' ?>
                                                            </span>
                                                        </td>
                                                        <td style="padding: 0.75rem 1rem;">
                                                            <span style="display: inline-block; padding: 0.25rem 0.5rem; border-radius: 50px; font-size: 0.75rem; <?= ($bayar['jenis'] ?? '') == 'DP' ? 'background: var(--warning-light); color: var(--warning-dark);' : 'background: var(--info-light); color: var(--info-dark);' ?>">
                                                                <?= ($bayar['jenis'] ?? 'Lunas') ?>
                                                            </span>
                                                        </td>
                                                        <td style="padding: 0.75rem 1rem; text-align: right; color: var(--text-primary);">Rp <?= number_format($bayar['total_bayar'], 0, ',', '.') ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Notes -->
                            <div style="margin-bottom: 2rem;">
                                <h4 style="font-size: 0.875rem; text-transform: uppercase; color: var(--text-secondary); font-weight: 600; margin-bottom: 0.75rem;">📝 Catatan</h4>
                                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--gray-200);">
                                    <p style="font-size: 0.875rem; color: var(--text-primary); line-height: 1.6;">
                                        1. Harap datang 10 menit sebelum jadwal yang ditentukan.<br>
                                        2. Jika tidak datang maka dp akan hangus<br>
                                        3. Pelanggan tidak dapat membatalkan booking<br>
                                        4. Sisa pembayaran dilakukan setelah layanan selesai.
                                    </p>
                                </div>
                            </div>

                            <?php
                            // Cek apakah booking expired berdasarkan field expired_at jika belum didefinisikan
                            if (!isset($isExpired)) {
                                $isExpired = isset($booking['expired_at']) && strtotime($booking['expired_at']) < time() && $booking['jenispembayaran'] == 'Belum Bayar';
                            }

                            // Cek apakah sudah ada pembayaran sebelumnya (tidak peduli jumlahnya)
                            $hasPreviousPayment = !empty($pembayaran);

                            // Tampilkan tombol bayar hanya jika belum ada pembayaran, tidak expired, dan bukan lunas
                            if ($booking['jenispembayaran'] == 'Belum Bayar' && $booking['status'] !== 'expired' && !$isExpired):
                            ?>
                                <!-- Payment Action -->
                                <div class="card animate-fade-in-up no-print" style="background: var(--info-light); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--info-color); text-align: center; margin-bottom: 2rem;">
                                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--info-dark); margin-bottom: 0.75rem;">💳 Lanjutkan Pembayaran</h4>
                                    <p style="color: var(--info-color); margin-bottom: 1.5rem;">Silahkan melakukan pembayaran sebesar <span style="font-weight: 700;">Rp <?= number_format($booking['total'], 0, ',', '.') ?></span></p>
                                    <a href="<?= site_url('customer/booking/payment/' . $booking['kdbooking']) ?>" class="btn btn-primary btn-enhanced" style="display: inline-block; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: var(--white); font-weight: 600; padding: 0.75rem 1.5rem; border-radius: var(--radius-lg); text-decoration: none; transition: all 0.3s ease; transform: scale(1); box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3);">
                                        <span class="btn-text" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                            <span style="font-size: 1.25rem;">💰</span>
                                            Bayar Sekarang
                                        </span>
                                        <span class="btn-shine"></span>
                                    </a>
                                </div>
                            <?php elseif (($isExpired || $booking['status'] === 'expired') && $booking['jenispembayaran'] == 'Belum Bayar'): ?>
                                <!-- Expired Payment Warning -->
                                <div class="card animate-fade-in-up" style="background: var(--error-light); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid var(--error-color); text-align: center; margin-bottom: 2rem;">
                                    <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                                        <span style="font-size: 1.5rem; color: var(--error-color);">⚠️</span>
                                        <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--error-dark);">Waktu Pembayaran Habis</h4>
                                    </div>
                                    <p style="color: var(--error-color); margin-bottom: 1.5rem;">Booking ini telah dibatalkan karena melewati batas waktu pembayaran.</p>
                                    <a href="<?= site_url('customer/booking/create') ?>" class="btn btn-secondary" style="display: inline-block; background: var(--error-color); color: var(--white); font-weight: 600; padding: 0.75rem 1.5rem; border-radius: var(--radius-md); text-decoration: none; transition: all 0.3s ease;">
                                        <span style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                            <span style="font-size: 1.25rem;">➕</span>
                                            Buat Booking Baru
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <!-- Action Buttons -->
                            <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 1.5rem;" class="sm:flex-row">
                                <a href="<?= site_url('customer/booking') ?>" class="btn btn-secondary" style="background: var(--gray-200); color: var(--text-primary); font-weight: 600; padding: 0.75rem 1.5rem; border-radius: var(--radius-md); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                    <span style="font-size: 1.25rem;">←</span>
                                    Kembali ke Riwayat
                                </a>
                                <?php if ($booking['jenispembayaran'] == 'Belum Bayar' && $booking['status'] !== 'expired' && !$isExpired): ?>
                                    <a href="<?= site_url('customer/booking/payment/' . $booking['kdbooking']) ?>" class="btn btn-enhanced" style="background: var(--success-color); color: var(--white); font-weight: 600; padding: 0.75rem 1.5rem; border-radius: var(--radius-md); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                        <span style="font-size: 1.25rem;">💳</span>
                                        Bayar Sekarang
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>

                        <!-- Footer -->
                        <div class="pt-6 border-t">
                            <div class="text-center">
                                <p class="text-sm text-gray-700">Terima kasih telah menggunakan layanan kami</p>
                                <p class="text-xs text-gray-600 mt-1">© <?= date('Y') ?> Vixs Barbershop - Faktur ini sah tanpa tanda tangan</p>
                                <p class="text-xs text-gray-500 mt-1">Dicetak pada: <?= date('d/m/Y H:i:s') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk mencetak faktur
        function printFaktur() {
            // Simpan konten asli
            const printContents = document.getElementById('fakturPrint').innerHTML;
            const originalContents = document.body.innerHTML;

            // Persiapkan halaman cetak
            const printStyles = `
                <style>
                    @media print {
                        body { 
                            font-family: Arial, sans-serif; 
                            padding: 0;
                            margin: 0;
                            color: #333;
                            height: 100%;
                            overflow: hidden;
                        }
                        html {
                            height: 100%;
                            overflow: hidden;
                        }
                        .faktur-watermark {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%) rotate(-45deg);
                            font-size: 60px;
                            opacity: 0.15;
                            z-index: 1000;
                        }
                        table { width: 100%; border-collapse: collapse; }
                        th, td { padding: 2px !important; text-align: left; }
                        thead { background-color: #f3f4f6 !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .no-print { display: none !important; }
                        .rounded-lg { border-radius: 4px; }
                        .rounded-full { border-radius: 9999px; }
                        .bg-gray-50 { background-color: #f9fafb !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .bg-gray-100 { background-color: #f3f4f6 !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .bg-blue-50 { background-color: #eff6ff !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .bg-red-50 { background-color: #fef2f2 !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .bg-green-50 { background-color: #f0fdf4 !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .bg-yellow-50 { background-color: #fffbeb !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .bg-white { background-color: #ffffff !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .text-gray-600 { color: #4b5563 !important; }
                        .text-gray-700 { color: #374151 !important; }
                        .text-gray-800 { color: #1f2937 !important; }
                        .font-medium { font-weight: 500 !important; }
                        .font-bold { font-weight: 700 !important; }
                        .border { border: 1px solid #e5e7eb !important; }
                        .border-t { border-top: 1px solid #e5e7eb !important; }
                        .border-b { border-bottom: 1px solid #e5e7eb !important; }
                        .mt-1 { margin-top: 0.15rem !important; }
                        .mt-2 { margin-top: 0.25rem !important; }
                        .mb-2 { margin-bottom: 0.25rem !important; }
                        .mb-4 { margin-bottom: 0.5rem !important; }
                        .mb-8 { margin-bottom: 0.75rem !important; }
                        .p-4 { padding: 0.5rem !important; }
                        .p-5 { padding: 0.5rem !important; }
                        .p-6 { padding: 0.5rem !important; }
                        .py-3 { padding-top: 0.25rem !important; padding-bottom: 0.25rem !important; }
                        .px-4 { padding-left: 0.5rem !important; padding-right: 0.5rem !important; }
                        .text-center { text-align: center !important; }
                        .text-right { text-align: right !important; }
                        .text-sm { font-size: 0.75rem !important; }
                        .text-xs { font-size: 0.65rem !important; }
                        .text-lg { font-size: 0.9rem !important; }
                        .text-xl { font-size: 1rem !important; }
                        .text-3xl { font-size: 1.25rem !important; }
                        .uppercase { text-transform: uppercase !important; }
                        .inline-block { display: inline-block !important; }
                        .py-1 { padding-top: 0.15rem !important; padding-bottom: 0.15rem !important; }
                        .px-2 { padding-left: 0.25rem !important; padding-right: 0.25rem !important; }
                        .text-green-800 { color: #065f46 !important; }
                        .bg-green-100 { background-color: #d1fae5 !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .text-red-800 { color: #991b1b !important; }
                        .bg-red-100 { background-color: #fee2e2 !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .text-yellow-800 { color: #92400e !important; }
                        .bg-yellow-100 { background-color: #fef3c7 !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .text-blue-800 { color: #1e40af !important; }
                        .bg-blue-100 { background-color: #dbeafe !important; print-color-adjust: exact; -webkit-print-color-adjust: exact; }
                        .grid { display: grid !important; }
                        .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) !important; }
                        .gap-6 { gap: 0.75rem !important; }
                        
                        /* Tambahan untuk memastikan tampilan cetak baik */
                        @page {
                            size: A4 portrait;
                            margin: 5mm;
                        }
                        
                        /* Pastikan konten muat dalam satu halaman */
                        #faktur-container {
                            width: 100%;
                            max-width: 100%;
                            box-sizing: border-box;
                            page-break-after: avoid;
                            page-break-before: avoid;
                            page-break-inside: avoid;
                            font-size: 10px;
                            transform: scale(0.85);
                            transform-origin: top center;
                            max-height: 100%;
                            overflow: hidden;
                            background-color: #fff;
                            color-adjust: exact;
                            print-color-adjust: exact;
                            -webkit-print-color-adjust: exact;
                        }
                        
                        /* Sembunyikan elemen yang tidak perlu dicetak */
                        button, .btn-primary, .btn-secondary, a.btn-primary, a.btn-secondary, .no-print {
                            display: none !important;
                        }
                        
                        /* Ukuran teks yang lebih kecil untuk muat di satu halaman */
                        h1, h2, h3, h4 { 
                            font-size: 90% !important;
                            margin: 2px 0 !important;
                        }
                        p { 
                            font-size: 80% !important; 
                            margin: 2px 0 !important;
                            line-height: 1.2 !important;
                        }
                        th, td { 
                            padding: 2px !important; 
                            font-size: 80% !important;
                            line-height: 1.2 !important;
                        }
                        
                        /* Kurangi spasi pada tabel */
                        table {
                            margin-bottom: 0.5rem !important;
                        }
                        tbody tr td, thead tr th {
                            padding: 2px 4px !important;
                        }
                        
                        /* Kurangi ukuran logo */
                        img.h-8 {
                            height: 30px !important;
                        }
                        
                        /* Kurangi spasi pada header dan footer */
                        .pb-6 {
                            padding-bottom: 0.5rem !important;
                        }
                        .pt-6 {
                            padding-top: 0.5rem !important;
                        }
                        
                        /* Mencegah halaman kosong */
                        * {
                            print-color-adjust: exact !important;
                            -webkit-print-color-adjust: exact !important;
                            color-adjust: exact !important;
                        }
                        
                        /* Mencegah halaman tambahan */
                        #faktur-print-wrapper {
                            height: 100%;
                            overflow: hidden;
                            position: relative;
                            page-break-after: avoid;
                            background-color: #fff;
                        }
                        
                        /* Hapus footer halaman */
                        @page {
                            margin-bottom: 0;
                        }
                        
                        /* Pastikan background warna muncul */
                        .bg-white {
                            background-color: #fff !important;
                            print-color-adjust: exact;
                            -webkit-print-color-adjust: exact;
                        }
                    }
                </style>
            `;

            // Ganti konten body dengan konten yang akan dicetak
            document.body.innerHTML = printStyles + '<div id="faktur-print-wrapper"><div id="faktur-container" style="padding: 8px;">' + printContents + '</div></div>';

            // Cetak
            setTimeout(() => {
                window.print();

                // Kembalikan konten asli
                setTimeout(() => {
                    document.body.innerHTML = originalContents;

                    // Reinisialisasi event listener setelah konten dikembalikan
                    setTimeout(function() {
                        document.getElementById('btnPrint').addEventListener('click', printFaktur);
                    }, 100);
                }, 100);
            }, 100);
        }

        // Tambahkan event listener ke tombol cetak
        document.getElementById('btnPrint').addEventListener('click', printFaktur);

        function checkExpiredBooking() {
            const kdbooking = '<?= $booking['kdbooking'] ?>';
            const jenispembayaran = '<?= $booking['jenispembayaran'] ?>';
            const status = '<?= $booking['status'] ?>';

            // Hanya periksa jika belum bayar dan status masih pending
            if (jenispembayaran === 'Belum Bayar' && status === 'pending') {
                // Periksa apakah booking sudah expired
                <?php if (isset($booking['expired_at'])): ?>
                    const expiredAt = new Date('<?= $booking['expired_at'] ?>').getTime();
                    const now = new Date().getTime();

                    if (now > expiredAt) {
                        // Kirim permintaan AJAX untuk memperbarui status booking menjadi expired
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
                                    // Refresh halaman untuk menampilkan status terbaru
                                    window.location.reload();
                                } else {
                                    console.error('Gagal memperbarui status booking:', data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                <?php endif; ?>
            }
        }

        // Jalankan pemeriksaan saat halaman dimuat
        checkExpiredBooking();

        // Jalankan pemeriksaan setiap 30 detik
        setInterval(checkExpiredBooking, 30000);

        // Tambahkan pemeriksaan global menggunakan cron endpoint
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
                        // Reload halaman jika ada booking yang diperbarui
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error checking expired bookings:', error);
                });
        }

        // Jalankan pemeriksaan global setiap 60 detik
        setInterval(checkAllExpiredBookings, 60000);
    });
</script>
<?= $this->endSection() ?>