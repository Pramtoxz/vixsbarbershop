<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-simple" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem 0 4rem; position: relative; overflow: hidden;">
    <!-- Decorative Elements -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'40\' height=\'40\' viewBox=\'0 0 40 40\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Ccircle cx=\'10\' cy=\'10\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'10\' r=\'1\'/%3E%3Ccircle cx=\'10\' cy=\'30\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E') repeat;"></div>
    
    <div class="container">
        <div class="text-center text-white">
            <h1 class="section-title" style="color: white; font-size: 2.5rem; margin-bottom: 1rem; font-weight: 700;">
                ✨ Buat Booking Baru
            </h1>
            <p class="section-description" style="color: rgba(255, 255, 255, 0.9); font-size: 1.125rem; max-width: 600px; margin: 0 auto 2rem;">
                Pilih layanan terbaik kami dan jadwalkan kunjungan Anda dengan mudah
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="<?= site_url('customer/booking') ?>" class="btn btn-outline" style="background: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.3); color: white; padding: 0.75rem 1.5rem; border-radius: 50px; text-decoration: none; backdrop-filter: blur(10px);">
                    ← Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Modal untuk data profil tidak lengkap -->
<?php if (!$isProfileComplete): ?>
    <div id="profileIncompleteModal" class="modal-overlay" style="position: fixed; inset: 0; z-index: 50; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.6); backdrop-filter: blur(5px);">
        <div class="card animate-fade-in-up" style="max-width: 500px; margin: 1rem; padding: 2rem;">
            <div style="text-align: center; margin-bottom: 2rem;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FEF3C7, #FDE68A); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <svg style="width: 40px; height: 40px; color: #92400E;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">
                    ⚠️ Profil Belum Lengkap
                </h3>
                <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                    Untuk melakukan booking, Anda perlu melengkapi data profil terlebih dahulu. Pastikan data diri Anda sudah lengkap.
                </p>
            </div>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center;">
                <a href="<?= site_url('customer/profil') ?>" class="btn btn-primary btn-enhanced">
                    <span class="btn-text">✨ Lengkapi Profil</span>
                    <span class="btn-shine"></span>
                </a>
                <a href="<?= site_url('/') ?>" class="btn btn-outline">
                    <span>← Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Modal Sukses Booking -->
