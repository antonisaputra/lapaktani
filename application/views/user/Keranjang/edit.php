
    <div class="container container-keranjang">
        <div class="row ">
            <form action="" method="post">
                <div class="col-lg-8">
                    <div class="header-keranjang">
                        <h4>Edit Keranjang</h4>
                    </div>
                    <div class="card shadow pb-3 card-keranjang">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="img-keranjang">
                                    <img src="<?= base_url(); ?>assets/upload/<?= $keranjang['gambar']; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body card-body-keranjang">
                                    <h5><?= $keranjang['nama_penjual']; ?></h5>
                                    <h6><?= $keranjang['alamat_penjual']; ?></h6>
                                    <p><?= $keranjang['nama_produk']; ?></p>
                                </div>
                                <div class="d-flex flex-keranjang">
                                    <label for="jumlah" class="text-secondary">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah_keranjang" onkeyup="sum(<?= $keranjang['harga_satuan']; ?>)" class="form-control jumlah-keranjang">
                                    <?= form_error('jumlah','<small class="text-danger ms-3 mt-2">','</small>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow p-3 card-totaharga-keranjang">
                        <a href="<?= base_url() ?>User_keranjang" class="btn btn-danger mb-2">Kembali</a>
                        <button type="submit" name="beli" class="btn btn-success">Edit Keranjang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
