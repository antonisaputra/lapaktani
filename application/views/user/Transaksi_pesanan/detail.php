<div class="container container-profil">
    <div class="bg-ligt">
        <div class="card p-3">
            <h3 class="mb-3">Transaksi Pesanan</h3>  
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold">Detail Produk</h5>
                    <p>Nama Produk : <?= $keranjang['nama_produk']; ?></p>
                    <p>Jumlah : <?= $keranjang['jumlah']; ?></p>
                    <p>Harga : <?= $keranjang['subtotal']; ?></p>
                    <p>Status Pesanan : <?= $keranjang['status_barang'];     ?></p>
                    <a href="<?= base_url(); ?>Pesanan/transaksi_pesanan" class="btn btn-danger">Kembali</a>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold">Bukti Pembayaran dan Bukti Barang Sampai</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url(); ?>assets/upload/<?= $bukti_pembayaran['bukti_pembayaran']; ?>" alt="">
                        </div>
                        <div class="col-md-6">
                        <img src="<?= base_url(); ?>assets/upload/<?= $bukti_pembayaran['bukti_barang_sampai']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>