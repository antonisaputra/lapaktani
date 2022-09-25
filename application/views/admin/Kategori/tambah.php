    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <h3>Tambah Kategori Produk</h3>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->
                            <form action="<?= base_url(); ?>Admin_Kategori/tambahKategori" method="POST">
                                <div class="mb-4">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" name="kategori" class="form-control" id="kategori">
                                    <?= form_error('kategori','<small class="form-text text-muted text-danger">','</small>')?>
                                </div>
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
    </div>
