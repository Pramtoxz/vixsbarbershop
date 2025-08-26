<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Vixs Barbershop</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Include main styles -->
    <?= $this->include('templates/style') ?>
    
    <style>
        /* Auth Page Specific Styles */
        .auth-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            position: relative;
            overflow: hidden;
        }

        .auth-container::before {
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

        .auth-container::after {
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

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 2rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 10;
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
            animation: cardFloatIn 1s ease-out;
        }

        @keyframes cardFloatIn {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .auth-header {
            text-align: center;
            padding: 3rem 2rem 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            position: relative;
        }

        .auth-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: headerShine 3s ease-in-out infinite;
        }

        @keyframes headerShine {
            0%, 100% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
        }

        .auth-logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .auth-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .auth-subtitle {
            opacity: 0.9;
            font-size: 1rem;
        }

        .auth-form {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid var(--gray-200);
            border-radius: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--white);
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            transition: color 0.3s ease;
            z-index: 1;
        }

        .form-group:focus-within .input-icon {
            color: var(--primary-color);
        }

        .btn-auth {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 1rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
        }

        .btn-auth::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-auth:hover::before {
            left: 100%;
        }

        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 102, 204, 0.3);
        }

        .btn-auth:active {
            transform: translateY(0);
        }

        .auth-footer {
            text-align: center;
            padding: 1.5rem 2rem 2rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .auth-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .auth-footer a:hover {
            color: var(--primary-dark);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            border: none;
            font-weight: 500;
            animation: alertSlideIn 0.5s ease-out;
        }

        @keyframes alertSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .alert-info {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            animation: floatShape 15s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, rgba(69, 183, 209, 0.1), rgba(150, 206, 180, 0.1));
            top: 60%;
            right: 10%;
            animation-delay: -5s;
        }

        .floating-shape:nth-child(3) {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), rgba(255, 107, 107, 0.1));
            bottom: 10%;
            left: 20%;
            animation-delay: -10s;
        }

        @keyframes floatShape {
            0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
            25% { transform: translateY(-20px) translateX(10px) scale(1.1); }
            50% { transform: translateY(-10px) translateX(-10px) scale(0.9); }
            75% { transform: translateY(15px) translateX(5px) scale(1.05); }
        }

        /* Loading state */
        .btn-auth.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-auth.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-card {
                margin: 1rem;
                border-radius: 1.5rem;
            }

            .auth-header {
                padding: 2rem 1.5rem 1.5rem;
            }

            .auth-title {
                font-size: 1.75rem;
            }

            .auth-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Floating Shapes -->
        <div class="floating-shapes">
            <div class="floating-shape"></div>
            <div class="floating-shape"></div>
            <div class="floating-shape"></div>
        </div>

        <div class="container" style="display: flex; align-items: center; min-height: 100vh; padding: 2rem 1rem;">
            <div class="auth-card">
                <!-- Header -->
                <div class="auth-header">
                    <div class="auth-logo">
                        <span style="font-size: 2.5rem; color: var(--primary-color);">✂️</span>
                    </div>
                    <h1 class="auth-title">Admin Login</h1>
                    <p class="auth-subtitle">Kelola sistem barbershop dengan mudah</p>
                </div>

                <!-- Form -->
                <div class="auth-form">
                    <!-- Flash Messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <span style="font-size: 1.25rem; margin-right: 8px;">✅</span>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <span style="font-size: 1.25rem; margin-right: 8px;">❌</span>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-info">
                            <span style="font-size: 1.25rem; margin-right: 8px;">ℹ️</span>
                            <?= session()->getFlashdata('message') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= site_url('auth/login') ?>" method="post" id="loginForm">
                        <?= csrf_field() ?>
                        
                        <!-- Username Field -->
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <div style="position: relative;">
                                <div class="input-icon">
                                    <span style="font-size: 1.25rem;">👤</span>
                                </div>
                                <input type="text" 
                                       id="username" 
                                       name="username" 
                                       class="form-input" 
                                       placeholder="Masukkan username Anda"
                                       value="<?= old('username') ?>"
                                       required>
                            </div>
                            <?php if (isset($validation) && $validation->hasError('username')): ?>
                                <small style="color: var(--error-color); font-size: 0.875rem; margin-top: 0.5rem; display: block;">
                                    <?= $validation->getError('username') ?>
                                </small>
                            <?php endif; ?>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div style="position: relative;">
                                <div class="input-icon">
                                    <span style="font-size: 1.25rem;">🔒</span>
                                </div>
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="form-input" 
                                       placeholder="Masukkan password Anda"
                                       required>
                                <button type="button" 
                                        onclick="togglePassword()" 
                                        style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--gray-400); cursor: pointer;">
                                    <span id="eyeIcon" style="font-size: 1.25rem;">👁️</span>
                                </button>
                            </div>
                            <?php if (isset($validation) && $validation->hasError('password')): ?>
                                <small style="color: var(--error-color); font-size: 0.875rem; margin-top: 0.5rem; display: block;">
                                    <?= $validation->getError('password') ?>
                                </small>
                            <?php endif; ?>
                        </div>

                        <!-- Remember Me -->
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember" style="font-size: 0.875rem; color: var(--text-secondary);">
                                Ingat saya
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-auth" id="submitBtn">
                            <span id="submitText">Masuk ke Dashboard</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈'; // Hide emoji
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️'; // Show emoji
            }
        }

        // Enhanced Form submission with AJAX
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const form = this;
            
            // Set loading state
            submitBtn.classList.add('loading');
            submitText.textContent = 'Memproses...';
            submitBtn.disabled = true;
            
            // Prepare form data
            const formData = new FormData(form);
            
            // Send AJAX request
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Reset loading state
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                submitText.textContent = 'Masuk ke Dashboard';
                
                if (data.status === 'success') {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil!',
                        text: data.message,
                        timer: 1500,
                        showConfirmButton: false,
                        timerProgressBar: true
                    }).then(() => {
                        // Redirect to dashboard
                        window.location.href = data.redirect;
                    });
                } else if (data.status === 'pending_verification') {
                    // Handle pending verification
                    Swal.fire({
                        icon: 'warning',
                        title: 'Verifikasi Diperlukan',
                        text: data.message,
                        confirmButtonText: 'Verifikasi Sekarang'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = data.redirect;
                        }
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: data.message,
                        confirmButtonColor: '#ef4444'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Reset loading state
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                submitText.textContent = 'Masuk ke Dashboard';
                
                // Show error message
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Gagal menghubungi server. Silakan coba lagi.',
                    confirmButtonColor: '#ef4444'
                });
            });
        });

        // Enhanced form interactions
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            });
        }, 5000);

        console.log('🎉 Admin Login - Modern Design Loaded! ✨');
    </script>
</body>
</html>