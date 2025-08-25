<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Initialize fade-in animations on scroll
    function initializeAnimations() {
        const elements = document.querySelectorAll('.animate-fade-in-up');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        elements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            observer.observe(element);
        });
    }

    // Smooth scroll for anchor links
    function initializeSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetElement = document.querySelector(this.getAttribute('href'));
                if (targetElement) {
                    const offset = 80; // Account for fixed navbar
                    const targetPosition = targetElement.offsetTop - offset;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Parallax effect for hero section
    function initializeParallax() {
        const hero = document.querySelector('.hero');
        if (hero) {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                hero.style.transform = `translateY(${rate}px)`;
            });
        }
    }

    // Card hover effects
    function initializeCardEffects() {
        const cards = document.querySelectorAll('.card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    }

    // Loading animation for buttons
    function initializeButtonEffects() {
        const buttons = document.querySelectorAll('.btn');
        
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                if (!this.classList.contains('loading')) {
                    this.classList.add('loading');
                    
                    // Remove loading class after 2 seconds
                    setTimeout(() => {
                        this.classList.remove('loading');
                    }, 2000);
                }
            });
        });
    }

    // Hero title fade-in effect (simplified)
    function initializeHeroEffect() {
        const heroTitle = document.querySelector('.hero-title');
        if (heroTitle) {
            heroTitle.style.opacity = '1';
            heroTitle.style.transform = 'translateY(0)';
        }
    }

    // Counter animation for stats
    function initializeCounters() {
        const counters = document.querySelectorAll('.stat-number');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.textContent.replace(/[^0-9]/g, ''));
                    let current = 0;
                    const increment = target / 100;
                    const suffix = counter.textContent.replace(/[0-9]/g, '');
                    
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            counter.textContent = target + suffix;
                            clearInterval(timer);
                        } else {
                            counter.textContent = Math.floor(current) + suffix;
                        }
                    }, 20);
                    
                    observer.unobserve(counter);
                }
            });
        });

        counters.forEach(counter => observer.observe(counter));
    }

    // Enhanced gallery loading
    function initializeGalleryEffects() {
        const galleryImages = document.querySelectorAll('.gallery-image');
        
        galleryImages.forEach(image => {
            image.addEventListener('load', function() {
                this.style.opacity = '1';
            });
            
            image.addEventListener('error', function() {
                this.style.opacity = '0.5';
                this.parentElement.style.background = 'linear-gradient(45deg, #f0f0f0, #e0e0e0)';
            });
        });
    }

    // Progressive image loading
    function initializeLazyLoading() {
        const images = document.querySelectorAll('img[data-src]');
        
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }

    // Back to top button
    function initializeBackToTop() {
        const backToTop = document.createElement('button');
        backToTop.innerHTML = `
            <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        `;
        backToTop.className = 'back-to-top';
        backToTop.style.cssText = `
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-lg);
            transform: translateY(100px);
            transition: all 0.3s ease;
            z-index: 1000;
        `;

        document.body.appendChild(backToTop);

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.style.transform = 'translateY(0)';
            } else {
                backToTop.style.transform = 'translateY(100px)';
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        backToTop.addEventListener('mouseenter', () => {
            backToTop.style.transform = 'translateY(0) scale(1.1)';
            backToTop.style.backgroundColor = 'var(--primary-dark)';
        });

        backToTop.addEventListener('mouseleave', () => {
            backToTop.style.transform = 'translateY(0) scale(1)';
            backToTop.style.backgroundColor = 'var(--primary-color)';
        });
    }

    // Particle System for Hero
    function initializeParticleSystem() {
        const particlesContainer = document.getElementById('particles');
        if (!particlesContainer) return;

        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // Random starting position
            const startX = Math.random() * window.innerWidth;
            const endX = startX + (Math.random() - 0.5) * 200;
            const delay = Math.random() * 10;
            const duration = 15 + Math.random() * 10;
            
            particle.style.left = startX + 'px';
            particle.style.animationDelay = delay + 's';
            particle.style.animationDuration = duration + 's';
            
            // Random color tint
            const colors = ['rgba(255, 215, 0, 0.6)', 'rgba(78, 205, 196, 0.6)', 'rgba(255, 107, 107, 0.6)', 'rgba(255, 255, 255, 0.6)'];
            particle.style.background = colors[Math.floor(Math.random() * colors.length)];
            
            particlesContainer.appendChild(particle);
            
            // Remove particle after animation
            setTimeout(() => {
                if (particle.parentNode) {
                    particle.parentNode.removeChild(particle);
                }
            }, (duration + delay) * 1000);
        }

        // Create initial particles
        for (let i = 0; i < 20; i++) {
            setTimeout(createParticle, i * 200);
        }

        // Continue creating particles
        setInterval(createParticle, 800);
    }

    // Enhanced animation system with delays
    function initializeEnhancedAnimations() {
        const elements = document.querySelectorAll('.animate-fade-in-up');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.getAttribute('data-delay') || '0s';
                    entry.target.style.animationDelay = delay;
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        elements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
            observer.observe(element);
        });
    }

    // Interactive title effect
    function initializeInteractiveTitle() {
        const heroWords = document.querySelectorAll('.hero-word');
        
        heroWords.forEach(word => {
            word.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.05)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            word.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    }

    // Scroll indicator click handler
    function initializeScrollIndicator() {
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (scrollIndicator) {
            scrollIndicator.addEventListener('click', function() {
                document.querySelector('#layanan').scrollIntoView({
                    behavior: 'smooth'
                });
            });
            
            // Hide scroll indicator when scrolling past hero
            window.addEventListener('scroll', function() {
                const heroHeight = document.querySelector('.hero').offsetHeight;
                const scrollY = window.pageYOffset;
                
                if (scrollY > heroHeight * 0.5) {
                    scrollIndicator.style.opacity = '0';
                } else {
                    scrollIndicator.style.opacity = '0.7';
                }
            });
        }
    }

    // Enhanced button interactions
    function initializeEnhancedButtons() {
        const enhancedButtons = document.querySelectorAll('.btn-enhanced');
        
        enhancedButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.5);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                    z-index: 1;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
            
            // 3D tilt effect
            button.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                const mouseX = e.clientX - centerX;
                const mouseY = e.clientY - centerY;
                
                const rotateX = (mouseY / (rect.height / 2)) * 10;
                const rotateY = (mouseX / (rect.width / 2)) * -10;
                
                this.style.transform = `perspective(1000px) rotateX(${-rotateX}deg) rotateY(${rotateY}deg) translateY(-5px)`;
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
            });
        });
    }

    // Dynamic background color based on scroll
    function initializeDynamicBackground() {
        const hero = document.querySelector('.hero');
        if (!hero) return;
        
        window.addEventListener('scroll', function() {
            const scrollPercent = Math.min(window.pageYOffset / window.innerHeight, 1);
            const hue1 = 240 + scrollPercent * 20; // 240 to 260
            const hue2 = 280 + scrollPercent * 20; // 280 to 300
            
            hero.style.background = `linear-gradient(135deg, 
                hsl(${hue1}, 70%, 15%) 0%, 
                hsl(${hue2}, 60%, 25%) 50%, 
                hsl(${hue1 + 10}, 65%, 20%) 100%)`;
        });
    }

    // Add ripple animation keyframes
    function addRippleAnimation() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Initialize all effects when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        initializeAnimations();
        initializeEnhancedAnimations();
        initializeSmoothScroll();
        initializeParallax();
        initializeCardEffects();
        initializeButtonEffects();
        initializeEnhancedButtons();
        initializeCounters();
        initializeGalleryEffects();
        initializeLazyLoading();
        initializeBackToTop();
        initializeParticleSystem();
        initializeInteractiveTitle();
        initializeScrollIndicator();
        initializeDynamicBackground();
        addRippleAnimation();
        
        // Initialize hero effect
        initializeHeroEffect();
        
        console.log('🎉 Vixs Barbershop - Amazing Hero Section Loaded! ✨');
    });

    // Performance optimization - throttle scroll events
    function throttle(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Apply throttling to scroll events
    const throttledScroll = throttle(() => {
        // Any scroll-based animations can be added here
    }, 16); // ~60fps

    window.addEventListener('scroll', throttledScroll);
</script>