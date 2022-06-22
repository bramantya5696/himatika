<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/himatika/login/') ?>logstyle.css">
    <link rel="icon" href="<?= base_url('assets/himatika/login/') ?>image/error-404.png">
    <title>Halaman Tidak Ditemukan</title>
    <script src="https://kit.fontawesome.com/cfc3799fd9.js" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</head>

<body>
    <section id="blocked">
        <div class="blocked container">
            <div class="image">
                <img src="<?= base_url('assets/himatika/login/') ?>image/error-404.png" alt="">
            </div>
            <div class="error-header">
                <h1>Halaman Tidak Ditemukan</h1>
            </div>
            <div class="error-description">
                <p>Mungkin halaman yang anda kunjungi tidak ada</p>
            </div>
            <div class="error-option">
                <div class="cta back-to-base"><a href="<?= base_url('user'); ?>">Kembali ke Dashboard</a></div>
                <div class="cta back-to-login"><a href="<?= base_url('base'); ?>">Kembali ke Halaman Utama</a></div>
            </div>
        </div>
    </section>
</body>

</html>