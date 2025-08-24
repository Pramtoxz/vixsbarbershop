<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Welcome Header -->
<div class="row mb-4" data-aos="fade-up">
    <div class="col-12">
        <div class="welcome-banner">
            <div class="welcome-content">
                <div class="welcome-text">
                    <h1 class="welcome-title">Selamat Datang di Dashboard</h1>
                    <h2 class="business-name">Vixs Barbershop</h2>
                    <p class="welcome-subtitle">Kelola barber Anda dengan mudah dan pantau performa bisnis real-time</p>
                    <div class="quick-stats-mini">
                        <span class="mini-stat">
                            <i class="bi bi-calendar-check"></i>
                            <span id="todayBookings">0</span> Booking Hari Ini
                        </span>
                        <span class="mini-stat">
                            <i class="bi bi-database-fill-up"></i>
                            Rp <span id="todayRevenue">0</span> Pendapatan
                        </span>
                    </div>
                </div>
                <div class="welcome-graphic">
                    <div class="floating-icons">
                        <i class="bi bi-scissors icon-float-1"></i>
                        <i class="bi bi-star-fill icon-float-2"></i>
                        <i class="bi bi-person-check icon-float-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
        <div class="stat-card booking-card">
            <div class="stat-icon">
                <i class="bi bi-calendar-plus"></i>
            </div>
            <div class="stat-content">
                <h3 id="totalBookings">0</h3>
                <p class="stat-label">Total Booking</p>
                <div class="stat-trend">
                    <span class="trend-indicator positive">
                        <i class="bi bi-arrow-up"></i> +12%
                    </span>
                    <span class="trend-text">Dari bulan lalu</span>
                </div>
            </div>
            <div class="stat-graph">
                <canvas id="bookingChart" width="80" height="40"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-card revenue-card">
            <div class="stat-icon">
                <i class="bi bi-cash-coin"></i>
            </div>
            <div class="stat-content">
                <h3>Rp <span id="totalRevenue">0</span></h3>
                <p class="stat-label">Pendapatan Bulan Ini</p>
                <div class="stat-trend">
                    <span class="trend-indicator positive">
                        <i class="bi bi-arrow-up"></i> +25%
                    </span>
                    <span class="trend-text">Dari bulan lalu</span>
                </div>
            </div>
            <div class="stat-graph">
                <canvas id="revenueChart" width="80" height="40"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
        <div class="stat-card customer-card">
            <div class="stat-icon">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-content">
                <h3 id="totalCustomers">0</h3>
                <p class="stat-label">Total Pelanggan</p>
                <div class="stat-trend">
                    <span class="trend-indicator positive">
                        <i class="bi bi-arrow-up"></i> +8%
                    </span>
                    <span class="trend-text">Pelanggan baru</span>
                </div>
            </div>
            <div class="stat-graph">
                <canvas id="customerChart" width="80" height="40"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
        <div class="stat-card staff-card">
            <div class="stat-icon">
                <i class="bi bi-person-workspace"></i>
            </div>
            <div class="stat-content">
                <h3 id="activeStaff">0</h3>
                <p class="stat-label">Barberman Aktif</p>
                <div class="stat-trend">
                    <span class="trend-indicator neutral">
                        <i class="bi bi-dash"></i> 0%
                    </span>
                    <span class="trend-text">Tidak ada perubahan</span>
                </div>
            </div>
            <div class="stat-graph">
                <canvas id="staffChart" width="80" height="40"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Data Row -->
