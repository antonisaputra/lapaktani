<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <h3>Edit Penjualan</h3>
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-6">
                        <!-- Form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $penjualan['id']; ?>">
                            <input type="hidden" name="gambar_lama" value="<?= $penjualan['gambar']; ?>">
                            <div class="mb-4">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" value="<?= $penjualan['nama_produk']; ?>" class="form-control" id="nama_produk">
                                <?= form_error('nama_produk', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="nama_produk">Kategori</label>
                                <select class="form-select" name="kategori" aria-label="Default select example">
                                    <?php foreach ($kategori as $row) : ?>
                                        <?php if ($row['kategori'] == $penjualan['kategori']) :  ?>
                                            <option value="<?= $row['id'] ?>" selected><?= $row['kategori']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['kategori']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="nama_penjual">Nama Penjual</label>
                                <input type="text" name="nama_penjual" value="<?= $penjualan['nama_penjual']; ?>" class="form-control" id="nama_penjual">
                                <?= form_error('nama_penjual', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="alamat_penjual">Alamat Penjual</label>
                                <input type="text" name="alamat_penjual" value="<?= $penjualan['alamat_penjual']; ?>" class="form-control" id="alamat_penjual">
                                <?= form_error('alamat_penjual', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" value="<?= $penjualan['stok']; ?>" class="form-control" id="stok">
                                <?= form_error('stok', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="berat_satuan">Berat Satuan</label>
                                <input type="text" name="berat_satuan" value="<?= $penjualan['berat_satuan']; ?>" class="form-control" id="berat_satuan">
                                <?= form_error('berat_satuan', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="harga_satuan">Harga Satuan</label>
                                <input type="text" name="harga_satuan" value="<?= $penjualan['harga_satuan']; ?>" class="form-control" id="harga_satuan">
                                <?= form_error('harga_satuan', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Produk</label><br>
                                <img class="my-4 rounded shadow" src="<?= base_url(); ?>assets/upload/<?= $penjualan['gambar']; ?>" alt="" width="350">
                                <input class="form-control" name="gambar" type="file" id="gambar">
                            </div>
                            <a href="<?= base_url(); ?>Admin_penjualan" class="btn btn-danger">Kembali</a>
                            <button type="submit" name="tambah_kategori" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">
                                Edit Penenjualan
                            </button>
                        </form>
                        <!-- End of Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>