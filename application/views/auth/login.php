<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url(); ?>assets/user/img/TONI.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/style1.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/bootstrap/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <div class="col-lg-7 col-login">
            <div class="card-login">
                <div class="d-flex mb-2">
                    <img src="<?= base_url(); ?>assets/user/img/TONI.png" width="30" height="40px" class="d-inline-block align-text-top">
                    <p class="ms-3" id="name-brand">Login Lapak Tani</p>
                </div>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <?php if ($this->session->flashdata('pesan')) {
                    $this->session->flashdata('pesan');
                }
                ?>
                <div class="col-lg-12">
                <?php if(!empty($this->session->flashdata('pesan_kesalahan'))): ?>
                    <p class="text-danger"><?= $this->session->flashdata('pesan_kesalahan'); ?></p>
                <?php endif; ?>
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="form-text ms-3 text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="form-text ms-3 text-muted text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success px-5" style="margin-left: 29%;
                        ">Masuk</button>
                    </form>
                </div>
                <div class="link-registrasi mt-5 text-center">
                    <a href="<?= base_url(); ?>Auth/registrasi">Buat Akun</a><br>
                    <a href="">Lupa Password</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/user/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/cobajs1.js"></script>
</body>

</html>