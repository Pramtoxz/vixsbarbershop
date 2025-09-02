<?php if (session('role') == 'admin'): ?>
    <div class="sidebar" id="sidebar">
        <!-- Brand Section -->
        <div class="sidebar-brand">
            <div class="brand-logo">
                <div class="logo-container">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Vixs Barbershop" onerror="this.src='https://ui-avatars.com/api/?name=V&background=667eea&color=fff&bold=true&size=128'">
                    <div class="logo-overlay">
                        <i class="bi bi-scissors"></i>
                    </div>
                </div>
            </div>
            <div class="brand-text">
                <h3 class="brand-name">VIXS</h3>
                <p class="brand-subtitle">Barbershop</p>
                <div class="brand-status">
                    <span class="status-dot"></span>
                    <span class="status-text">Online</span>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="sidebar-nav">
            <!-- Dashboard -->
            <div class="nav-section">
                <a href="<?= site_url('admin') ?>" class="nav-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
                    <div class="nav-icon dashboard-icon">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>
                    <span class="nav-text">Dashboard</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>

            <!-- Data Master Section -->
            <div class="nav-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="bi bi-database-fill"></i>
                    </div>
                    <span class="section-title">Data Master</span>
                    <div class="section-line"></div>
                </div>

                <a href="<?= site_url('admin/pelanggan') ?>" class="nav-item <?= ($title == 'Manajemen Pelanggan' || $title == 'Tambah Pelanggan' || $title == 'Edit Pelanggan') ? 'active' : '' ?>">
                    <div class="nav-icon customers-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <span class="nav-text">Pelanggan</span>
                    <div class="nav-indicator"></div>
                </a>

                <a href="<?= site_url('admin/karyawan') ?>" class="nav-item <?= $title == 'Manajemen Karyawan' ? 'active' : '' ?>">
                    <div class="nav-icon staff-icon">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                    <span class="nav-text">Barberman</span>
                    <div class="nav-indicator"></div>
                </a>

                <a href="<?= site_url('admin/paket') ?>" class="nav-item <?= ($title == 'Manajemen Paket' || $title == 'Tambah Paket' || $title == 'Edit Paket') ? 'active' : '' ?>">
                    <div class="nav-icon services-icon">
                        <i class="bi bi-scissors"></i>
                    </div>
                    <span class="nav-text">Layanan</span>
                    <div class="nav-indicator"></div>
                </a>

                <a href="<?= site_url('admin/galeri') ?>" class="nav-item <?= ($title == 'Manajemen Galeri' || $title == 'Tambah Galeri' || $title == 'Edit Galeri') ? 'active' : '' ?>">
                    <div class="nav-icon gallery-icon">
                        <i class="bi bi-image-fill"></i>
                    </div>
                    <span class="nav-text">Galeri</span>
                    <div class="nav-indicator"></div>
                </a>

                <a href="<?= site_url('admin/users') ?>" class="nav-item <?= $title == 'User Management' ? 'active' : '' ?>">
                    <div class="nav-icon users-icon">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                    <span class="nav-text">Admin</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>

            <!-- Transaksi Section -->
            <div class="nav-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="bi bi-credit-card-fill"></i>
                    </div>
                    <span class="section-title">Transaksi</span>
                    <div class="section-line"></div>
                </div>

                <a href="<?= site_url('admin/booking') ?>" class="nav-item <?= ($title == 'Kelola Booking' || $title == 'Tambah Booking Baru' || $title == 'Detail Booking') ? 'active' : '' ?>">
                    <div class="nav-icon booking-icon">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <span class="nav-text">Booking</span>
                    <div class="nav-indicator"></div>
                </a>
                <a href="<?= site_url('admin/pengeluaran') ?>" class="nav-item <?= ($title == 'Kelola Pengeluaran' || $title == 'Tambah Pengeluaran Baru' || $title == 'Detail Pengeluaran') ? 'active' : '' ?>">
                    <div class="nav-icon booking-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <span class="nav-text">Pengeluaran</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>

            <!-- Laporan Section -->
            <div class="nav-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <span class="section-title">Analytics</span>
                    <div class="section-line"></div>
                </div>

                <a href="<?= site_url('admin/reports') ?>" class="nav-item <?= ($title == 'Laporan' || $title == 'Laporan Karyawan' || $title == 'Laporan Pembayaran' || $title == 'Laporan Uang Masuk Bulanan' || $title == 'Laporan Uang Masuk Tahun' || $title == 'Laporan Pendapatan Tahunan') ? 'active' : '' ?>">
                    <div class="nav-icon reports-icon">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <span class="nav-text">Laporan</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>
        </div>


    </div>
<?php endif; ?>

