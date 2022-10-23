<div class="container container-profil">
    <div class="bg-ligt">
        <div class="card shadow">
            <div class="card-header">
                Biodata Diri
            </div>
            <div class="card-body">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <?php if ($this->session->flashdata('pesan')) {
                    $this->session->flashdata('pesan');
                }
                ?>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card-lprofil">
                            <div class="card-lprofil-img">
                                <img src="<?= base_url(); ?>assets/upload/<?= queryUser('profil'); ?>" alt="" srcset="">
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= queryUser('id'); ?>">
                                <input type="hidden" name="gambar_lama" value="<?= queryUser('profil'); ?>">
                                <div class="input-group my-3 px-2">
                                    <input type="file" name="gambar" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-success" type="submit" name="gantipp" id="inputGroupFileAddon04">Ganti Profil</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-ubah-profil">
                            <a href="<?= base_url(); ?>User_profil/ubahpassword/<?= queryUser('id'); ?>" class="btn">Ganti Password</a>
                            <a href="<?= base_url(); ?>User_profil/ubahbiodata/<?= queryUser('id'); ?>" class="btn ubah-profil">Ubah Biodata</a>
                        </div>
                    </div>
                    <div class="col-lg-7 card-deskripsi-biodata">
                        <h4 class="mb-3">Biodata Diri</h4>
                        <div class="row">
                            <div class="col-lg-3">
                                <p>Nama</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?= queryUser('username'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p>Tanggal Lahir</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?= queryUser('tanggal_lahir'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p>Jenis Kelamin</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?= queryUser('jenis_kelamin'); ?></p>
                            </div>
                        </div>
                        <h4 class="mb-3">Kontak</h4>
                        <div class="row">
                            <div class="col-lg-3">
                                <p>Email</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?= queryUser('email'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <p>Nomor Hp</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?= queryUser('no_hp'); ?></p>
                            </div>
                        </div>
                        <h4 class="mb-3">Alamat</h4>
                        <div class="row">
                            <div class="col-lg-3">
                                <p>Alamat</p>
                            </div>
                            <div class="col-lg-9">
                                <p><?= queryUser('tanggal_lahir'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>