<div class="row mb-4">
    <!-- Revenue Analytics -->
    <div class="col-xl-8 col-lg-7 mb-4" data-aos="fade-up" data-aos-delay="500">
        <div class="analytics-card">
            <div class="card-header">
                <div class="header-content">
                    <h5 class="card-title">Analisis Pendapatan</h5>
                    <p class="card-subtitle">Grafik pendapatan dan booking bulanan</p>
                </div>
                <div class="header-actions">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary btn-sm active" data-period="month">Bulanan</button>
                        <button type="button" class="btn btn-outline-primary btn-sm" data-period="year">Tahunan</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="revenueAnalyticsChart" style="height: 350px;"></div>
            </div>
        </div>
    </div>

    <!-- Today's Bookings -->
    <div class="col-xl-4 col-lg-5 mb-4" data-aos="fade-up" data-aos-delay="600">
        <div class="today-bookings-card">
            <div class="card-header">
                <h5 class="card-title">Booking Hari Ini</h5>
                <span class="badge bg-primary" id="todayBookingCount">0</span>
            </div>
            <div class="card-body">
                <div class="booking-timeline" id="todayBookingList">
                    <!-- Bookings will be loaded here -->
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= site_url('admin/booking') ?>" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-calendar-plus me-1"></i> Kelola Semua Booking
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Services and Activities Row -->
<div class="row mb-4">
    <!-- Popular Services -->
    <div class="col-xl-6 col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="700">
        <div class="services-card">
            <div class="card-header">
                <h5 class="card-title">Layanan Populer</h5>
                <span class="period-text">Bulan ini</span>
            </div>
            <div class="card-body">
                <div class="services-list" id="popularServices">
                    <!-- Services will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="col-xl-6 col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="800">
        <div class="activities-card">
            <div class="card-header">
                <h5 class="card-title">Aktivitas Terbaru</h5>
                <button class="btn btn-sm btn-outline-primary" onclick="refreshActivities()">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="activity-feed" id="recentActivities">
                    <!-- Activities will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Performance Metrics -->
