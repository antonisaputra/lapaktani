<div class="container container-profil">
    <div class="bg-ligt">
        <div class="card shadow py-4">
            <div class="card-body ms-5">
                <h4 class="mb-3">Edit Password</h4>
                <form action="" method="post">
                    <div class="mb-1 col-lg-5">
                        <?php if (!empty($this->session->flashdata('pesan_kesalahan'))) : ?>
                            <p class="text-danger"><?= $this->session->flashdata('pesan_kesalahan'); ?></p>
                        <?php endif; ?>
                        <input type="password" name="password_lama" class="form-control mb-3" placeholder="Password Lama" aria-label="default input example">
                        <?= form_error('password_lama', '<small class="text-danger ms-3">', '</small><br>') ?>
                        <input type="password" name="password_baru1" class="form-control mb-3" placeholder="Password Baru" aria-label="default input example">
                        <?= form_error('password_baru1', '<small class="text-danger ms-3">', '</small><br>') ?>
                        <input type="password" name="password_baru2" class="form-control mb-3" placeholder="Konfirmasi Password Baru" aria-label="default input example">
                    </div>
                    <a href="<?= base_url(); ?>User_profil" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Edit Password</button>
                </form>
            </div>
        </div>
    </div>
</div>