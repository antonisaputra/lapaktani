<div class="container container-banner">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url(); ?>assets/user/img/banner lapak tani.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <i class="fa-solid fa-fw fa-angle-left"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <i class="fa-solid fa-fw fa-angle-right"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container search">
    <div class="col-lg-5 mt-4">
        <form class="d-flex" role="search">
            <input class="form-control input-cari me-2 py-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-cari" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>

<div class="container container-belanja">
    <div class="row">
        <?php foreach($pesanan as $row): ?>
        <div class="col-lg-6">
            <div class="card mb-3 .card-pesanan">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-pesanan-img">
                            <img src="<?= base_url(); ?>assets/upload/<?= $row['gambar']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body ps-5">
                            <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                            <p class="card-text"><?= $row['detail']; ?></p>
                            <div class="icon-pesanan">
                                <div class="d-flex text-dark fs-6">
                                    <i class="fa-solid fa-fw fa-user icon-belanja"></i>
                                    <p><?= $row['nama_pemesan']; ?></p>
                                </div>
                                <div class="d-flex text-dark fs-6 flex-location">
                                    <i class="fa-solid fa-fw fa-location-dot"></i>
                                    <p><?= $row['alamat_pemesan']; ?></p>
                                </div>
                            </div>
                            <a href="<?= base_url(); ?>User_pesanan/detail/<?= $row['id']; ?>" class="btn btn-lihat-detail">Lihat detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>