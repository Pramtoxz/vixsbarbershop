<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

    :root {
        /* New Color Palette - Modern & Professional */
        --primary-color: #0066CC;
        --primary-dark: #004499;
        --primary-light: #3385D6;
        --secondary-color: #00D4AA;
        --accent-color: #FFD23F;
        --success-color: #10B981;
        --warning-color: #F59E0B;
        --error-color: #EF4444;
        
        /* Neutral Colors */
        --white: #FFFFFF;
        --gray-50: #F9FAFB;
        --gray-100: #F3F4F6;
        --gray-200: #E5E7EB;
        --gray-300: #D1D5DB;
        --gray-400: #9CA3AF;
        --gray-500: #6B7280;
        --gray-600: #4B5563;
        --gray-700: #374151;
        --gray-800: #1F2937;
        --gray-900: #111827;
        
        /* Text Colors */
        --text-primary: #1F2937;
        --text-secondary: #6B7280;
        --text-light: #9CA3AF;
        
        /* Background */
        --bg-primary: #FFFFFF;
        --bg-secondary: #F9FAFB;
        --bg-dark: #0F172A;
        
        /* Shadows */
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        
        /* Border Radius */
        --radius-sm: 0.375rem;
        --radius-md: 0.5rem;
        --radius-lg: 0.75rem;
        --radius-xl: 1rem;
        --radius-2xl: 1.5rem;
        
        /* Spacing */
        --space-xs: 0.5rem;
        --space-sm: 1rem;
        --space-md: 1.5rem;
        --space-lg: 2rem;
        --space-xl: 3rem;
        --space-2xl: 4rem;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.6;
        color: var(--text-primary);
        background-color: var(--bg-primary);
        font-size: 16px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        padding-top: 80px; /* Memberikan ruang untuk fixed navbar */
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        line-height: 1.2;
        color: var(--text-primary);
        margin-bottom: var(--space-sm);
    }

    h1 { font-size: 3.5rem; }
    h2 { font-size: 2.5rem; }
    h3 { font-size: 2rem; }
    h4 { font-size: 1.5rem; }
    h5 { font-size: 1.25rem; }
    h6 { font-size: 1.125rem; }

    p {
        margin-bottom: var(--space-sm);
        color: var(--text-secondary);
        line-height: 1.7;
    }

    /* Container & Layout */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 var(--space-md);
    }

    .section {
        padding: var(--space-2xl) 0;
    }

    .section-padding {
        padding: 6rem 0;
    }

    /* Hero Section - Amazing Design */
    .hero {
        background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
        min-height: calc(100vh - 80px); /* Mengurangi tinggi navbar */
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
        animation: backgroundMove 20s ease-in-out infinite;
    }

    .hero::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Ccircle cx='7' cy='7' r='1'/%3E%3Ccircle cx='53' cy='7' r='1'/%3E%3Ccircle cx='30' cy='30' r='1'/%3E%3Ccircle cx='7' cy='53' r='1'/%3E%3Ccircle cx='53' cy='53' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        opacity: 0.7;
        animation: starTwinkle 4s ease-in-out infinite;
    }

    @keyframes backgroundMove {
        0%, 100% { transform: scale(1) rotate(0deg); }
        25% { transform: scale(1.1) rotate(1deg); }
        50% { transform: scale(1.05) rotate(-1deg); }
        75% { transform: scale(1.1) rotate(0.5deg); }
    }

    @keyframes starTwinkle {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 0.2; }
    }

    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        color: white;
        animation: heroContentFloat 6s ease-in-out infinite;
    }

    @keyframes heroContentFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .hero-title {
        font-size: 4.5rem;
        font-weight: 900;
        margin-bottom: var(--space-md);
        color: white;
        line-height: 1.1;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        letter-spacing: -2px;
        position: relative;
    }

    .hero-title::before {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        border-radius: 20px;
        animation: titleGlow 3s ease-in-out infinite;
        z-index: -1;
    }

    @keyframes titleGlow {
        0%, 100% { opacity: 0; transform: scale(0.95); }
        50% { opacity: 1; transform: scale(1.02); }
    }

    .gradient-accent {
        background: linear-gradient(135deg, #FFD700 0%, #FF6B6B 25%, #4ECDC4 50%, #45B7D1 75%, #96CEB4 100%);
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        animation: gradientShift 4s ease-in-out infinite;
        filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.5));
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-subtitle {
        font-size: 1.4rem;
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: var(--space-xl);
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        animation: subtitleFade 2s ease-out 0.5s both;
    }

    @keyframes subtitleFade {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Enhanced Hero Decorations */
    .hero-decoration {
        position: absolute;
        pointer-events: none;
        z-index: 1;
    }

    .hero-circle-1 {
        width: 200px;
        height: 200px;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.2), rgba(78, 205, 196, 0.2));
        border-radius: 50%;
        top: 10%;
        left: 10%;
        animation: float1 8s ease-in-out infinite;
        filter: blur(1px);
    }

    .hero-circle-2 {
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, rgba(69, 183, 209, 0.2), rgba(150, 206, 180, 0.2));
        border-radius: 50%;
        top: 20%;
        right: 15%;
        animation: float2 10s ease-in-out infinite;
        filter: blur(1px);
    }

    .hero-circle-3 {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(255, 107, 107, 0.2));
        border-radius: 50%;
        bottom: 20%;
        left: 20%;
        animation: float3 6s ease-in-out infinite;
        filter: blur(1px);
    }

    @keyframes float1 {
        0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
        25% { transform: translateY(-20px) translateX(10px) scale(1.1); }
        50% { transform: translateY(-10px) translateX(-10px) scale(0.95); }
        75% { transform: translateY(15px) translateX(5px) scale(1.05); }
    }

    @keyframes float2 {
        0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
        33% { transform: translateY(15px) translateX(-15px) scale(1.05); }
        66% { transform: translateY(-20px) translateX(10px) scale(0.9); }
    }

    @keyframes float3 {
        0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
        50% { transform: translateY(-25px) translateX(15px) scale(1.2); }
    }

    /* Enhanced Hero Typography */
    .hero-word {
        display: inline-block;
        position: relative;
        animation: wordReveal 1s ease-out forwards;
        opacity: 0;
        transform: translateY(50px);
    }

    .hero-word:nth-child(1) { animation-delay: 0.2s; }
    .hero-word:nth-child(2) { animation-delay: 0.4s; }
    .hero-word:nth-child(3) { animation-delay: 0.6s; }

    @keyframes wordReveal {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Particles System */
    .particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        animation: particleFloat 15s linear infinite;
    }

    @keyframes particleFloat {
        0% {
            transform: translateY(100vh) translateX(0) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) translateX(100px) scale(1);
            opacity: 0;
        }
    }

    /* Enhanced Buttons */
    .btn-enhanced {
        position: relative;
        overflow: hidden;
        transform: perspective(1000px) rotateX(0deg);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .btn-enhanced:hover {
        transform: perspective(1000px) rotateX(-10deg) translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .btn-enhanced .btn-text {
        position: relative;
        z-index: 2;
        transition: transform 0.3s ease;
    }

    .btn-enhanced .btn-icon {
        transition: transform 0.3s ease;
    }

    .btn-enhanced:hover .btn-text {
        transform: translateX(-5px);
    }

    .btn-enhanced:hover .btn-icon {
        transform: translateX(5px);
    }

    .btn-shine {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .btn-enhanced:hover .btn-shine {
        transform: translateX(100%);
    }

    /* Hero Stats Enhancement */
    .hero-stat {
        text-align: center;
        opacity: 0;
        transform: translateY(30px);
        animation: statReveal 0.8s ease-out forwards;
        position: relative;
    }

    .hero-stat[data-delay="0.6s"] { animation-delay: 0.6s; }
    .hero-stat[data-delay="0.8s"] { animation-delay: 0.8s; }
    .hero-stat[data-delay="1s"] { animation-delay: 1s; }

    @keyframes statReveal {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-stat::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 2px;
        background: linear-gradient(90deg, transparent, currentColor, transparent);
        opacity: 0.5;
    }

    .hero-stat:hover .stat-number {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

    /* Scroll Indicator */
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40% {
            transform: translateX(-50%) translateY(-10px);
        }
        60% {
            transform: translateX(-50%) translateY(-5px);
        }
    }

    .scroll-indicator {
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .scroll-indicator:hover {
        opacity: 1 !important;
    }

    /* Responsive Enhancements */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 3rem;
            letter-spacing: -1px;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
            padding: 0 1rem;
        }
        
        .hero-stats {
            gap: 2rem !important;
        }
        
        .hero-stat .stat-number {
            font-size: 2rem !important;
        }
        
        .hero-circle-1,
        .hero-circle-2,
        .hero-circle-3 {
            display: none;
        }
        
        .hero-cta {
            flex-direction: column;
            align-items: center;
            gap: 1rem !important;
        }
        
        .btn-enhanced {
            width: 250px;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-stats {
            flex-direction: column;
            gap: 1.5rem !important;
        }
    }

    /* Performance optimizations */
    .hero-decoration,
    .particles,
    .btn-shine {
        will-change: transform;
    }

    /* Prefers reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .hero::before,
        .hero::after,
        .hero-content,
        .hero-circle-1,
        .hero-circle-2,
        .hero-circle-3,
        .particles,
        .scroll-indicator {
            animation: none;
        }
        
        .btn-enhanced:hover {
            transform: none;
        }
    }

    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-md);
        font-weight: 500;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
    }

    .btn-secondary {
        background: var(--white);
        color: var(--primary-color);
        border: 1px solid var(--gray-300);
    }

    .btn-secondary:hover {
        background: var(--gray-50);
        border-color: var(--primary-color);
    }

    .btn-outline {
        background: transparent;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }

    .btn-outline:hover {
        background: var(--primary-color);
        color: white;
    }

    /* Cards */
    .card {
        background: var(--white);
        border-radius: var(--radius-lg);
        border: 1px solid var(--gray-200);
        overflow: hidden;
        transition: all 0.2s ease;
    }

    .card:hover {
        border-color: var(--gray-300);
    }

    .card-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-content {
        padding: var(--space-md);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: var(--space-xs);
        color: var(--text-primary);
    }

    .card-description {
        color: var(--text-secondary);
        margin-bottom: var(--space-md);
        line-height: 1.6;
    }

    .card-price {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: var(--space-md);
    }

    /* Grid System */
    .grid {
        display: grid;
        gap: var(--space-lg);
    }

    .grid-1 { grid-template-columns: 1fr; }
    .grid-2 { grid-template-columns: repeat(2, 1fr); }
    .grid-3 { grid-template-columns: repeat(3, 1fr); }
    .grid-4 { grid-template-columns: repeat(4, 1fr); }

    /* Responsive Grid */
    @media (max-width: 1024px) {
        .grid-4 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 640px) {
        .grid-4, .grid-3, .grid-2 { grid-template-columns: 1fr; }
        .hero-title { font-size: 2.5rem; }
        h1 { font-size: 2.5rem; }
        h2 { font-size: 2rem; }
        .container { padding: 0 var(--space-sm); }
    }

    /* Section Headers */
    .section-header {
        text-align: center;
        margin-bottom: var(--space-2xl);
    }

    .section-subtitle {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: var(--space-xs);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: var(--space-md);
        background: linear-gradient(135deg, var(--text-primary) 0%, var(--primary-color) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-description {
        font-size: 1.125rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Navigation */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        padding: 1rem 0;
    }

    .navbar-transparent {
        background: rgba(15, 23, 42, 0.9);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
    }

    .navbar-fixed {
        background: rgba(255, 255, 255, 0.95);
        border-bottom: 1px solid var(--gray-200);
        backdrop-filter: blur(20px);
    }

    .nav-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: var(--space-sm) 0;
    }

    .nav-logo {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary-color);
        text-decoration: none;
    }

    .nav-links {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: var(--space-lg);
    }

    .nav-link {
        color: var(--text-primary);
        text-decoration: none;
        font-weight: 500;
        position: relative;
        transition: color 0.3s ease;
    }

    .navbar-transparent .nav-link {
        color: white;
    }

    .navbar-transparent .nav-logo {
        color: white;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--primary-color);
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }

    /* Gallery Section */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: var(--space-lg);
    }

    .gallery-item {
        position: relative;
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: 1px solid var(--gray-200);
        background: var(--white);
        transition: all 0.2s ease;
    }

    .gallery-item:hover {
        border-color: var(--gray-300);
    }

    .gallery-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        color: white;
        padding: var(--space-md);
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }

    .gallery-item:hover .gallery-overlay {
        transform: translateY(0);
    }

    .gallery-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: var(--space-xs);
    }

    /* About Section */
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-2xl);
        align-items: center;
    }

    .about-image {
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: 1px solid var(--gray-200);
    }

    .about-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-md);
        margin-top: var(--space-xl);
    }

    .stat-card {
        text-align: center;
        padding: var(--space-md);
        background: var(--gray-50);
        border-radius: var(--radius-lg);
        border: 1px solid var(--gray-200);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-color);
        display: block;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.875rem;
        margin-top: var(--space-xs);
    }

    /* Contact Section */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-2xl);
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: var(--space-md);
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: var(--space-md);
        padding: var(--space-md);
        background: var(--white);
        border-radius: var(--radius-lg);
        border: 1px solid var(--gray-200);
        transition: all 0.2s ease;
    }

    .contact-item:hover {
        border-color: var(--gray-300);
    }

    .contact-icon {
        width: 48px;
        height: 48px;
        background: var(--primary-color);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }

    .contact-details h4 {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: var(--space-xs);
    }

    .contact-details p {
        color: var(--text-secondary);
        margin: 0;
    }

    /* Map Container */
    .map-container {
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: 1px solid var(--gray-200);
        height: 400px;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* Animations */
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

    /* Utilities */
    .text-center { text-align: center; }
    .text-left { text-align: left; }
    .text-right { text-align: right; }

    .mb-xs { margin-bottom: var(--space-xs); }
    .mb-sm { margin-bottom: var(--space-sm); }
    .mb-md { margin-bottom: var(--space-md); }
    .mb-lg { margin-bottom: var(--space-lg); }
    .mb-xl { margin-bottom: var(--space-xl); }

    .mt-xs { margin-top: var(--space-xs); }
    .mt-sm { margin-top: var(--space-sm); }
    .mt-md { margin-top: var(--space-md); }
    .mt-lg { margin-top: var(--space-lg); }
    .mt-xl { margin-top: var(--space-xl); }

    /* Background Utilities */
    .bg-gray { background-color: var(--gray-50); }
    .bg-white { background-color: var(--white); }

    /* Form Styles */
    .form-group {
        margin-bottom: var(--space-md);
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: var(--space-xs);
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius-md);
        font-size: 1rem;
        transition: all 0.2s ease;
        background: var(--white);
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(0, 102, 204, 0.1);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .about-grid,
        .contact-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .nav-links {
            display: none;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: var(--gray-100);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-dark);
    }

    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }
</style>