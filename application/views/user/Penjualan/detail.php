<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <?php if ($this->session->flashdata('pesan')) {
                    $this->session->flashdata('pesan');
                }
                ?>
    <div class="container container-detail-belanja">
        <div class="row">
            <div class="col-lg-4">
                <div class="img-detail-belanja">
                    <img src="<?= base_url() ?>assets/upload/<?= $penjualan['gambar']; ?>" alt="" srcset="">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-detail-belanja shadow">
                    <div class="card-body">
                        <h4><?= $penjualan['nama_produk']; ?></h4>
                        <p class="fs-3 detail-harga"><?= 'Rp.' . number_format($penjualan['harga_satuan'], 2, ",", "."); ?></p>
                        <div class="detail-deskripsi">
                            <div class="fs-4 header-detail">
                                <h5>Detail</h5>
                            </div>
                            <div class="body-detail pt-3">
                                <?= $penjualan['detail']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Atur jumlah dan catatan</h6>
                        <form action="<?= base_url(); ?>User_penjualan/tambahKeranjang" method="post">
                            <input type="hidden" name="id" value="<?= $penjualan['id']; ?>">
                            <div class="d-flex form-jumlah">
                                <input type="number" name="jumlah" class="form-control" onkeyup="sum(<?= $penjualan['harga_satuan']; ?>);" id="banyak_barang">
                                <p>Stok : <?= $penjualan['stok']; ?>/kg</p>
                            </div>
                            <p class="text-secondary">Minimal Pembelian: <?= $penjualan['berat_satuan']; ?></p>
                            <p>Harga Satuan</p>
                            <p><?= 'Rp.' . number_format($penjualan['harga_satuan'], 2, ",", ".");  ?></p>
                            <p>Total Belanja</p>
                            <p id="harga_total" class="fw-bold text-warning fs-4"><?= 'Rp.' . number_format($penjualan['harga_satuan'], 2, ",", ".");  ?></p>
                            <?php if($this->session->userdata('email')): ?>
                            <button type="submit" name="keranjang" class="btn btn-keranjang">Keranjang</button>
                            <?php else:?>
                                <p class="text-success">Silahkan Login Terlebih Dahulu Untuk Memesan</p>
                            <?php endif;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>