<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url(); ?>assets/user/img/TONI.png">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/style1.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/bootstrap/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="d-flex">
                    <img src="<?= base_url(); ?>assets/user/img/TONI.png" width="30" height="40px" class="d-inline-block align-text-top">
                    <p class="ms-3" id="name-brand">Lapak Tani</p>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-menu" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>User_penjualan">Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>User_pesanan">Pemesanan</a>
                    </li>
                </ul>

                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <img src="<?= base_url(); ?>assets/user/img/TONI.png" class="rounded me-2" width="20">
                            <strong class="me-auto text-success">Lapak Tani</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <a href="">
                                Hello, world! This is a toast message.
                            </a>
                        </div>
                        <div class="toast-body">
                            <a href="">
                                Hello, world! This is a toast message.
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (!$this->session->userdata('email')) : ?>
                    <div class="d-flex">
                        <a href="<?= base_url(); ?>Auth/registrasi" class="btn-daftar me-3">Daftar</a>
                        <a href="<?= base_url(); ?>Auth" class="btn-masuk">Masuk</a>
                    </div>
                <?php else : ?>
                    
                    <!-- <i class="fa-regular fa-bell" style="font-size: 30px; padding-right:20px; cursor:pointer;" id="liveToastBtn"></i> -->
                    <!-- <p class="text-success fw-bold text-notifikasi">1</p> -->
                    <div class="dropdown dropdown-profil">
                        <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex card-profil">
                                <p><?= queryUser('username'); ?></p>
                                <div class="img-profil">
                                    <img src="<?= base_url(); ?>assets/upload/<?= queryUser('profil'); ?>" alt="" width="100px">
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url(); ?>User_profil">Profil</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>Pesanan">Pesanan Masuk</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>Pesanan/transaksi_pesanan">Transkasi Pesanan</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>Riwayat_transaksi">Riwayat Transaksi</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>Posting_penjualan">Posting Penjualan</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>Posting_pesanan">Posting Pesanan</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>Auth/logout">Keluar</a></li>
                        </ul>
                    </div>
                    <div class="icon-keranjang shadow">
                        <a href="<?= base_url(); ?>User_keranjang">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </nav>