<div id="booking-success-modal" style="position: fixed; inset: 0; z-index: 50; display: none; align-items: center; justify-content: center;">
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(5px); transition: opacity 0.3s;"></div>
    <div class="card animate-fade-in-up" style="max-width: 500px; margin: 1rem; padding: 3rem; position: relative; transform: scale(1); transition: all 0.3s;">
        <div style="text-align: center;">
            <div style="width: 100px; height: 100px; margin: 0 auto 2rem; background: linear-gradient(135deg, var(--success-color), #10B981); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);">
                <svg style="width: 50px; height: 50px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-primary);">🎉 Booking Berhasil!</h2>
            <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 1.125rem; line-height: 1.6;">
                Booking Anda berhasil dibuat. Anda akan dialihkan ke halaman pembayaran dalam beberapa saat.
            </p>
            <div style="width: 100%; background: var(--gray-200); border-radius: 50px; height: 8px; margin-bottom: 1rem; overflow: hidden;">
                <div id="countdown-bar" style="background: linear-gradient(90deg, var(--success-color), #10B981); height: 100%; border-radius: 50px; transition: width 3s linear;"></div>
            </div>
            <div style="color: var(--text-secondary); font-size: 0.875rem;">
                <span id="countdown-timer">3</span> detik...
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <div class="section-header" style="margin-bottom: 3rem;">
            <h2 class="section-title">📋 Form Booking Layanan</h2>
            <p class="section-description">
                Isi formulir berikut untuk memesan layanan terbaik kami dengan mudah dan cepat
            </p>
        </div>

        <?php if (!$isProfileComplete): ?>
            <div class="card animate-fade-in-up" style="margin-bottom: 2rem; padding: 2rem; background: linear-gradient(135deg, #FEF3C7, #FDE68A); border: 2px solid #F59E0B; box-shadow: 0 8px 25px rgba(245, 158, 11, 0.2);">
                <div style="display: flex; align-items: center; gap: 1.5rem;">
                    <div style="width: 60px; height: 60px; background: #92400E; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 15px rgba(146, 64, 14, 0.3);">
                        <svg style="width: 30px; height: 30px; color: #FEF3C7;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: #92400E; margin-bottom: 0.5rem;">
                            ⚠️ Profil Belum Lengkap
                        </h3>
                        <p style="color: #78350F; margin-bottom: 1rem; line-height: 1.6;">
                            Data profil Anda belum lengkap. Harap lengkapi data profil terlebih dahulu untuk melanjutkan booking.
                        </p>
                        <a href="<?= site_url('customer/profil') ?>" class="btn btn-outline" style="padding: 0.75rem 1.5rem; border-radius: 50px; text-decoration: none; border-color: #92400E; color: #92400E;">
                            <span>✨ Lengkapi Profil Sekarang</span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Informasi Penting -->
        <div class="card animate-fade-in-up" style="margin-bottom: 2rem; padding: 1.5rem; background: linear-gradient(135deg, #FEF3C7, #FDE68A); border: 1px solid #F59E0B;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 50px; height: 50px; background: #92400E; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg style="width: 24px; height: 24px; color: #FEF3C7;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: #92400E; margin-bottom: 0.5rem;">
                        ⏰ Perhatian: Batas Waktu Pembayaran
                    </h3>
                    <p style="color: #78350F; margin: 0; font-size: 0.875rem;">
                        Setelah booking berhasil dibuat, Anda memiliki waktu <strong>5 menit</strong> untuk menyelesaikan pembayaran. 
                        Jika melewati batas waktu, booking akan otomatis dibatalkan.
                    </p>
                </div>
            </div>
        </div>

        <div class="card animate-fade-in-up" style="padding: 2rem;">
            <!-- Alert element sudah tidak digunakan - menggunakan SweetAlert2 -->

            <form id="bookingForm" style="display: flex; flex-direction: column; gap: 2rem;" enctype="multipart/form-data">
                <!-- Data Pelanggan -->
                <div style="background: linear-gradient(135deg, var(--white), var(--gray-50)); padding: 2rem; border-radius: 1rem; border: 1px solid var(--gray-200);">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary);">
                            👤 Data Pelanggan
                        </h2>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">📝 Nama Lengkap</label>
                            <input type="text" 
                                   style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--gray-100); color: var(--text-secondary); font-size: 1rem;" 
                                   value="<?= $pelanggan['nama_lengkap'] ?>" 
                                   readonly>
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">📱 No. HP</label>
                            <input type="text" 
                                   style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--gray-100); color: var(--text-secondary); font-size: 1rem;" 
                                   value="<?= $pelanggan['no_hp'] ?>" 
                                   readonly>
                        </div>
                    </div>
                </div>

                <!-- Data Booking -->
                <div style="background: linear-gradient(135deg, var(--white), var(--gray-50)); padding: 2rem; border-radius: 1rem; border: 1px solid var(--gray-200);">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--secondary-color), #4ECDC4); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary);">
                            📅 Informasi Booking
                        </h2>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 2rem;">
                        <?php if ($selectedPaket): ?>
                            <!-- Paket yang dipilih dari landing page -->
                            <div style="background: linear-gradient(135deg, var(--white), var(--gray-50)); padding: 2rem; border-radius: 1rem; border: 2px solid var(--primary-color); box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--accent-color), #FFD23F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <svg style="width: 24px; height: 24px; color: var(--text-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary);">
                                        ✅ Paket Dipilih
                                    </h3>
                                </div>
                                
                                <div style="display: flex; gap: 1.5rem; align-items: center; flex-wrap: wrap;">
                                    <div style="flex-shrink: 0;">
                                        <?php if (!empty($selectedPaket['gambar'])): ?>
                                            <img src="<?= base_url('uploads/paket/' . $selectedPaket['gambar']) ?>" alt="<?= $selectedPaket['namapaket'] ?>" 
                                                 style="width: 120px; height: 120px; object-fit: cover; border-radius: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                        <?php elseif (!empty($selectedPaket['image'])): ?>
                                            <img src="<?= base_url('uploads/paket/' . $selectedPaket['image']) ?>" alt="<?= $selectedPaket['namapaket'] ?>" 
                                                 style="width: 120px; height: 120px; object-fit: cover; border-radius: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                        <?php else: ?>
                                            <div style="width: 120px; height: 120px; background: linear-gradient(135deg, var(--gray-200), var(--gray-100)); border-radius: 1rem; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                                <svg style="width: 48px; height: 48px; color: var(--text-secondary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div style="flex: 1;">
                                        <h4 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                                            <?= $selectedPaket['namapaket'] ?>
                                        </h4>
                                        <p style="color: var(--text-secondary); margin-bottom: 1rem; line-height: 1.6;">
                                            <?= $selectedPaket['deskripsi'] ?? 'Layanan premium dengan kualitas terbaik' ?>
                                        </p>
                                        
                                        <div style="display: flex; gap: 2rem; align-items: center; flex-wrap: wrap;">
                                            <div style="background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); padding: 0.75rem 1.5rem; border-radius: 50px; color: white; font-weight: 600; font-size: 1.125rem;">
                                                💰 Rp. <?= number_format($selectedPaket['harga'], 0, ',', '.') ?>
                                            </div>
                                            <div style="background: linear-gradient(135deg, var(--secondary-color), #4ECDC4); padding: 0.75rem 1.5rem; border-radius: 50px; color: white; font-weight: 600;">
                                                ⏱️ <?= $selectedPaket['durasi'] ?? 60 ?> menit
                                            </div>
                                        </div>
                                        
                                        <div style="margin-top: 1.5rem;">
                                            <button type="button" id="addMorePaket" class="btn btn-outline" style="padding: 0.75rem 1.5rem; border-radius: 50px;">
                                                <span>➕ Tambah Paket Lain</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="selectedPakets" name="selectedPakets" value="<?= $selectedPaket['idpaket'] ?>" data-harga="<?= $selectedPaket['harga'] ?>" data-durasi="<?= $selectedPaket['durasi'] ?? 60 ?>">
                            </div>
                        <?php else: ?>
                            <!-- Pilihan paket jika belum dipilih -->
                            <div>
                                <div style="margin-bottom: 1.5rem;">
                                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">
                                        🛍️ Pilih Paket Layanan
                                    </h4>
                                </div>
                                
                                <div id="paketContainer">
                                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                                        <?php foreach ($paketList as $paket): ?>
                                            <div class="paket-card" style="background: var(--white); border: 2px solid var(--gray-200); border-radius: 1rem; overflow: hidden; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.08);"
                                                data-id="<?= $paket['idpaket'] ?>"
                                                data-harga="<?= $paket['harga'] ?>"
                                                data-durasi="<?= $paket['durasi'] ?? 60 ?>"
                                                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.15)'; this.style.borderColor='var(--primary-color)'"
                                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.08)'; this.style.borderColor='var(--gray-200)'">
                                                
                                                <div style="position: relative; height: 200px; background: var(--gray-100);">
                                                    <?php if (!empty($paket['gambar'])): ?>
                                                        <img src="<?= base_url('uploads/paket/' . $paket['gambar']) ?>" alt="<?= $paket['namapaket'] ?>"
                                                             style="width: 100%; height: 100%; object-fit: cover;">
                                                    <?php elseif (!empty($paket['image'])): ?>
                                                        <img src="<?= base_url('uploads/paket/' . $paket['image']) ?>" alt="<?= $paket['namapaket'] ?>"
                                                             style="width: 100%; height: 100%; object-fit: cover;">
                                                    <?php else: ?>
                                                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, var(--gray-200), var(--gray-100));">
                                                            <svg style="width: 64px; height: 64px; color: var(--text-secondary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                    <?php endif; ?>
                                                    
                                                    <!-- Durasi Badge -->
                                                    <div style="position: absolute; bottom: 10px; right: 10px; background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); color: white; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.875rem; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                                                        ⏱️ <?= $paket['durasi'] ?? 60 ?> menit
                                                    </div>
                                                </div>
                                                
                                                <div style="padding: 1.5rem;">
                                                    <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                                                        <?= $paket['namapaket'] ?>
                                                    </h3>
                                                    <p style="color: var(--text-secondary); margin-bottom: 1rem; line-height: 1.5; font-size: 0.875rem;">
                                                        <?= $paket['deskripsi'] ?? 'Layanan berkualitas dengan pelayanan terbaik' ?>
                                                    </p>
                                                    
                                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                                        <div style="background: linear-gradient(135deg, var(--accent-color), #FFD23F); padding: 0.5rem 1rem; border-radius: 50px; color: var(--text-primary); font-weight: 600; font-size: 1rem;">
                                                            💰 Rp. <?= number_format($paket['harga'], 0, ',', '.') ?>
                                                        </div>
                                                        <button type="button" class="add-paket-btn" 
                                                                data-paket-id="<?= $paket['idpaket'] ?>"
                                                                data-paket-nama="<?= $paket['namapaket'] ?>"
                                                                data-paket-harga="<?= $paket['harga'] ?>"
                                                                data-paket-durasi="<?= $paket['durasi'] ?? 60 ?>"
                                                                style="background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); color: white; border: none; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.2);"
                                                                onmouseover="this.style.transform='scale(1.1)'"
                                                                onmouseout="this.style.transform='scale(1)'">
                                                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!-- Container untuk paket yang dipilih -->
                                <div id="selectedPaketsContainer" style="margin-top: 2rem; display: flex; flex-direction: column; gap: 1rem;"></div>
                                <input type="hidden" id="selectedPaketIds" name="selectedPakets" value="">
                            </div>
                        <?php endif; ?>

                        <div style="background: linear-gradient(135deg, var(--white), var(--gray-50)); padding: 2rem; border-radius: 1rem; border: 1px solid var(--gray-200);">
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--secondary-color), #4ECDC4); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary);">
                                    📅 Pilih Tanggal Booking
                                </h3>
                            </div>
                            
                            <div style="position: relative;">
                                <input type="date" id="tanggal_booking" name="tanggal_booking" 
                                       style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--white); color: var(--text-primary); font-size: 1rem; transition: all 0.3s ease;" 
                                       min="<?= date('Y-m-d') ?>" required
                                       onfocus="this.style.borderColor='var(--primary-color)'; this.style.boxShadow='0 0 0 4px rgba(0, 102, 204, 0.1)'"
                                       onblur="this.style.borderColor='var(--gray-200)'; this.style.boxShadow='none'">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pilihan Waktu -->
                <div id="timeSlotContainer" style="display: none; opacity: 1; visibility: visible;">
                    <div class="card animate-fade-in-up" style="padding: 2rem; margin-bottom: 2rem;">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--accent-color), #FFD23F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <svg style="width: 24px; height: 24px; color: var(--text-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary);">🕐 Pilih Waktu</h2>
                        </div>

                        <div style="margin-bottom: 1.5rem;">
                            <div style="background: linear-gradient(135deg, var(--gray-50), var(--white)); padding: 1.5rem; border-radius: 1rem; margin-bottom: 2rem; border: 1px solid var(--gray-200);">
                                <p id="bookingDateDisplay" style="color: var(--text-secondary); display: flex; align-items: center; gap: 0.5rem; margin: 0;">
                                    <svg style="width: 20px; height: 20px; color: var(--primary-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Silakan pilih tanggal terlebih dahulu
                                </p>
                            </div>

                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); gap: 0.75rem; max-width: 600px;" id="timeSlotGrid">
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
                            </div>

                            <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 1.5rem; margin-top: 1.5rem; padding: 1rem; background: var(--gray-50); border-radius: var(--radius-md); font-size: 0.875rem;">
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <div style="width: 16px; height: 16px; background: var(--white); border: 1px solid var(--gray-300); border-radius: 3px;"></div>
                                    <span style="color: var(--text-secondary);">Tersedia</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <div style="width: 16px; height: 16px; background: var(--success-color); border-radius: 3px;"></div>
                                    <span style="color: var(--text-secondary);">Dipilih</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <div style="width: 16px; height: 16px; background: var(--error-color); border-radius: 3px;"></div>
                                    <span style="color: var(--text-secondary);">Tidak tersedia</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <div style="width: 16px; height: 16px; background: var(--gray-100); border: 1px solid var(--gray-300); border-radius: 3px; opacity: 0.7;"></div>
                                    <span style="color: var(--text-secondary);">Waktu sudah lewat</span>
                                </div>
                            </div>
                            <input type="hidden" id="jamstart" name="jamstart" required>
                            <input type="hidden" id="jamend" name="jamend">
                        </div>
                    </div>
                </div>

                <!-- Pilihan Karyawan -->
                <div id="karyawanContainer" style="display: none;">
                    <div class="card animate-fade-in-up" style="padding: 2rem; margin-bottom: 2rem;">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--success-color), #10B981); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary);">👨‍💼 Pilih Karyawan</h2>
                        </div>

                        <p style="color: var(--text-secondary); margin-bottom: 2rem; background: linear-gradient(135deg, var(--gray-50), var(--white)); padding: 1.5rem; border-radius: 1rem; border: 1px solid var(--gray-200); display: flex; align-items: center; gap: 0.5rem;">
                            <svg style="width: 20px; height: 20px; color: var(--success-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Silakan pilih salah satu karyawan yang tersedia
                        </p>

                        <div id="karyawanList" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                            <!-- Karyawan akan ditambahkan melalui JavaScript -->
                        </div>
                        <input type="hidden" id="idkaryawan" name="idkaryawan" required>
                    </div>
                </div>

                <!-- Ringkasan Booking -->
                <div class="card animate-fade-in-up" style="padding: 2rem; margin-top: 2rem;">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--success-color), #10B981); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary);">📋 Ringkasan Booking</h2>
                    </div>

                    <div style="background: linear-gradient(135deg, var(--gray-50), var(--white)); border-radius: 1rem; padding: 2rem; border: 1px solid var(--gray-200);">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
                            <div>
                                <p style="color: var(--text-secondary); margin-bottom: 0.5rem; font-weight: 500;">⏱️ Total Durasi:</p>
                                <p style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary);" id="totalDurasi">
                                    <?php if (isset($selectedPaket['durasi'])): ?>
                                        <?= $selectedPaket['durasi'] ?> menit
                                    <?php else: ?>
                                        0 menit
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div>
                                <p style="color: var(--text-secondary); margin-bottom: 0.5rem; font-weight: 500;">💰 Total Harga:</p>
                                <p style="font-size: 1.125rem; font-weight: 600; color: var(--primary-color);" id="totalHarga">
                                    <?php if (isset($selectedPaket['harga'])): ?>
                                        Rp. <?= number_format($selectedPaket['harga'], 0, ',', '.') ?>
                                    <?php else: ?>
                                        Rp. 0
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden input untuk menyimpan total -->
                    <input type="hidden" id="total" name="total" value="<?= isset($selectedPaket['harga']) ? $selectedPaket['harga'] : 0 ?>">
                    <input type="hidden" id="durasi_total" name="durasi_total" value="<?= isset($selectedPaket['durasi']) ? $selectedPaket['durasi'] : 0 ?>">
                </div>



                <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 3rem; gap: 1rem; flex-wrap: wrap;">
                    <a href="<?= site_url('/') ?>" class="btn btn-outline" style="padding: 1rem 2rem; border-radius: 50px; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>← Kembali ke Beranda</span>
                    </a>
                    
                    <button type="submit" id="btnSubmit" class="btn btn-primary btn-enhanced" style="padding: 1rem 3rem; border-radius: 50px; border: none; cursor: pointer; font-size: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span class="btn-text">
                            <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            🚀 Booking Sekarang
                        </span>
                        <span class="btn-shine"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
