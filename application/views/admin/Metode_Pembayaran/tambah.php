<div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <h3>Tambah Metode Pembayaran</h3>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->
                            <form action="" method="POST">
                                <div class="mb-4">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                    <input type="text" name="metode_pembayaran" class="form-control" id="metode_pembayaran">
                                    <?= form_error('metode_pembayaran','<small class="form-text text-muted text-danger">','</small>')?>
                                </div>
                                <div class="mb-4">
                                    <label for="no_rekening">Nomor Rekening</label>
                                    <input type="text" name="no_rekening" class="form-control" id="no_rekening">
                                    <?= form_error('no_rekening','<small class="form-text text-muted text-danger">','</small>')?>
                                </div>
                                <a href="<?= base_url(); ?>Admin_metode_pembayaran" class="btn btn-danger">Kembali</a>
                                <button type="submit" name="tambah_kategori" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">
                                    Tambah Metode Pembayaran
                                </button>
                            </form>
                            <!-- End of Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
