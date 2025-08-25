<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<!-- Hero Section - Amazing Design -->
<section class="hero" id="beranda">
    <!-- Floating Decorations -->
    <div class="hero-decoration hero-circle-1"></div>
    <div class="hero-decoration hero-circle-2"></div>
    <div class="hero-decoration hero-circle-3"></div>
    
    <!-- Animated Particles -->
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <div class="hero-content">
            <!-- Main Title with Enhanced Typography -->
            <h1 class="hero-title animate-fade-in-up">
                <span class="hero-word" data-text="Transformasi">Transformasi</span> 
                <span class="hero-word" data-text="Gaya">Gaya</span><br>
                <span class="gradient-accent hero-word" data-text="Untuk Kepercayaan Diri">Untuk Kepercayaan Diri</span>
            </h1>
            
            <!-- Enhanced Subtitle -->
            <p class="hero-subtitle animate-fade-in-up">
                ✨ Vixs Barbershop menghadirkan pengalaman grooming premium dengan sentuhan modern dan pelayanan profesional untuk penampilan terbaik Anda. ✨
            </p>
            
            <!-- Enhanced CTA Buttons -->
            <div class="hero-cta" style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap; margin-top: 3rem;">
                <a href="#layanan" class="btn btn-primary btn-enhanced animate-fade-in-up" data-delay="0.2s">
                    <span class="btn-text">Jelajahi Layanan</span>
                    <svg class="btn-icon" style="width: 20px; height: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                    <span class="btn-shine"></span>
                </a>
                <a href="#kontak" class="btn btn-outline btn-enhanced animate-fade-in-up" data-delay="0.4s">
                    <span class="btn-text">Hubungi Kami</span>
                    <svg class="btn-icon" style="width: 20px; height: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="btn-shine"></span>
                </a>
            </div>
            
            <!-- Hero Stats -->
            <div class="hero-stats" style="margin-top: 4rem; display: flex; justify-content: center; gap: 3rem; flex-wrap: wrap;">
                <div class="hero-stat animate-fade-in-up" data-delay="0.6s">
                    <div class="stat-number" style="font-size: 2.5rem; font-weight: 800; color: #FFD700;">4+</div>
                    <div class="stat-label" style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">Tahun Pengalaman</div>
                </div>
                <div class="hero-stat animate-fade-in-up" data-delay="0.8s">
                    <div class="stat-number" style="font-size: 2.5rem; font-weight: 800; color: #4ECDC4;">1500+</div>
                    <div class="stat-label" style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">Pelanggan Puas</div>
                </div>
                <div class="hero-stat animate-fade-in-up" data-delay="1s">
                    <div class="stat-number" style="font-size: 2.5rem; font-weight: 800; color: #FF6B6B;">5+</div>
                    <div class="stat-label" style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">Kapster Ahli</div>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="scroll-indicator" style="position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%); animation: bounce 2s infinite;">
                <svg style="width: 24px; height: 24px; color: rgba(255, 255, 255, 0.7);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="layanan" class="section-padding bg-gray">
    <div class="container">
        <div class="section-header">
            <div class="section-subtitle">Layanan Kami</div>
            <h2 class="section-title">Pilihan Layanan Premium</h2>
            <p class="section-description">
                Temukan berbagai layanan grooming profesional yang dirancang khusus untuk memberikan hasil terbaik dan kepuasan maksimal.
            </p>
        </div>

        <div class="grid grid-3">
            <?php foreach ($pakets as $paket) : ?>
                <div class="card animate-fade-in-up">
                    <img src="<?= $paket['image'] ? base_url('uploads/paket/' . $paket['image']) : base_url('assets/images/imgnotfound.jpg') ?>"
                         alt="<?= esc($paket['namapaket']) ?>"
                         class="card-image">
                    
                    <div class="card-content">
                        <h3 class="card-title"><?= esc($paket['namapaket']) ?></h3>
                        <p class="card-description"><?= esc($paket['deskripsi']) ?></p>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1.5rem;">
                            <div class="card-price">
                                Rp <?= number_format(str_replace(',00', '', $paket['harga']), 0, ',', '.') ?>
                            </div>
                            
                            <?php if (session()->get('logged_in') && session()->get('role') == 'pelanggan'): ?>
                                <a href="<?= site_url('customer/booking/create?paket=' . $paket['idpaket']) ?>" 
                                   class="btn btn-primary" style="padding: 0.75rem 1.5rem; font-size: 0.875rem;">
                                    <span>Booking Sekarang</span>
                                </a>
                            <?php else: ?>
                                <a href="<?= site_url('customer/login?redirect=booking') ?>" 
                                   class="btn btn-primary" style="padding: 0.75rem 1.5rem; font-size: 0.875rem;">
                                    <span>Login untuk Booking</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="galeri" class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="section-subtitle">Galeri Kami</div>
            <h2 class="section-title">Karya Terbaik Kami</h2>
            <p class="section-description">
                Lihat koleksi hasil potongan rambut dan styling terbaik dari tim profesional Vixs Barbershop.
            </p>
        </div>

        <?php if (!empty($galeri)): ?>
            <div class="gallery-grid" id="gallery-container">
                <?php foreach ($galeri as $item): ?>
                    <div class="gallery-item animate-fade-in-up">
                        <img src="<?= base_url('uploads/galeri/' . $item['gambar']) ?>"
                             alt="<?= esc($item['nama']) ?>"
                             class="gallery-image"
                             onerror="this.src='<?= base_url('assets/images/imgnotfound.jpg') ?>'">
                        
                        <div class="gallery-overlay">
                            <h3 class="gallery-title"><?= esc($item['nama']) ?></h3>
                            <p style="color: rgba(255, 255, 255, 0.8); font-size: 0.875rem; margin: 0;">
                                <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Galeri Vixs Barbershop
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Load More Button -->
            <?php if (count($galeri) >= 6): ?>
                <div class="text-center mt-xl">
                    <button onclick="loadMoreGaleri()" 
                            class="btn btn-primary" 
                            id="loadMoreBtn">
                        <span>Lihat Lebih Banyak</span>
                        <svg style="width: 20px; height: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center" style="padding: 4rem 0;">
                <div style="max-width: 400px; margin: 0 auto;">
                    <svg style="width: 80px; height: 80px; margin: 0 auto 2rem auto; color: var(--gray-300);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h3 style="font-size: 1.5rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 1rem;">
                        Galeri Sedang Dipersiapkan
                    </h3>
                    <p style="color: var(--text-light); margin: 0;">
                        Kami sedang mempersiapkan koleksi foto terbaik untuk Anda. Segera hadir dengan konten yang menarik!
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- About Section -->
<section id="tentang" class="section-padding bg-gray">
    <div class="container">
        <div class="about-grid">
            <div>
                <div class="section-subtitle">Tentang Kami</div>
                <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">Vixs Barbershop</h2>
                
                <p style="font-size: 1.125rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Sejak tahun 2020, Vixs Barbershop telah menjadi destinasi utama untuk perawatan rambut pria di kota ini. Dengan tim kapster profesional dan berpengalaman, kami berkomitmen memberikan layanan terbaik untuk setiap pelanggan.
                </p>
                
                <p style="color: var(--text-secondary); line-height: 1.7; margin-bottom: 2rem;">
                    Kami menggunakan peralatan modern dan produk berkualitas tinggi untuk memastikan hasil yang maksimal. Setiap potongan rambut adalah karya seni yang dirancang khusus sesuai dengan kepribadian dan gaya hidup Anda.
                </p>

                <div class="stats-grid">
                    <div class="stat-card">
                        <span class="stat-number">4+</span>
                        <span class="stat-label">Tahun Pengalaman</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">1500+</span>
                        <span class="stat-label">Pelanggan Puas</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">5+</span>
                        <span class="stat-label">Kapster Profesional</span>
                    </div>
                </div>
            </div>

            <div class="about-image">
                <img src="<?= base_url('assets/images/hero1.jpg') ?>" 
                     alt="Interior Vixs Barbershop"
                     style="width: 100%; height: 500px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="kontak" class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="section-subtitle">Kontak</div>
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-description">
                Siap melayani Anda dengan pelayanan terbaik. Jangan ragu untuk menghubungi kami kapan saja.
            </p>
        </div>

        <div class="contact-grid">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <h4>Alamat Lokasi</h4>
                        <p>Jl. Adinegoro No.16, Batang Kabung Ganting, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <h4>Nomor Telepon</h4>
                        <p>+62 123 4567 890</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <h4>Jam Operasional</h4>
                        <p>Senin - Minggu: 09:00 - 21:00 WIB</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <h4>Email</h4>
                        <p>info@vixsbarbershop.com</p>
                    </div>
                </div>
            </div>

            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3707439167792!2d100.339117!3d-0.8582202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c0d0ad1b09a3%3A0x99c6256ef2ae7952!2sJl.%20Adinegoro%20No.16%2C%20Batang%20Kabung%20Ganting%2C%20Kec.%20Koto%20Tangah%2C%20Kota%20Padang%2C%20Sumatera%20Barat%2025586!5e0!3m2!1sid!2sid!4v1756064086567!5m2!1sid!2sid"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

