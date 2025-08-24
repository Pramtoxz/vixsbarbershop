<div class="topbar" data-aos="fade-down" data-aos-delay="100">
    <!-- Mobile Menu Toggle -->
    <button class="modern-navbar-toggler d-lg-none" id="navbarToggler" type="button" aria-label="Toggle navigation">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
    </button>

    <!-- Page Title Section -->
    <div class="topbar-title-section">
        <h1 class="topbar-title" data-aos="fade-right" data-aos-delay="200">
            <span class="title-icon">
                <i class="bi bi-speedometer2"></i>
            </span>
            <?= $title ?? 'Dashboard' ?>
        </h1>
        <div class="title-breadcrumb">
            <span class="breadcrumb-home">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </span>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-current"><?= $title ?? 'Dashboard' ?></span>
        </div>
    </div>

    <!-- Action Controls -->
    <div class="topbar-actions" data-aos="fade-left" data-aos-delay="300">
        <!-- Quick Search -->
        <div class="quick-search-container me-3 d-none d-md-block">
            <div class="search-input-wrapper">
                <i class="bi bi-search search-icon"></i>
                <input type="text" class="quick-search-input" placeholder="Quick search..." />
                <div class="search-suggestions" id="searchSuggestions"></div>
            </div>
        </div>

        <!-- Theme Toggle -->
        <button class="action-btn theme-toggle me-3 d-none d-sm-block" id="themeToggle" title="Toggle theme">
            <i class="bi bi-sun-fill"></i>
        </button>

        <!-- Fullscreen Toggle -->
        <button class="action-btn fullscreen-toggle me-3 d-none d-md-block" id="fullscreenToggle" title="Toggle fullscreen">
            <i class="bi bi-arrows-fullscreen"></i>
        </button>

        <!-- Notifications -->
        <div class="dropdown notification-dropdown-wrapper me-3">
            <button class="action-btn notification-btn position-relative" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Notifications">
                <i class="bi bi-bell notification-icon"></i>
                <span id="notificationBadge" class="notification-badge" style="display: none;">
                    <span class="notification-count">0</span>
                </span>
                <div class="notification-pulse"></div>
            </button>
            
            <div class="dropdown-menu dropdown-menu-end modern-notification-dropdown" aria-labelledby="notificationDropdown">
                <!-- Notification Header -->
                <div class="notification-header">
                    <div class="notification-header-content">
                        <h6 class="notification-title">
                            <i class="bi bi-bell-fill me-2"></i>
                            Notifikasi
                        </h6>
                        <span class="notification-subtitle">Updates terbaru untuk Anda</span>
                    </div>
                    <button id="markAllReadBtn" class="mark-all-read-btn" title="Mark all as read">
                        <i class="bi bi-check2-all"></i>
                    </button>
                </div>

                <!-- Notification List -->
                <div id="notificationList" class="notification-list">
                    <div class="notification-loading">
                        <div class="loading-spinner"></div>
                        <span>Memuat notifikasi...</span>
                    </div>
                </div>

                <!-- Notification Footer -->
                <div class="notification-footer">
                    <a href="#" class="view-all-btn" id="viewAllNotifications">
                        <span>Lihat semua notifikasi</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- User Profile Dropdown -->
        <div class="dropdown user-dropdown-wrapper">
            <button class="user-profile-btn" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-avatar">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=667eea&color=fff&bold=true&size=128" alt="Admin" class="avatar-img">
                    <div class="avatar-status online"></div>
                </div>
                <div class="user-info d-none d-sm-block">
                    <span class="user-name">Administrator</span>
                    <span class="user-role">Super Admin</span>
                </div>
                <i class="bi bi-chevron-down dropdown-arrow d-none d-sm-inline"></i>
            </button>
            
            <div class="dropdown-menu dropdown-menu-end modern-user-dropdown" aria-labelledby="userDropdown">
                <!-- User Info Header -->
                <div class="user-dropdown-header">
                    <div class="user-avatar-large">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=667eea&color=fff&bold=true&size=128" alt="Admin">
                        <div class="avatar-status online"></div>
                    </div>
                    <div class="user-details">
                        <h6 class="user-name">Administrator</h6>
                        <p class="user-email">admin@vixsbarbershop.com</p>
                        <span class="user-badge">Super Admin</span>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="user-quick-stats">
                    <div class="stat-item">
                        <div class="stat-value">24</div>
                        <div class="stat-label">Tasks</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">156</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">98%</div>
                        <div class="stat-label">Success</div>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <!-- Menu Items -->
                <div class="user-menu-items">
                    <a class="dropdown-item modern-dropdown-item" href="<?= site_url('admin/settings/profile') ?>">
                        <div class="item-icon">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="item-content">
                            <span class="item-title">My Profile</span>
                            <span class="item-subtitle">Account settings</span>
                        </div>
                        <i class="bi bi-chevron-right item-arrow"></i>
                    </a>
                    
                    <a class="dropdown-item modern-dropdown-item" href="<?= site_url('admin/settings') ?>">
                        <div class="item-icon">
                            <i class="bi bi-gear"></i>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Settings</span>
                            <span class="item-subtitle">Preferences & privacy</span>
                        </div>
                        <i class="bi bi-chevron-right item-arrow"></i>
                    </a>
                    
                    <a class="dropdown-item modern-dropdown-item" href="#">
                        <div class="item-icon">
                            <i class="bi bi-question-circle"></i>
                        </div>
                        <div class="item-content">
                            <span class="item-title">Help & Support</span>
                            <span class="item-subtitle">Get assistance</span>
                        </div>
                        <i class="bi bi-chevron-right item-arrow"></i>
                    </a>
                </div>

                <div class="dropdown-divider"></div>

                <!-- Logout Button -->
                <div class="user-logout-section">
                    <button class="logout-btn" id="btn-logout-dropdown">
                        <div class="logout-icon">
                            <i class="bi bi-box-arrow-right"></i>
                        </div>
                        <span>Sign Out</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>