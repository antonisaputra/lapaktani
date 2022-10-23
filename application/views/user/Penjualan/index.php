    <div class="container container-banner">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url(); ?>assets/user/img/banner lapak tani.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <i class="fa-solid fa-fw fa-angle-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <i class="fa-solid fa-fw fa-angle-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container search">
        <div class="col-lg-5 mt-4">
            <form class="d-flex" action="" method="post" role="search">
                <input class="form-control input-cari me-2 py-2" name="keyword_penjualan" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-cari" name="cari_penjualan" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>

    <div class="container container-belanja">
        <div class="row">
            <?php foreach($penjualan as $row): ?>
            <div class="col-lg-3">
                <a href="<?= base_url(); ?>User_penjualan/detail/<?= $row['id'];?>">
                    <div class="card-belanja mb-4">
                        <div class="img-card-belanja">
                            <img src="<?= base_url(); ?>assets/upload/<?= $row['gambar']; ?>" alt="">
                        </div>
                        <div class="card-body ms-2 mt-2">
                            <h5 class="card-title fw-bold text-dark"><?= $row['nama_produk']; ?></h5>
                            <p class="card-text fs-5 fw-bold"><?= 'Rp.' . number_format($row['harga_satuan'], 2, ",", "."); ?>/kg</p>
                            <p class="card-text text-minimal">Stok : <?= $row['stok'] ?>/Kg</p>
                            <div class="d-flex text-dark fs-6">
                                <i class="fa-solid fa-fw fa-user icon-belanja"></i>
                                <p><?= $row['nama_penjual']; ?></p>
                            </div>
                            <div class="d-flex text-dark fs-6 flex-location">
                                <i class="fa-solid fa-fw fa-location-dot"></i>
                                <p><?= $row['alamat_penjual']; ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
