<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <h3>Edit Pesanan</h3>
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-6">
                        <!-- Form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $Pesanan['id']; ?>">
                            <input type="hidden" name="gambar_lama" value="<?= $Pesanan['gambar']; ?>">
                            <div class="mb-4">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" value="<?= $Pesanan['nama_produk']; ?>" class="form-control" id="nama_produk">
                                <?= form_error('nama_produk', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="nama_produk">Kategori</label>
                                <select class="form-select" name="kategori" aria-label="Default select example">
                                    <?php foreach ($kategori as $row) : ?>
                                        <?php if ($row['kategori'] == $Pesanan['kategori']) :  ?>
                                            <option value="<?= $row['id'] ?>" selected><?= $row['kategori']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['kategori']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="nama_pemesan">Nama Pemesan</label>
                                <input type="text" name="nama_pemesan" value="<?= $Pesanan['nama_pemesan']; ?>" class="form-control" id="nama_pemesan">
                                <?= form_error('nama_pemesan', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="alamat_pemesan">Alamat Pemesan</label>
                                <input type="text" name="alamat_pemesan" value="<?= $Pesanan['alamat_pemesan']; ?>" class="form-control" id="alamat_pemesan">
                                <?= form_error('alamat_pemesan', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" value="<?= $Pesanan['stok']; ?>" class="form-control" id="stok">
                                <?= form_error('stok', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="berat_satuan">Berat Satuan</label>
                                <input type="text" name="berat_satuan" value="<?= $Pesanan['berat_satuan']; ?>" class="form-control" id="berat_satuan">
                                <?= form_error('berat_satuan', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="harga_satuan">Harga Satuan</label>
                                <input type="text" name="harga_satuan" value="<?= $Pesanan['harga_satuan']; ?>" class="form-control" id="harga_satuan">
                                <?= form_error('harga_satuan', '<small class="form-text text-muted text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Produk</label><br>
                                <img class="my-4 rounded shadow" src="<?= base_url(); ?>assets/upload/<?= $Pesanan['gambar']; ?>" alt="" width="350">
                                <input class="form-control" name="gambar" type="file" id="gambar">
                            </div>
                            <a href="<?= base_url(); ?>Admin_Pesanan" class="btn btn-danger">Kembali</a>
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