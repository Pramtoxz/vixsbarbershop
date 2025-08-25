 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
 <!-- Bootstrap 5 JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables -->
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
 <!-- SweetAlert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- ApexCharts -->
 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <!-- AOS Animation Library -->
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

 <script>
     $(document).ready(function() {
         // Initialize AOS Animations
         AOS.init({
             duration: 800,
             easing: 'ease-in-out-sine',
             delay: 100,
             once: true,
             mirror: false
         });

         // Modern Page Loading Effect
         $('.main-content').addClass('animate__animated animate__fadeIn');
         
         // Enhanced Card Hover Effects
         $('.card').on('mouseenter', function() {
             $(this).addClass('animate__animated animate__pulse');
         }).on('mouseleave', function() {
             $(this).removeClass('animate__animated animate__pulse');
         });

         // Modern Topbar Enhancements
         initTopbarFeatures();

         // Konfigurasi dropdown notifikasi dengan responsivitas
         function initNotificationDropdown() {
             var notificationDropdownEl = document.getElementById('notificationDropdown');
             if (notificationDropdownEl) {
                 var notificationDropdown = new bootstrap.Dropdown(notificationDropdownEl, {
                     popperConfig: {
                         strategy: 'fixed',
                         modifiers: [{
                             name: 'preventOverflow',
                             options: {
                                 padding: $(window).width() < 480 ? 5 : 10,
                                 boundary: 'viewport'
                             }
                         }, {
                             name: 'offset',
                             options: {
                                 offset: [0, 8]
                             }
                         }]
                     }
                 });

                 // Adjust dropdown width on mobile
                 $(notificationDropdownEl).on('shown.bs.dropdown', function() {
                     const dropdown = $(this).next('.dropdown-menu');
                     if ($(window).width() < 480) {
                         dropdown.css({
                             'width': '300px',
                             'max-width': 'calc(100vw - 20px)'
                         });
                     }
                 });
             }
         }

         // Initialize notification dropdown
         initNotificationDropdown();

         // Mobile navigation handling
         function initMobileNavigation() {
             const sidebar = $('#sidebar');
             const overlay = $('#sidebarOverlay');
             const toggler = $('#navbarToggler');

             // Toggle sidebar on mobile
             toggler.on('click', function(e) {
                 e.preventDefault();
                 e.stopPropagation();

                 if ($(window).width() < 992) {
                     sidebar.toggleClass('show');
                     overlay.toggleClass('show');

                     // Prevent body scroll when sidebar is open
                     if (sidebar.hasClass('show')) {
                         $('body').addClass('overflow-hidden');
                     } else {
                         $('body').removeClass('overflow-hidden');
                     }
                 }
             });

             // Close sidebar when clicking overlay
             overlay.on('click', function() {
                 sidebar.removeClass('show');
                 overlay.removeClass('show');
                 $('body').removeClass('overflow-hidden');
             });

             // Close sidebar when clicking outside (for tablet/desktop)
             $(document).on('click', function(e) {
                 const windowWidth = $(window).width();

                 if (windowWidth >= 768 && windowWidth < 992) {
                     if (!$(e.target).closest('#sidebar').length &&
                         !$(e.target).closest('#navbarToggler').length &&
                         sidebar.hasClass('show')) {
                         sidebar.removeClass('show');
                         overlay.removeClass('show');
                         $('body').removeClass('overflow-hidden');
                     }
                 }
             });

             // Handle window resize
             $(window).on('resize', function() {
                 const windowWidth = $(this).width();

                 if (windowWidth >= 992) {
                     sidebar.removeClass('show');
                     overlay.removeClass('show');
                     $('body').removeClass('overflow-hidden');
                 }
             });

             // Close sidebar when clicking nav links on mobile
             sidebar.find('.nav-link').on('click', function() {
                 if ($(window).width() < 768) {
                     setTimeout(function() {
                         sidebar.removeClass('show');
                         overlay.removeClass('show');
                         $('body').removeClass('overflow-hidden');
                     }, 150);
                 }
             });
         }

         // Initialize mobile navigation
         initMobileNavigation();

         // Logout functionality
         function handleLogout() {
             Swal.fire({
                 title: 'Apakah Anda yakin?',
                 text: "Anda akan keluar dari sistem",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#7677EA',
                 cancelButtonColor: '#6c757d',
                 confirmButtonText: 'Ya, Keluar!',
                 cancelButtonText: 'Batal'
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = '<?= site_url('auth/logout') ?>';
                 }
             });
         }

         $('#btn-logout, #btn-logout-dropdown').on('click', handleLogout);

         // Notifikasi
         let notificationCheckInterval;

         // Fungsi untuk memuat notifikasi
         function loadNotifications() {
             $.ajax({
                 url: '<?= site_url('admin/notifications/unread') ?>',
                 type: 'GET',
                 dataType: 'json',
                 success: function(response) {
                     //  console.log('Notifikasi response:', response); // Debug response
                     if (response && response.status === 'success') {
                         const notifications = response.data ? response.data.notifications : [];
                         const count = response.data ? response.data.count : 0;
                         //  console.log('Notifikasi count:', count);
                         //  console.log('Notifikasi data:', notifications);

                         renderNotifications(notifications, count);
                     } else {
                         console.error('Response status bukan success:', response ? response.status : 'tidak ada response');
                         // Tampilkan pesan error di dropdown
                         const notificationList = $('#notificationList');
                         notificationList.html(`
                             <div class="dropdown-item text-center py-4">
                                 <i class="bi bi-exclamation-triangle text-warning fs-4 mb-2"></i>
                                 <p class="text-muted mb-0">Gagal memuat notifikasi</p>
                             </div>
                         `);
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error('Gagal memuat notifikasi:', status, error);
                     console.log('XHR:', xhr.responseText);

                     // Tampilkan pesan error di dropdown
                     const notificationList = $('#notificationList');
                     notificationList.html(`
                         <div class="dropdown-item text-center py-4">
                             <i class="bi bi-exclamation-triangle text-warning fs-4 mb-2"></i>
                             <p class="text-muted mb-0">Gagal memuat notifikasi</p>
                         </div>
                     `);
                 }
             });
         }

         // Fungsi untuk merender notifikasi ke dalam dropdown
         function renderNotifications(notifications, count) {
             // Update badge jumlah notifikasi
             if (count > 0) {
                 $('#notificationBadge').show();
                 $('.notification-count').text(count > 99 ? '99+' : count);
             } else {
                 $('#notificationBadge').hide();
             }

             // Render notifikasi ke dalam dropdown
             const notificationList = $('#notificationList');
             notificationList.empty();

             //  console.log('Rendering notifications:', notifications); // Debug

             if (notifications && notifications.length > 0) {
                 // Tampilkan notifikasi
                 notifications.forEach(function(notification) {
                     //  console.log('Processing notification:', notification); // Debug individual notification

                     let iconClass = 'bi-bell';

                     // Sesuaikan icon berdasarkan jenis notifikasi
                     if (notification.type === 'booking_baru') {
                         iconClass = 'bi-calendar-plus';
                     } else if (notification.type === 'pembayaran') {
                         iconClass = 'bi-credit-card';
                     }

                     // Tentukan kelas berdasarkan status dibaca
                     const readStatusClass = parseInt(notification.is_read) === 0 ? 'unread' : 'read';
                     const unreadIndicator = parseInt(notification.is_read) === 0 ? '<span class="notification-unread-indicator"></span>' : '';

                                           const notificationItem = `
                          <a href="<?= site_url('admin/notifications/view') ?>/${notification.id}" 
                             class="dropdown-item notification-item border-bottom ${readStatusClass}" 
                             data-id="${notification.id}">
                              <div class="d-flex align-items-start">
                                  <div class="notification-icon me-3">
                                      <i class="bi ${iconClass}"></i>
                                  </div>
                                  <div class="flex-grow-1">
                                      <h6 class="mb-1">
                                          ${notification.title || 'Notifikasi'} 
                                          ${unreadIndicator}
                                      </h6>
                                      <p class="mb-1 text-muted small">${notification.message || 'Tidak ada pesan'}</p>
                                      <div class="text-muted small">${notification.time_ago || 'Baru saja'}</div>
                                  </div>
                              </div>
                          </a>
                      `;

                     notificationList.append(notificationItem);
                 });
             } else {
                 // Tampilkan pesan tidak ada notifikasi
                 notificationList.html(`
                     <div class="dropdown-item text-center py-4">
                         <i class="bi bi-bell-slash fs-4 text-muted mb-2"></i>
                         <p class="text-muted mb-0">Tidak ada notifikasi</p>
                     </div>
                 `);
             }
         }

         // Tandai notifikasi sebagai dibaca saat diklik
         $(document).on('click', '.notification-item', function(e) {
             const notificationId = $(this).data('id');

             // Update server bahwa notifikasi sudah dibaca
             $.ajax({
                 url: '<?= site_url('admin/notifications/mark-read') ?>',
                 type: 'POST',
                 data: {
                     id: notificationId
                 }
             });
         });

         // Tandai semua notifikasi sebagai dibaca
         $('#markAllReadBtn').on('click', function(e) {
             e.preventDefault();
             e.stopPropagation();

             $.ajax({
                 url: '<?= site_url('admin/notifications/mark-all-read') ?>',
                 type: 'POST',
                 dataType: 'json',
                 success: function(response) {
                     if (response.status === 'success') {
                         loadNotifications(); // Refresh notifikasi

                         // Tampilkan feedback ke user
                         Swal.fire({
                             icon: 'success',
                             title: 'Berhasil',
                             text: 'Semua notifikasi telah ditandai sebagai dibaca',
                             timer: 1500,
                             showConfirmButton: false
                         });
                     }
                 }
             });
         });

         // Tombol untuk melihat semua notifikasi
         $('#viewAllNotifications').on('click', function(e) {
             e.preventDefault();
             window.location.href = '<?= site_url('admin/notifications/all') ?>';
         });

         // Muat notifikasi saat halaman dimuat
         loadNotifications();

         // Periksa notifikasi baru setiap 30 detik
         notificationCheckInterval = setInterval(loadNotifications, 30000);

         // Modern Topbar Features
         function initTopbarFeatures() {
             // Theme Toggle
             $('#themeToggle').on('click', function() {
                 const icon = $(this).find('i');
                 if (icon.hasClass('bi-sun-fill')) {
                     icon.removeClass('bi-sun-fill').addClass('bi-moon-fill');
                     // Add dark theme logic here if needed
                 } else {
                     icon.removeClass('bi-moon-fill').addClass('bi-sun-fill');
                     // Add light theme logic here if needed
                 }
                 
                 $(this).addClass('animate__animated animate__rotateIn');
                 setTimeout(() => {
                     $(this).removeClass('animate__animated animate__rotateIn');
                 }, 600);
             });

             // Fullscreen Toggle
             $('#fullscreenToggle').on('click', function() {
                 const icon = $(this).find('i');
                 
                 if (!document.fullscreenElement) {
                     document.documentElement.requestFullscreen().then(() => {
                         icon.removeClass('bi-arrows-fullscreen').addClass('bi-fullscreen-exit');
                     });
                 } else {
                     document.exitFullscreen().then(() => {
                         icon.removeClass('bi-fullscreen-exit').addClass('bi-arrows-fullscreen');
                     });
                 }
                 
                 $(this).addClass('animate__animated animate__pulse');
                 setTimeout(() => {
                     $(this).removeClass('animate__animated animate__pulse');
                 }, 600);
             });

             // Quick Search
             let searchTimeout;
             $('.quick-search-input').on('input', function() {
                 const query = $(this).val();
                 const suggestions = $('#searchSuggestions');
                 
                 clearTimeout(searchTimeout);
                 
                 if (query.length > 2) {
                     searchTimeout = setTimeout(() => {
                         // Mock search suggestions - replace with actual search logic
                         const mockResults = [
                             { title: 'Dashboard', url: '<?= site_url("admin") ?>', icon: 'bi-speedometer2' },
                             { title: 'Pelanggan', url: '<?= site_url("admin/pelanggan") ?>', icon: 'bi-person-badge' },
                             { title: 'Booking', url: '<?= site_url("admin/booking") ?>', icon: 'bi-calendar-check' },
                             { title: 'Laporan', url: '<?= site_url("admin/reports") ?>', icon: 'bi-file-earmark-text' }
                         ].filter(item => item.title.toLowerCase().includes(query.toLowerCase()));
                         
                         if (mockResults.length > 0) {
                             let html = '<div class="search-results">';
                             mockResults.forEach(result => {
                                 html += `
                                     <a href="${result.url}" class="search-result-item">
                                         <i class="bi ${result.icon}"></i>
                                         <span>${result.title}</span>
                                     </a>
                                 `;
                             });
                             html += '</div>';
                             suggestions.html(html).show();
                         } else {
                             suggestions.hide();
                         }
                     }, 300);
                 } else {
                     suggestions.hide();
                 }
             });

             // Hide search suggestions when clicking outside
             $(document).on('click', function(e) {
                 if (!$(e.target).closest('.quick-search-container').length) {
                     $('#searchSuggestions').hide();
                 }
             });

             // Enhanced navbar toggler animation
             $('.modern-navbar-toggler').on('click', function() {
                 $(this).addClass('animate__animated animate__pulse');
                 setTimeout(() => {
                     $(this).removeClass('animate__animated animate__pulse');
                 }, 600);
             });

             // Action button hover effects
             $('.action-btn').hover(
                 function() {
                     $(this).addClass('animate__animated animate__pulse');
                 },
                 function() {
                     $(this).removeClass('animate__animated animate__pulse');
                 }
             );

             // User profile button animation
             $('.user-profile-btn').on('show.bs.dropdown', function() {
                 $(this).addClass('animate__animated animate__pulse');
                 setTimeout(() => {
                     $(this).removeClass('animate__animated animate__pulse');
                 }, 600);
             });

             // Notification button pulse effect when new notifications arrive
             function animateNotificationButton() {
                 $('.notification-btn').addClass('animate__animated animate__pulse');
                 setTimeout(() => {
                     $('.notification-btn').removeClass('animate__animated animate__pulse');
                 }, 1000);
             }

             // Add notification animation to existing loadNotifications function
             window.animateNotificationButton = animateNotificationButton;
         }
     });
 </script>