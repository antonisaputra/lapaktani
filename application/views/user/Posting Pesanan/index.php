
    <div class="container container-keranjang">
        <div class="row ">
            <form action="" method="post">
                <div class="col-lg-10">
                    <div class="header-keranjang">
                        <h4 class="">Daftar Postingan Pesanan</h4>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <a href="<?= base_url(); ?>Posting_pesanan/tambah" name="beli" class="btn btn-success">Tambah Pesanan</a>
                    </div>
                    <?php foreach($pesanan as $row): ?>
                    <div class="card shadow card-keranjang mb-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="img-keranjang">
                                    <img src="<?= base_url(); ?>assets/upload/<?= $row['gambar']; ?>" alt="">
                                </div>
                            </div>
                            <div class="d-flex col-lg-8">
                                <div class="hal-1 ms-5 pt-1">
                                    <div class="card-body ms-1 card-detail-keranjang">
                                        <h5 class="text-dark"><?= $row['nama_produk']; ?></h5>
                                        <h6 class="text-secondary pt-2"><?= $row['waktu']; ?></h6>
                                        <p></p>

                                    </div>
                                    <div class="d-flex ms-1 pb-2B flex-detail-keranjang mt-3">
                                        <a href="<?= base_url(); ?>Posting_pesanan/edit/<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url(); ?>Posting_pesanan/delete/<?= $row['id']; ?>" class="btn btn-danger tombol-hapus-keranjang tombol-hapus-kategori">Hapus</a>
                                        <a href="<?= base_url(); ?>User_pesanan/detail/<?= $row['id']; ?>" class="btn btn-success tombol-hapus-keranjang">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
