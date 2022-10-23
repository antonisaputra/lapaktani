<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <h4 class="mb-3">Ubah Biodata</h4>
    <form action="" method="post">
        <div class="mb-1 col-lg-5">
            <div class="mb-3">
                <label for="username">Nama</label>
                <input type="text" name="username" id="username" class="form-control" aria-label="default input example" value="<?= $user['username']; ?>">
                <?= form_error('username', '<small class="text-danger ms-3">', '</small><br>') ?>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>">
                <?= form_error('email', '<small class="text-danger ms-3">', '</small><br>') ?>
            </div>
            <div class="mb-3">
                <label for="nohp">No.Handphone</label>
                <input type="text" name="no_hp" id="nohp" class="form-control" aria-label="default input example" value="<?= $user['no_hp']; ?>">
                <?= form_error('no_hp', '<small class="text-danger ms-3">', '</small><br>') ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control " name="alamat" id="exampleFormControlTextarea1" rows="3"><?= $user['alamat']; ?></textarea>
                <?= form_error('alamat', '<small class="text-danger ms-3">', '</small><br>') ?>
            </div>
        </div>
        <a href="<?= base_url(); ?>Admin_profil" class="btn btn-danger">Kembali</a>
        <button type="submit" name="ubahbiodata" class="btn btn-success">Ubah Biodata Diri</button>
    </form>
</div>