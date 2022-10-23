<div class="container container-profil">
    <div class="bg-ligt">
        <div class="card shadow py-4">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <?php if ($this->session->flashdata('pesan')) {
                $this->session->flashdata('pesan');
            }
            ?>
            <div class="card-body ms-5 me-5">
                <h4 class="mb-3">Tambah Penjualan</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-1 col-lg-5">
                            <div class="mb-3">
                                <label for="nama_produk_pesanan">Nama Produk Penjualan</label>
                                <input type="text" name="nama_produk" id="nama_produk_pesanan" class="form-control" aria-label="default input example" placeholder="Masukkan Nama Produk.." value="<?= set_value('nama_produk'); ?>">
                                <?= form_error('nama_produk', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="mb-1 col-lg-5">
                            <div class="mb-3">
                                <label for="jumlah_produ_pesanan">Jumlah Produk</label>
                                <input type="number" name="stok" id="jumlah_produk" class="form-control" value="<?= set_value('stok'); ?>"placeholder="Masukkan jumlah produk dalam satuan kg" aria-label="default input example">
                                <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-lg-5">
                                <div class="mb-3">
                                    <label for="harga">Harga Satuan</label>
                                    <input type="number" name="harga" value="<?= set_value('harga'); ?>" id="harga" class="form-control" placeholder="Masukkan jumlah produk dalam satuan kg" aria-label="default input example">
                                    <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="mb-1 col-lg-5">
                                <div class="mb-3">
                                    <label for="kategori">kategori</label>
                                    <select class="form-select" id="kategori" name="kategori" aria-label="Default select example">
                                        <?php foreach ($kategori as $row) : ?>
                                            <option value="<?= $row['id']; ?>"><?= $row['kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="mb-1 col-lg-10">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Upload Gambar Produk</label>
                                    <input type="file" name="gambar" class="form-control" id="inputGroupFile01">
                                    <?= form_error('gambar', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="deskripsi_produk">Deskripsi</label>
                    <textarea name="detail" id="deskripsi_produk"><?= set_value('detail'); ?></textarea>
                    <?= form_error('deskripsi_produk', '<small class="text-danger">', '</small>') ?><br>
                    <a href="<?= base_url(); ?>Posting_penjualan" class="btn btn-danger mt-3">Kembali</a>
                    <button type="submit" class="btn btn-success mt-3">Tambah Produk Penjualan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>