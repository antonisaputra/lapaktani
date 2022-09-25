<div class="container-fluid">
    <div class="card mb-3">
        <img src="<?= base_url(); ?>assets/upload/<?= $penjualan['gambar'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $penjualan['nama_produk']; ?></h5>
            <p class="card-text">Kategori : <span><?= $penjualan['kategori']; ?></span></p>
            <p class="card-text">Nama Penjual : <span><?= $penjualan['nama_penjual']; ?></span></p>
            <p class="card-text">Alamat Penjual : <span><?= $penjualan['alamat_penjual']; ?></span></p>
            <p class="card-text">Stok : <span><?= $penjualan['stok']; ?> Kg</span></p>
            <p class="card-text">Berat Satuan : <span><?= $penjualan['berat_satuan']; ?> Kg</span></p>
            <p class="card-text">Harga Satuan : <span><?= 'Rp.' . number_format($penjualan['harga_satuan'], 2, ",", "."); ?></span></p>
        </div>

        <a href="<?= base_url(); ?>Admin_penjualan" class="btn btn-danger mb-3 ms-3" style="width:200px !important;">Kembali</a>
    </div>
</div>