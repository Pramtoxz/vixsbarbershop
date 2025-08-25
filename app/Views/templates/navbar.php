<!-- Navbar -->
<nav class="navbar navbar-transparent" id="navbar">
    <div class="container">
        <div class="nav-content">
            <a href="<?= base_url() ?>" class="nav-logo">
                Vixs Barbershop
            </a>
            
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" style="display: none; background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <ul class="nav-links" id="nav-links">
                <li><a href="<?= base_url() ?>#beranda" class="nav-link active">Beranda</a></li>
                <li><a href="<?= base_url() ?>#layanan" class="nav-link">Layanan</a></li>
                <li><a href="<?= base_url() ?>#galeri" class="nav-link">Galeri</a></li>
                <li><a href="<?= base_url() ?>#tentang" class="nav-link">Tentang</a></li>
                <li><a href="<?= base_url() ?>#kontak" class="nav-link">Kontak</a></li>
                
                <?php if (isset($_SESSION['pelanggan']) || session()->get('logged_in')) : ?>
                    <li>
                        <a href="<?= base_url('customer/booking/create') ?>" class="btn btn-primary" style="padding: 0.75rem 1.5rem; font-size: 0.875rem;">
                            <span>Booking</span>
                        </a>
                    </li>
                    <li style="position: relative;">
                        <button class="nav-link" onclick="toggleUserMenu()" style="background: none; border: none; cursor: pointer; display: flex; align-items: center;">
                            <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Akun</span>
                            <svg style="width: 16px; height: 16px; margin-left: 4px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="user-menu" id="user-menu" style="display: none; position: absolute; top: 100%; right: 0; background: var(--white); border-radius: var(--radius-md); box-shadow: var(--shadow-lg); border: 1px solid var(--gray-200); min-width: 180px; z-index: 1000;">
                            <a href="<?= base_url('customer/profil') ?>" style="display: flex; align-items: center; padding: 0.75rem 1rem; color: var(--text-primary); text-decoration: none; border-bottom: 1px solid var(--gray-100);">
                                <svg style="width: 16px; height: 16px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>Profil</span>
                            </a>
                            <a href="<?= base_url('customer/booking') ?>" style="display: flex; align-items: center; padding: 0.75rem 1rem; color: var(--text-primary); text-decoration: none; border-bottom: 1px solid var(--gray-100);">
                                <svg style="width: 16px; height: 16px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0a2 2 0 00-2 2v9a2 2 0 002 2h6a2 2 0 002-2V9a2 2 0 00-2-2"/>
                                </svg>
                                <span>Riwayat Booking</span>
                            </a>
                            <a href="<?= base_url('customer/logout') ?>" style="display: flex; align-items: center; padding: 0.75rem 1rem; color: var(--error-color); text-decoration: none;">
                                <svg style="width: 16px; height: 16px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= base_url('customer/login') ?>" class="btn btn-primary" style="padding: 0.75rem 1.5rem; font-size: 0.875rem;">
                            <span>Login/Daftar</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="closeMobileMenu()"></div>
    <div class="mobile-menu-content" id="mobile-menu-content" style="display: none; position: fixed; top: 0; right: 0; height: 100vh; width: 280px; background: var(--white); z-index: 1000; padding: 2rem; box-shadow: var(--shadow-xl); transform: translateX(100%); transition: transform 0.3s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <span style="font-size: 1.25rem; font-weight: 700; color: var(--primary-color);">Menu</span>
            <button onclick="closeMobileMenu()" style="background: none; border: none; font-size: 1.5rem; color: var(--text-secondary); cursor: pointer;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <ul style="list-style: none; margin: 0; padding: 0;">
            <li style="margin-bottom: 1rem;">
                <a href="<?= base_url() ?>#beranda" style="display: block; padding: 0.75rem 0; color: var(--text-primary); text-decoration: none; font-weight: 500; border-bottom: 1px solid var(--gray-100);">Beranda</a>
            </li>
            <li style="margin-bottom: 1rem;">
                <a href="<?= base_url() ?>#layanan" style="display: block; padding: 0.75rem 0; color: var(--text-primary); text-decoration: none; font-weight: 500; border-bottom: 1px solid var(--gray-100);">Layanan</a>
            </li>
            <li style="margin-bottom: 1rem;">
                <a href="<?= base_url() ?>#galeri" style="display: block; padding: 0.75rem 0; color: var(--text-primary); text-decoration: none; font-weight: 500; border-bottom: 1px solid var(--gray-100);">Galeri</a>
            </li>
            <li style="margin-bottom: 1rem;">
                <a href="<?= base_url() ?>#tentang" style="display: block; padding: 0.75rem 0; color: var(--text-primary); text-decoration: none; font-weight: 500; border-bottom: 1px solid var(--gray-100);">Tentang</a>
            </li>
            <li style="margin-bottom: 2rem;">
                <a href="<?= base_url() ?>#kontak" style="display: block; padding: 0.75rem 0; color: var(--text-primary); text-decoration: none; font-weight: 500; border-bottom: 1px solid var(--gray-100);">Kontak</a>
            </li>
            
            <?php if (isset($_SESSION['pelanggan']) || session()->get('logged_in')) : ?>
                <li style="margin-bottom: 1rem;">
                    <a href="<?= base_url('customer/booking/create') ?>" class="btn btn-primary" style="width: 100%; justify-content: center;">
                        <span>Booking Sekarang</span>
                    </a>
                </li>
                <li style="margin-bottom: 1rem;">
                    <a href="<?= base_url('customer/profil') ?>" class="btn btn-secondary" style="width: 100%; justify-content: center;">
                        <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('customer/logout') ?>" style="display: block; padding: 0.75rem 0; color: var(--error-color); text-decoration: none; font-weight: 500; text-align: center;">
                        Logout
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= base_url('customer/login') ?>" class="btn btn-primary" style="width: 100%; justify-content: center;">
                        <span>Login/Daftar</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
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

// Mobile menu functionality
function toggleMobileMenu() {
    const overlay = document.getElementById('mobile-menu-overlay');
    const content = document.getElementById('mobile-menu-content');
    
    overlay.style.display = 'block';
    content.style.display = 'block';
    
    setTimeout(() => {
        content.style.transform = 'translateX(0)';
    }, 10);
}

function closeMobileMenu() {
    const overlay = document.getElementById('mobile-menu-overlay');
    const content = document.getElementById('mobile-menu-content');
    
    content.style.transform = 'translateX(100%)';
    
    setTimeout(() => {
        overlay.style.display = 'none';
        content.style.display = 'none';
    }, 300);
}

// User menu toggle
function toggleUserMenu() {
    const userMenu = document.getElementById('user-menu');
    userMenu.style.display = userMenu.style.display === 'none' ? 'block' : 'none';
}

// Close user menu when clicking outside
document.addEventListener('click', function(event) {
    const userMenu = document.getElementById('user-menu');
    const userButton = event.target.closest('button');
    
    if (userMenu && !userButton) {
        userMenu.style.display = 'none';
    }
});

// Mobile menu toggle button show/hide
function checkMobile() {
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const navLinks = document.getElementById('nav-links');
    
    if (window.innerWidth <= 768) {
        mobileToggle.style.display = 'block';
        navLinks.style.display = 'none';
        mobileToggle.onclick = toggleMobileMenu;
    } else {
        mobileToggle.style.display = 'none';
        navLinks.style.display = 'flex';
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
        if (link.getAttribute('href').includes('#' + currentSection)) {
            link.classList.add('active');
        }
    });
}

window.addEventListener('scroll', updateActiveNavLink);
</script>