<?php if (session('role') == 'pimpinan'): ?>
    <div class="sidebar" id="sidebar">
        <!-- Brand Section -->
        <div class="sidebar-brand">
            <div class="brand-logo">
                <div class="logo-container">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Vixs Barbershop" onerror="this.src='https://ui-avatars.com/api/?name=V&background=667eea&color=fff&bold=true&size=128'">
                    <div class="logo-overlay">
                        <i class="bi bi-scissors"></i>
                    </div>
                </div>
            </div>
            <div class="brand-text">
                <h3 class="brand-name">VIXS</h3>
                <p class="brand-subtitle">Barbershop</p>
                <div class="brand-status">
                    <span class="status-dot"></span>
                    <span class="status-text">Online</span>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="sidebar-nav">
            <!-- Dashboard -->
            <div class="nav-section">
                <a href="<?= site_url('admin') ?>" class="nav-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
                    <div class="nav-icon dashboard-icon">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>
                    <span class="nav-text">Dashboard</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>

            <!-- Laporan Section -->
            <div class="nav-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <span class="section-title">Analytics</span>
                    <div class="section-line"></div>
                </div>

                <a href="<?= site_url('admin/reports') ?>" class="nav-item <?= ($title == 'Laporan' || $title == 'Laporan Karyawan') ? 'active' : '' ?>">
                    <div class="nav-icon reports-icon">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <span class="nav-text">Laporan</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>
        </div>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="footer-stats">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">Pimpinan</span>
                        <span class="stat-label">Mode View Only</span>
                    </div>
                </div>
            </div>

            <a href="javascript:void(0)" class="logout-btn" id="btn-logout">
                <div class="logout-icon">
                    <i class="bi bi-power"></i>
                </div>
                <span class="logout-text">Logout</span>
                <div class="logout-arrow">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>

<?php if (session('role') == 'karyawan'): ?>
    <div class="sidebar" id="sidebar">
        <!-- Brand Section -->
        <div class="sidebar-brand">
            <div class="brand-logo">
                <div class="logo-container">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Vixs Barbershop" onerror="this.src='https://ui-avatars.com/api/?name=V&background=667eea&color=fff&bold=true&size=128'">
                    <div class="logo-overlay">
                        <i class="bi bi-scissors"></i>
                    </div>
                </div>
            </div>
            <div class="brand-text">
                <h3 class="brand-name">VIXS</h3>
                <p class="brand-subtitle">Barbershop</p>
                <div class="brand-status">
                    <span class="status-dot"></span>
                    <span class="status-text">Online</span>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="sidebar-nav">
            <!-- Dashboard -->
            <div class="nav-section">
                <a href="<?= site_url('karyawan') ?>" class="nav-item <?= $title == 'Dashboard Karyawan' ? 'active' : '' ?>">
                    <div class="nav-icon dashboard-icon">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>
                    <span class="nav-text">Dashboard</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>

            <!-- Jadwal Section -->
            <div class="nav-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="bi bi-calendar-week"></i>
                    </div>
                    <span class="section-title">Jadwal Kerja</span>
                    <div class="section-line"></div>
                </div>

                <a href="<?= site_url('karyawan/jadwal') ?>" class="nav-item <?= $title == 'Jadwal Kerja' ? 'active' : '' ?>">
                    <div class="nav-icon booking-icon">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <span class="nav-text">Jadwal Saya</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>

            <!-- Profil Section -->
            <div class="nav-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <span class="section-title">Akun</span>
                    <div class="section-line"></div>
                </div>

                <a href="<?= site_url('karyawan/profile') ?>" class="nav-item <?= $title == 'Profil Saya' ? 'active' : '' ?>">
                    <div class="nav-icon users-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <span class="nav-text">Profil</span>
                    <div class="nav-indicator"></div>
                </a>
            </div>
        </div>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="footer-stats">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number">Karyawan</span>
                        <span class="stat-label"><?= esc(session('name')) ?></span>
                    </div>
                </div>
            </div>

            <a href="javascript:void(0)" class="logout-btn" id="btn-logout">
                <div class="logout-icon">
                    <i class="bi bi-power"></i>
                </div>
                <span class="logout-text">Logout</span>
                <div class="logout-arrow">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>

<!-- Sidebar Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Load sidebar stats
        loadSidebarStats();

        // Initialize sidebar interactions
        initSidebarInteractions();

        // Auto update stats every 30 seconds
        setInterval(loadSidebarStats, 30000);
    });

    function loadSidebarStats() {
        // Load customer count
        fetch('<?= site_url('admin/getCustomerCount') ?>')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('customerCount').textContent = data.count;
                }
            })
            .catch(() => {
                document.getElementById('customerCount').textContent = '0';
            });

        // Load staff count
        fetch('<?= site_url('admin/getStaffCount') ?>')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('staffCount').textContent = data.count;
                }
            })
            .catch(() => {
                document.getElementById('staffCount').textContent = '0';
            });

        // Load service count
        fetch('<?= site_url('admin/getServiceCount') ?>')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('serviceCount').textContent = data.count;
                }
            })
            .catch(() => {
                document.getElementById('serviceCount').textContent = '0';
            });

        // Load today's booking count
        fetch('<?= site_url('admin/getTodayBookingCount') ?>')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const count = data.count;
                    document.getElementById('todayBookingCount').textContent = count;

                    // Update footer booking count if exists
                    const footerBooking = document.getElementById('todayBookings');
                    if (footerBooking) {
                        footerBooking.textContent = count;
                    }

                    // Add pulse effect for new bookings
                    if (count > 0) {
                        document.querySelector('.booking-badge').classList.add('has-notifications');
                    }
                }
            })
            .catch(() => {
                document.getElementById('todayBookingCount').textContent = '0';
            });
    }

    function initSidebarInteractions() {
        // Add hover effects to nav items
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.classList.add('hovered');
            });

            item.addEventListener('mouseleave', function() {
                this.classList.remove('hovered');
            });
        });

        // Add click ripple effect
        const clickableItems = document.querySelectorAll('.nav-item, .quick-action-btn');
        clickableItems.forEach(item => {
            item.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('div');
                ripple.classList.add('ripple-effect');

                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Animate on scroll for better UX
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        });

        document.querySelectorAll('.nav-section').forEach(section => {
            observer.observe(section);
        });
    }
</script>