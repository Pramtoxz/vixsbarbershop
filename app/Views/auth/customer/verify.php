<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - Vixs Barbershop</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Include main styles -->
    <?= $this->include('templates/style') ?>
    
    <style>
        /* Customer Verify Specific Styles */
        .auth-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
                radial-gradient(circle at 30% 40%, rgba(102, 126, 234, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 70% 60%, rgba(118, 75, 162, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 50% 20%, rgba(255, 215, 0, 0.3) 0%, transparent 50%);
            animation: backgroundMove 25s ease-in-out infinite;
        }

        .auth-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='10' cy='10' r='2'/%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3Ccircle cx='30' cy='10' r='1'/%3E%3Ccircle cx='10' cy='30' r='1'/%3E%3C/g%3E%3C/svg%3E") repeat;
            animation: starFloat 8s ease-in-out infinite;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(25px);
            border-radius: 2rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            z-index: 10;
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
            animation: cardBounceIn 0.8s ease-out;
        }

        @keyframes cardBounceIn {
            0% {
                opacity: 0;
                transform: translateY(60px) scale(0.8);
            }
            60% {
                transform: translateY(-10px) scale(1.05);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .auth-header {
            text-align: center;
            padding: 2.5rem 2rem 2rem;
            background: linear-gradient(135deg, #FFD700, var(--secondary-color));
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
            margin: 0 auto 1rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            animation: logoSpin 4s ease-in-out infinite;
        }

        @keyframes logoSpin {
            0%, 100% { transform: rotate(0deg) scale(1); }
            25% { transform: rotate(5deg) scale(1.1); }
            50% { transform: rotate(-5deg) scale(1.05); }
            75% { transform: rotate(3deg) scale(1.1); }
        }

        .auth-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            opacity: 0.9;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .auth-form {
            padding: 2rem;
        }

        .otp-container {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .otp-input {
            width: 3.5rem;
            height: 3.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            border: 2px solid var(--gray-200);
            border-radius: 1rem;
            background: var(--white);
            transition: all 0.3s ease;
            color: var(--text-primary);
        }

        .otp-input:focus {
            outline: none;
            border-color: #FFD700;
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.2);
            transform: translateY(-2px) scale(1.05);
        }

        .otp-input.filled {
            border-color: var(--secondary-color);
            background: linear-gradient(135deg, rgba(0, 210, 170, 0.1), rgba(255, 215, 0, 0.1));
        }

        .btn-auth {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #FFD700, var(--secondary-color));
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
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
        }

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

        .resend-section {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .resend-btn {
            background: none;
            border: none;
            color: #FFD700;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .resend-btn:hover {
            color: var(--secondary-color);
            transform: scale(1.05);
        }

        .resend-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .countdown {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .auth-footer {
            text-align: center;
            padding: 1.5rem 2rem 2rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .auth-footer a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .auth-footer a:hover {
            color: #FFD700;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-element {
            position: absolute;
            border-radius: 50%;
            animation: floatUp 12s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), rgba(255, 255, 255, 0.1));
            top: 80%;
            left: 20%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(0, 210, 170, 0.1), rgba(255, 255, 255, 0.1));
            top: 70%;
            right: 15%;
            animation-delay: -4s;
        }

        .floating-element:nth-child(3) {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(255, 255, 255, 0.1));
            top: 60%;
            left: 80%;
            animation-delay: -8s;
        }

        @keyframes floatUp {
            0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
            25% { transform: translateY(-15px) translateX(10px) scale(1.1); }
            50% { transform: translateY(-30px) translateX(-5px) scale(0.9); }
            75% { transform: translateY(-15px) translateX(5px) scale(1.05); }
        }

        /* Success Animation */
        .otp-success {
            animation: successPulse 0.5s ease-in-out;
        }

        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); background-color: rgba(16, 185, 129, 0.2); }
            100% { transform: scale(1); }
        }

        /* Error Animation */
        .otp-error {
            animation: errorShake 0.5s ease-in-out;
            border-color: var(--error-color) !important;
        }

        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
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

            .otp-container {
                gap: 0.5rem;
            }

            .otp-input {
                width: 3rem;
                height: 3rem;
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Floating Elements -->
        <div class="floating-elements">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>

        <div class="container" style="display: flex; align-items: center; min-height: 100vh; padding: 2rem 1rem;">
            <div class="auth-card">
                <!-- Header -->
                <div class="auth-header">
                    <div class="auth-logo">
                        <img src="<?= base_url('assets/images/logo.png') ?>" 
                             alt="Vixs Barbershop" 
                             style="width: 45px; height: 45px; border-radius: 50%;"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <svg style="width: 40px; height: 40px; color: #FFD700; display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h1 class="auth-title">Verifikasi Akun</h1>
                    <p class="auth-subtitle">
                        Masukkan kode OTP 6 digit yang telah dikirim ke email Anda untuk melanjutkan proses registrasi
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
                            <span id="submitText">Verifikasi Sekarang</span>
                        </button>
                    </form>

                    <!-- Resend Section -->
                    <div class="resend-section">
                        <p style="color: var(--text-secondary); margin-bottom: 0.75rem; font-size: 0.875rem;">
                            Tidak menerima kode OTP?
                        </p>
                        <button id="resendBtn" class="resend-btn">
                            Kirim Ulang Kode
                        </button>
                        <div id="countdown" class="countdown" style="display: none; margin-top: 0.5rem;">
                            Kirim ulang dalam <span id="timer">60</span> detik
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="auth-footer">
                    <p>Kembali ke <a href="<?= site_url('customer/login') ?>">halaman login</a></p>
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
                    $('#submitBtn').css('opacity', '0.8').css('transform', 'scale(1)');
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
                    }, 500);

                    Swal.fire({
                        icon: 'warning',
                        title: 'Kode Tidak Lengkap',
                        text: 'Silakan masukkan 6 digit kode OTP',
                        confirmButtonColor: '#FFD700'
                    });
                    return;
                }

                // Show loading state
                submitBtn.addClass('loading');
                submitText.text('Memverifikasi...');

                $.ajax({
                    url: '<?= site_url('customer/doVerify') ?>',
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
                                confirmButtonColor: '#00D4AA',
                                confirmButtonText: 'Lanjutkan'
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
                            }, 500);

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
                        submitText.text('Verifikasi Sekarang');
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
                    resendBtn.prop('disabled', true).text('Tunggu...');
                    countdown.show();
                    timer.text(cooldownTime);
                } else {
                    resendBtn.prop('disabled', false).text('Kirim Ulang Kode');
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
                    url: '<?= site_url('customer/resendOTP') ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Kode Terkirim!',
                                text: response.message,
                                confirmButtonColor: '#00D4AA',
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
                            $btn.prop('disabled', false).text('Kirim Ulang Kode');
                        }
                    }
                });
            });

            // Focus first input on load
            $('.otp-input[data-index="0"]').focus();

            console.log('🎉 Customer Verify - Amazing Design Loaded! ✨');
        });
    </script>
</body>
</html>