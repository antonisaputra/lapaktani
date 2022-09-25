<div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <h3>Edit Kategori Produk</h3>
                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <!-- Form -->
                            <form action="" method="POST">
                                <div class="mb-4">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" name="kategori" value="<?= $kategori['kategori']; ?>" class="form-control" id="kategori">
                                    <?= form_error('kategori','<small class="form-text text-muted text-danger">','</small>')?>
                                </div>
                                <a href="<?= base_url(); ?>Admin_kategori" class="btn btn-danger">Kembali</a>
                                <button type="submit" name="tambah_kategori" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">
                                    Edit Kategori
                                </button>
                            </form>
                            <!-- End of Form -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
