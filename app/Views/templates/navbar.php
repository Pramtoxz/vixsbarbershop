<!-- Navbar -->
<nav class="navbar navbar-enhanced navbar-transparent" id="navbar">
    <div class="container">
        <div class="nav-content">
            <!-- Logo Section -->
            <div class="nav-logo-section">
                <a href="<?= base_url() ?>" class="nav-logo">
                    <span class="logo-text">Vixs Barbershop</span>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                <span class="hamburger-icon">☰</span>
            </button>

            <!-- Navigation Links -->
            <div class="nav-links-container">
                <ul class="nav-links" id="nav-links">
                    <li><a href="<?= base_url() ?>#beranda" class="nav-link active">Beranda</a></li>
                    <li><a href="<?= base_url() ?>#layanan" class="nav-link">Layanan</a></li>
                    <li><a href="<?= base_url() ?>#galeri" class="nav-link">Galeri</a></li>
                    <li><a href="<?= base_url() ?>#tentang" class="nav-link">Tentang</a></li>
                    <li><a href="<?= base_url() ?>#kontak" class="nav-link">Kontak</a></li>
                </ul>

                <!-- Action Buttons -->
                <div class="nav-actions">
                    <?php if (isset($_SESSION['pelanggan']) || session()->get('logged_in')) : ?>
                        <!-- Booking Button -->
                        <a href="<?= base_url('customer/booking/create') ?>" class="btn btn-primary btn-enhanced nav-btn-booking">
                            <span class="btn-text">Booking</span>
                            <span class="btn-shine"></span>
                        </a>

                        <!-- User Menu -->
                        <div class="user-menu-wrapper">
                            <button class="user-menu-trigger" onclick="toggleUserMenu()">
                                <span class="user-avatar">👤</span>
                                <span class="user-text">Akun</span>
                                <span class="dropdown-arrow">⌄</span>
                            </button>

                            <div class="user-menu" id="user-menu">
                                <div class="user-menu-header">
                                    <span class="user-greeting">👋 Selamat datang!</span>
                                </div>
                                <div class="user-menu-items">
                                    <a href="<?= base_url('customer/profil') ?>" class="user-menu-item">
                                        <span class="menu-icon">👤</span>
                                        <span class="menu-text">Profil Saya</span>
                                    </a>
                                    <a href="<?= base_url('customer/booking') ?>" class="user-menu-item">
                                        <span class="menu-icon">📋</span>
                                        <span class="menu-text">Riwayat Booking</span>
                                    </a>
                                    <div class="menu-divider"></div>
                                    <a href="<?= base_url('customer/logout') ?>" class="user-menu-item logout-item">
                                        <span class="menu-icon">🚪</span>
                                        <span class="menu-text">Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <!-- Login Button -->
                        <a href="<?= base_url('customer/login') ?>" class="btn btn-primary btn-enhanced nav-btn-login">
                            <span class="btn-icon">🔐</span>
                            <span class="btn-text">Login/Daftar</span>
                            <span class="btn-shine"></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay" onclick="closeMobileMenu()"></div>
    <div class="mobile-menu-content" id="mobile-menu-content">
        <!-- Mobile Menu Header -->
        <div class="mobile-menu-header">
            <div class="mobile-logo">
                <span class="mobile-logo-icon">✂️</span>
                <span class="mobile-logo-text">Menu</span>
            </div>
            <button class="mobile-close-btn" onclick="closeMobileMenu()">
                <span class="close-icon">✖️</span>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="mobile-nav-section">
            <h3 class="mobile-section-title">Navigasi</h3>
            <ul class="mobile-nav-links">
                <li>
                    <a href="<?= base_url() ?>#beranda" class="mobile-nav-link" onclick="closeMobileMenu()">
                        <span class="mobile-nav-text">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>#layanan" class="mobile-nav-link" onclick="closeMobileMenu()">
                        <span class="mobile-nav-text">Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>#galeri" class="mobile-nav-link" onclick="closeMobileMenu()">
                        <span class="mobile-nav-text">Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>#tentang" class="mobile-nav-link" onclick="closeMobileMenu()">
                        <span class="mobile-nav-text">Tentang</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>#kontak" class="mobile-nav-link" onclick="closeMobileMenu()">
                        <span class="mobile-nav-text">Kontak</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Mobile Actions -->
        <div class="mobile-actions-section">
            <?php if (isset($_SESSION['pelanggan']) || session()->get('logged_in')) : ?>
                <h3 class="mobile-section-title">⚡ Aksi Cepat</h3>
                <div class="mobile-action-buttons">
                    <a href="<?= base_url('customer/booking/create') ?>" class="btn btn-primary mobile-action-btn" onclick="closeMobileMenu()">
                        <span class="btn-text">Booking Sekarang</span>
                    </a>
                    <a href="<?= base_url('customer/profil') ?>" class="btn btn-secondary mobile-action-btn" onclick="closeMobileMenu()">
                        <span class="btn-icon">👤</span>
                        <span class="btn-text">Profil Saya</span>
                    </a>
                </div>

                <div class="mobile-logout-section">
                    <a href="<?= base_url('customer/logout') ?>" class="mobile-logout-link" onclick="closeMobileMenu()">
                        <span class="logout-icon">🚪</span>
                        <span class="logout-text">Logout</span>
                    </a>
                </div>
            <?php else : ?>
                <h3 class="mobile-section-title">🔐 Akses Akun</h3>
                <div class="mobile-action-buttons">
                    <a href="<?= base_url('customer/login') ?>" class="btn btn-primary mobile-action-btn" onclick="closeMobileMenu()">
                        <span class="btn-icon">🔐</span>
                        <span class="btn-text">Login/Daftar</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.remove('navbar-transparent');
            navbar.classList.add('navbar-fixed');
        } else {
            navbar.classList.add('navbar-transparent');
            navbar.classList.remove('navbar-fixed');
        }
    });



    // Enhanced User menu toggle
    function toggleUserMenu() {
        const userMenu = document.getElementById('user-menu');
        const isVisible = userMenu.classList.contains('show');

        if (isVisible) {
            userMenu.classList.remove('show');
            setTimeout(() => {
                userMenu.style.display = 'none';
            }, 300);
        } else {
            userMenu.style.display = 'block';
            setTimeout(() => {
                userMenu.classList.add('show');
            }, 10);
        }
    }

    // Close user menu when clicking outside
    document.addEventListener('click', function(event) {
        const userMenu = document.getElementById('user-menu');
        const userMenuWrapper = event.target.closest('.user-menu-wrapper');

        if (userMenu && !userMenuWrapper && userMenu.classList.contains('show')) {
            userMenu.classList.remove('show');
            setTimeout(() => {
                userMenu.style.display = 'none';
            }, 300);
        }
    });

    // Enhanced Mobile menu functionality
    function toggleMobileMenu() {
        const overlay = document.getElementById('mobile-menu-overlay');
        const content = document.getElementById('mobile-menu-content');

        const isVisible = content.classList.contains('show');

        if (isVisible) {
            // Hide mobile menu
            content.classList.remove('show');
            overlay.classList.remove('show');

            setTimeout(() => {
                overlay.style.display = 'none';
                content.style.display = 'none';
            }, 400);
        } else {
            // Show mobile menu
            overlay.style.display = 'block';
            content.style.display = 'block';

            setTimeout(() => {
                overlay.classList.add('show');
                content.classList.add('show');
            }, 10);
        }
    }

    function closeMobileMenu() {
        const overlay = document.getElementById('mobile-menu-overlay');
        const content = document.getElementById('mobile-menu-content');

        content.classList.remove('show');
        overlay.classList.remove('show');

        setTimeout(() => {
            overlay.style.display = 'none';
            content.style.display = 'none';
        }, 400);
    }

    // Mobile menu responsive check
    function checkMobile() {
        const mobileToggle = document.getElementById('mobile-menu-toggle');
        const navLinksContainer = document.querySelector('.nav-links-container');

        if (window.innerWidth <= 768) {
            mobileToggle.style.display = 'block';
            if (navLinksContainer) {
                navLinksContainer.style.display = 'none';
            }
            mobileToggle.onclick = toggleMobileMenu;
        } else {
            mobileToggle.style.display = 'none';
            if (navLinksContainer) {
                navLinksContainer.style.display = 'flex';
            }
            // Close mobile menu if open
            closeMobileMenu();
        }
    }

    // Check on load and resize
    window.addEventListener('load', checkMobile);
    window.addEventListener('resize', checkMobile);

    // Active nav link highlighting
    function updateActiveNavLink() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        let currentSection = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.offsetHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href && currentSection && href.includes('#' + currentSection)) {
                link.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', updateActiveNavLink);
</script>