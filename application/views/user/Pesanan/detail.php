
    <div class="container container-detail-belanja">
        <div class="row">
            <div class="col-lg-4">
                <div class="img-detail-belanja">
                    <img src="<?= base_url(); ?>assets/upload/<?= $pesanan['gambar']; ?>" alt="" srcset="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-detail-belanja shadow">
                    <div class="card-body">
                        <h4><?= $pesanan['nama_produk'] ?></h4>
                        <div class="detail-deskripsi">
                            <div class="body-detail pt-3">
                                <?= $pesanan['detail']; ?>
                            </div>
                        </div>
                        <?php if($this->session->userdata('email')): ?>
                        <a href="" class="btn btn-keranjang">Chat Pemesan</a>
                        <?php else: ?>
                        <p class="text-success"> Login Terlebih Dahulu Untuk Chat Pemesan</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>