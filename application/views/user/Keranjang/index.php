    <div class="container container-keranjang">
        <div class="row ">
                <div class="col-lg-10">
                    <div class="header-keranjang">
                        <h4 class="">Keranjang</h4>
                    </div>
                    <?php 
                    $idkeranjang = [];
                    $totalHarga = 0;  ?>
                    <?php 
                    $cekKeranjang = false;
                    foreach($keranjang as $k): ?>
                    <?php if($k['id_transaksi'] == 0 && $k['id_costumer'] == queryUser('id')): ?>
                    <?php $idkeranjang[] = $k['id'];?>
                    <?php $cekKeranjang = true; ?>
                    <div class="card shadow card-keranjang mb-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="img-keranjang">
                                    <img src="<?= base_url() ?>assets/upload/<?= $k['gambar']; ?>" alt="">
                                </div>
                            </div>
                            <div class="d-flex col-lg-8">
                                <div class="hal-1 ms-5 pt-1">
                                    <div class="card-body ms-1 card-detail-keranjang">
                                        <h5><?= $k['nama_produk']; ?></h5>
                                        <h6><?= $k['nama_penjual']; ?></h6>
                                        <p><?= $k['alamat_penjual']; ?></p>

                                    </div>
                                    <div class="d-flex ms-1 flex-detail-keranjang">
                                        <a href="<?= base_url(); ?>User_keranjang/edit/<?= $k['id'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url(); ?>User_keranjang/delete/<?= $k['id']; ?>" class="btn btn-danger tombol-hapus-keranjang tombol-hapus-kategori">Hapus</a>
                                    </div>
                                </div>
                                <div class="hal-2 ms-5" style="margin-top: 28px;">
                                    <p class="harga-satuan">Harga Satuan : <?= 'Rp.' . number_format($k['harga_satuan'], 2, ",", "."); ?></p>
                                    <p><?= $k['jumlah'] ?></p>
                                    <p class="fw-bold text-warning ">Sub harga : <?= 'Rp.' . number_format($k['subtotal'], 2, ",", "."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $totalHarga += $k['subtotal'];
                    endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php if($cekKeranjang): ?>
                <div class="col-lg-4">
                    <div class="card shadow p-3 card-totaharga-keranjang">
                        <h5>Total Belanja</h5>
                        <p id="harga_total" class="fs-2 text-warning"><?= 'Rp.' . number_format($totalHarga, 2, ",", "."); ?></p>
                        <a href="<?= base_url(); ?>User_keranjang/checkout" name="beli" class="btn btn-success">Beli</a>
                    </div>
                </div>
                <?php else: ?>
                    <div class="my-5">
                        <p class="fs-1 text-center text-success">Keranjang Kosong Belanja Terlebih Dahulu</p>
                    </div>
                <?php endif; ?>

        </div>
    </div>