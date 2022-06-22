<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/himatika/") ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/himatika/") ?>evo-calendar.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/himatika/") ?>evo-calendar.royal-navy.min.css" />
    <link rel="icon" href="<?= base_url("assets/himatika/") ?>image/logohimatika.png">
    <title><?= $title; ?></title>
    <script src="https://kit.fontawesome.com/14ed735c0a.js" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader">
            <div class="loader-bullet">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <section id="navbar">
        <div class="navbar container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="<?= base_url('base') ?>"><img src="<?= base_url("assets/himatika/"); ?>image/logohimatika.png" alt=""></a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"><i class="fas fa-bars"></i></div>
                    </div>
                    <ul class="menu">
                        <li><i class="fas fa-arrow-right"></i></li>
                        <li class="menu-text"><a href="<?= base_url("base/"); ?>">Beranda</a></li>
                        <li class="menu-text"><a href="<?= base_url("base/about"); ?>">Tentang HIMATIKA</a></li>
                        <li class="menu-text"><a href="<?= base_url("base/calendar"); ?>">Kalender</a></li>
                        <li class="menu-text"><a href="<?= base_url("base/contact"); ?>">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
