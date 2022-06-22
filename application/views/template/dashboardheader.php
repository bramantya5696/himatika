<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/HIMATIKA/dashboard/') ?>datatables/tables.css">
    <link rel="stylesheet" href="<?= base_url('assets/HIMATIKA/dashboard/'); ?>style.css">
    <link rel="icon" href="<?= base_url('assets/HIMATIKA/'); ?>image/logo himatika resized.png">
    <title><?= $title; ?></title>
    <script src="https://kit.fontawesome.com/14ed735c0a.js" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</head>

<body>

    <!-- query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.id,menu FROM user_menu JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id WHERE user_access_menu.role_id = $role_id ORDER BY user_access_menu.menu_id ASC
        ";
    $menu = $this->db->query($queryMenu)->result_array();

    ?>
    <!-- end query menu -->

    <!-- submenu -->


    <!-- end submenu -->

    <section id="navbar">
        <div class="navbar container">
            <div class="navbar-left">
                <div class="sidebar-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="sidebar">
                    <div class="sidebar-back">
                        <i class="fas fa-arrow-left"></i>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <div class="sidebar-list">
                        <ul class="list-down">
                            <?php foreach ($menu as $m) : ?>
                                <?php
                                $menuId = $m['id'];
                                $querySubMenu = "SELECT *
                                                FROM user_sub_menu JOIN user_menu
                                                ON user_sub_menu.menu_id = user_menu.id
                                                WHERE user_sub_menu.menu_id = $menuId
                                                AND user_sub_menu.is_active = 1
                                                ";
                                $subMenu = $this->db->query($querySubMenu)->result_array();
                                ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <?php if ($title == $sm['title']) : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url($sm['url']); ?>">
                                            <div class="list-icon"><i class="<?= $sm['icon']; ?>"></i></div>
                                            <div class="list-name"><?= $sm['title']; ?></div>
                                        </a>
                                        </li>
                                    <?php endforeach; ?>
                                    <hr>
                                <?php endforeach; ?>
                                <li>
                                    <a href="<?= base_url('auth/logout'); ?>">
                                        <div class="list-icon"><i class="fas fa-sign-out-alt"></i></div>
                                        <div class="list-name">Keluar</div>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navbar-right">
                <div class="username">
                    <p><?= $user['name']; ?></p>
                </div>
                <div class="setting">
                    <div class="setting-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <ul class="setting-menu">
                        <li><a href="">Profil</a>
                        </li>

                        <li class="sm-logout"><a>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