<script>
    // Variabel global
    let totalHarga = 0;
    let totalDurasi = 0;
    let selectedPakets = [];

    // Fungsi global untuk memformat angka sebagai mata uang
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }

    // Fungsi global untuk menambahkan paket ke daftar yang dipilih
    function tambahPaketKeSelected(id, nama, harga, durasi) {
        console.log('🔵 tambahPaketKeSelected dipanggil:', {id, nama, harga, durasi});
        
        // // Periksa apakah paket sudah dipilih
        // if ($(`#selected-paket-${id}`).length) {
        //     console.log('⚠️ Paket sudah dipilih sebelumnya');
        //     Swal.fire({
        //         icon: 'warning',
        //         title: 'Paket Sudah Dipilih!',
        //         text: `Paket "${nama}" sudah ada dalam daftar pilihan Anda.`,
        //         confirmButtonText: 'OK',
        //         confirmButtonColor: '#3B82F6'
        //     });
        //     return;
        // }

        // Bersihkan nama paket dari karakter tidak perlu
        const cleanedNama = nama.replace(/\d+\s*menit\s*Opsi Pembayaran/g, '').trim();
        const formattedHarga = formatNumber(harga);

        // Cari gambar paket dari card
        let imageSrc = '';
        const paketCard = $(`.paket-card[data-id="${id}"]`);
        if (paketCard.length) {
            const cardImage = paketCard.find('img');
            if (cardImage.length) {
                imageSrc = cardImage.attr('src');
            }
        }

        const paketHTML = `
            <div id="selected-paket-${id}" class="selected-paket-item" 
                 style="background: var(--white); border: 2px solid var(--gray-200); border-radius: 1rem; padding: 1.5rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 15px rgba(0,0,0,0.08); animation: slideInUp 0.3s ease; margin-bottom: 1rem;"
                 data-id="${id}" data-harga="${harga}" data-durasi="${durasi}">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    ${imageSrc ? 
                    `<div style="width: 60px; height: 60px; border-radius: 1rem; overflow: hidden; flex-shrink: 0;">
                        <img src="${imageSrc}" alt="${cleanedNama}" style="width: 100%; height: 100%; object-fit: cover;">
                     </div>` : 
                    `<div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--gray-200), var(--gray-100)); border-radius: 1rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg style="width: 30px; height: 30px; color: var(--text-secondary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                     </div>`
                    }
                    <div>
                        <h4 style="font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem; font-size: 1.125rem;">${cleanedNama}</h4>
                        <div style="display: flex; align-items: center; gap: 1rem; font-size: 0.875rem;">
                            <span style="background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); color: white; padding: 0.25rem 0.75rem; border-radius: 50px; font-weight: 600;">💰 Rp. ${formattedHarga}</span>
                            <span style="color: var(--text-secondary);">⏱️ ${durasi} menit</span>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="removePaket('${id}')" style="color: #EF4444; border-radius: 50%; padding: 0.5rem; transition: all 0.2s ease; background: none; border: none; cursor: pointer;"
                        onmouseover="this.style.background='#FEE2E2'; this.style.color='#DC2626'; this.style.transform='scale(1.1)'"
                        onmouseout="this.style.background='none'; this.style.color='#EF4444'; this.style.transform='scale(1)'">
                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        `;

        $('#selectedPaketsContainer').append(paketHTML).show();
        
        console.log('✅ Paket berhasil ditambahkan:', {id, nama: cleanedNama, harga, durasi});
        
        // SweetAlert2 success notification
        Swal.fire({
            icon: 'success',
            title: 'Paket Berhasil Ditambahkan!',
            html: `
                <div style="text-align: center; padding: 1rem;">
                    <div style="background: linear-gradient(135deg, #10B981, #059669); color: white; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1rem;">
                        <h3 style="margin: 0; font-size: 1.125rem; font-weight: 600;">${cleanedNama}</h3>
                        <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Rp ${formattedHarga} • ${durasi} menit</p>
                    </div>
                    <p style="color: #6B7280; margin: 0;">Paket telah ditambahkan ke daftar pilihan Anda</p>
                </div>
            `,
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            toast: true,
            position: 'top-end',
            showClass: {
                popup: 'animate__animated animate__fadeInRight'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutRight'
            }
        });
        
        hitungTotal();
    }

    // Fungsi global untuk menghapus paket
    function removePaket(id) {
        console.log('🗑️ Menghapus paket:', id);
        
        // Ambil nama paket sebelum dihapus untuk alert
        const paketNama = $(`#selected-paket-${id}`).find('h4').text();
        
        $(`#selected-paket-${id}`).remove();
        hitungTotal();
        
        // SweetAlert2 success notification untuk penghapusan
        Swal.fire({
            icon: 'info',
            title: 'Paket Dihapus',
            text: `"${paketNama}" telah dihapus dari daftar pilihan`,
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            position: 'top-end',
            showClass: {
                popup: 'animate__animated animate__fadeInRight'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutRight'
            }
        });
    }

    // Fungsi untuk mengecek dan mengaktifkan/menonaktifkan tombol submit
    function checkSubmitButton() {
        const paketSelected = $('#selectedPakets').length && $('#selectedPakets').val() || 
                             $('.selected-paket-item').length > 0 ||
                             $('#selectedPaketIds').val();
        const tanggalSelected = $('#tanggal_booking').val();
        const jamSelected = $('#jamstart').val();
        const karyawanSelected = $('#idkaryawan').val();
        
        const allConditionsMet = paketSelected && tanggalSelected && jamSelected && karyawanSelected;
        
        console.log('🔍 Checking submit button conditions:', {
            paketSelected: !!paketSelected,
            tanggalSelected: !!tanggalSelected,
            jamSelected: !!jamSelected,
            karyawanSelected: !!karyawanSelected,
            allConditionsMet: allConditionsMet
        });
        
        if (allConditionsMet) {
            $('#btnSubmit').prop('disabled', false)
                          .removeClass('opacity-50 cursor-not-allowed')
                          .addClass('cursor-pointer');
            console.log('✅ Submit button ENABLED!');
        } else {
            $('#btnSubmit').prop('disabled', true)
                          .addClass('opacity-50 cursor-not-allowed')
                          .removeClass('cursor-pointer');
            console.log('⚠️ Submit button disabled - missing conditions');
        }
    }

    // Fungsi global untuk menghitung total
    function hitungTotal() {
        totalHarga = 0;
        totalDurasi = 0;
        selectedPakets = [];

        // Jika ada paket yang dipilih dari URL parameter
        if ($('#selectedPakets').length) {
            const paketId = $('#selectedPakets').val();
            const harga = parseFloat($('#selectedPakets').data('harga'));
            const durasi = parseInt($('#selectedPakets').data('durasi')) || 60;

            if (paketId && !isNaN(harga)) {
                totalHarga = harga;
                totalDurasi = durasi;
                selectedPakets.push({id: paketId, harga: harga, durasi: durasi});
            }
        }

        // Ambil semua paket yang dipilih di UI cards
        $('.selected-paket-item').each(function() {
            const $item = $(this);
            const paketId = $item.data('id');
            const harga = parseFloat($item.data('harga'));
            const durasi = parseInt($item.data('durasi'));

            if (paketId && !isNaN(harga)) {
                totalHarga += harga;
                totalDurasi += durasi;
                selectedPakets.push({id: paketId, harga: harga, durasi: durasi});
            }
        });

        // Update tampilan
        $('#totalHarga').text('Rp. ' + formatNumber(totalHarga));
        $('#totalDurasi').text(totalDurasi + ' menit');
        $('#total').val(totalHarga);
        $('#durasi_total').val(totalDurasi);

        // Update selected paket IDs
        if (selectedPakets.length > 0) {
            const selectedIds = selectedPakets.map(p => p.id);
            $('#selectedPaketIds').val(JSON.stringify(selectedIds));
        } else {
            $('#selectedPaketIds').val('');
        }

        console.log('💰 Total dihitung:', {totalHarga, totalDurasi, selectedPakets});
        
        // Check submit button after calculating total
        checkSubmitButton();
    }

    // Fungsi handleAddPaket dihapus - menggunakan jQuery event handler saja

    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi AOS dengan error handling
        if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        } else {
            console.warn('⚠️ AOS library not loaded, skipping initialization');
        }

        // Variabel sudah didefinisikan di scope global

        // Debug mode untuk membantu pencarian bug
        const DEBUG = true;

        function debug(message, data) {
            if (DEBUG) console.log(message, data || '');
        }

        // Ketika paket dipilih dari landing page, langsung update summary
        if ($('#selectedPakets').length) {
            // Ambil data paket yang sudah dipilih
            const paketId = $('#selectedPakets').val();
            const paketHarga = parseFloat($('#selectedPakets').data('harga'));
            const paketDurasi = parseInt($('#selectedPakets').data('durasi') || 60);

            debug('Paket dari URL detected', {
                id: paketId,
                harga: paketHarga,
                durasi: paketDurasi
            });

            // Inisialisasi nilai awal
            totalHarga = paketHarga;
            totalDurasi = paketDurasi;

            // Update tampilan
            $('#totalHarga').text('Rp. ' + formatNumber(totalHarga));
            $('#totalDurasi').text(totalDurasi + ' menit');

            // Update hidden input untuk total
            $('#total').val(totalHarga);
            $('#durasi_total').val(totalDurasi);

            // Log untuk debugging
            debug('Inisialisasi paket dari URL', {
                id: paketId,
                harga: paketHarga,
                durasi: paketDurasi,
                totalHarga: totalHarga,
                totalDurasi: totalDurasi
            });

            // Tampilkan informasi durasi
            setTimeout(function() {
                updateDurasiInfo(true);
            }, 500);

            // Check submit button setelah paket dipilih
            checkSubmitButton();
            
            // Show success notification untuk paket yang sudah dipilih dari URL
            if (paketId && paketHarga) {
                setTimeout(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Paket Terpilih!',
                        html: `
                            <div style="text-align: center; padding: 1rem;">
                                <div style="background: linear-gradient(135deg, #3B82F6, #1D4ED8); color: white; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1rem;">
                                    <h3 style="margin: 0; font-size: 1.125rem; font-weight: 600;">Paket sudah dipilih dari halaman sebelumnya</h3>
                                    <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Rp ${formatNumber(paketHarga)} • ${paketDurasi} menit</p>
                                </div>
                                <p style="color: #6B7280; margin: 0;">Silakan lanjutkan dengan memilih tanggal dan waktu</p>
                            </div>
                        `,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        toast: true,
                        position: 'top-end'
                    });
                }, 1000);
            }
        }

        // Event handler untuk tombol tambah paket
        $(document).off('click', '#addPaket, #addMorePaket, .add-paket-btn, .remove-selected-paket, #btnSubmit');

        // Tombol tambah paket lebih
        $(document).on('click', '#addPaket, #addMorePaket', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Tambah paket diklik');
            tambahPaket();

            if ($('#tanggal_booking').val()) {
                $('#tanggal_booking').trigger('change');
            }
            return false;
        });

        // Event handler untuk paket card dihapus - hanya menggunakan tombol add

        // Event handler untuk tombol add pada paket card
        $(document).on('click', '.add-paket-btn', function(e) {
            console.log('🔵 Tombol + diklik!');
            e.preventDefault();
            e.stopPropagation();

            const $button = $(this);
            const $card = $button.closest('.paket-card');
            
            console.log('🔍 Button element:', $button);
            console.log('🔍 Card element:', $card);
            console.log('🔍 Card length:', $card.length);
            
            if ($card.length === 0) {
                console.error('❌ Card tidak ditemukan!');
                return;
            }

            const id = $card.data('id');
            const nama = $card.find('h3').text().trim();
            const harga = parseFloat($card.data('harga'));
            const durasi = parseInt($card.data('durasi')) || 60;

            console.log('📊 Data paket:', {
                id: id,
                nama: nama,
                harga: harga,
                durasi: durasi,
                isValidHarga: !isNaN(harga),
                cardDataId: $card.attr('data-id'),
                cardDataHarga: $card.attr('data-harga'),
                cardDataDurasi: $card.attr('data-durasi')
            });
            
            // Periksa apakah paket sudah dipilih sebelumnya
            if ($(`#selected-paket-${id}`).length > 0) {
                console.log('⚠️ Paket sudah dipilih sebelumnya');
                Swal.fire({
                    icon: 'warning',
                    title: 'Paket Sudah Dipilih!',
                    text: `Paket "${nama}" sudah ada dalam daftar pilihan Anda.`,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#F59E0B',
                    timer: 2000,
                    timerProgressBar: true
                });
                return;
            }
            
            if (id && nama && !isNaN(harga)) {
                console.log('✅ Data valid, menambahkan paket...');
                tambahPaketKeSelected(id, nama, harga, durasi);
            } else {
                console.error('❌ Data paket tidak lengkap:', {id, nama, harga, durasi});
                // SweetAlert untuk debugging
                Swal.fire({
                    icon: 'error',
                    title: 'Data Paket Tidak Lengkap!',
                    html: `
                        <div style="text-align: left; padding: 1rem;">
                            <p><strong>ID:</strong> ${id || 'Tidak ada'}</p>
                            <p><strong>Nama:</strong> ${nama || 'Tidak ada'}</p>
                            <p><strong>Harga:</strong> ${harga || 'Tidak ada'}</p>
                            <p><strong>Durasi:</strong> ${durasi || 'Tidak ada'}</p>
                        </div>
                    `,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#EF4444'
                });
            }
        });

        // Event handler untuk menghapus paket yang dipilih
        $(document).on('click', '.remove-selected-paket', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).closest('.selected-paket-item').remove();
            hitungTotal();
        });

        // Event handler untuk tombol submit button
        $(document).on('click', '#btnSubmit', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('🚀 TOMBOL SUBMIT DIKLIK!');
            console.log('Button disabled:', $(this).prop('disabled'));
            console.log('Button classes:', $(this).attr('class'));
            
            if ($(this).prop('disabled') || $(this).hasClass('cursor-not-allowed')) {
                console.log('⚠️ Button disabled, submit dibatalkan');
                
                // Tampilkan pesan error untuk user
                let missingConditions = [];
                if (!($('#selectedPakets').length && $('#selectedPakets').val() || $('.selected-paket-item').length > 0 || $('#selectedPaketIds').val())) {
                    missingConditions.push('Pilih paket layanan');
                }
                if (!$('#tanggal_booking').val()) {
                    missingConditions.push('Pilih tanggal booking');
                }
                if (!$('#jamstart').val()) {
                    missingConditions.push('Pilih jam booking');
                }
                if (!$('#idkaryawan').val()) {
                    missingConditions.push('Pilih karyawan');
                }
                
                // Gunakan SweetAlert2 untuk pesan yang lebih baik
                Swal.fire({
                    icon: 'warning',
                    title: 'Lengkapi Data Booking',
                    html: `
                        <div style="text-align: left; padding: 1rem;">
                            <p style="margin-bottom: 1rem; color: #6B7280;">Silakan lengkapi data berikut untuk melanjutkan:</p>
                            <ul style="list-style: none; padding: 0;">
                                ${missingConditions.map(condition => 
                                    `<li style="padding: 0.5rem; background: #FEF3C7; margin: 0.25rem 0; border-radius: 0.5rem; border-left: 4px solid #F59E0B;">
                                        <span style="color: #92400E; font-weight: 500;">• ${condition}</span>
                                    </li>`
                                ).join('')}
                            </ul>
                        </div>
                    `,
                    confirmButtonText: 'OK, Saya Mengerti',
                    confirmButtonColor: '#F59E0B'
                });
                
                return false;
            }
            
            // Trigger form submit
            console.log('✅ Triggering form submit...');
            $('#bookingForm').trigger('submit');
        });

        // Event handler untuk form submit - single handler untuk mencegah konflik
        $('#bookingForm').on('submit', function(e) {
            console.log('🚀 FORM SUBMIT EVENT TRIGGERED!');
            e.preventDefault();

            // Debug form data sebelum submit
            console.log('Form data before submit:');
            console.log('Total:', $('#total').val(), 'Type:', typeof $('#total').val());
            console.log('Selected pakets:', $('#selectedPaketIds').val());
            console.log('Karyawan ID:', $('#idkaryawan').val());

            let isValid = true;
            let missingFields = [];

            // Validasi paket dipilih
            let paketSelected = false;

            // Cek jika ada paket yang dipilih
            if ($('#selectedPakets').length && $('#selectedPakets').val()) {
                // Jika menggunakan paket dari URL parameter
                paketSelected = true;
            } else if ($('.selected-paket-item').length > 0) {
                // Jika menggunakan paket yang dipilih manual
                paketSelected = true;
            } else if ($('#selectedPaketIds').val()) {
                // Jika ada paket IDs tersimpan
                paketSelected = true;
            }

            if (!paketSelected) {
                isValid = false;
                missingFields.push('paket layanan');
            }

            // Validasi tanggal booking
            if (!$('#tanggal_booking').val()) {
                isValid = false;
                missingFields.push('tanggal booking');
            }

            // Validasi jam mulai
            if (!$('#jamstart').val()) {
                isValid = false;
                missingFields.push('jam booking');
            }

            // Validasi karyawan
            const karyawanId = $('#idkaryawan').val();
            console.log('Validasi karyawan:', karyawanId); // Log untuk debugging

            if (!karyawanId) {
                isValid = false;
                missingFields.push('karyawan');
            }

            if (!isValid) {
                // Scroll ke bagian atas form
                $('html, body').animate({
                    scrollTop: $('#bookingForm').offset().top - 100
                }, 500);

                // Gunakan SweetAlert2 untuk error validation
                Swal.fire({
                    icon: 'error',
                    title: 'Form Tidak Lengkap!',
                    html: `
                        <div style="text-align: left; padding: 1rem;">
                            <p style="margin-bottom: 1rem; color: #6B7280;">Field yang harus diisi:</p>
                            <ul style="list-style: disc; margin-left: 1.5rem; color: #991B1B;">
                                ${missingFields.map(field => `<li>${field}</li>`).join('')}
                            </ul>
                        </div>
                    `,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#EF4444',
                    customClass: {
                        popup: 'swal2-validation-error'
                    }
                });
                return;
            }

            // Disable tombol submit untuk mencegah double submit
            $('#btnSubmit').prop('disabled', true).html(`
                <span class="btn-text">
                    <svg style="width: 20px; height: 20px; margin-right: 8px; animation: spin 1s linear infinite;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" opacity="0.25"></circle>
                        <path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" opacity="0.75"></path>
                </svg>
                    Memproses Booking...
                </span>
            `);

            // Scroll ke bagian atas form
            $('html, body').animate({
                scrollTop: $('#bookingForm').offset().top - 100
            }, 500);

            // Ensure total is a number before submitting
            const totalValue = parseInt($('#total').val()) || 0;
            $('#total').val(totalValue);

            // Buat form data untuk upload file
            var formData = new FormData(this);

            // Log form data untuk debugging
            console.log('Form data:');
            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            // Double check total value after FormData creation
            console.log('Final total value:', formData.get('total'));

            $.ajax({
                url: '<?= site_url('customer/booking/store') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                        // Alert lama sudah tidak digunakan (menggunakan SweetAlert2)

                        // Tampilkan modal sukses yang sudah ada di HTML
                        showSuccessModal(response.kdbooking);
                    } else {
                        // Gunakan SweetAlert2 untuk error booking
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Membuat Booking',
                            text: response.message,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#EF4444',
                            customClass: {
                                popup: 'swal2-booking-error'
                            }
                        });

                        // Re-enable tombol submit
                        $('#btnSubmit').prop('disabled', false).html(`
                            <span class="btn-text">
                                <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                                🚀 Booking Sekarang
                            </span>
                            <span class="btn-shine"></span>
                        `);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', {xhr, status, error});
                    
                    // Gunakan SweetAlert2 untuk error AJAX
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Sistem tidak dapat memproses booking Anda. Silakan coba lagi.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#EF4444',
                        customClass: {
                            popup: 'swal2-ajax-error'
                        }
                    });

                    // Re-enable tombol submit
                    $('#btnSubmit').prop('disabled', false).html(`
                        <span class="btn-text">
                            <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                            🚀 Booking Sekarang
                        </span>
                        <span class="btn-shine"></span>
                    `);
                }
            });
        });

        // Setup custom radio buttons
        function setupCustomRadios() {
            // Setup jenis pembayaran radios
            $('.payment-radio').each(function() {
                const $radio = $(this);
                const $label = $('label[for="' + $radio.attr('id') + '"]');
                const $circle = $label.find('.radio-circle');
                const $dot = $circle.find('.radio-dot');

                // Initial state
                if ($radio.is(':checked')) {
                    $label.addClass('border-blue-500');
                    $circle.addClass('border-blue-600');
                    $dot.removeClass('hidden');
                }

                // Click handler for label
                $label.on('click', function() {
                    // Uncheck all radios in the group
                    $('.payment-radio').prop('checked', false);
                    $('.payment-radio').each(function() {
                        const $r = $(this);
                        const $l = $('label[for="' + $r.attr('id') + '"]');
                        $l.removeClass('border-blue-500');
                        $l.find('.radio-circle').removeClass('border-blue-600');
                        $l.find('.radio-dot').addClass('hidden');
                    });

                    // Check the clicked radio
                    $radio.prop('checked', true);
                    $label.addClass('border-blue-500');
                    $circle.addClass('border-blue-600');
                    $dot.removeClass('hidden');

                    // Trigger change event
                    $radio.trigger('change');
                });
            });

            // Setup metode pembayaran radios
            $('.method-radio').each(function() {
                const $radio = $(this);
                const $label = $('label[for="' + $radio.attr('id') + '"]');
                const $circle = $label.find('.radio-circle');
                const $dot = $circle.find('.radio-dot');

                // Initial state
                if ($radio.is(':checked')) {
                    $label.addClass('border-blue-500');
                    $circle.addClass('border-blue-600');
                    $dot.removeClass('hidden');
                }

                // Click handler for label
                $label.on('click', function() {
                    // Uncheck all radios in the group
                    $('.method-radio').prop('checked', false);
                    $('.method-radio').each(function() {
                        const $r = $(this);
                        const $l = $('label[for="' + $r.attr('id') + '"]');
                        $l.removeClass('border-blue-500');
                        $l.find('.radio-circle').removeClass('border-blue-600');
                        $l.find('.radio-dot').addClass('hidden');
                    });

                    // Check the clicked radio
                    $radio.prop('checked', true);
                    $label.addClass('border-blue-500');
                    $circle.addClass('border-blue-600');
                    $dot.removeClass('hidden');

                    // Trigger change event
                    $radio.trigger('change');
                });
            });
        }

        // Initialize custom radios
        setupCustomRadios();

        // Initialize form with no payment options selected
        // Hiding min payment info initially - will only show when payment type is selected

        // Format tanggal untuk tampilan
        function formatTanggal(tanggal) {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return new Date(tanggal).toLocaleDateString('id-ID', options);
        }

        // Format angka ke format Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(angka);
        }

        // Ketika tanggal dipilih
        $(document).on('change', '#tanggal_booking', function() {
            try {
            const selectedDate = $(this).val();
            console.log('📅 Tanggal dipilih:', selectedDate);
                console.log('📅 Time slot container exists:', $('#timeSlotContainer').length);
                console.log('📅 Time slot container current display:', $('#timeSlotContainer').css('display'));

            // Jika tanggal dipilih (alert sudah menggunakan SweetAlert2)
            if (selectedDate) {
                $(this).removeClass('border-yellow-400 ring-2 ring-yellow-200');
                
                // Check submit button setelah tanggal dipilih
                checkSubmitButton();
            }

            if (selectedDate) {
                // Format tanggal untuk tampilan
                $('#bookingDateDisplay').html(`<strong>${formatTanggal(selectedDate)}</strong>`);

                // Tampilkan container time slot dengan animasi modern
                console.log('🕐 Menampilkan time slot container...');
                $('#timeSlotContainer').css('display', 'block').addClass('show');
                console.log('🕐 Time slot container visible:', $('#timeSlotContainer').is(':visible'));
                console.log('🕐 Time slot container CSS:', $('#timeSlotContainer').attr('style'));

                // Reset semua slot waktu
                $('.time-slot').removeClass('active bg-green-500 text-white booked bg-red-200 text-gray-500 disabled bg-gray-200 text-gray-400 cursor-not-allowed');
                $('.time-slot').removeAttr('title');
                $('.time-slot').removeClass('cursor-not-allowed').addClass('cursor-pointer');

                // Periksa jam saat ini jika tanggal yang dipilih adalah hari ini
                const today = new Date();
                const selectedDateObj = new Date(selectedDate);

                // Format tanggal untuk perbandingan (tanpa waktu)
                const todayStr = today.toISOString().split('T')[0];
                const selectedDateStr = selectedDate;

                // Jika tanggal yang dipilih adalah hari ini, nonaktifkan slot waktu yang sudah lewat
                if (todayStr === selectedDateStr) {
                    const currentHour = today.getHours();
                    const currentMinute = today.getMinutes();

                    // Nonaktifkan semua slot waktu yang sudah lewat
                    $('.time-slot').each(function() {
                        const slotTime = $(this).data('time');
                        const [slotHour, slotMinute] = slotTime.split(':').map(Number);

                        // Jika jam slot lebih kecil dari jam sekarang, atau jam sama tapi menit slot lebih kecil dari menit sekarang
                        if (slotHour < currentHour || (slotHour === currentHour && slotMinute <= currentMinute)) {
                            $(this).addClass('disabled bg-gray-200 text-gray-400 cursor-not-allowed');
                            $(this).attr('title', 'Waktu sudah lewat');
                        }
                    });
                }

                // Periksa ketersediaan slot waktu
                checkAvailability();
                
                // Fallback untuk memastikan time slot container muncul
                setTimeout(function() {
                    if (!$('#timeSlotContainer').hasClass('show')) {
                        console.log('⚠️ Time slot container masih tersembunyi, forcing show...');
                        $('#timeSlotContainer').css('display', 'block').addClass('show');
                    }
                }, 100);

                // Hide karyawan dan summary containers ketika tanggal berubah
                $('#karyawanContainer').hide();
                $('#summaryContainer').hide();

                // Reset input
                $('#jamstart').val('');
                $('#jamend').val('');
                $('#idkaryawan').val('');
                
                // Check submit button setelah reset
                checkSubmitButton();
            } else {
                $('#bookingDateDisplay').html(`
                    <i class="bi bi-info-circle"></i> Silakan pilih tanggal terlebih dahulu
                `);

                // Sembunyikan container time slot, karyawan dan summary
                $('#timeSlotContainer').removeClass('show').hide();
                $('#karyawanContainer').hide();
                $('#summaryContainer').hide();

                // Reset input
                $('#jamstart').val('');
                $('#jamend').val('');
                $('#idkaryawan').val('');
                
                // Check submit button setelah reset
                checkSubmitButton();
            }
            } catch (error) {
                console.error('❌ Error dalam event handler tanggal:', error);
                // Fallback - force show time slot container
                $('#timeSlotContainer').attr('style', 'display: block !important;');
            }
        });

        // Fungsi untuk memeriksa ketersediaan
        function checkAvailability() {
            const tanggal = $('#tanggal_booking').val();

            if (!tanggal) {
                showAlert('Silakan pilih tanggal terlebih dahulu', 'warning');
                return;
            }

            // Tampilkan loading
            $('#timeSlotContainer').removeClass('hidden');
            $('#bookingDateDisplay').html(`
                <div class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Memeriksa ketersediaan...</span>
                </div>
            `);

            // Reset semua time slot
            $('.time-slot').removeClass('bg-green-500 text-white border-green-500 bg-red-200 text-red-800 border-red-300 cursor-not-allowed')
                .addClass('border-gray-200 hover:border-indigo-300 cursor-pointer')
                .removeAttr('disabled')
                .data('karyawan', []);

            // Periksa kembali jam yang sudah lewat jika tanggal adalah hari ini
            const today = new Date();
            const todayStr = today.toISOString().split('T')[0];

            if (tanggal === todayStr) {
                const currentHour = today.getHours();
                const currentMinute = today.getMinutes();

                // Nonaktifkan semua slot waktu yang sudah lewat
                $('.time-slot').each(function() {
                    const slotTime = $(this).data('time');
                    const [slotHour, slotMinute] = slotTime.split(':').map(Number);

                    // Jika jam slot lebih kecil dari jam sekarang, atau jam sama tapi menit slot lebih kecil dari menit sekarang
                    if (slotHour < currentHour || (slotHour === currentHour && slotMinute <= currentMinute)) {
                        $(this).addClass('disabled bg-gray-200 text-gray-400 cursor-not-allowed');
                        $(this).attr('title', 'Waktu sudah lewat');
                    }
                });
            }

            // Ambil durasi total dari paket yang dipilih
            const durasiTotal = $('#durasi_total').val() || 60;

            // Kirim request ke server
            $.ajax({
                url: '<?= base_url('customer/booking/check-availability') ?>',
                type: 'GET',
                data: {
                    tanggal: tanggal,
                    durasi: durasiTotal
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Format tanggal untuk display
                        const formattedDate = new Date(tanggal).toLocaleDateString('id-ID', {
                            weekday: 'long',
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });

                        $('#bookingDateDisplay').html(`
                           
                            Ketersediaan untuk <span class="font-semibold">${formattedDate}</span>
                        `);

                        // Update status setiap time slot
                        response.data.forEach(function(slot) {
                            const $slot = $(`.time-slot[data-time="${slot.time}"]`);

                            // Jangan override slot yang sudah dinonaktifkan karena waktu sudah lewat
                            if (!$slot.hasClass('disabled')) {
                                if (slot.status === 'available') {
                                    $slot.data('karyawan', slot.availableKaryawan);
                                    $slot.data('endTime', slot.endTime);
                                } else {
                                    $slot.addClass('bg-red-200 text-red-800 border-red-300 cursor-not-allowed')
                                        .removeClass('border-gray-200 hover:border-indigo-300 cursor-pointer')
                                        .attr('disabled', true);
                                }
                            }
                        });
                    } else {
                        showAlert(response.message || 'Terjadi kesalahan saat memeriksa ketersediaan', 'error');
                    }
                },
                error: function() {
                    showAlert('Terjadi kesalahan saat memeriksa ketersediaan', 'error');
                }
            });
        }

        // Fungsi untuk mendapatkan karyawan yang tersedia
        function getAvailableKaryawan(jamstart) {
            const tanggal = $('#tanggal_booking').val();
            const durasiTotal = $('#durasi_total').val() || 60;

            if (!tanggal || !jamstart) {
                return;
            }

            // Tampilkan loading
            $('#karyawanContainer').html(`
                <div class="flex items-center justify-center p-4">
                    <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Memuat data karyawan...</span>
                </div>
            `);

            // Kirim request ke server
            $.ajax({
                url: '<?= base_url('customer/booking/get-available-karyawan') ?>',
                type: 'GET',
                data: {
                    tanggal: tanggal,
                    jamstart: jamstart,
                    durasi: durasiTotal
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success' && response.data.length > 0) {
                        let html = '';

                        response.data.forEach(function(karyawan, index) {
                            const isChecked = index === 0 ? 'checked' : '';
                            html += `
                                <div class="karyawan-option">
                                    <input type="radio" id="karyawan_${karyawan.id}" name="idkaryawan" value="${karyawan.id}" ${isChecked} class="hidden peer">
                                    <label for="karyawan_${karyawan.id}" class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:bg-gray-50">
                                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">${karyawan.nama}</p>
                                        </div>
                                    </label>
                                </div>
                            `;
                        });

                        $('#karyawanContainer').html(html);
                        $('#karyawanSection').removeClass('hidden');

                        // Set nilai karyawan pertama sebagai default
                        if (response.data.length > 0) {
                            $('input[name="idkaryawan"]:first').prop('checked', true);
                        }
                    } else {
                        $('#karyawanContainer').html(`
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">Tidak ada karyawan yang tersedia pada waktu ini. Silakan pilih waktu lain.</p>
                                    </div>
                                </div>
                            </div>
                        `);
                    }
                },
                error: function() {
                    showAlert('Terjadi kesalahan saat memuat data karyawan', 'error');
                }
            });
        }

        // Delegasi event untuk slot waktu
        $('#timeSlotGrid').on('click', '.time-slot', function() {
            if ($(this).hasClass('booked') || $(this).hasClass('disabled')) {
                return;
            }

            $('.time-slot').removeClass('active bg-green-500 text-white');
            $(this).addClass('active bg-green-500 text-white');

            // Set jam mulai & selesai
            const startTime = $(this).data('time');
            const [startHour, startMinute] = startTime.split(':');
            const endHour = parseInt(startHour) + 1;
            const endTime = `${endHour.toString().padStart(2, '0')}:${startMinute}`;

            $('#jamstart').val(startTime);
            $('#jamend').val(endTime);

            // Load karyawan yang tersedia
            loadAvailableKaryawan();

            // Update summary
            updateSummary();
            
            // Check submit button setelah jam dipilih
            checkSubmitButton();
        });

        // Load daftar karyawan yang tersedia
        function loadAvailableKaryawan() {
            const tanggal = $('#tanggal_booking').val();
            const jamstart = $('#jamstart').val();

            if (!tanggal || !jamstart) return;

            // Reset nilai karyawan yang dipilih sebelumnya
            $('#idkaryawan').val('');

            // Tampilkan container karyawan
            $('#karyawanContainer').removeClass('hidden').fadeIn(500);

            // Tampilkan indikator loading
            $('#karyawanList').html(`
                <div class="col-span-full flex justify-center items-center py-8">
                    <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-indigo-500"></div>
                </div>
            `);

            $.ajax({
                url: '<?= site_url('customer/booking/getAvailableKaryawan') ?>',
                type: 'GET',
                data: {
                    tanggal: tanggal,
                    jamstart: jamstart
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        let karyawanHTML = '';

                        if (response.data.length === 0) {
                            karyawanHTML = `
                                <div class="col-span-full text-center py-6 bg-yellow-50 border border-yellow-100 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-yellow-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <p class="text-lg font-medium text-gray-700">Jadwal sudah penuh</p>
                                    <p class="text-gray-500 mt-1">Silakan pilih waktu lain</p>
                                </div>
                            `;

                            // Check submit button karena tidak ada karyawan tersedia
                            checkSubmitButton();
                        } else {
                            response.data.forEach(function(karyawan, index) {
                                karyawanHTML += `
                                    <div class="karyawan-item bg-white border border-gray-200 rounded-lg overflow-hidden cursor-pointer hover:shadow-md transition-all hover:border-green-300 ${index === 0 ? 'border-green-500 ring-2 ring-green-500' : ''}" data-id="${karyawan.id}">
                                        <div class="p-4">
                                            <div class="flex items-center">
                                                <div class="w-16 h-16 bg-gray-200 rounded-full overflow-hidden mr-3 flex-shrink-0 shadow-sm">
                                                    ${karyawan.foto 
                                                        ? `<img src="<?= base_url('uploads/karyawan/') ?>${karyawan.foto}" class="w-full h-full object-cover" alt="${karyawan.nama}">`
                                                        : `<div class="w-full h-full bg-gradient-to-r from-gray-300 to-gray-200 flex items-center justify-center text-gray-500">
                                                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </div>`
                                                    }
                                                </div>
                                                <div>
                                                    <div class="font-medium text-gray-800">${karyawan.nama}</div>
                                                    <div class="text-sm text-green-600 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                        </svg>
                                                        Tersedia
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });

                            // Set nilai karyawan pertama sebagai default
                            if (response.data.length > 0) {
                                $('#idkaryawan').val(response.data[0].id);
                                console.log('Default karyawan set:', response.data[0].id);

                                // Check submit button setelah karyawan dipilih
                                checkSubmitButton();
                            }
                        }

                        $('#karyawanList').html(karyawanHTML);
                    } else {
                        showAlert('Terjadi kesalahan saat memuat data karyawan', 'error');
                    }
                },
                error: function() {
                    showAlert('Terjadi kesalahan saat memuat data karyawan', 'error');
                }
            });
        }

        // Delegasi event untuk pilihan karyawan
        $('#karyawanList').on('click', '.karyawan-item', function() {
            $('.karyawan-item').removeClass('border-green-500 ring-2 ring-green-500');
            $(this).addClass('border-green-500 ring-2 ring-green-500');

            // Set nilai karyawan ke input hidden
            const karyawanId = $(this).data('id');
            $('#idkaryawan').val(karyawanId);

            console.log('Karyawan dipilih:', karyawanId); // Log untuk debugging

            // Update summary
            updateSummary();
            
            // Check submit button setelah karyawan dipilih
            checkSubmitButton();

            // Tampilkan ringkasan booking
            $('#summaryContainer').fadeIn(500);
        });

        // Update ringkasan booking
        function updateSummary() {
            const paketId = $('#idpaket').val();
            let paketText = '';
            let harga = 0;

            // Cek apakah paket dipilih dari landing page (hidden input) atau dari dropdown
            if ($('#idpaket').is('input[type="hidden"]')) {
                // Jika paket dari landing page
                paketText = $('.bg-gradient-to-r.from-purple-50 h3').text();
                harga = $('#idpaket').data('harga');
            } else {
                // Jika paket dari dropdown
                paketText = $('#idpaket option:selected').text();
                harga = $('#idpaket option:selected').data('harga') || 0;
            }

            const tanggal = $('#tanggal_booking').val();
            const jamstart = $('#jamstart').val();
            const jamend = $('#jamend').val();
            const karyawanId = $('#idkaryawan').val();

            // Set nilai ringkasan
            if (paketId) $('#summary_paket').text(paketText);
            if (tanggal) $('#summary_tanggal').text(formatTanggal(tanggal));
            if (jamstart && jamend) $('#summary_waktu').text(`${jamstart} - ${jamend}`);

            // Set total harga
            $('#summary_total').text(formatRupiah(harga));
            $('#total').val(harga);

            // Set nama karyawan jika sudah dipilih
            if (karyawanId) {
                const karyawanName = $(`.karyawan-item[data-id="${karyawanId}"]`).find('.font-medium').text();
                $('#summary_karyawan').text(karyawanName);
            }

            // Update minimal pembayaran
            updateMinPayment();
        }

        // Update minimal payment for DP (50%)
        function updateMinPayment() {
            const total = parseFloat($('#total').val() || 0);
            const jenisPembayaran = $('input[name="jenis_pembayaran"]:checked').val();

            if (jenisPembayaran === 'DP') {
                const minPayment = total * 0.5; // 50% dari total
                $('#minPayment').text(formatRupiah(minPayment));
                $('#minPaymentInfo').removeClass('hidden');
                // Tambahkan nilai minimum pembayaran ke input hidden
                $('#min_payment').val(minPayment);
            } else if (jenisPembayaran === 'Lunas') {
                $('#minPayment').text(formatRupiah(total));
                $('#minPaymentInfo').removeClass('hidden');
                // Untuk pembayaran penuh, nilai min_payment adalah total
                $('#min_payment').val(total);
            } else {
                // Tidak ada jenis pembayaran yang dipilih
                $('#minPaymentInfo').addClass('hidden');
                $('#min_payment').val(0);
            }
        }

        // Ketika paket layanan berubah (hanya jika menggunakan select dropdown)
        $('select#idpaket').on('change', function() {
            // Reset form untuk meminta pelanggan memilih ulang tanggal, jam, dan karyawan
            $('#timeSlotContainer').removeClass('show').hide();
            $('#karyawanContainer').hide();
            $('#summaryContainer').hide();

            // Jika tanggal sudah dipilih, tampilkan time slot container
            if ($('#tanggal_booking').val()) {
                $('#timeSlotContainer').css('display', 'block').addClass('show');
            }

            // Reset input
            $('#jamstart').val('');
            $('#jamend').val('');
            $('#idkaryawan').val('');
            
            // Check submit button setelah reset
            checkSubmitButton();

            // Update summary
            updateSummary();
        });

        // Fungsi pembayaran dipindahkan ke halaman payment.php

        // Duplikasi form submit handler dihapus - sudah ada handler di atas

        // Preview bukti pembayaran
        $('#bukti_pembayaran').on('change', function(e) {
            const file = e.target.files[0];
            if (!file) {
                $('#buktiPreviewContainer').addClass('hidden');
                return;
            }

            // Validasi tipe file
            const acceptedImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
            if (!acceptedImageTypes.includes(file.type)) {
                showAlert('File harus berupa gambar (JPG, PNG, atau GIF)', 'error');
                $(this).val('');
                return;
            }

            // Validasi ukuran file (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                showAlert('Ukuran file terlalu besar (maksimal 2MB)', 'error');
                $(this).val('');
                return;
            }

            // Tampilkan preview
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#buktiPreview').attr('src', e.target.result);
                $('#buktiPreviewContainer').removeClass('hidden').addClass('animate__animated animate__fadeIn');
            }
            reader.readAsDataURL(file);
        });

        // Hapus bukti pembayaran
        $('#removeBukti').on('click', function() {
            $('#bukti_pembayaran').val('');
            $('#buktiPreviewContainer').addClass('hidden');
        });

        // Fungsi untuk menampilkan alert menggunakan SweetAlert2
        function showAlert(message, type = 'error') {
            const icon = type === 'error' ? 'error' : 
                        type === 'warning' ? 'warning' : 'success';
            
            const color = type === 'error' ? '#EF4444' : 
                         type === 'warning' ? '#F59E0B' : '#10B981';

            Swal.fire({
                icon: icon,
                title: message,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal2-toast-custom'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInRight'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutRight'
                }
            });
        }

        // Fungsi untuk menampilkan modal sukses booking
        function showSuccessModal(bookingCode) {
            const modal = document.getElementById('booking-success-modal');

            // Tampilkan modal
            modal.classList.remove('hidden');
            modal.classList.add('modal-active');

            // Tambahkan efek scale in ke modal content
            setTimeout(() => {
                const modalContent = modal.querySelector('.relative');
                modalContent.classList.add('scale-in');
            }, 100);

            // Tambahkan efek pulse ke icon sukses
            setTimeout(() => {
                const successIcon = modal.querySelector('.w-24');
                successIcon.classList.add('pulse-animation');
            }, 500);

            // Animasi countdown
            const countdownBar = document.getElementById('countdown-bar');
            countdownBar.classList.add('animate-countdown-bar');

            // Hitung mundur timer
            let countdownTime = 3;
            const countdownTimer = document.getElementById('countdown-timer');
            countdownTimer.textContent = countdownTime;

            const countdownInterval = setInterval(function() {
                countdownTime--;
                countdownTimer.textContent = countdownTime;
                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                }
            }, 1000);

            // Redirect ke halaman pembayaran
            setTimeout(function() {
                window.location.href = '<?= site_url('customer/booking/payment/') ?>' + bookingCode;
            }, 3000);
        }

        // Fungsi sudah didefinisikan di scope global

        // Fungsi untuk menambahkan paket baru
        function tambahPaket() {
            // Jika ini adalah paket pertama yang ditambahkan dan ada paket yang dipilih dari landing page
            if ($('#selectedPakets').length) {
                // Ubah tampilan menjadi container paket biasa
                const selectedPaketId = $('#selectedPakets').val();
                const selectedPaketHarga = $('#selectedPakets').data('harga');
                const selectedPaketDurasi = $('#selectedPakets').data('durasi') || 60;
                const selectedPaketName = $('.bg-gray-50.p-4 h3.font-semibold.text-lg').text().trim();

                // Hapus tampilan paket yang dipilih dari landing page
                const paketContainer = $('.bg-gray-50.p-4.rounded-lg.border.border-gray-200.flex.items-start');
                if (paketContainer.length) {
                    paketContainer.closest('div').remove();
                } else {
                    // Hanya hapus div yang berisi paket yang dipilih
                    $('div:has(> #selectedPakets)').remove();
                }

                // Buat container paket baru dengan UI card
                const paketContainerHtml = `
                    <div>
                        <div id="paketContainer">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                <?php foreach ($paketList as $paket): ?>
                                    <div class="paket-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow cursor-pointer" 
                                        data-id="<?= $paket['idpaket'] ?>" 
                                        data-harga="<?= $paket['harga'] ?>" 
                                        data-durasi="<?= $paket['durasi'] ?? 60 ?>"
                                        data-image="<?= !empty($paket['gambar']) ? $paket['gambar'] : (!empty($paket['image']) ? $paket['image'] : '') ?>">
                                        <div class="relative h-40 bg-gray-100">
                                            <?php if (!empty($paket['gambar'])): ?>
                                                <img src="<?= base_url('uploads/paket/' . $paket['gambar']) ?>" alt="<?= $paket['namapaket'] ?>" 
                                                    class="w-full h-full object-cover">
                                            <?php elseif (!empty($paket['image'])): ?>
                                                <img src="<?= base_url('uploads/paket/' . $paket['image']) ?>" alt="<?= $paket['namapaket'] ?>" 
                                                    class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            <?php endif; ?>
                                            <div class="absolute bottom-0 right-0 bg-gradient-to-l from-indigo-600 to-indigo-500 text-white px-3 py-1 text-sm font-medium">
                                                <?= $paket['durasi'] ?? 60 ?> menit
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="font-semibold text-gray-800 mb-1"><?= $paket['namapaket'] ?></h3>
                                            <p class="text-sm text-gray-600 line-clamp-2 mb-2"><?= $paket['deskripsi'] ?? 'Tidak ada deskripsi' ?></p>
                                            <div class="flex justify-between items-center">
                                                <span class="text-indigo-600 font-bold">Rp. <?= number_format($paket['harga'], 0, ',', '.') ?></span>
                                                <button type="button" class="add-paket-btn bg-indigo-100 hover:bg-indigo-200 text-indigo-700 rounded-full p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="selectedPaketsContainer" class="mt-4 space-y-3"></div>
                        <input type="hidden" id="selectedPaketIds" name="selectedPakets" value="">
                    </div>
                `;

                // Tambahkan container paket baru ke dalam DOM, segera setelah label "Informasi Layanan"
                const layananHeading = $('.text-xl.font-semibold:contains("Informasi Layanan")');
                if (layananHeading.length) {
                    layananHeading.closest('.flex').after(paketContainerHtml);
                } else {
                    // Fallback jika heading tidak ditemukan
                    const dataBookingSection = $('#durasiInfo').closest('.bg-white');
                    dataBookingSection.find('.space-y-5').prepend(paketContainerHtml);
                }

                // Hapus input hidden selectedPakets
                $('#selectedPakets').remove();

                // Tambahkan paket yang sudah dipilih sebelumnya ke dalam selected pakets
                tambahPaketKeSelected(selectedPaketId, selectedPaketName, selectedPaketHarga, selectedPaketDurasi);

                return;
            }
        }

        // Fungsi sudah didefinisikan di scope global

        // Inisialisasi perhitungan total saat halaman dimuat
        hitungTotal();
        
        // Inisialisasi tombol submit
        $('#btnSubmit').prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
        
        // Check submit button setelah inisialisasi
        setTimeout(function() {
            checkSubmitButton();
        }, 100);

        // Fungsi untuk memperbarui jam selesai berdasarkan jam mulai dan durasi
        function updateJamEnd() {
            const jamStart = $('#jamstart').val();
            if (jamStart && totalDurasi > 0) {
                // Konversi jam mulai ke menit
                const [hours, minutes] = jamStart.split(':').map(Number);
                const startMinutes = hours * 60 + minutes;

                // Tambahkan durasi total
                const endMinutes = startMinutes + totalDurasi;

                // Konversi kembali ke format jam
                const endHours = Math.floor(endMinutes / 60) % 24;
                const endMins = endMinutes % 60;

                const formattedEndHours = endHours.toString().padStart(2, '0');
                const formattedEndMins = endMins.toString().padStart(2, '0');

                const jamEnd = `${formattedEndHours}:${formattedEndMins}`;
                $('#jamend').val(jamEnd);
            }
        }

        // Event handler untuk perubahan paket
        $(document).on('change', '.paket-select', function() {
            const $select = $(this);
            const $paketInfo = $select.closest('.paket-selection').find('.paket-info');
            const $durasi = $paketInfo.find('.paket-durasi');
            const $harga = $paketInfo.find('.paket-harga');

            if ($select.val()) {
                const $option = $select.find('option:selected');
                const harga = parseFloat($option.data('harga'));
                const durasi = parseInt($option.data('durasi'));

                $durasi.text(durasi);
                $harga.text('Rp. ' + formatNumber(harga));
                $paketInfo.removeClass('hidden');

                hitungTotal();
            } else {
                $paketInfo.addClass('hidden');
            }
        });

        // Event handler untuk menghapus paket
        $(document).on('click', '.remove-paket', function() {
            $(this).closest('.paket-selection').remove();
            hitungTotal();
        });

        // Perbarui jam end saat jam start berubah
        $('#jamstart').on('change', function() {
            updateJamEnd();
        });

        // Inisialisasi perhitungan total saat halaman dimuat
        hitungTotal();

        // Fungsi untuk memperbarui informasi durasi
        function updateDurasiInfo(isInitial) {
            debug('Memperbarui informasi durasi', {
                totalDurasi,
                isInitial
            });

            if (totalDurasi > 0) {
                // Hitung jam selesai berdasarkan jam mulai yang dipilih dan durasi total
                const jamMulai = $('#jamstart').val();

                // Tampilkan informasi durasi yang lebih jelas
                let durasiInfo = '';
                if (totalDurasi >= 60) {
                    const jam = Math.floor(totalDurasi / 60);
                    const menit = totalDurasi % 60;
                    durasiInfo = `${jam} jam`;
                    if (menit > 0) {
                        durasiInfo += ` ${menit} menit`;
                    }
                } else {
                    durasiInfo = `${totalDurasi} menit`;
                }

                // Update jam selesai jika ada jam mulai
                if (jamMulai) {
                    const [jam, menit] = jamMulai.split(':');
                    let jamMulaiMenit = (parseInt(jam) * 60) + parseInt(menit);
                    let jamSelesaiMenit = jamMulaiMenit + totalDurasi;

                    // Format jam selesai
                    let jamSelesai = Math.floor(jamSelesaiMenit / 60);
                    let menitSelesai = jamSelesaiMenit % 60;
                    let jamSelesaiStr = `${jamSelesai.toString().padStart(2, '0')}:${menitSelesai.toString().padStart(2, '0')}`;

                    // Update tampilan jam selesai
                    $('#jamend').val(jamSelesaiStr);
                }

                // Kosongkan container durasi info untuk menghilangkan teks
                $('#durasiInfo').html('').addClass('hidden');
            } else {
                $('#durasiInfo').addClass('hidden');
            }
        }
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('custom_style') ?>
<style>
    /* Style untuk animasi pada preview gambar */
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

    .animate__animated {
        animation-duration: 0.5s;
    }

    .animate__fadeIn {
        animation-name: fadeIn;
    }

    /* Styling untuk input tanggal saat validasi */
    @keyframes pulseBorder {
        0% {
            box-shadow: 0 0 0 0 rgba(250, 204, 21, 0.6);
        }

        70% {
            box-shadow: 0 0 0 6px rgba(250, 204, 21, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(250, 204, 21, 0);
        }
    }

    .border-yellow-400.ring-2 {
        animation: pulseBorder 1.5s infinite;
        transition: all 0.3s ease;
    }

    /* Style untuk tombol radio */
    .payment-radio:checked+label .radio-circle .radio-dot,
    .method-radio:checked+label .radio-circle .radio-dot {
        display: block;
    }

    .payment-radio:checked+label,
    .method-radio:checked+label {
        border-color: #4f46e5;
        background-color: #f9fafb;
    }

    /* Styling untuk time slots - desain sederhana dan clean */
    .time-slot {
        padding: 0.75rem 1rem;
        text-align: center;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: all 0.2s ease;
        font-weight: 500;
        color: var(--text-primary);
        background: var(--white);
        min-width: 80px;
        font-size: 0.875rem;
        box-shadow: none;
    }

    .time-slot:hover {
        border-color: var(--primary-color);
        background: var(--white);
        color: var(--primary-color);
    }

    .time-slot.active,
    .time-slot.selected {
        border-color: var(--success-color);
        background: var(--success-color);
        color: white;
    }

    .time-slot.booked {
        background: var(--error-color);
        border-color: var(--error-color);
        color: white;
        cursor: not-allowed;
    }

    .time-slot.disabled {
        background: var(--gray-100);
        border-color: var(--gray-300);
        color: var(--text-light);
        cursor: not-allowed;
        opacity: 0.7;
    }

    .time-slot.booked:hover,
    .time-slot.disabled:hover {
        border-color: var(--gray-300);
        background: var(--gray-100);
        color: var(--text-light);
    }

    /* Responsive time slot grid */
    @media (max-width: 768px) {
        #timeSlotGrid {
            grid-template-columns: repeat(auto-fit, minmax(90px, 1fr)) !important;
            gap: 0.5rem !important;
        }
        
        .time-slot {
            padding: 0.5rem 0.75rem !important;
            font-size: 0.8rem !important;
            min-width: 75px !important;
        }
    }

    @media (max-width: 480px) {
        #timeSlotGrid {
            grid-template-columns: repeat(4, 1fr) !important;
            gap: 0.5rem !important;
        }
        
        .time-slot {
            padding: 0.5rem 0.25rem !important;
            font-size: 0.75rem !important;
            min-width: 70px !important;
        }
    }

    /* Time slot container simple styling */
    #timeSlotContainer {
        transition: opacity 0.3s ease;
        opacity: 0;
    }

    #timeSlotContainer.show {
        opacity: 1;
    }

    /* Karyawan selection styling */
    .karyawan-item {
        background: var(--white);
        border: 2px solid var(--gray-200);
        border-radius: 1rem;
        padding: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .karyawan-item:hover {
        border-color: var(--primary-color);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .karyawan-item.selected,
    .karyawan-item.border-green-500 {
        border-color: var(--success-color) !important;
        background: linear-gradient(135deg, var(--white), #F0FDF4) !important;
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1) !important;
    }

    /* Alert styling sudah tidak digunakan - menggunakan SweetAlert2 */

    /* Modal dan animasi styling */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out;
    }

    /* Modern paket card styling */
    .paket-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .paket-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        border-color: var(--primary-color);
    }

    .paket-card.selected {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
    }

    .selected-paket-item {
        animation: slideInUp 0.3s ease;
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .remove-selected-paket {
        transition: all 0.2s ease;
        border-radius: 50%;
        padding: 0.5rem;
    }

    .remove-selected-paket:hover {
        background: #FEE2E2;
        color: #DC2626;
        transform: scale(1.1);
    }

    /* Animasi untuk loading spinner */
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

    /* Animasi untuk SweetAlert2 Toast */
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }

    .animate__animated {
        animation-duration: 0.5s;
        animation-fill-mode: both;
    }

    .animate__fadeInRight {
        animation-name: fadeInRight;
    }

    .animate__fadeOutRight {
        animation-name: fadeOutRight;
    }
</style>
<?= $this->endSection() ?>