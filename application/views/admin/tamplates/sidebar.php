<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">
    <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url(); ?>assets/assetsadmin/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/img/lapaktani.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/img/lapaktani.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/assetsadmin/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= base_url(); ?>assets/assetsadmin/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="<?= base_url(); ?>assets/assetsadmin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="<?= base_url(); ?>assets/assetsadmin/vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url(); ?>assets/assetsadmin/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="<?= base_url(); ?>assets/assetsadmin/index.html">
            <img class="navbar-brand-dark" src="<?= base_url(); ?>assets/assetsadmin/assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="<?= base_url(); ?>assets/assetsadmin/assets/img/brand/dark.svg" alt="Volt logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4">
                        <img src="<?= base_url(); ?>assets/assetsadmin/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                    </div>
                    <div class="d-block">
                        <h2 class="h5 mb-3">Hi, Admin</h2>
                        <a href="<?= base_url(); ?>assets/assetsadmin/pages/examples/sign-in.html" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Keluar
                        </a>
                    </div>
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <img src="<?= base_url(); ?>assets/img/lapaktani.png" height="25" width="20" alt="Volt Logo">
                        </span>
                        <span class="mt-1 ms-1 sidebar-text fw-bold">Lapak Tani</span>
                    </a>
                </li>
                <li class="nav-item  <?= active_menu('Admin'); ?> ">
                    <a href="<?= base_url(); ?>Admin" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item  <?= active_menu('Admin_user'); ?> ">
                    <a href="<?= base_url(); ?>Admin_user" class="nav-link">
                        <span class="sidebar-icon">
                        <i class="fa-solid fa-fw fa-user fs-5"></i>
                        </span>
                        <span class="sidebar-text">User</span>
                    </a>
                </li>
                <li class="nav-item <?= active_menu('Admin_penjualan'); ?><?= active_menu('Admin_kategori'); ?>">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-app">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-fw fa-bag-shopping fs-5"></i>
                            </span>
                            <span class="sidebar-text">Produk</span>
                        </span>
                        <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= base_url(); ?>Admin_penjualan">
                                    <span class="sidebar-text">Penjualan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= base_url(); ?>Admin_pesanan">
                                    <span class="sidebar-text">Pesanan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= base_url(); ?>Admin_kategori">
                                    <span class="sidebar-text">Kategori</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item  <?= active_menu('Admin_keranjang'); ?> ">
                    <a href="<?= base_url(); ?>Admin_keranjang" class="nav-link">
                        <span class="sidebar-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span class="sidebar-text">Keranjang</span>
                    </a>
                </li>
                <li class="nav-item  <?= active_menu('Admin_transaksi'); ?> ">
                    <a href="<?= base_url(); ?>Admin_transaksi" class="nav-link">
                        <span class="sidebar-icon">
                        <i class="fa-solid fa-handshake"></i>
                        </span>
                        <span class="sidebar-text">Transaksi</span>
                    </a>
                </li> 
            </ul>
        </div>
    </nav>