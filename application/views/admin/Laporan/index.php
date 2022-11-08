<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex align-items-center">
                <!-- Search form -->
                <form action="" method="POST" class="navbar-search form-inline" id="navbar-search-main">
                    <div class="input-group input-group-merge search-bar">
                        <label for="" class="me-2 mt-1">Tanggal Mulai </label>
                        <input type="date" class="form-control" name="mulai" id="topbarInputIconLeft" placeholder="Cari Pesanan Keranjang" aria-label="Search" aria-describedby="topbar-addon" autocomplete="off">
                        <label for="" class="mx-2 mt-1">Tanggal Selesai </label>
                        <input type="date" class="form-control" name="selesai" id="topbarInputIconLeft" placeholder="Cari Pesanan Keranjang" aria-label="Search" aria-describedby="topbar-addon" autocomplete="off">
                        <button type="submit" name="cari_laporan" class="btn btn-gray-800">Cari</button>
                    </div>
                </form>
                <!-- / Search form -->
            </div>
        </div>
    </div>
</nav>

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<?php if ($this->session->flashdata('pesan')) {
    $this->session->flashdata('pesan');
}
?>
<div class="card card-body border-0 mt-3 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">No</th>
                <th class="border-gray-200">Nama Produk</th>
                <th class="border-gray-200">Jumlah</th>
                <th class="border-gray-200">Harga</th>
                <th class="border-gray-200">Subtotal</th>
                <th class="border-gray-200">Metode Pembayaran</th>
                <th class="border-gray-200">No_Rekening</th>
                <th class="border-gray-200">Kurir</th>
                <th class="border-gray-200">Nama Pembeli</th>
                <th class="border-gray-200">Alamat Pembeli</th>
                <th class="border-gray-200">Nama Penjual</th>
                <th class="border-gray-200">Alamat Penjual</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->
            <?php if (isset($button)) : ?>
                <?php if (!empty($transaksi)) : ?>
                    <div class="col-md-3">
                        <a href="" class="btn btn-success">Print</a>
                    </div>
                    <?php $no = 1; ?> 
                    <?php foreach ($transaksi as $row) : ?>
                        <?php if($row['status_barang'] == 'Barang Sampai'): ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['nama_produk']; ?></span>
                            </td>
                            <td><span class="fw-normal"><?= $row['jumlah']; ?></span></td>
                            <td><span class="fw-bold"><?= 'Rp.' . number_format($row['harga'], 2, ",", "."); ?></span></td>
                            <td><span class="fw-bold"><?= 'Rp.' . number_format($row['subtotal'], 2, ",", "."); ?></span></td>
                            <td>
                                <span class="fw-normal"><?= $row['metode_pembayaran']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['no_rek']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['kurir']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['username']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $row['alamat']; ?></span>
                            </td>
                            <?php $pembeli = $this->db->get_where('user', ['id' => $row['id_costumer']])->row_array(); ?>
                            <td>
                                <span class="fw-normal"><?= $pembeli['username']; ?></span>
                            </td>
                            <td>
                                <span class="fw-normal"><?= $pembeli['alamat']; ?></span>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <td colspan="11" class="text-center fw-bold">Data Tidak Di Temukan</td>
                <?php endif; ?>
            <?php else : ?>
                <td colspan="11" class="text-center fw-bold">Silahkan Cari Data Berdasarkan Data Laporan</td>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <nav aria-label="Page navigation example">
            <?= $this->pagination->create_links(); ?>
        </nav>
    </div>
</div>
<div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
    <div class="card-body bg-gray-800 text-white pt-4">
        <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse" href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
            <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard" data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
        </div>
        <a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank" class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
            Download
            <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
        <div class="d-flex justify-content-center">
            <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank">
                <img src="../assets/img/technologies/bootstrap-5-logo.svg" class="image image-xs">
            </a>
            <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
                <img src="../assets/img/technologies/react-logo.svg" class="image image-xs">
            </a>
        </div>
    </div>
</div>