<script>
// Load more gallery functionality
let galeriOffset = 6;
const galeriLimit = 6;

function loadMoreGaleri() {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const originalContent = loadMoreBtn.innerHTML;
    
    loadMoreBtn.innerHTML = `
        <span style="display: flex; align-items: center;">
            <svg style="width: 20px; height: 20px; margin-right: 8px; animation: spin 1s linear infinite;" fill="none" viewBox="0 0 24 24">
                <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Memuat...
        </span>
    `;

    // Simulate API call for more gallery items
    fetch(`<?= site_url('api/galeri/more') ?>?offset=${galeriOffset}&limit=${galeriLimit}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success' && data.galeri.length > 0) {
                const galleryContainer = document.getElementById('gallery-container');
                
                data.galeri.forEach((item) => {
                    const galleryItem = document.createElement('div');
                    galleryItem.className = 'gallery-item animate-fade-in-up';
                    
                    galleryItem.innerHTML = `
                        <img src="${item.image_url}"
                             alt="${item.nama}"
                             class="gallery-image"
                             onerror="this.src='<?= base_url('assets/images/imgnotfound.jpg') ?>'">
                        
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">${item.nama}</h3>
                            <p style="color: rgba(255, 255, 255, 0.8); font-size: 0.875rem; margin: 0;">
                                <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Galeri Vixs Barbershop
                            </p>
                        </div>
                    `;
                    
                    galleryContainer.appendChild(galleryItem);
                });

                galeriOffset += galeriLimit;
                
                // Hide button if no more data
                if (data.galeri.length < galeriLimit) {
                    loadMoreBtn.style.display = 'none';
                } else {
                    loadMoreBtn.innerHTML = originalContent;
                }
            } else {
                loadMoreBtn.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error loading more gallery:', error);
            loadMoreBtn.innerHTML = originalContent;
        });
}

// Add CSS for spinner animation
const style = document.createElement('style');
style.textContent = `
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
`;
document.head.appendChild(style);
</script>

<?= $this->endSection() ?>