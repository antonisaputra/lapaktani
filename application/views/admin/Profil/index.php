<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <div class="row">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
        <?php if ($this->session->flashdata('pesan')) {
            $this->session->flashdata('pesan');
        }
        ?>
        <div class="col-md-4">
            <div class="card border-0" style="width: 18rem;">
                <div class="profil">
                    <img src="<?= base_url(); ?>assets/upload/<?= queryUser('profil'); ?>" class="card-img-top">
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= queryUser('id'); ?>">
                <input type="hidden" name="gambar_lama" value="<?= queryUser('profil'); ?>">
                <div class="input-group mt-3">
                    <input type="file" name="gambar" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-success" name="profil" type="submit" id="inputGroupFileAddon04">Ganti</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <h4>Biodata Diri</h4>
            <p>Nama : <?= queryUser('username'); ?></p>
            <p>Tanggal Lahir : <?= queryUser('tanggal_lahir'); ?></p>
            <p>Jenis Kelamin : <?= queryUser('jenis_kelamin'); ?></p>
            <p>Alamat : <?= queryUser('alamat'); ?></p>
            <p>Nomor Heandphone : <?= queryUser('no_hp'); ?></p>
            <h5>Akun</h5>
            <p>Email : <?= queryUser('email'); ?></p>
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <a href="<?= base_url(); ?>Admin_profil/Ubah/<?= queryUser('id'); ?> " class="btn btn-outline-success">Ubah Biodata</a>
    </div>
</div>