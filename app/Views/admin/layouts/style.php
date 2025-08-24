 <!-- Bootstrap 5 CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Bootstrap Icons -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
 <!-- DataTables Bootstrap 5 -->
 <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
 <!-- Animate CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
 <!-- AOS Animation Library -->
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <style>
     :root {
         /* Primary Colors - Modern Dark Purple Theme */
         --primary-color: #1a1b3a;
         --primary-light: #252657;
         --primary-dark: #0f1023;
         --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
         --primary-gradient-alt: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
         
         /* Secondary Colors - Vibrant Accent */
         --secondary-color: #667eea;
         --secondary-light: rgba(102, 126, 234, 0.1);
         --secondary-dark: #5a6fd8;
         
         /* Accent Colors */
         --accent-orange: #ff6b6b;
         --accent-purple: #a55eea;
         --accent-green: #26de81;
         --accent-blue: #45aaf2;
         
         /* Status Colors */
         --success-color: #26de81;
         --info-color: #45aaf2;
         --warning-color: #ffa726;
         --danger-color: #ff6b6b;
         
         /* Neutral Colors */
         --light-color: #f8fafc;
         --light-gray: #e2e8f0;
         --medium-gray: #64748b;
         --dark-color: #1e293b;
         --text-primary: #1e293b;
         --text-secondary: #64748b;
         --text-light: #94a3b8;
         
         /* Glass Morphism */
         --glass-bg: rgba(255, 255, 255, 0.25);
         --glass-border: rgba(255, 255, 255, 0.18);
         
         /* Spacing & Borders */
         --border-radius: 1rem;
         --border-radius-sm: 0.5rem;
         --border-radius-lg: 1.5rem;
         --border-radius-xl: 2rem;
         
         /* Shadows */
         --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
         --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
         --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
         --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
         --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
         --shadow-inner: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
         
         /* Transitions */
         --transition-fast: all 0.15s ease;
         --transition-normal: all 0.3s ease;
         --transition-slow: all 0.5s ease;
     }

     body {
         font-family: 'Inter', 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
         background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
         background-attachment: fixed;
         color: var(--text-primary);
         transition: var(--transition-normal);
         overflow-x: hidden;
         font-size: 14px;
         line-height: 1.6;
         letter-spacing: -0.01em;
         position: relative;
     }

     /* Modern Background Pattern */
     body::before {
         content: '';
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-image: 
             radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
             radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
         pointer-events: none;
         z-index: -1;
     }

     @media (min-width: 768px) {
         body {
             font-size: 16px;
         }
     }

     /* Modern Notification Styling */
     .notification-dropdown {
         background: rgba(255, 255, 255, 0.95);
         backdrop-filter: blur(20px);
         -webkit-backdrop-filter: blur(20px);
         border: 1px solid rgba(255, 255, 255, 0.2);
         box-shadow: var(--shadow-2xl);
         border-radius: var(--border-radius-lg);
         overflow: hidden;
         z-index: 1050 !important;
         width: 380px !important;
         max-height: 500px;
         overflow-y: auto;
         animation: slideInDown 0.3s ease;
     }

     @keyframes slideInDown {
         0% {
             opacity: 0;
             transform: translateY(-20px);
         }
         100% {
             opacity: 1;
             transform: translateY(0);
         }
     }

     @media (max-width: 480px) {
         .notification-dropdown {
             width: 320px !important;
             max-height: 400px;
         }
     }

     /* Base Dropdown Menu Styling */
     .dropdown-menu {
         z-index: 9999 !important;
         background: rgba(255, 255, 255, 0.95);
         backdrop-filter: blur(20px);
         border: 1px solid rgba(255, 255, 255, 0.2);
         box-shadow: var(--shadow-xl);
         border-radius: var(--border-radius);
         position: absolute !important;
     }

     /* Override default Bootstrap dropdown styles for modern dropdowns */
     .dropdown-menu.modern-user-dropdown,
     .dropdown-menu.modern-notification-dropdown {
         border: 1px solid rgba(255, 255, 255, 0.2) !important;
         background: rgba(255, 255, 255, 0.95) !important;
         backdrop-filter: blur(25px) !important;
         -webkit-backdrop-filter: blur(25px) !important;
         box-shadow: var(--shadow-2xl) !important;
         border-radius: var(--border-radius-lg) !important;
         padding: 0 !important;
         margin: 0 !important;
         transform: none !important;
         z-index: 9999 !important;
         position: absolute !important;
     }

     /* Force dropdown to be above all content */
     .dropdown-menu[data-bs-popper] {
         z-index: 9999 !important;
     }

     .dropdown.show .dropdown-menu {
         z-index: 9999 !important;
         display: block !important;
     }

     .notification-item {
         transition: var(--transition-normal);
         border-left: 3px solid transparent;
         word-wrap: break-word;
         white-space: normal;
         padding: 16px 20px;
         position: relative;
         overflow: hidden;
     }

     .notification-item::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 0;
         height: 100%;
         background: linear-gradient(90deg, var(--secondary-color), var(--accent-purple));
         transition: var(--transition-normal);
         z-index: -1;
     }

     .notification-item.unread {
         background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(165, 94, 234, 0.03));
         border-left: 3px solid var(--secondary-color);
     }

     .notification-item.read {
         opacity: 0.7;
     }

     .notification-item:hover {
         background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(165, 94, 234, 0.05));
         border-left: 3px solid var(--accent-purple);
         transform: translateX(5px);
     }

     .notification-item:hover::before {
         width: 100%;
         opacity: 0.03;
     }

     .notification-icon {
         width: 45px;
         height: 45px;
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         transition: var(--transition-normal);
     }

     .notification-icon i {
         color: white;
         font-size: 1.1rem;
         transition: var(--transition-normal);
     }

     .notification-item:hover .notification-icon {
         transform: scale(1.1) rotate(5deg);
         box-shadow: var(--shadow-lg);
     }

     .notification-unread-indicator {
         display: inline-block;
         width: 8px;
         height: 8px;
         border-radius: 50%;
         background: linear-gradient(135deg, var(--accent-orange), var(--danger-color));
         margin-left: 8px;
         animation: pulse-glow 2s infinite;
     }

     #notificationBadge {
         font-size: 0.65rem;
         padding: 0.3rem 0.6rem;
         background: linear-gradient(135deg, var(--accent-orange), var(--danger-color));
         border: 2px solid white;
         animation: pulse-glow 2s infinite;
         font-weight: 600;
     }

     @keyframes pulse-glow {
         0%, 100% {
             transform: translate(-50%, -50%) scale(0.95);
             box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.7);
         }
         50% {
             transform: translate(-50%, -50%) scale(1.05);
             box-shadow: 0 0 0 10px rgba(255, 107, 107, 0);
         }
     }

     /* Modern Scrollbar Styling */
     ::-webkit-scrollbar {
         width: 8px;
         height: 8px;
     }

     ::-webkit-scrollbar-track {
         background: rgba(255, 255, 255, 0.1);
         border-radius: 10px;
     }

     ::-webkit-scrollbar-thumb {
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         border-radius: 10px;
         border: 2px solid transparent;
         background-clip: padding-box;
     }

     ::-webkit-scrollbar-thumb:hover {
         background: linear-gradient(135deg, var(--secondary-dark), var(--accent-purple));
         box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
     }

     ::-webkit-scrollbar-corner {
         background: transparent;
     }

     /* Modern Sidebar Styling */
     .sidebar {
         height: 100vh;
         min-height: 100vh;
         background: rgba(26, 27, 58, 0.95);
         backdrop-filter: blur(20px);
         -webkit-backdrop-filter: blur(20px);
         border-right: 1px solid rgba(255, 255, 255, 0.1);
         box-shadow: var(--shadow-2xl);
         z-index: 1040;
         position: fixed;
         top: 0;
         left: 0;
         bottom: 0;
         width: 280px;
         transition: var(--transition-normal);
         overflow-y: auto;
         -webkit-overflow-scrolling: touch;
         overscroll-behavior: contain;
         pointer-events: auto;
     }

     .sidebar::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background: linear-gradient(180deg, 
             rgba(102, 126, 234, 0.1) 0%,
             rgba(26, 27, 58, 0.8) 50%,
             rgba(15, 16, 35, 0.9) 100%);
         pointer-events: none;
         z-index: -1;
     }

     .sidebar-brand {
         height: 5.5rem;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 1.5rem 1.2rem;
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         flex-shrink: 0;
         position: relative;
         overflow: hidden;
     }

     .sidebar-brand::before {
         content: '';
         position: absolute;
         top: 0;
         left: -100%;
         width: 100%;
         height: 100%;
         background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
         transition: var(--transition-slow);
     }

     .sidebar-brand:hover::before {
         left: 100%;
     }

     .sidebar-brand img {
         width: 50px;
         height: 50px;
         border-radius: 50%;
         margin-right: 12px;
         background: white;
         padding: 6px;
         box-shadow: 0 4px 15px rgba(0,0,0,0.2);
         transition: var(--transition-normal);
     }

     .sidebar-brand:hover img {
         transform: scale(1.1) rotate(5deg);
         box-shadow: 0 6px 20px rgba(0,0,0,0.3);
     }

     .sidebar-brand h3 {
         color: white;
         font-weight: 800;
         font-size: 1.3rem;
         margin-bottom: 0;
         letter-spacing: 2px;
         text-shadow: 0 2px 10px rgba(0,0,0,0.3);
         font-family: 'Plus Jakarta Sans', sans-serif;
     }

     .sidebar-brand p {
         color: rgba(255, 255, 255, 0.9);
         margin-bottom: 0;
         font-size: 0.75rem;
         letter-spacing: 1.5px;
         text-transform: uppercase;
         font-weight: 500;
     }

     .sidebar-divider {
         border-top: 1px solid rgba(255, 255, 255, 0.15);
         margin: 0 1.5rem;
         position: relative;
     }

     .sidebar-divider::before {
         content: '';
         position: absolute;
         left: 0;
         top: -1px;
         width: 50px;
         height: 2px;
         background: linear-gradient(90deg, var(--secondary-color), var(--accent-purple));
         border-radius: 2px;
     }

     .sidebar-heading {
         color: rgba(255, 255, 255, 0.7);
         font-size: 11px;
         font-weight: 700;
         text-transform: uppercase;
         letter-spacing: 2px;
         margin-top: 1.8rem;
         margin-bottom: 0.8rem;
         padding-left: 1.5rem;
         position: relative;
     }

     .sidebar-heading::before {
         content: '';
         position: absolute;
         left: 1.5rem;
         bottom: -5px;
         width: 30px;
         height: 2px;
         background: linear-gradient(90deg, var(--accent-orange), var(--danger-color));
         border-radius: 2px;
     }

     .nav-item {
         position: relative;
         padding: 0 0.8rem;
         margin: 0.1rem 0;
     }

     .nav-link {
         color: rgba(255, 255, 255, 0.85);
         font-weight: 500;
         padding: 1rem 1.2rem;
         border-radius: var(--border-radius);
         margin: 0;
         transition: var(--transition-normal);
         position: relative;
         overflow: hidden;
         backdrop-filter: blur(10px);
         font-family: 'Inter', sans-serif;
         font-size: 14px;
         letter-spacing: 0.3px;
     }

     .nav-link::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 0;
         height: 100%;
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         transition: var(--transition-normal);
         border-radius: var(--border-radius);
         opacity: 0.8;
     }

     .nav-link::after {
         content: '';
         position: absolute;
         top: 50%;
         left: 12px;
         width: 3px;
         height: 0;
         background: white;
         transform: translateY(-50%);
         transition: var(--transition-normal);
         border-radius: 2px;
         opacity: 0;
     }

     .nav-link:hover {
         background: rgba(255, 255, 255, 0.1);
         color: white;
         transform: translateX(8px);
         box-shadow: var(--shadow-lg);
     }

     .nav-link:hover::before {
         width: 100%;
     }

     .nav-link:hover::after {
         height: 20px;
         opacity: 1;
     }

     .nav-link:hover i {
         transform: scale(1.2) rotate(5deg);
         color: white;
     }

     .nav-link.active {
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         color: white;
         box-shadow: var(--shadow-xl);
         transform: translateX(5px);
     }

     .nav-link.active::before {
         width: 100%;
     }

     .nav-link.active::after {
         height: 20px;
         opacity: 1;
     }

     .nav-link.active i {
         color: white;
         transform: scale(1.1);
     }

     .nav-link i {
         margin-right: 1rem;
         font-size: 1.1rem;
         width: 1.5rem;
         text-align: center;
         transition: var(--transition-normal);
         position: relative;
         z-index: 2;
     }

     /* Modern Main Content */
     .main-content {
         margin-left: 280px;
         transition: var(--transition-normal);
         min-height: 100vh;
         background: transparent;
         padding: 1.5rem;
         position: relative;
         z-index: 1;
     }

     /* Ultra Modern Topbar */
     .topbar {
         height: 5rem;
         background: rgba(255, 255, 255, 0.95);
         backdrop-filter: blur(25px);
         -webkit-backdrop-filter: blur(25px);
         border: 1px solid rgba(255, 255, 255, 0.2);
         box-shadow: var(--shadow-xl);
         margin-bottom: 1.5rem;
         border-radius: var(--border-radius-lg);
         display: flex;
         align-items: center;
         justify-content: space-between;
         padding: 0 2rem;
         position: relative;
         overflow: visible;
         z-index: 1040;
     }

     .topbar::before {
         content: '';
         position: absolute;
         bottom: 0;
         left: 0;
         width: 100%;
         height: 3px;
         background: linear-gradient(90deg, var(--secondary-color), var(--accent-purple), var(--accent-orange));
         background-size: 200% 100%;
         animation: gradient-slide 3s ease infinite;
     }

     @keyframes gradient-slide {
         0%, 100% { background-position: 0% 50%; }
         50% { background-position: 100% 50%; }
     }

     /* Modern Hamburger Menu */
     .modern-navbar-toggler {
         background: rgba(102, 126, 234, 0.1);
         backdrop-filter: blur(10px);
         border: 1px solid rgba(102, 126, 234, 0.2);
         border-radius: var(--border-radius);
         padding: 0.8rem;
         transition: var(--transition-normal);
         position: relative;
         overflow: hidden;
         margin-right: 1.5rem;
         width: 45px;
         height: 45px;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         gap: 4px;
     }

     .modern-navbar-toggler:hover {
         background: rgba(102, 126, 234, 0.2);
         transform: scale(1.05);
         box-shadow: var(--shadow-lg);
     }

     .hamburger-line {
         width: 20px;
         height: 2px;
         background: var(--secondary-color);
         border-radius: 2px;
         transition: var(--transition-normal);
         transform-origin: center;
     }

     .modern-navbar-toggler:hover .hamburger-line:nth-child(1) {
         transform: translateY(3px) rotate(45deg);
     }

     .modern-navbar-toggler:hover .hamburger-line:nth-child(2) {
         opacity: 0;
         transform: translateX(-10px);
     }

     .modern-navbar-toggler:hover .hamburger-line:nth-child(3) {
         transform: translateY(-3px) rotate(-45deg);
     }

     /* Title Section */
     .topbar-title-section {
         flex: 1;
         min-width: 0;
     }

     .topbar-title {
         font-size: 1.8rem;
         font-weight: 700;
         background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
         background-clip: text;
         margin-bottom: 0.2rem;
         display: flex;
         align-items: center;
         font-family: 'Plus Jakarta Sans', sans-serif;
         letter-spacing: -0.5px;
     }

     .title-icon {
         width: 40px;
         height: 40px;
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         border-radius: var(--border-radius);
         display: flex;
         align-items: center;
         justify-content: center;
         margin-right: 1rem;
         color: white;
         font-size: 1.2rem;
         box-shadow: var(--shadow-md);
         transition: var(--transition-normal);
     }

     .title-icon:hover {
         transform: scale(1.1) rotate(5deg);
         box-shadow: var(--shadow-lg);
     }

     .title-breadcrumb {
         display: flex;
         align-items: center;
         font-size: 0.85rem;
         color: var(--text-light);
         margin-top: 0.2rem;
     }

     .breadcrumb-home {
         display: flex;
         align-items: center;
         gap: 0.3rem;
         color: var(--text-secondary);
         transition: var(--transition-normal);
     }

     .breadcrumb-home:hover {
         color: var(--secondary-color);
     }

     .breadcrumb-separator {
         margin: 0 0.8rem;
         font-size: 0.7rem;
         color: var(--text-light);
     }

     .breadcrumb-current {
         color: var(--secondary-color);
         font-weight: 600;
     }

     /* Action Controls */
     .topbar-actions {
         display: flex;
         align-items: center;
         gap: 0.5rem;
     }

     /* Quick Search */
     .quick-search-container {
         position: relative;
     }

     .search-input-wrapper {
         position: relative;
         width: 280px;
     }

     .quick-search-input {
         width: 100%;
         height: 45px;
         background: rgba(255, 255, 255, 0.8);
         backdrop-filter: blur(10px);
         border: 1px solid rgba(102, 126, 234, 0.2);
         border-radius: var(--border-radius-lg);
         padding: 0 3rem 0 3rem;
         font-size: 0.9rem;
         transition: var(--transition-normal);
         color: var(--text-primary);
     }

     .quick-search-input:focus {
         outline: none;
         border-color: var(--secondary-color);
         box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
         background: rgba(255, 255, 255, 0.95);
     }

     .search-icon {
         position: absolute;
         left: 1rem;
         top: 50%;
         transform: translateY(-50%);
         color: var(--text-light);
         font-size: 1rem;
         transition: var(--transition-normal);
     }

     .quick-search-input:focus + .search-icon {
         color: var(--secondary-color);
     }

     /* Search Suggestions */
     #searchSuggestions {
         position: absolute;
         top: 100%;
         left: 0;
         right: 0;
         background: rgba(255, 255, 255, 0.95);
         backdrop-filter: blur(20px);
         border: 1px solid rgba(102, 126, 234, 0.2);
         border-radius: var(--border-radius);
         box-shadow: var(--shadow-xl);
         z-index: 1000;
         display: none;
         margin-top: 0.5rem;
         overflow: hidden;
     }

     .search-results {
         max-height: 300px;
         overflow-y: auto;
     }

     .search-result-item {
         display: flex;
         align-items: center;
         gap: 0.8rem;
         padding: 0.8rem 1rem;
         color: var(--text-primary);
         text-decoration: none;
         transition: var(--transition-normal);
         border-bottom: 1px solid rgba(102, 126, 234, 0.1);
     }

     .search-result-item:last-child {
         border-bottom: none;
     }

     .search-result-item:hover {
         background: var(--secondary-light);
         color: var(--secondary-dark);
         transform: translateX(5px);
     }

     .search-result-item i {
         color: var(--secondary-color);
         font-size: 1rem;
         width: 20px;
         text-align: center;
     }

     /* Action Buttons */
     .action-btn {
         width: 45px;
         height: 45px;
         background: rgba(255, 255, 255, 0.8);
         backdrop-filter: blur(10px);
         border: 1px solid rgba(102, 126, 234, 0.2);
         border-radius: var(--border-radius);
         display: flex;
         align-items: center;
         justify-content: center;
         color: var(--text-secondary);
         font-size: 1.1rem;
         transition: var(--transition-normal);
         position: relative;
         overflow: hidden;
     }

     .action-btn:hover {
         background: var(--secondary-color);
         color: white;
         transform: translateY(-2px);
         box-shadow: var(--shadow-lg);
         border-color: var(--secondary-color);
     }

     .action-btn::before {
         content: '';
         position: absolute;
         top: 0;
         left: -100%;
         width: 100%;
         height: 100%;
         background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
         transition: var(--transition-normal);
     }

     .action-btn:hover::before {
         left: 100%;
     }

     /* Notification Button */
     .notification-btn {
         position: relative;
     }

     .notification-icon {
         transition: var(--transition-normal);
     }

     .notification-btn:hover .notification-icon {
         transform: scale(1.2) rotate(15deg);
     }

     .notification-badge {
         position: absolute;
         top: -5px;
         right: -5px;
         background: linear-gradient(135deg, var(--accent-orange), var(--danger-color));
         color: white;
         border-radius: 50%;
         font-size: 0.7rem;
         font-weight: 700;
         min-width: 20px;
         height: 20px;
         display: flex;
         align-items: center;
         justify-content: center;
         border: 2px solid white;
         animation: pulse-glow 2s infinite;
     }

     .notification-pulse {
         position: absolute;
         top: -2px;
         right: -2px;
         width: 16px;
         height: 16px;
         background: var(--accent-orange);
         border-radius: 50%;
         opacity: 0.7;
         animation: pulse-ring 2s infinite;
     }

     @keyframes pulse-ring {
         0% {
             transform: scale(0.8);
             opacity: 1;
         }
         100% {
             transform: scale(2);
             opacity: 0;
         }
     }

     /* Modern Notification Dropdown - Enhanced Specificity */
     .notification-dropdown-wrapper .dropdown-menu.modern-notification-dropdown {
         width: 400px !important;
         max-height: 500px;
         background: rgba(255, 255, 255, 0.95) !important;
         backdrop-filter: blur(25px);
         -webkit-backdrop-filter: blur(25px);
         border: 1px solid rgba(255, 255, 255, 0.2) !important;
         border-radius: var(--border-radius-lg) !important;
         box-shadow: var(--shadow-2xl) !important;
         animation: slideInDown 0.3s ease;
         padding: 0 !important;
         overflow: hidden;
         min-width: 400px !important;
         z-index: 9999 !important;
         position: absolute !important;
     }

     .modern-notification-dropdown {
         width: 400px !important;
         max-height: 500px;
         background: rgba(255, 255, 255, 0.95) !important;
         backdrop-filter: blur(25px);
         -webkit-backdrop-filter: blur(25px);
         border: 1px solid rgba(255, 255, 255, 0.2) !important;
         border-radius: var(--border-radius-lg) !important;
         box-shadow: var(--shadow-2xl) !important;
         animation: slideInDown 0.3s ease;
         padding: 0 !important;
         overflow: hidden;
         min-width: 400px !important;
         z-index: 9999 !important;
         position: absolute !important;
     }

     .notification-header {
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         color: white;
         padding: 1.2rem;
         display: flex;
         justify-content: space-between;
         align-items: flex-start;
     }

     .notification-header-content h6 {
         font-weight: 700;
         font-size: 1rem;
         margin-bottom: 0.3rem;
         display: flex;
         align-items: center;
     }

     .notification-subtitle {
         font-size: 0.8rem;
         opacity: 0.9;
     }

     .mark-all-read-btn {
         background: rgba(255, 255, 255, 0.2);
         border: none;
         border-radius: var(--border-radius-sm);
         color: white;
         padding: 0.5rem;
         transition: var(--transition-normal);
         width: 35px;
         height: 35px;
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .mark-all-read-btn:hover {
         background: rgba(255, 255, 255, 0.3);
         transform: scale(1.1);
     }

     .notification-list {
         max-height: 350px;
         overflow-y: auto;
         padding: 0;
     }

     .notification-loading {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         padding: 2rem;
         color: var(--text-secondary);
     }

     .loading-spinner {
         width: 30px;
         height: 30px;
         border: 3px solid var(--secondary-light);
         border-top-color: var(--secondary-color);
         border-radius: 50%;
         animation: spin 1s linear infinite;
         margin-bottom: 1rem;
     }

     .notification-footer {
         background: rgba(248, 249, 250, 0.8);
         backdrop-filter: blur(10px);
         padding: 1rem;
         border-top: 1px solid rgba(102, 126, 234, 0.1);
     }

     .view-all-btn {
         display: flex;
         align-items: center;
         justify-content: center;
         gap: 0.5rem;
         color: var(--secondary-color);
         text-decoration: none;
         font-weight: 600;
         font-size: 0.9rem;
         transition: var(--transition-normal);
         padding: 0.5rem;
         border-radius: var(--border-radius-sm);
     }

     .view-all-btn:hover {
         background: var(--secondary-light);
         color: var(--secondary-dark);
         transform: translateX(3px);
     }

     /* User Profile Button */
     .user-profile-btn {
         background: rgba(255, 255, 255, 0.8);
         backdrop-filter: blur(10px);
         border: 1px solid rgba(102, 126, 234, 0.2);
         border-radius: var(--border-radius-lg);
         padding: 0.6rem 1rem;
         display: flex;
         align-items: center;
         gap: 0.8rem;
         transition: var(--transition-normal);
         color: var(--text-primary);
         position: relative;
         overflow: hidden;
     }

     .user-profile-btn:hover {
         background: rgba(102, 126, 234, 0.1);
         border-color: var(--secondary-color);
         transform: translateY(-2px);
         box-shadow: var(--shadow-lg);
     }

     .user-avatar {
         position: relative;
         width: 40px;
         height: 40px;
     }

     .avatar-img {
         width: 100%;
         height: 100%;
         border-radius: 50%;
         object-fit: cover;
         border: 2px solid white;
         box-shadow: var(--shadow-md);
         transition: var(--transition-normal);
     }

     .user-profile-btn:hover .avatar-img {
         transform: scale(1.1);
         box-shadow: var(--shadow-lg);
     }

     .avatar-status {
         position: absolute;
         bottom: 0;
         right: 0;
         width: 12px;
         height: 12px;
         border-radius: 50%;
         border: 2px solid white;
     }

     .avatar-status.online {
         background: var(--success-color);
         animation: pulse-status 2s infinite;
     }

     @keyframes pulse-status {
         0%, 100% {
             transform: scale(1);
             opacity: 1;
         }
         50% {
             transform: scale(1.2);
             opacity: 0.8;
         }
     }

     .user-info {
         display: flex;
         flex-direction: column;
         align-items: flex-start;
     }

     .user-name {
         font-weight: 600;
         font-size: 0.9rem;
         color: var(--text-primary);
         line-height: 1.2;
     }

     .user-role {
         font-size: 0.75rem;
         color: var(--text-light);
         line-height: 1.2;
     }

     .dropdown-arrow {
         font-size: 0.8rem;
         color: var(--text-light);
         transition: var(--transition-normal);
     }

     .user-profile-btn[aria-expanded="true"] .dropdown-arrow {
         transform: rotate(180deg);
         color: var(--secondary-color);
     }

     /* Modern User Dropdown - Enhanced Specificity */
     .user-dropdown-wrapper .dropdown-menu.modern-user-dropdown {
         width: 350px !important;
         background: rgba(255, 255, 255, 0.95) !important;
         backdrop-filter: blur(25px);
         -webkit-backdrop-filter: blur(25px);
         border: 1px solid rgba(255, 255, 255, 0.2) !important;
         border-radius: var(--border-radius-lg) !important;
         box-shadow: var(--shadow-2xl) !important;
         animation: slideInDown 0.3s ease;
         padding: 0 !important;
         overflow: hidden;
         margin-top: 0.5rem;
         min-width: 350px !important;
         z-index: 9999 !important;
         position: absolute !important;
     }

     .modern-user-dropdown {
         width: 350px !important;
         background: rgba(255, 255, 255, 0.95) !important;
         backdrop-filter: blur(25px);
         -webkit-backdrop-filter: blur(25px);
         border: 1px solid rgba(255, 255, 255, 0.2) !important;
         border-radius: var(--border-radius-lg) !important;
         box-shadow: var(--shadow-2xl) !important;
         animation: slideInDown 0.3s ease;
         padding: 0 !important;
         overflow: hidden;
         margin-top: 0.5rem;
         min-width: 350px !important;
         z-index: 9999 !important;
         position: absolute !important;
     }

     .user-dropdown-header {
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         color: white;
         padding: 1.5rem;
         display: flex;
         align-items: center;
         gap: 1rem;
     }

     .user-avatar-large {
         position: relative;
         width: 60px;
         height: 60px;
         flex-shrink: 0;
     }

     .user-avatar-large img {
         width: 100%;
         height: 100%;
         border-radius: 50%;
         object-fit: cover;
         border: 3px solid rgba(255, 255, 255, 0.3);
     }

     .user-avatar-large .avatar-status {
         width: 16px;
         height: 16px;
         border: 3px solid white;
     }

     .user-details {
         flex: 1;
     }

     .user-details .user-name {
         font-size: 1.1rem;
         font-weight: 700;
         color: white;
         margin-bottom: 0.2rem;
     }

     .user-email {
         font-size: 0.8rem;
         color: rgba(255, 255, 255, 0.8);
         margin-bottom: 0.5rem;
     }

     .user-badge {
         background: rgba(255, 255, 255, 0.2);
         padding: 0.2rem 0.8rem;
         border-radius: var(--border-radius-lg);
         font-size: 0.7rem;
         font-weight: 600;
         text-transform: uppercase;
         letter-spacing: 0.5px;
     }

     .user-quick-stats {
         display: flex;
         justify-content: space-around;
         padding: 1rem;
         background: rgba(248, 249, 250, 0.5);
         backdrop-filter: blur(10px);
     }

     .stat-item {
         text-align: center;
     }

     .stat-value {
         font-size: 1.2rem;
         font-weight: 700;
         color: var(--secondary-color);
         line-height: 1;
     }

     .stat-label {
         font-size: 0.7rem;
         color: var(--text-light);
         text-transform: uppercase;
         letter-spacing: 0.5px;
         margin-top: 0.2rem;
     }

     .user-menu-items {
         padding: 0.5rem 0;
     }

     .modern-dropdown-item {
         display: flex !important;
         align-items: center !important;
         gap: 1rem !important;
         padding: 1rem 1.5rem !important;
         color: var(--text-primary) !important;
         text-decoration: none !important;
         transition: var(--transition-normal) !important;
         border: none !important;
         background: none !important;
         position: relative !important;
         overflow: hidden !important;
         width: 100% !important;
         margin: 0 !important;
         border-radius: 0 !important;
     }

     /* Ensure modern dropdown items override Bootstrap defaults */
     .modern-user-dropdown .dropdown-item.modern-dropdown-item {
         display: flex !important;
         align-items: center !important;
         gap: 1rem !important;
         padding: 1rem 1.5rem !important;
         color: var(--text-primary) !important;
         text-decoration: none !important;
         transition: var(--transition-normal) !important;
         border: none !important;
         background: none !important;
         position: relative !important;
         overflow: hidden !important;
         width: 100% !important;
         margin: 0 !important;
         border-radius: 0 !important;
     }

     .modern-dropdown-item::before {
         content: '';
         position: absolute;
         left: 0;
         top: 0;
         width: 0;
         height: 100%;
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         opacity: 0.1;
         transition: var(--transition-normal);
     }

     .modern-dropdown-item:hover::before {
         width: 100%;
     }

     .modern-dropdown-item:hover {
         background: var(--secondary-light);
         color: var(--text-primary);
         transform: translateX(5px);
     }

     .item-icon {
         width: 40px;
         height: 40px;
         background: var(--secondary-light);
         border-radius: var(--border-radius);
         display: flex;
         align-items: center;
         justify-content: center;
         color: var(--secondary-color);
         font-size: 1.1rem;
         transition: var(--transition-normal);
         flex-shrink: 0;
     }

     .modern-dropdown-item:hover .item-icon {
         background: var(--secondary-color);
         color: white;
         transform: scale(1.1);
     }

     .item-content {
         flex: 1;
         display: flex;
         flex-direction: column;
     }

     .item-title {
         font-weight: 600;
         font-size: 0.9rem;
         line-height: 1.2;
     }

     .item-subtitle {
         font-size: 0.75rem;
         color: var(--text-light);
         line-height: 1.2;
     }

     .item-arrow {
         font-size: 0.8rem;
         color: var(--text-light);
         transition: var(--transition-normal);
         opacity: 0;
     }

     .modern-dropdown-item:hover .item-arrow {
         opacity: 1;
         transform: translateX(5px);
         color: var(--secondary-color);
     }

     .user-logout-section {
         padding: 1rem 1.5rem;
         background: rgba(248, 249, 250, 0.8);
         backdrop-filter: blur(10px);
     }

     .logout-btn {
         width: 100%;
         background: linear-gradient(135deg, var(--danger-color), var(--accent-orange));
         color: white;
         border: none;
         border-radius: var(--border-radius);
         padding: 0.8rem 1rem;
         display: flex;
         align-items: center;
         justify-content: center;
         gap: 0.8rem;
         font-weight: 600;
         font-size: 0.9rem;
         transition: var(--transition-normal);
         position: relative;
         overflow: hidden;
     }

     .logout-btn:hover {
         background: linear-gradient(135deg, #e55a5a, var(--accent-orange));
         transform: translateY(-2px);
         box-shadow: var(--shadow-lg);
     }

     .logout-btn::before {
         content: '';
         position: absolute;
         top: 0;
         left: -100%;
         width: 100%;
         height: 100%;
         background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
         transition: var(--transition-normal);
     }

     .logout-btn:hover::before {
         left: 100%;
     }

     .logout-icon {
         font-size: 1.1rem;
     }

     /* Fix dropdown divider for modern dropdowns */
     .modern-user-dropdown .dropdown-divider {
         border-top: 1px solid rgba(102, 126, 234, 0.2) !important;
         margin: 0 !important;
         opacity: 1 !important;
     }

     /* Fix any potential z-index issues */
     .dropdown-menu.show {
         display: block !important;
     }

     /* Ensure proper positioning for modern dropdowns */
     .user-dropdown-wrapper .dropdown-menu,
     .notification-dropdown-wrapper .dropdown-menu {
         position: absolute !important;
         top: 100% !important;
         right: 0 !important;
         left: auto !important;
         margin: 0.5rem 0 0 0 !important;
         transform: none !important;
         z-index: 9999 !important;
     }

     /* Notification dropdown specific positioning */
     .notification-dropdown-wrapper .dropdown-menu {
         right: -50px !important;
     }

     /* User dropdown specific positioning */  
     .user-dropdown-wrapper .dropdown-menu {
         right: 0 !important;
     }

     /* Modern Glass Cards */
     .card {
         border: none;
         border-radius: var(--border-radius-lg);
         background: rgba(255, 255, 255, 0.95);
         backdrop-filter: blur(20px);
         -webkit-backdrop-filter: blur(20px);
         border: 1px solid rgba(255, 255, 255, 0.2);
         box-shadow: var(--shadow-xl);
         transition: var(--transition-normal);
         overflow: hidden;
         position: relative;
     }

     .card::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         height: 1px;
         background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.5), transparent);
         opacity: 0;
         transition: var(--transition-normal);
     }

     .card:hover {
         transform: translateY(-8px);
         box-shadow: var(--shadow-2xl);
         border-color: rgba(102, 126, 234, 0.3);
     }

     .card:hover::before {
         opacity: 1;
     }

     .card-header {
         background: rgba(255, 255, 255, 0.8);
         backdrop-filter: blur(10px);
         border-bottom: 1px solid rgba(102, 126, 234, 0.1);
         padding: 1.5rem 2rem;
         font-weight: 600;
         color: var(--text-primary);
         display: flex;
         align-items: center;
         justify-content: space-between;
         position: relative;
         font-family: 'Plus Jakarta Sans', sans-serif;
     }

     .card-header::after {
         content: '';
         position: absolute;
         bottom: 0;
         left: 2rem;
         width: 50px;
         height: 2px;
         background: linear-gradient(90deg, var(--secondary-color), var(--accent-purple));
         border-radius: 2px;
     }

     .card-header .btn {
         padding: 0.6rem 1.2rem;
         font-size: 0.9rem;
         font-weight: 500;
         border-radius: var(--border-radius);
     }

     /* Modern Buttons */
     .btn {
         padding: 0.75rem 1.5rem;
         font-weight: 600;
         border-radius: var(--border-radius);
         transition: var(--transition-normal);
         font-family: 'Inter', sans-serif;
         font-size: 0.9rem;
         letter-spacing: 0.3px;
         position: relative;
         overflow: hidden;
         border: none;
     }

     .btn::before {
         content: '';
         position: absolute;
         top: 0;
         left: -100%;
         width: 100%;
         height: 100%;
         background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
         transition: var(--transition-normal);
     }

     .btn:hover::before {
         left: 100%;
     }

     .btn-primary {
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         color: white;
         box-shadow: var(--shadow-md);
     }

     .btn-primary:hover {
         background: linear-gradient(135deg, var(--secondary-dark), var(--accent-purple));
         transform: translateY(-3px);
         box-shadow: var(--shadow-xl);
         color: white;
     }

     .btn-success {
         background: linear-gradient(135deg, var(--success-color), var(--accent-green));
         color: white;
         box-shadow: var(--shadow-md);
     }

     .btn-success:hover {
         background: linear-gradient(135deg, #1dd975, var(--accent-green));
         transform: translateY(-3px);
         box-shadow: var(--shadow-xl);
         color: white;
     }

     .btn-warning {
         background: linear-gradient(135deg, var(--warning-color), #ff9500);
         color: white;
         box-shadow: var(--shadow-md);
     }

     .btn-warning:hover {
         background: linear-gradient(135deg, #e6941a, #ff9500);
         transform: translateY(-3px);
         box-shadow: var(--shadow-xl);
         color: white;
     }

     .btn-danger {
         background: linear-gradient(135deg, var(--danger-color), var(--accent-orange));
         color: white;
         box-shadow: var(--shadow-md);
     }

     .btn-danger:hover {
         background: linear-gradient(135deg, #e55a5a, var(--accent-orange));
         transform: translateY(-3px);
         box-shadow: var(--shadow-xl);
         color: white;
     }

     /* Modern Tables - Fixed Alignment */
     .table-responsive {
         border-radius: var(--border-radius-lg);
         background: rgba(255, 255, 255, 0.95);
         backdrop-filter: blur(20px);
         padding: 1.5rem;
         border: 1px solid rgba(255, 255, 255, 0.2);
         box-shadow: var(--shadow-lg);
         overflow-x: auto;
     }

     .table {
         margin-bottom: 0;
         background: transparent;
         border-collapse: separate;
         border-spacing: 0;
         table-layout: auto;
         width: 100%;
     }

     .table th {
         font-weight: 700;
         background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(165, 94, 234, 0.05));
         color: var(--text-primary);
         padding: 1.2rem 1rem;
         white-space: nowrap;
         border-bottom: 2px solid var(--secondary-color);
         font-family: 'Plus Jakarta Sans', sans-serif;
         font-size: 0.9rem;
         letter-spacing: 0.5px;
         text-transform: uppercase;
         position: relative;
         text-align: left;
         vertical-align: middle;
         border: none;
     }

     .table th::after {
         content: '';
         position: absolute;
         bottom: -2px;
         left: 1rem;
         width: 30px;
         height: 2px;
         background: linear-gradient(90deg, var(--accent-orange), var(--danger-color));
         border-radius: 2px;
     }

     .table th:first-child {
         text-align: center;
         padding-left: 0.8rem;
         padding-right: 0.8rem;
     }

     .table th:last-child {
         text-align: center;
         padding-left: 0.8rem;
         padding-right: 0.8rem;
     }

     .table td {
         vertical-align: middle;
         padding: 1.2rem 1rem;
         color: var(--text-secondary);
         font-size: 0.95rem;
         border-bottom: 1px solid rgba(102, 126, 234, 0.1);
         position: relative;
         border: none;
         text-align: left;
     }

     .table td:first-child {
         text-align: center;
         font-weight: 600;
         color: var(--primary-color);
         padding-left: 0.8rem;
         padding-right: 0.8rem;
     }

     .table td:last-child {
         text-align: center;
         padding-left: 0.8rem;
         padding-right: 0.8rem;
     }

     .table tbody tr {
         transition: var(--transition-normal);
         position: relative;
     }

     .table tbody tr:hover {
         background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(165, 94, 234, 0.03));
         /* Hapus semua transform dan pseudo-element yang menyebabkan ketidakselarasan */
     }

     /* Ensure all cells have consistent positioning */
     .table th,
     .table td {
         position: relative;
         z-index: 2;
     }

     /* Fix DataTables alignment issues */
     .dataTables_wrapper .table {
         table-layout: auto !important;
         width: 100% !important;
     }

     .dataTables_wrapper .table th,
     .dataTables_wrapper .table td {
         box-sizing: border-box !important;
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
     }

     /* Remove any transforms that cause misalignment */
     .dataTables_wrapper .table tbody tr {
         transform: none !important;
     }

     .dataTables_wrapper .table tbody tr:hover {
         transform: none !important;
     }

     /* Specific column alignment for better data presentation */
     .table th:nth-child(1),
     .table td:nth-child(1) {
         width: 8%;
         text-align: center;
     }

     .table th:nth-child(2),
     .table td:nth-child(2) {
         width: 15%;
         text-align: left;
     }

     .table th:nth-child(3),
     .table td:nth-child(3) {
         width: 20%;
         text-align: left;
     }

     .table th:nth-child(4),
     .table td:nth-child(4) {
         width: 15%;
         text-align: center;
     }

     .table th:nth-child(5),
     .table td:nth-child(5) {
         width: 20%;
         text-align: left;
     }

     .table th:nth-child(6),
     .table td:nth-child(6) {
         width: 12%;
         text-align: center;
     }

     .table th:nth-child(7),
     .table td:nth-child(7) {
         width: 10%;
         text-align: center;
     }

     /* Modern Stats Cards */
     .stat-card {
         background: rgba(255, 255, 255, 0.95);
         backdrop-filter: blur(20px);
         -webkit-backdrop-filter: blur(20px);
         border: 1px solid rgba(255, 255, 255, 0.2);
         border-radius: var(--border-radius-lg);
         padding: 2rem;
         margin-bottom: 1.5rem;
         position: relative;
         overflow: hidden;
         box-shadow: var(--shadow-xl);
         transition: var(--transition-normal);
     }

     .stat-card::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 4px;
         background: linear-gradient(90deg, var(--secondary-color), var(--accent-purple), var(--accent-orange));
         background-size: 200% 100%;
         animation: gradient-slide 3s ease infinite;
     }

     .stat-card:hover {
         transform: translateY(-5px);
         box-shadow: var(--shadow-2xl);
     }

     .stat-card .icon {
         position: absolute;
         right: 2rem;
         top: 50%;
         transform: translateY(-50%);
         font-size: 3.5rem;
         opacity: 0.15;
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
         background-clip: text;
         transition: var(--transition-normal);
     }

     .stat-card:hover .icon {
         opacity: 0.25;
         transform: translateY(-50%) scale(1.1) rotate(5deg);
     }

     .stat-card h3 {
         font-size: 2.2rem;
         font-weight: 800;
         background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
         background-clip: text;
         margin-bottom: 0.5rem;
         font-family: 'Plus Jakarta Sans', sans-serif;
         letter-spacing: -1px;
     }

     .stat-card p {
         color: var(--text-secondary);
         margin-bottom: 0;
         font-size: 0.95rem;
         font-weight: 500;
         letter-spacing: 0.3px;
     }

     /* Modern Mobile Overlay */
     .sidebar-overlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(26, 27, 58, 0.8);
         backdrop-filter: blur(5px);
         -webkit-backdrop-filter: blur(5px);
         z-index: 1035;
         opacity: 0;
         visibility: hidden;
         transition: var(--transition-normal);
     }

     .sidebar-overlay.show {
         opacity: 1;
         visibility: visible;
     }

     /* Modern Mobile Toggle Button */
     .navbar-toggler {
         background: rgba(102, 126, 234, 0.1);
         backdrop-filter: blur(10px);
         border: 1px solid rgba(102, 126, 234, 0.2);
         color: var(--secondary-color);
         font-size: 1.5rem;
         padding: 0.7rem;
         border-radius: var(--border-radius);
         transition: var(--transition-normal);
         box-shadow: var(--shadow-md);
     }

     .navbar-toggler:hover {
         background: rgba(102, 126, 234, 0.2);
         color: var(--secondary-dark);
         transform: scale(1.05);
         box-shadow: var(--shadow-lg);
     }

     .navbar-toggler:focus {
         box-shadow: 0 0 0 0.3rem rgba(102, 126, 234, 0.25);
         outline: none;
     }

     /* Modern Sidebar Styling */
     .sidebar {
         width: 280px;
         min-height: 100vh;
         background: rgba(26, 27, 58, 0.95);
         backdrop-filter: blur(25px);
         -webkit-backdrop-filter: blur(25px);
         border-right: 1px solid rgba(255, 255, 255, 0.1);
         position: fixed;
         top: 0;
         left: 0;
         z-index: 1000;
         transition: all 0.3s ease;
         overflow-y: auto;
         overflow-x: hidden;
     }

     /* Custom Scrollbar for Sidebar */
     .sidebar::-webkit-scrollbar {
         width: 4px;
     }

     .sidebar::-webkit-scrollbar-track {
         background: rgba(255, 255, 255, 0.05);
     }

     .sidebar::-webkit-scrollbar-thumb {
         background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
         border-radius: 2px;
     }

     /* Brand Section */
     .sidebar-brand {
         display: flex;
         align-items: center;
         padding: 2rem 1.5rem;
         border-bottom: 1px solid rgba(255, 255, 255, 0.1);
         position: relative;
         overflow: hidden;
     }

     .sidebar-brand::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
         z-index: 1;
     }

     .brand-logo {
         position: relative;
         z-index: 2;
         margin-right: 1rem;
     }

     .logo-container {
         position: relative;
         width: 50px;
         height: 50px;
         border-radius: var(--border-radius-lg);
         overflow: hidden;
         border: 2px solid rgba(255, 255, 255, 0.2);
     }

     .logo-container img {
         width: 100%;
         height: 100%;
         object-fit: cover;
         transition: transform 0.3s ease;
     }

     .logo-overlay {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
         display: flex;
         align-items: center;
         justify-content: center;
         opacity: 0;
         transition: opacity 0.3s ease;
         color: white;
         font-size: 1.2rem;
     }

     .logo-container:hover img {
         transform: scale(1.1);
     }

     .logo-container:hover .logo-overlay {
         opacity: 0.9;
     }

     .brand-text {
         color: white;
         position: relative;
         z-index: 2;
     }

     .brand-name {
         font-size: 1.5rem;
         font-weight: 800;
         margin-bottom: 0.25rem;
         background: linear-gradient(135deg, #fff, var(--accent-purple));
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
         background-clip: text;
     }

     .brand-subtitle {
         font-size: 0.875rem;
         opacity: 0.7;
         margin-bottom: 0.5rem;
         font-weight: 500;
     }

     .brand-status {
         display: flex;
         align-items: center;
         gap: 0.5rem;
         font-size: 0.75rem;
         opacity: 0.8;
     }

     .status-dot {
         width: 8px;
         height: 8px;
         border-radius: 50%;
         background: #22c55e;
         animation: pulse-status 2s infinite;
     }

     .status-text {
         font-weight: 600;
         color: #22c55e;
     }

     /* Navigation Sections */
     .sidebar-nav {
         padding: 1rem 0;
     }

     .nav-section {
         margin-bottom: 1.5rem;
         opacity: 0;
         transform: translateX(-20px);
         animation: slideInLeft 0.5s ease forwards;
     }

     .nav-section:nth-child(1) { animation-delay: 0.1s; }
     .nav-section:nth-child(2) { animation-delay: 0.2s; }
     .nav-section:nth-child(3) { animation-delay: 0.3s; }
     .nav-section:nth-child(4) { animation-delay: 0.4s; }
     .nav-section:nth-child(5) { animation-delay: 0.5s; }

     .section-header {
         display: flex;
         align-items: center;
         padding: 0.75rem 1.5rem;
         margin-bottom: 0.5rem;
         position: relative;
     }

     .section-icon {
         width: 24px;
         height: 24px;
         display: flex;
         align-items: center;
         justify-content: center;
         margin-right: 1rem;
         color: var(--accent-purple);
         font-size: 0.9rem;
     }

     .section-title {
         font-size: 0.75rem;
         font-weight: 700;
         text-transform: uppercase;
         letter-spacing: 1px;
         color: rgba(255, 255, 255, 0.6);
         margin-right: 1rem;
     }

     .section-line {
         flex: 1;
         height: 1px;
         background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), transparent);
     }

     /* Navigation Items */
     .nav-item {
         display: flex;
         align-items: center;
         padding: 1rem 1.5rem;
         color: rgba(255, 255, 255, 0.8);
         text-decoration: none;
         transition: all 0.3s ease;
         position: relative;
         margin: 0.25rem 1rem;
         border-radius: var(--border-radius-lg);
         overflow: hidden;
     }

     .nav-item::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
         opacity: 0;
         transition: opacity 0.3s ease;
         z-index: 1;
     }

     .nav-item:hover::before {
         opacity: 1;
     }

     .nav-item.active {
         background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
         border: 1px solid rgba(102, 126, 234, 0.3);
         color: white;
     }

     .nav-item.active .nav-indicator {
         transform: scaleY(1);
         opacity: 1;
     }

     .nav-icon {
         width: 40px;
         height: 40px;
         display: flex;
         align-items: center;
         justify-content: center;
         margin-right: 1rem;
         border-radius: var(--border-radius);
         font-size: 1.1rem;
         transition: all 0.3s ease;
         position: relative;
         z-index: 2;
     }

     /* Icon Specific Colors */
     .dashboard-icon { background: linear-gradient(135deg, #667eea, #764ba2); }
     .customers-icon { background: linear-gradient(135deg, #4facfe, #00f2fe); }
     .staff-icon { background: linear-gradient(135deg, #43e97b, #38f9d7); }
     .services-icon { background: linear-gradient(135deg, #fa709a, #fee140); }
     .gallery-icon { background: linear-gradient(135deg, #a8edea, #fed6e3); }
     .users-icon { background: linear-gradient(135deg, #ff9a9e, #fecfef); }
     .booking-icon { background: linear-gradient(135deg, #667eea, #764ba2); }
     .expense-icon { background: linear-gradient(135deg, #f093fb, #f5576c); }
     .reports-icon { background: linear-gradient(135deg, #4facfe, #00f2fe); }

     .nav-icon i {
         color: white;
         transition: transform 0.3s ease;
     }

     .nav-item:hover .nav-icon i {
         transform: scale(1.1);
     }

     .nav-text {
         flex: 1;
         font-weight: 600;
         font-size: 0.95rem;
         position: relative;
         z-index: 2;
     }

     .nav-badge {
         background: linear-gradient(135deg, var(--accent-orange), var(--accent-purple));
         color: white;
         font-size: 0.75rem;
         font-weight: 700;
         padding: 0.25rem 0.5rem;
         border-radius: var(--border-radius);
         min-width: 24px;
         text-align: center;
         margin-left: 0.5rem;
         position: relative;
         z-index: 2;
         transition: all 0.3s ease;
     }

     .nav-badge.booking-badge.has-notifications {
         animation: pulse-glow 2s infinite;
     }

     .nav-indicator {
         position: absolute;
         right: 0;
         top: 50%;
         transform: translateY(-50%) scaleY(0);
         width: 4px;
         height: 60%;
         background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
         border-radius: 2px 0 0 2px;
         opacity: 0;
         transition: all 0.3s ease;
     }

     /* Quick Actions */
     .quick-actions {
         margin-top: 2rem;
     }

     .quick-action-grid {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 0.75rem;
         padding: 0 1.5rem;
     }

     .quick-action-btn {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         padding: 1rem 0.5rem;
         background: rgba(255, 255, 255, 0.05);
         border: 1px solid rgba(255, 255, 255, 0.1);
         border-radius: var(--border-radius-lg);
         color: rgba(255, 255, 255, 0.8);
         text-decoration: none;
         transition: all 0.3s ease;
         position: relative;
         overflow: hidden;
     }

     .quick-action-btn::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
         opacity: 0;
         transition: opacity 0.3s ease;
     }

     .quick-action-btn:hover::before {
         opacity: 0.1;
     }

     .quick-action-btn:hover {
         transform: translateY(-2px);
         border-color: rgba(102, 126, 234, 0.3);
         color: white;
     }

     .quick-action-btn i {
         font-size: 1.5rem;
         margin-bottom: 0.5rem;
         position: relative;
         z-index: 2;
     }

     .quick-action-btn span {
         font-size: 0.75rem;
         font-weight: 600;
         text-align: center;
         position: relative;
         z-index: 2;
     }

     /* Sidebar Footer */
     .sidebar-footer {
         position: absolute;
         bottom: 0;
         left: 0;
         width: 100%;
         background: rgba(0, 0, 0, 0.2);
         backdrop-filter: blur(10px);
         border-top: 1px solid rgba(255, 255, 255, 0.1);
         padding: 1.5rem;
     }

     .footer-stats {
         margin-bottom: 1rem;
     }

     .stat-item {
         display: flex;
         align-items: center;
         gap: 1rem;
         padding: 1rem;
         background: rgba(255, 255, 255, 0.05);
         border-radius: var(--border-radius-lg);
         border: 1px solid rgba(255, 255, 255, 0.1);
     }

     .stat-item .stat-icon {
         width: 35px;
         height: 35px;
         display: flex;
         align-items: center;
         justify-content: center;
         background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
         border-radius: var(--border-radius);
         color: white;
         font-size: 1rem;
     }

     .stat-content {
         color: white;
     }

     .stat-number {
         display: block;
         font-size: 1.25rem;
         font-weight: 700;
         margin-bottom: 0.25rem;
     }

     .stat-label {
         font-size: 0.75rem;
         opacity: 0.7;
     }

     /* Logout Button */
     .logout-btn {
         display: flex;
         align-items: center;
         width: 100%;
         padding: 1rem;
         background: rgba(239, 68, 68, 0.1);
         border: 1px solid rgba(239, 68, 68, 0.2);
         border-radius: var(--border-radius-lg);
         color: #ef4444;
         text-decoration: none;
         transition: all 0.3s ease;
         position: relative;
         overflow: hidden;
     }

     .logout-btn::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: linear-gradient(135deg, #ef4444, #dc2626);
         opacity: 0;
         transition: opacity 0.3s ease;
     }

     .logout-btn:hover::before {
         opacity: 0.1;
     }

     .logout-btn:hover {
         background: rgba(239, 68, 68, 0.2);
         border-color: rgba(239, 68, 68, 0.4);
         color: #fff;
         transform: translateY(-2px);
     }

     .logout-icon {
         width: 35px;
         height: 35px;
         display: flex;
         align-items: center;
         justify-content: center;
         background: linear-gradient(135deg, #ef4444, #dc2626);
         border-radius: var(--border-radius);
         margin-right: 1rem;
         position: relative;
         z-index: 2;
     }

     .logout-icon i {
         color: white;
         font-size: 1rem;
     }

     .logout-text {
         flex: 1;
         font-weight: 600;
         position: relative;
         z-index: 2;
     }

     .logout-arrow {
         position: relative;
         z-index: 2;
         transition: transform 0.3s ease;
     }

     .logout-btn:hover .logout-arrow {
         transform: translateX(5px);
     }

     /* Ripple Effect */
     .ripple-effect {
         position: absolute;
         border-radius: 50%;
         background: rgba(255, 255, 255, 0.3);
         transform: scale(0);
         animation: ripple 0.6s linear;
         pointer-events: none;
         z-index: 1;
     }

     @keyframes ripple {
         to {
             transform: scale(4);
             opacity: 0;
         }
     }

     /* Animation for sections */
     .nav-section.animate-in {
         opacity: 1;
         transform: translateX(0);
     }

     /* Enhanced Responsive Design */
     @media (max-width: 1200px) {
         .main-content {
             padding: 1.2rem;
         }

         .topbar {
             padding: 0 1.2rem;
         }

         .stat-card {
             padding: 1.5rem;
         }

         .card-header {
             padding: 1.2rem 1.5rem;
         }
     }

     @media (max-width: 992px) {
         .sidebar {
             width: 80px;
             background: rgba(26, 27, 58, 0.98);
         }

         .sidebar-brand {
             padding: 1.5rem 1rem;
             flex-direction: column;
             text-align: center;
         }

         .brand-logo {
             margin-right: 0;
             margin-bottom: 0.5rem;
         }

         .logo-container {
             width: 40px;
             height: 40px;
         }

         .brand-text {
             display: none;
         }

         .section-header {
             padding: 0.5rem 1rem;
             justify-content: center;
         }

         .section-icon {
             margin-right: 0;
         }

         .section-title,
         .section-line {
             display: none;
         }

         .nav-item {
             margin: 0.25rem 0.5rem;
             padding: 1rem 0.5rem;
             justify-content: center;
             flex-direction: column;
             text-align: center;
         }

         .nav-icon {
             margin-right: 0;
             margin-bottom: 0.5rem;
             width: 35px;
             height: 35px;
         }

         .nav-text {
             font-size: 0.7rem;
             margin-bottom: 0.25rem;
         }

         .nav-badge {
             margin-left: 0;
             position: absolute;
             top: 0.5rem;
             right: 0.5rem;
             min-width: 18px;
             height: 18px;
             font-size: 0.65rem;
             display: flex;
             align-items: center;
             justify-content: center;
             padding: 0;
         }

         .quick-actions {
             display: none;
         }

         .sidebar-footer {
             padding: 1rem 0.5rem;
         }

         .footer-stats {
             display: none;
         }

         .logout-btn {
             padding: 1rem 0.5rem;
             flex-direction: column;
             text-align: center;
         }

         .logout-icon {
             margin-right: 0;
             margin-bottom: 0.5rem;
         }

         .logout-text {
             font-size: 0.7rem;
         }

         .logout-arrow {
             display: none;
         }

         .main-content {
             margin-left: 80px;
             padding: 1rem;
         }

         .topbar {
             padding: 0 1rem;
             margin-bottom: 1rem;
             height: 4.5rem;
         }

         .topbar-title {
             font-size: 1.4rem;
         }

         .title-icon {
             width: 35px;
             height: 35px;
             margin-right: 0.8rem;
         }

         .topbar-actions {
             gap: 0.3rem;
         }

         .action-btn {
             width: 40px;
             height: 40px;
         }

         .quick-search-container {
             display: none !important;
         }

         .search-input-wrapper {
             width: 200px;
         }
     }

     @media (max-width: 768px) {
         .sidebar {
             transform: translateX(-100%);
             width: 280px;
             z-index: 9999;
         }

         .sidebar.show {
             transform: translateX(0);
         }

         .sidebar-brand {
             padding: 2rem 1.5rem;
             flex-direction: row;
             text-align: left;
         }

         .brand-logo {
             margin-right: 1rem;
             margin-bottom: 0;
         }

         .logo-container {
             width: 50px;
             height: 50px;
         }

         .brand-text {
             display: block;
         }

         .section-header {
             padding: 0.75rem 1.5rem;
             justify-content: flex-start;
         }

         .section-icon {
             margin-right: 1rem;
         }

         .section-title,
         .section-line {
             display: block;
         }

         .nav-item {
             margin: 0.25rem 1rem;
             padding: 1rem 1.5rem;
             justify-content: flex-start;
             flex-direction: row;
             text-align: left;
         }

         .nav-icon {
             margin-right: 1rem;
             margin-bottom: 0;
             width: 40px;
             height: 40px;
         }

         .nav-text {
             font-size: 0.95rem;
             margin-bottom: 0;
         }

         .nav-badge {
             margin-left: 0.5rem;
             position: static;
             min-width: 24px;
             height: auto;
             font-size: 0.75rem;
             padding: 0.25rem 0.5rem;
         }

         .quick-actions {
             display: block;
         }

         .sidebar-footer {
             padding: 1.5rem;
         }

         .footer-stats {
             display: block;
         }

         .logout-btn {
             padding: 1rem;
             flex-direction: row;
             text-align: left;
         }

         .logout-icon {
             margin-right: 1rem;
             margin-bottom: 0;
         }

         .logout-text {
             font-size: 1rem;
         }

         .logout-arrow {
             display: block;
         }

         .main-content {
             margin-left: 0;
             padding: 0.8rem;
         }

         .sidebar.show {
             transform: translateX(0);
             animation: slideInLeft 0.3s ease;
         }

         @keyframes slideInLeft {
             0% {
                 transform: translateX(-100%);
                 opacity: 0.8;
             }
             100% {
                 transform: translateX(0);
                 opacity: 1;
             }
         }

         .sidebar.show .sidebar-brand {
             flex-direction: row;
             padding: 1.5rem 1.2rem;
             height: 5rem;
         }

         .sidebar.show .sidebar-brand img {
             margin-right: 12px;
             margin-bottom: 0;
             width: 45px;
             height: 45px;
         }

         .sidebar.show .sidebar-brand h3,
         .sidebar.show .sidebar-brand p,
         .sidebar.show .sidebar-heading,
         .sidebar.show .nav-link span {
             display: inline-block;
         }

         .sidebar.show .nav-item {
             padding: 0 0.8rem;
         }

         .sidebar.show .nav-link {
             text-align: left;
             padding: 1rem 1.2rem;
         }

         .sidebar.show .nav-link i {
             margin-right: 1rem;
         }

         .topbar {
             margin-bottom: 1rem;
             padding: 0 0.8rem;
             height: 4.2rem;
             flex-wrap: wrap;
         }

         .topbar-title {
             font-size: 1.3rem;
         }

         .title-icon {
             width: 30px;
             height: 30px;
             margin-right: 0.6rem;
             font-size: 1rem;
         }

         .title-breadcrumb {
             display: none;
         }

         .topbar-actions {
             gap: 0.2rem;
         }

         .action-btn {
             width: 38px;
             height: 38px;
             font-size: 1rem;
         }

         .user-profile-btn {
             padding: 0.4rem 0.8rem;
         }

         .user-avatar {
             width: 32px;
             height: 32px;
         }

         .modern-user-dropdown {
             width: 300px;
         }

         .modern-notification-dropdown {
             width: 350px;
         }

         .navbar-toggler {
             display: block !important;
         }
     }

     @media (max-width: 480px) {
         .main-content {
             padding: 0.6rem;
         }

         .topbar {
             padding: 0 0.6rem;
             height: 3.8rem;
         }

         .topbar h1 {
             font-size: 1.15rem;
         }

         .sidebar {
             width: 280px;
         }

         .card {
             margin-bottom: 1rem;
             border-radius: var(--border-radius);
         }

         .card-header {
             padding: 1rem 1.2rem;
             flex-direction: column;
             align-items: flex-start;
             gap: 0.8rem;
         }

         .btn {
             padding: 0.6rem 1rem;
             font-size: 0.9rem;
         }

         .table-responsive {
             padding: 0.8rem;
         }

         .table th,
         .table td {
             padding: 0.8rem;
             font-size: 0.9rem;
         }

         .stat-card {
             padding: 1.2rem;
             margin-bottom: 1rem;
         }

         .stat-card h3 {
             font-size: 1.8rem;
         }

         .stat-card .icon {
             font-size: 2.5rem;
         }

         .notification-dropdown {
             width: 300px !important;
         }

         /* DataTables Enhanced Mobile */
         .dataTables_wrapper .row>[class^="col"],
         .dataTables_wrapper .row>[class*=" col"] {
             width: 100%;
             max-width: 100%;
         }

         .dataTables_length,
         .dataTables_filter,
         .dataTables_info,
         .dataTables_paginate {
             text-align: left !important;
             margin-bottom: 0.6rem;
         }

         .dataTables_filter input {
             width: 100% !important;
             margin-left: 0 !important;
             border-radius: var(--border-radius);
         }

         .form-control,
         .form-select {
             font-size: 0.95rem;
             padding: 0.6rem 0.8rem;
             border-radius: var(--border-radius);
             border: 1px solid rgba(102, 126, 234, 0.2);
         }

         .form-control:focus,
         .form-select:focus {
             border-color: var(--secondary-color);
             box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
         }
     }

     /* Enhanced Mobile Table Scrolling */
     @media (max-width: 768px) {
         .table-responsive {
             overflow-x: auto;
             -webkit-overflow-scrolling: touch;
         }

         .main-content table {
             /* Hapus display: block yang merusak struktur table */
             width: 100%;
             border-radius: var(--border-radius);
         }

         .input-group {
             flex-wrap: wrap;
             gap: 0.5rem;
         }

         .input-group .form-control {
             min-width: 0;
             flex: 1 1 auto;
         }
     }

     /* Landscape Orientation Optimizations */
     @media (max-height: 500px) and (orientation: landscape) {
         .sidebar {
             overflow-y: auto;
         }

         .sidebar-brand {
             height: 3.5rem;
             min-height: 3.5rem;
             padding: 0.5rem;
         }

         .nav-link {
             padding: 0.4rem 1rem;
         }

         .topbar {
             height: 3.5rem;
         }
     }

     /* Modern Loading Animations */
     @keyframes shimmer {
         0% { background-position: -200px 0; }
         100% { background-position: calc(200px + 100%) 0; }
     }

     .loading-shimmer {
         background: linear-gradient(90deg, #f0f0f0 0px, #e0e0e0 40px, #f0f0f0 80px);
         background-size: 200px 100%;
         animation: shimmer 1.5s infinite;
     }

     /* Enhanced Focus States */
     .form-control:focus,
     .form-select:focus,
     .btn:focus {
         outline: none;
         box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.25);
     }

     /* Modern Selection Styles */
     ::selection {
         background: rgba(102, 126, 234, 0.3);
         color: var(--text-primary);
     }

     ::-moz-selection {
         background: rgba(102, 126, 234, 0.3);
         color: var(--text-primary);
     }

     /* Enhanced Accessibility */
     @media (prefers-reduced-motion: reduce) {
         *,
         *::before,
         *::after {
             animation-duration: 0.01ms !important;
             animation-iteration-count: 1 !important;
             transition-duration: 0.01ms !important;
         }
     }

     /* Modern Loading States */
     .btn.loading {
         position: relative;
         color: transparent !important;
     }

     .btn.loading::after {
         content: '';
         position: absolute;
         top: 50%;
         left: 50%;
         width: 16px;
         height: 16px;
         margin: -8px 0 0 -8px;
         border: 2px solid transparent;
         border-top-color: currentColor;
         border-radius: 50%;
         animation: spin 1s linear infinite;
         color: white;
     }

     @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
     }

     /* Floating Action Button Style */
     .fab {
         position: fixed;
         bottom: 2rem;
         right: 2rem;
         width: 60px;
         height: 60px;
         border-radius: 50%;
         background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
         color: white;
         border: none;
         box-shadow: var(--shadow-xl);
         display: flex;
         align-items: center;
         justify-content: center;
         font-size: 1.5rem;
         transition: var(--transition-normal);
         z-index: 1000;
     }

     .fab:hover {
         transform: scale(1.1) rotate(5deg);
         box-shadow: var(--shadow-2xl);
     }
 </style>