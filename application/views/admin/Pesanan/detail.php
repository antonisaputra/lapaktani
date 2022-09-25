<div class="container-fluid">
    <div class="card mb-3">
        <img src="<?= base_url(); ?>assets/upload/<?= $pesanan['gambar'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $pesanan['nama_produk']; ?></h5>
            <p class="card-text">Kategori : <span><?= $pesanan['kategori']; ?></span></p>
            <p class="card-text">Nama Penjual : <span><?= $pesanan['nama_pemesan']; ?></span></p>
            <p class="card-text">Alamat Penjual : <span><?= $pesanan['alamat_pemesan']; ?></span></p>
            <p class="card-text">Stok : <span><?= $pesanan['stok']; ?> Kg</span></p>
            <p class="card-text">Berat Satuan : <span><?= $pesanan['berat_satuan']; ?> Kg</span></p>
            <p class="card-text">Harga Satuan : <span><?= 'Rp.' . number_format($pesanan['harga_satuan'], 2, ",", "."); ?></span></p>
        </div>

        <a href="<?= base_url(); ?>Admin_pesanan" class="btn btn-danger mb-3 ms-3" style="width:200px !important;">Kembali</a>
    </div>
</div>