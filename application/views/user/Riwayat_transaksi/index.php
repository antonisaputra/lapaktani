
    <div class="container container-keranjang">
        <div class="row ">

            <div class="col-lg-10">
                <div class="header-keranjang">
                    <h4 class="">Riwayat Belanja</h4>
                </div>
                <?php foreach($riwayat as $row): ?>
                <a href="<?= base_url(); ?>Riwayat_transaksi/detailTransaksi/<?= $row['id']; ?>" class="link-riwayat">
                    <div class="card shadow card-keranjang mb-4">
                        <div class="d-flex">
                            <div class="col-lg-5 p-3">
                                <p><?= date('d F Y h:i:s A', strtotime($row['tanggal_transaksi']));?></p>
                                <p class="fs-4 fw-bold"><?= 'Rp.'. queryTotalRiwayat($row['id'],$row['ongkir']);  ?></p>
                            </div>
                            <div class="col-lg-7 text-end p-3 mt-3 status-pembayaran">
                                <p class="fs-5 fw-bold">
                                    Menunggu Pembayaran
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
