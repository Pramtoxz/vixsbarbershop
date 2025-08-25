<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Admin - Vixs Barbershop</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Include main styles -->
    <?= $this->include('templates/style') ?>
    
    <style>
        /* Admin Verify Specific Styles */
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
            max-width: 480px;
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
            animation: cardZoomIn 0.8s ease-out;
        }

        @keyframes cardZoomIn {
            0% {
                opacity: 0;
                transform: scale(0.7) translateY(50px);
            }
            70% {
                transform: scale(1.05) translateY(-5px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
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
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: logoPulse 3s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); }
            50% { transform: scale(1.05); box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3); }
        }

        .auth-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .auth-subtitle {
            opacity: 0.9;
            font-size: 1rem;
            line-height: 1.6;
        }

        .auth-form {
            padding: 2.5rem;
        }

        .otp-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .otp-input {
            width: 4rem;
            height: 4rem;
            text-align: center;
            font-size: 1.75rem;
            font-weight: 700;
            border: 2px solid var(--gray-200);
            border-radius: 1.2rem;
            background: var(--white);
            transition: all 0.3s ease;
            color: var(--text-primary);
        }

        .otp-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
            transform: translateY(-3px) scale(1.05);
        }

        .otp-input.filled {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(0, 102, 204, 0.1), rgba(255, 255, 255, 0.9));
            color: var(--primary-color);
        }

        .btn-auth {
            width: 100%;
            padding: 1.2rem 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 1rem;
            font-size: 1.1rem;
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

        .btn-auth.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-auth.loading::after {
            content: '';
            width: 24px;
            height: 24px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 12px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .resend-section {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
        }

        .resend-btn {
            background: none;
            border: none;
            color: var(--primary-color);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        .resend-btn:hover {
            background: rgba(0, 102, 204, 0.1);
            transform: scale(1.05);
        }

        .resend-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            background: none;
        }

        .countdown {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-top: 0.5rem;
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
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, rgba(0, 102, 204, 0.1), rgba(255, 255, 255, 0.1));
            top: 15%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
            top: 70%;
            right: 15%;
            animation-delay: -5s;
        }

        .floating-shape:nth-child(3) {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), rgba(255, 107, 107, 0.1));
            bottom: 20%;
            left: 15%;
            animation-delay: -10s;
        }

        @keyframes floatShape {
            0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
            25% { transform: translateY(-25px) translateX(15px) scale(1.1); }
            50% { transform: translateY(-15px) translateX(-15px) scale(0.9); }
            75% { transform: translateY(20px) translateX(10px) scale(1.05); }
        }

        /* Success Animation */
        .otp-success {
            animation: successPulse 0.6s ease-in-out;
        }

        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); background-color: rgba(16, 185, 129, 0.2); }
            100% { transform: scale(1); }
        }

        /* Error Animation */
        .otp-error {
            animation: errorShake 0.6s ease-in-out;
            border-color: var(--error-color) !important;
        }

        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-8px); }
            75% { transform: translateX(8px); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-card {
                margin: 1rem;
                border-radius: 1.5rem;
            }

            .auth-header {
                padding: 2.5rem 1.5rem 1.5rem;
            }

            .auth-title {
                font-size: 1.9rem;
            }

            .auth-form {
                padding: 2rem;
            }

            .otp-container {
                gap: 0.75rem;
            }

            .otp-input {
                width: 3.5rem;
                height: 3.5rem;
                font-size: 1.5rem;
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
                        <svg style="width: 50px; height: 50px; color: var(--primary-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414-4.414a2 2 0 11-2.828 2.828L8.415 13.586A2 2 0 118.414 11zM15 7l-3 3-3-3 3-3 3 3z"/>
                        </svg>
                    </div>
                    <h1 class="auth-title">Verifikasi Admin</h1>
                    <p class="auth-subtitle">
                        Masukkan kode OTP 6 digit yang telah dikirim ke email admin Anda untuk menyelesaikan proses registrasi
                    </p>
                </div>

                <!-- Form -->
                <div class="auth-form">
                    <form id="verifyForm">
                        <?= csrf_field() ?>
                        
                        <!-- OTP Input -->
                        <div class="otp-container">
                            <input type="text" maxlength="1" class="otp-input" data-index="0" required>
                            <input type="text" maxlength="1" class="otp-input" data-index="1" required>
                            <input type="text" maxlength="1" class="otp-input" data-index="2" required>
                            <input type="text" maxlength="1" class="otp-input" data-index="3" required>
                            <input type="text" maxlength="1" class="otp-input" data-index="4" required>
                            <input type="text" maxlength="1" class="otp-input" data-index="5" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-auth" id="submitBtn">
                            <span id="submitText">Verifikasi Admin</span>
                        </button>
                    </form>

                    <!-- Resend Section -->
                    <div class="resend-section">
                        <p style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.9rem;">
                            Tidak menerima kode verifikasi?
                        </p>
                        <button id="resendBtn" class="resend-btn">
                            Kirim Ulang Kode OTP
                        </button>
                        <div id="countdown" class="countdown" style="display: none;">
                            Kirim ulang dalam <span id="timer">60</span> detik
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="auth-footer">
                    <p>Kembali ke <a href="<?= site_url('auth/login') ?>">halaman login admin</a></p>
                    <p style="margin-top: 0.5rem;">
                        <a href="<?= site_url('/') ?>">← Beranda</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            // OTP Input Management
            $('.otp-input').on('input', function() {
                const $this = $(this);
                const index = parseInt($this.data('index'));
                const value = $this.val();

                // Only allow numbers
                if (!/^\d$/.test(value)) {
                    $this.val('');
                    return;
                }

                // Add filled class
                $this.addClass('filled');

                // Move to next input
                if (value && index < 5) {
                    $('.otp-input[data-index="' + (index + 1) + '"]').focus();
                }

                // Check if all inputs are filled
                checkAllFilled();
            });

            $('.otp-input').on('keydown', function(e) {
                const $this = $(this);
                const index = parseInt($this.data('index'));

                // Handle backspace
                if (e.key === 'Backspace') {
                    if (!$this.val() && index > 0) {
                        $('.otp-input[data-index="' + (index - 1) + '"]').focus();
                    } else {
                        $this.removeClass('filled');
                    }
                }

                // Handle paste
                if (e.key === 'v' && (e.ctrlKey || e.metaKey)) {
                    setTimeout(() => {
                        handlePaste();
                    }, 10);
                }
            });

            // Handle paste event
            function handlePaste() {
                navigator.clipboard.readText().then(text => {
                    const digits = text.replace(/\D/g, '').substring(0, 6);
                    if (digits.length === 6) {
                        $('.otp-input').each(function(index) {
                            $(this).val(digits[index]).addClass('filled');
                        });
                        checkAllFilled();
                    }
                });
            }

            // Check if all inputs are filled
            function checkAllFilled() {
                const allFilled = $('.otp-input').toArray().every(input => $(input).val().length === 1);
                if (allFilled) {
                    $('#submitBtn').css('opacity', '1').css('transform', 'scale(1.02)');
                } else {
                    $('#submitBtn').css('opacity', '0.9').css('transform', 'scale(1)');
                }
            }

            // Form submission
            $('#verifyForm').on('submit', function(e) {
                e.preventDefault();

                const submitBtn = $('#submitBtn');
                const submitText = $('#submitText');

                // Get OTP value
                let otp = '';
                $('.otp-input').each(function() {
                    otp += $(this).val();
                });

                if (otp.length !== 6) {
                    // Error animation
                    $('.otp-input').addClass('otp-error');
                    setTimeout(() => {
                        $('.otp-input').removeClass('otp-error');
                    }, 600);

                    Swal.fire({
                        icon: 'warning',
                        title: 'Kode Tidak Lengkap',
                        text: 'Silakan masukkan 6 digit kode OTP',
                        confirmButtonColor: 'var(--primary-color)'
                    });
                    return;
                }

                // Show loading state
                submitBtn.addClass('loading');
                submitText.text('Memverifikasi...');

                $.ajax({
                    url: '<?= site_url('auth/doVerify') ?>',
                    type: 'POST',
                    data: { otp: otp },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Success animation
                            $('.otp-input').addClass('otp-success');

                            Swal.fire({
                                icon: 'success',
                                title: 'Verifikasi Berhasil!',
                                text: response.message,
                                confirmButtonColor: 'var(--primary-color)',
                                confirmButtonText: 'Lanjutkan ke Dashboard'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = response.redirect;
                                }
                            });
                        } else {
                            // Error animation
                            $('.otp-input').addClass('otp-error');
                            setTimeout(() => {
                                $('.otp-input').removeClass('otp-error');
                                $('.otp-input').val('').removeClass('filled');
                                $('.otp-input[data-index="0"]').focus();
                            }, 600);

                            Swal.fire({
                                icon: 'error',
                                title: 'Verifikasi Gagal',
                                text: response.message,
                                confirmButtonColor: '#ef4444'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Silakan coba lagi dalam beberapa saat.',
                            confirmButtonColor: '#ef4444'
                        });
                    },
                    complete: function() {
                        // Remove loading state
                        submitBtn.removeClass('loading');
                        submitText.text('Verifikasi Admin');
                    }
                });
            });

            // Resend OTP functionality
            let cooldownTime = 0;
            const resendBtn = $('#resendBtn');
            const countdown = $('#countdown');
            const timer = $('#timer');

            function updateResendButton() {
                if (cooldownTime > 0) {
                    resendBtn.prop('disabled', true).text(`Tunggu ${cooldownTime}s`);
                    countdown.show();
                    timer.text(cooldownTime);
                } else {
                    resendBtn.prop('disabled', false).text('Kirim Ulang Kode OTP');
                    countdown.hide();
                }
            }

            function startCooldown(seconds) {
                cooldownTime = seconds;
                updateResendButton();

                const interval = setInterval(() => {
                    cooldownTime--;
                    updateResendButton();
                    if (cooldownTime <= 0) {
                        clearInterval(interval);
                    }
                }, 1000);
            }

            resendBtn.on('click', function() {
                if (cooldownTime > 0) return;

                const $btn = $(this);
                $btn.prop('disabled', true).text('Mengirim...');

                $.ajax({
                    url: '<?= site_url('auth/resendOTP') ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Kode Terkirim!',
                                text: response.message,
                                confirmButtonColor: 'var(--primary-color)',
                                timer: 3000,
                                showConfirmButton: false
                            });

                            startCooldown(60);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Mengirim',
                                text: response.message,
                                confirmButtonColor: '#ef4444'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Silakan coba lagi dalam beberapa saat.',
                            confirmButtonColor: '#ef4444'
                        });
                    },
                    complete: function() {
                        if (cooldownTime === 0) {
                            $btn.prop('disabled', false).text('Kirim Ulang Kode OTP');
                        }
                    }
                });
            });

            // Focus first input on load
            $('.otp-input[data-index="0"]').focus();

            console.log('🎉 Admin Verify - Professional Design Loaded! ✨');
        });
    </script>
</body>
</html>