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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="col-lg-7 col-login">
            <div class="card-login">
                <div class="d-flex mb-2">
                    <img src="<?= base_url(); ?>assets/user/img/TONI.png" width="30" height="40px" class="d-inline-block align-text-top">
                    <p class="ms-3" id="name-brand">Login Lapak Tani</p>
                </div>
                <div class="col-lg-12">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap'); ?>">
                                <?=form_error('nama_lengkap','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                                <?=form_error('email','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <label for="" class="ms-4 mb-2">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="inputEmail3" value="<?= set_value('tanggal_lahir'); ?>">
                                <?=form_error('tanggal_lahir','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-10 mt-3 ms-3">
                                <label for="ms-3">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis_kelamin" value="Laki-Laki" id="JKLaki" >
                                    <label class="form-check-label" for="JKLaki">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis_kelamin" value="Perempuan" id="JKPerempuan">
                                    <label class="form-check-label" for="JKPerempuan">
                                      Perempuan
                                    </label>
                                </div>
                                <?=form_error('jenis_kelamin','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" name="no_hp" placeholder="No.Handphone Harap Di Isi +62" value="<?= set_value('no_hp'); ?>">
                                <?=form_error('no_hp','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap" value="<?= set_value('alamat_lengkap'); ?>">
                                <?=form_error('alamat_lengkap','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <input type="password" class="form-control" name="password1" placeholder="Password">
                                <?=form_error('password1','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password">
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>Auth" class="btn btn-danger">Kembali</a>
                        <button class="btn btn-success">Registrasi</button>
                        <!-- <button type="submit" class="btn">Registasi</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/user/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>