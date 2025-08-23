<?php

use CodeIgniter\Email\Email;

if (!function_exists('send_otp_email')) {
    function send_otp_email($to, $otp)
    {
        $email = \Config\Services::email();

        $email->setFrom('noreply@awanbarbershop.com', 'Vixs Barbershop');
        $email->setTo($to);
        $email->setSubject('Kode OTP Verifikasi - Vixs Barbershop');

        $message = "
        <h2>Verifikasi Email Anda</h2>
        <p>Terima kasih telah mendaftar di Vixs Barbershop. Berikut adalah kode OTP Anda:</p>
        <h1 style='font-size: 32px; letter-spacing: 5px; background: #f1f1f1; padding: 10px; text-align: center;'>{$otp}</h1>
        <p>Kode OTP ini akan kadaluarsa dalam 15 menit.</p>
        <p>Jika Anda tidak merasa mendaftar di Vixs Barbershop, abaikan email ini.</p>
        ";

        $email->setMessage($message);
        $email->setMailType('html');

        return $email->send();
    }
}
