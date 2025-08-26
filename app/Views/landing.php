<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<!-- Hero Section - Elegant Barbershop Design -->
<section class="hero-barbershop" id="beranda">
    <!-- Hero Background Image -->
    <div class="hero-image-container">
        <img src="<?= base_url('assets/images/hero.jpg') ?>" 
             alt="Vixs Barbershop Interior" 
             class="hero-background-image">
        <div class="hero-overlay"></div>
    </div>
    
    <!-- Barbershop Decorative Elements -->
    <div class="barbershop-elements">
        <div class="barber-pole barber-pole-1">
            <div class="pole-stripe"></div>
        </div>
        <div class="barber-pole barber-pole-2">
            <div class="pole-stripe"></div>
        </div>
        <div class="scissors-decoration scissors-1">✂️</div>
        <div class="scissors-decoration scissors-2">✂️</div>
        <div class="mustache-decoration">👨‍🦲</div>
    </div>
    
    <!-- Hero Content -->
    <div class="container">
        <div class="hero-barbershop-content">
            <div class="hero-content-wrapper">
                <!-- Badge -->
                <div class="hero-badge animate-fade-in-up">
                    <span class="badge-icon">✂️</span>
                    <span class="badge-text">Premium Barbershop</span>
                    <span class="badge-year">EST. 2020</span>
                </div>
                
                <!-- Main Title -->
                <h1 class="hero-barbershop-title animate-fade-in-up">
                    <span class="title-line-1">VIXS</span>
                    <span class="title-line-2">BARBERSHOP</span>
                    <span class="title-subtitle">Masterpiece in Every Cut</span>
                </h1>
                
                <!-- Description -->
                <p class="hero-barbershop-description animate-fade-in-up">
                    Rasakan pengalaman grooming kelas dunia dengan sentuhan tradisional dan teknik modern. 
                    Tim master barber kami menghadirkan gaya yang sesuai dengan kepribadian Anda.
                </p>
                
                <!-- Features List -->
                <div class="hero-features animate-fade-in-up">
                    <div class="feature-item">
                        <span class="feature-icon">🏆</span>
                        <span class="feature-text">Master Barber Certified</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✨</span>
                        <span class="feature-text">Premium Products</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">⚡</span>
                        <span class="feature-text">Modern Techniques</span>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="hero-barbershop-cta animate-fade-in-up">
                    <?php if (session()->get('logged_in') && session()->get('role') == 'pelanggan'): ?>
                        <a href="<?= site_url('customer/booking/create') ?>" class="btn btn-primary btn-enhanced barbershop-btn-primary">
                            <span class="btn-icon">📅</span>
                            <span class="btn-text">Book Appointment</span>
                            <span class="btn-shine"></span>
                        </a>
                    <?php else: ?>
                        <a href="<?= site_url('customer/login') ?>" class="btn btn-primary btn-enhanced barbershop-btn-primary">
                            <span class="btn-icon">📅</span>
                            <span class="btn-text">Book Appointment</span>
                            <span class="btn-shine"></span>
                        </a>
                    <?php endif; ?>
                    
                    <a href="#layanan" class="btn btn-outline btn-enhanced barbershop-btn-outline">
                        <span class="btn-icon">👁️</span>
                        <span class="btn-text">View Services</span>
                        <span class="btn-shine"></span>
                    </a>
                </div>
            </div>
            
            <!-- Hero Stats -->
            <!-- <div class="hero-barbershop-stats animate-fade-in-up">
                <div class="stat-item">
                    <div class="stat-number">4+</div>
                    <div class="stat-label">Years Excellence</div>
                    <div class="stat-icon">📅</div>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <div class="stat-number">1500+</div>
                    <div class="stat-label">Happy Clients</div>
                    <div class="stat-icon">😊</div>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Master Barbers</div>
                    <div class="stat-icon">✂️</div>
                </div>
            </div> -->
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator-barbershop">
        <div class="scroll-text">Scroll to Explore</div>
        <div class="scroll-arrow">⬇️</div>
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
                                <span style="font-size: 1rem; margin-right: 8px;">📸</span>
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
                        <span style="font-size: 1.25rem; margin-left: 8px;">⬇️</span>
                    </button>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center" style="padding: 4rem 0;">
                <div style="max-width: 400px; margin: 0 auto;">
                    <div style="font-size: 5rem; text-align: center; margin-bottom: 2rem; opacity: 0.3;">🖼️</div>
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
                        <span style="font-size: 1.5rem;">📍</span>
                    </div>
                    <div class="contact-details">
                        <h4>Alamat Lokasi</h4>
                        <p>Jl. Adinegoro No.16, Batang Kabung Ganting, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <span style="font-size: 1.5rem;">📞</span>
                    </div>
                    <div class="contact-details">
                        <h4>Nomor Telepon</h4>
                        <p>+62 123 4567 890</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <span style="font-size: 1.5rem;">🕐</span>
                    </div>
                    <div class="contact-details">
                        <h4>Jam Operasional</h4>
                        <p>Senin - Minggu: 09:00 - 21:00 WIB</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <span style="font-size: 1.5rem;">📧</span>
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
            <span style="font-size: 1.25rem; margin-right: 8px; animation: spin 1s linear infinite;">⏳</span>
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
                                <span style="font-size: 1rem; margin-right: 8px;">📸</span>
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