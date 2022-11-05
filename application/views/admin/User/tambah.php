    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <h3>Tambah Kurir</h3>
                    <div class="row">
                            <!-- Form -->
                            <form action="" method="POST">
                                <div class="col-4 mb-4">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap">
                                    <?= form_error('nama_lengkap', '<small class="form-text text-muted text-danger">', '</small>') ?>
                                </div>
                                <div class="col-4 mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    <?= form_error('email', '<small class="form-text text-muted text-danger">', '</small>') ?>
                                </div>
                                <div class="col-4 mb-4">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                                    <?= form_error('tanggal_lahir', '<small class="form-text text-muted text-danger">', '</small>') ?>
                                </div>
                                <div class="col-4 mb-4">
                                    <label for="ms-3">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="jenis_kelamin" value="Laki-Laki" id="JKLaki">
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
                                    <?= form_error('jenis_kelamin', '<small class="text-danger ms-3">', '</small>'); ?>
                                </div>
                                <div class="col-4 mb-4">
                                    <label for="no_hp">No.Heandphone</label>
                                    <input type="text" name="no_hp" class="form-control" id="no_hp">
                                    <?= form_error('no_hp', '<small class="form-text text-muted text-danger">', '</small>') ?>
                                </div>
                                <div class="col-4 mb-4">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <input type="text" name="alamat_lengkap" class="form-control" id="alamat_lengkap">
                                    <?= form_error('alamat_lengkap', '<small class="form-text text-muted text-danger">', '</small>') ?>
                                </div>
                                <div class="col-4 mb-4">
                                    <input type="password" class="form-control" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger ms-3">', '</small>'); ?>
                                </div>
                                <div class="col-4 mb-4">
                                    <input type="password" class="form-control" name="password2" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger ms-3">', '</small>'); ?>
                                </div>
                                <a href="<?= base_url(); ?>Admin_user" class="btn btn-warning">Kembali</a>
                                <button type="submit" name="tambah_kategori" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">
                                    Tambah Kategori
                                </button>
                            </form>
                            <!-- End of Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>