<div class="row">
    <div class="col-12" data-aos="fade-up" data-aos-delay="900">
        <div class="performance-card">
            <div class="card-header">
                <h5 class="card-title">Metrik Performa</h5>
                <div class="performance-period">
                    <select class="form-select form-select-sm" id="performancePeriod">
                        <option value="week">7 Hari Terakhir</option>
                        <option value="month" selected>30 Hari Terakhir</option>
                        <option value="quarter">3 Bulan Terakhir</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="metric-item">
                            <div class="metric-icon booking-metric">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <div class="metric-content">
                                <h4 id="avgBookingsPerDay">0</h4>
                                <p>Rata-rata Booking/Hari</p>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> +5% dari periode sebelumnya</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="metric-item">
                            <div class="metric-icon revenue-metric">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="metric-content">
                                <h4>Rp <span id="avgRevenuePerBooking">0</span></h4>
                                <p>Rata-rata Pendapatan/Booking</p>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> +12% dari periode sebelumnya</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="metric-item">
                            <div class="metric-icon satisfaction-metric">
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="metric-content">
                                <h4 id="customerSatisfaction">4.8</h4>
                                <p>Rating Kepuasan Pelanggan</p>
                                <small class="text-warning"><i class="bi bi-dash"></i> Stabil dari periode sebelumnya</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="metric-item">
                            <div class="metric-icon efficiency-metric">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div class="metric-content">
                                <h4 id="avgServiceTime">45</h4>
                                <p>Rata-rata Waktu Layanan (menit)</p>
                                <small class="text-danger"><i class="bi bi-arrow-down"></i> -8% dari periode sebelumnya</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        border-radius: var(--border-radius-xl);
        padding: 2.5rem;
        color: white;
        overflow: hidden;
        position: relative;
        margin-bottom: 0;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .welcome-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .welcome-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        opacity: 0.9;
    }

    .business-name {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        background: linear-gradient(45deg, #fff, #f8f9fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .welcome-subtitle {
        font-size: 1.1rem;
        opacity: 0.85;
        margin-bottom: 1.5rem;
    }

    .quick-stats-mini {
        display: flex;
        gap: 2rem;
    }

    .mini-stat {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.75rem 1.25rem;
        border-radius: var(--border-radius-lg);
        backdrop-filter: blur(10px);
    }

    .welcome-graphic {
        position: relative;
        width: 200px;
        height: 150px;
    }

    .floating-icons {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .floating-icons i {
        position: absolute;
        color: rgba(255, 255, 255, 0.3);
        animation: iconFloat 4s ease-in-out infinite;
    }

    .icon-float-1 {
        top: 20%;
        left: 20%;
        font-size: 2.5rem;
        animation-delay: 0s;
    }

    .icon-float-2 {
        top: 60%;
        right: 30%;
        font-size: 2rem;
        animation-delay: 1s;
    }

    .icon-float-3 {
        bottom: 20%;
        left: 40%;
        font-size: 1.8rem;
        animation-delay: 2s;
    }

    /* Stat Cards */
    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--border-radius-xl);
        padding: 2rem;
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-2xl);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .booking-card::before { background: linear-gradient(90deg, #667eea, #764ba2); }
    .revenue-card::before { background: linear-gradient(90deg, #f093fb, #f5576c); }
    .customer-card::before { background: linear-gradient(90deg, #4facfe, #00f2fe); }
    .staff-card::before { background: linear-gradient(90deg, #43e97b, #38f9d7); }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: var(--border-radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        font-size: 1.5rem;
        color: white;
    }

    .booking-card .stat-icon { background: linear-gradient(135deg, #667eea, #764ba2); }
    .revenue-card .stat-icon { background: linear-gradient(135deg, #f093fb, #f5576c); }
    .customer-card .stat-icon { background: linear-gradient(135deg, #4facfe, #00f2fe); }
    .staff-card .stat-icon { background: linear-gradient(135deg, #43e97b, #38f9d7); }

    .stat-content h3 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: var(--text-primary);
    }

    .stat-label {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-secondary);
        margin-bottom: 1rem;
    }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .trend-indicator {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.875rem;
        font-weight: 600;
        padding: 0.25rem 0.5rem;
        border-radius: var(--border-radius);
    }

    .trend-indicator.positive {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    .trend-indicator.negative {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
    }

    .trend-indicator.neutral {
        background: rgba(107, 114, 128, 0.1);
        color: #6b7280;
    }

    .trend-text {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .stat-graph {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        opacity: 0.7;
    }

    /* Analytics Cards */
    .analytics-card,
    .today-bookings-card,
    .services-card,
    .activities-card,
    .performance-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--border-radius-xl);
        height: 100%;
        overflow: hidden;
    }

    .card-header {
        padding: 1.5rem 1.5rem 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
    }

    .card-subtitle {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin: 0;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-footer {
        padding: 1rem 1.5rem;
        background: rgba(0, 0, 0, 0.02);
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Booking Timeline */
    .booking-timeline {
        max-height: 300px;
        overflow-y: auto;
    }

    .booking-item {
        display: flex;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .booking-item:last-child {
        border-bottom: none;
    }

    .booking-time {
        width: 60px;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--primary-color);
    }

    .booking-details {
        flex: 1;
        margin-left: 1rem;
    }

    .booking-customer {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }

    .booking-service {
        font-size: 0.875rem;
        color: var(--text-secondary);
    }

    .booking-status {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
    }

    .status-waiting {
        background: rgba(251, 191, 36, 0.1);
        color: #f59e0b;
    }

    .status-progress {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
    }

    .status-completed {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    /* Services List */
    .service-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .service-item:last-child {
        border-bottom: none;
    }

    .service-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .service-icon {
        width: 40px;
        height: 40px;
        border-radius: var(--border-radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
    }

    .service-details h6 {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }

    .service-details p {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin: 0;
    }

    .service-stats {
        text-align: right;
    }

    .service-count {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .service-percentage {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    /* Activity Feed */
    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        color: white;
        flex-shrink: 0;
    }

    .activity-booking { background: linear-gradient(135deg, #667eea, #764ba2); }
    .activity-payment { background: linear-gradient(135deg, #f093fb, #f5576c); }
    .activity-customer { background: linear-gradient(135deg, #4facfe, #00f2fe); }
    .activity-staff { background: linear-gradient(135deg, #43e97b, #38f9d7); }

    .activity-content h6 {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }

    .activity-content p {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-bottom: 0.25rem;
    }

    .activity-time {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    /* Performance Metrics */
    .metric-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.5);
        border-radius: var(--border-radius-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .metric-item:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .metric-icon {
        width: 50px;
        height: 50px;
        border-radius: var(--border-radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
    }

    .booking-metric { background: linear-gradient(135deg, #667eea, #764ba2); }
    .revenue-metric { background: linear-gradient(135deg, #f093fb, #f5576c); }
    .satisfaction-metric { background: linear-gradient(135deg, #ffeaa7, #fab1a0); }
    .efficiency-metric { background: linear-gradient(135deg, #74b9ff, #0984e3); }

    .metric-content h4 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }

    .metric-content p {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-bottom: 0.25rem;
    }

    .metric-content small {
        font-size: 0.75rem;
    }

    /* Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(5deg); }
    }

    @keyframes iconFloat {
        0%, 100% { transform: translateY(0px); opacity: 0.3; }
        50% { transform: translateY(-20px); opacity: 0.6; }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .welcome-content {
            flex-direction: column;
            text-align: center;
            gap: 2rem;
        }

        .business-name {
            font-size: 2rem;
        }

        .quick-stats-mini {
            flex-direction: column;
            gap: 1rem;
            width: 100%;
        }

        .mini-stat {
            justify-content: center;
        }

        .welcome-graphic {
            width: 150px;
            height: 100px;
        }

        .stat-card {
            padding: 1.5rem;
        }

        .stat-content h3 {
            font-size: 2rem;
        }

        .metric-item {
            padding: 1rem;
        }

        .metric-content h4 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .welcome-banner {
            padding: 1.5rem;
        }

        .business-name {
            font-size: 1.75rem;
        }

        .welcome-subtitle {
            font-size: 1rem;
        }

        .stat-card {
            padding: 1.25rem;
        }

        .card-body {
            padding: 1rem;
        }

        .metric-item {
            flex-direction: column;
            text-align: center;
            padding: 1rem;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function() {
    // Load dashboard data
    loadDashboardData();
    
    // Initialize charts
    initializeCharts();
    
    // Load today's bookings
    loadTodayBookings();
    
    // Load popular services
    loadPopularServices();
    
    // Load recent activities
    loadRecentActivities();
    
    // Auto refresh every 5 minutes
    setInterval(function() {
        loadDashboardData();
        loadTodayBookings();
        loadRecentActivities();
    }, 300000);
});

function loadDashboardData() {
    // Load booking statistics
    $.ajax({
        url: '<?= site_url('admin/getDashboardStats') ?>',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                const data = response.data;
                
                // Update main stats
                $('#totalBookings').text(data.total_bookings || 0);
                $('#totalRevenue').text(formatCurrency(data.total_revenue || 0));
                $('#totalCustomers').text(data.total_customers || 0);
                $('#activeStaff').text(data.active_staff || 0);
                
                // Update today stats
                $('#todayBookings').text(data.today_bookings || 0);
                $('#todayRevenue').text(formatCurrency(data.today_revenue || 0));
                $('#todayBookingCount').text(data.today_bookings || 0);
                
                // Update performance metrics
                $('#avgBookingsPerDay').text(data.avg_bookings_per_day || 0);
                $('#avgRevenuePerBooking').text(formatCurrency(data.avg_revenue_per_booking || 0));
                $('#customerSatisfaction').text(data.customer_satisfaction || '4.8');
                $('#avgServiceTime').text(data.avg_service_time || '45');
            }
        },
        error: function() {
            console.log('Error loading dashboard data');
            // Set default values
            setDefaultValues();
        }
    });
}

function loadTodayBookings() {
    $.ajax({
        url: '<?= site_url('admin/getTodayBookings') ?>',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                renderTodayBookings(response.data);
            } else {
                renderEmptyBookings();
            }
        },
        error: function() {
            renderEmptyBookings();
        }
    });
}

function loadPopularServices() {
    $.ajax({
        url: '<?= site_url('admin/getPopularServices') ?>',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                renderPopularServices(response.data);
            } else {
                renderEmptyServices();
            }
        },
        error: function() {
            renderEmptyServices();
        }
    });
}

function loadRecentActivities() {
    $.ajax({
        url: '<?= site_url('admin/getRecentActivities') ?>',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                renderRecentActivities(response.data);
            } else {
                renderEmptyActivities();
            }
        },
        error: function() {
            renderEmptyActivities();
        }
    });
}

function renderTodayBookings(bookings) {
    const container = $('#todayBookingList');
    container.empty();
    
    if (bookings.length === 0) {
        renderEmptyBookings();
        return;
    }
    
    bookings.forEach(booking => {
        const statusClass = getBookingStatusClass(booking.status);
        const statusText = getBookingStatusText(booking.status);
        
        const bookingItem = `
            <div class="booking-item">
                <div class="booking-time">${booking.jam_booking}</div>
                <div class="booking-details">
                    <div class="booking-customer">${booking.nama_pelanggan}</div>
                    <div class="booking-service">${booking.nama_paket}</div>
                </div>
                <div class="booking-status ${statusClass}">${statusText}</div>
            </div>
        `;
        container.append(bookingItem);
    });
}

function renderEmptyBookings() {
    $('#todayBookingList').html(`
        <div class="text-center py-4">
            <i class="bi bi-calendar-x" style="font-size: 2rem; color: var(--text-muted);"></i>
            <p class="mt-2 mb-0 text-muted">Belum ada booking hari ini</p>
        </div>
    `);
}

function renderPopularServices(services) {
    const container = $('#popularServices');
    container.empty();
    
    if (services.length === 0) {
        renderEmptyServices();
        return;
    }
    
    services.forEach((service, index) => {
        const serviceItem = `
            <div class="service-item">
                <div class="service-info">
                    <div class="service-icon">
                        <i class="bi bi-scissors"></i>
                    </div>
                    <div class="service-details">
                        <h6>${service.nama_paket}</h6>
                        <p>Rp ${formatCurrency(service.harga)}</p>
                    </div>
                </div>
                <div class="service-stats">
                    <div class="service-count">${service.total_booking}</div>
                    <div class="service-percentage">${service.percentage}%</div>
                </div>
            </div>
        `;
        container.append(serviceItem);
    });
}

function renderEmptyServices() {
    $('#popularServices').html(`
        <div class="text-center py-4">
            <i class="bi bi-scissors" style="font-size: 2rem; color: var(--text-muted);"></i>
            <p class="mt-2 mb-0 text-muted">Belum ada data layanan</p>
        </div>
    `);
}

function renderRecentActivities(activities) {
    const container = $('#recentActivities');
    container.empty();
    
    if (activities.length === 0) {
        renderEmptyActivities();
        return;
    }
    
    activities.forEach(activity => {
        const iconClass = getActivityIconClass(activity.type);
        const activityItem = `
            <div class="activity-item">
                <div class="activity-icon ${iconClass}">
                    <i class="${getActivityIcon(activity.type)}"></i>
                </div>
                <div class="activity-content">
                    <h6>${activity.title}</h6>
                    <p>${activity.description}</p>
                    <div class="activity-time">${activity.time_ago}</div>
                </div>
            </div>
        `;
        container.append(activityItem);
    });
}

function renderEmptyActivities() {
    $('#recentActivities').html(`
        <div class="text-center py-4">
            <i class="bi bi-activity" style="font-size: 2rem; color: var(--text-muted);"></i>
            <p class="mt-2 mb-0 text-muted">Belum ada aktivitas terbaru</p>
        </div>
    `);
}

function initializeCharts() {
    // Revenue Analytics Chart
    const revenueOptions = {
        series: [{
            name: 'Pendapatan',
            data: [3200000, 4100000, 3800000, 5100000, 4200000, 6100000, 5800000, 6500000, 5900000, 7200000, 6800000, 7500000]
        }, {
            name: 'Target',
            data: [3000000, 4000000, 3500000, 5000000, 4500000, 6000000, 5500000, 6000000, 6500000, 7000000, 7500000, 8000000]
        }],
        chart: {
            height: 350,
            type: 'area',
            fontFamily: 'Inter, sans-serif',
            toolbar: { show: false },
            zoom: { enabled: false }
        },
        dataLabels: { enabled: false },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            labels: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif'
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                },
                style: {
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif'
                }
            }
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return 'Rp ' + formatCurrency(value);
                }
            },
            theme: 'dark'
        },
        colors: ['#667eea', '#f093fb'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.3,
                stops: [0, 90, 100]
            }
        },
        grid: {
            borderColor: '#f1f1f1',
            padding: { left: 0, right: 0 }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            offsetY: -40,
            fontSize: '13px',
            fontFamily: 'Inter, sans-serif'
        }
    };

    const revenueChart = new ApexCharts(document.querySelector("#revenueAnalyticsChart"), revenueOptions);
    revenueChart.render();

    // Mini charts for stat cards
    initMiniCharts();
}

function initMiniCharts() {
    const chartData = [65, 59, 80, 81, 56, 55, 40];
    const chartOptions = {
        type: 'line',
        data: {
            labels: ['', '', '', '', '', '', ''],
            datasets: [{
                data: chartData,
                borderColor: 'rgba(255, 255, 255, 0.8)',
                backgroundColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { display: false },
                y: { display: false }
            },
            elements: { point: { radius: 0 } }
        }
    };

    // Create mini charts for each stat card
    ['bookingChart', 'revenueChart', 'customerChart', 'staffChart'].forEach(chartId => {
        const ctx = document.getElementById(chartId);
        if (ctx) {
            new Chart(ctx, {
                ...chartOptions,
                data: {
                    ...chartOptions.data,
                    datasets: [{
                        ...chartOptions.data.datasets[0],
                        data: generateRandomData()
                    }]
                }
            });
        }
    });
}

// Helper functions
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

function getBookingStatusClass(status) {
    const statusMap = {
        'pending': 'status-waiting',
        'confirmed': 'status-progress', 
        'in_progress': 'status-progress',
        'completed': 'status-completed',
        'cancelled': 'status-waiting'
    };
    return statusMap[status] || 'status-waiting';
}

function getBookingStatusText(status) {
    const statusMap = {
        'pending': 'Menunggu',
        'confirmed': 'Dikonfirmasi',
        'in_progress': 'Sedang Dilayani',
        'completed': 'Selesai',
        'cancelled': 'Dibatalkan'
    };
    return statusMap[status] || 'Menunggu';
}

function getActivityIconClass(type) {
    const typeMap = {
        'booking': 'activity-booking',
        'payment': 'activity-payment',
        'customer': 'activity-customer',
        'staff': 'activity-staff'
    };
    return typeMap[type] || 'activity-booking';
}

function getActivityIcon(type) {
    const iconMap = {
        'booking': 'bi bi-calendar-plus',
        'payment': 'bi bi-credit-card',
        'customer': 'bi bi-person-plus',
        'staff': 'bi bi-person-workspace'
    };
    return iconMap[type] || 'bi bi-bell';
}

function generateRandomData() {
    return Array.from({length: 7}, () => Math.floor(Math.random() * 100) + 20);
}

function setDefaultValues() {
    $('#totalBookings').text('45');
    $('#totalRevenue').text('8,500,000');
    $('#totalCustomers').text('156');
    $('#activeStaff').text('8');
    $('#todayBookings').text('12');
    $('#todayRevenue').text('1,200,000');
    $('#todayBookingCount').text('12');
    $('#avgBookingsPerDay').text('15');
    $('#avgRevenuePerBooking').text('125,000');
}

function refreshActivities() {
    const btn = event.target.closest('button');
    const icon = btn.querySelector('i');
    
    icon.classList.add('animate__animated', 'animate__spin');
    
    loadRecentActivities();
    
    setTimeout(() => {
        icon.classList.remove('animate__animated', 'animate__spin');
    }, 1000);
}

// Period change handlers
$('.btn-group button').on('click', function() {
    $(this).addClass('active').siblings().removeClass('active');
    // Reload chart data based on selected period
    // This would typically reload the chart with new data
});

$('#performancePeriod').on('change', function() {
    // Reload performance metrics based on selected period
    loadDashboardData();
});

// Set default values on load
setDefaultValues();
</script>
<?= $this->endSection() ?>