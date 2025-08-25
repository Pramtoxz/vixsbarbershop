<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Vixs Barbershop - Modern Grooming Experience</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Vixs Barbershop - Pengalaman grooming modern dengan layanan profesional. Potong rambut, styling, dan perawatan rambut terbaik di kota.">
    <meta name="keywords" content="barbershop, potong rambut, styling, grooming, perawatan rambut, vixs barbershop">
    <meta name="author" content="Vixs Barbershop">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Vixs Barbershop - Modern Grooming Experience">
    <meta property="og:description" content="Pengalaman grooming modern dengan layanan profesional untuk penampilan terbaik Anda.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('public/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/images/logo.png') ?>">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" as="style">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <?= $this->include('templates/style') ?>
    
    <!-- Custom CSS Section -->
    <?= $this->renderSection('custom_css') ?>
    <?= $this->renderSection('custom_style') ?>
</head>

<body>
    <!-- Navigation -->
    <?= $this->include('templates/navbar') ?>

    <!-- Main Content -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <?= $this->include('templates/footer') ?>

    <!-- Scripts -->
    <?= $this->include('templates/script') ?>
    
    <!-- Custom JavaScript Section -->
    <?= $this->renderSection('custom_script') ?>
    <?= $this->renderSection('custom_js') ?>
</body>
</html>