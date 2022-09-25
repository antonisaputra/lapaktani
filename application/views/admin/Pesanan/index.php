<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
  <div class="container-fluid px-0">
    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
      <div class="d-flex align-items-center">
        <!-- Search form -->
        <form action="<?= base_url(); ?>Admin_pesanan" method="POST" class="navbar-search form-inline" id="navbar-search-main">
          <div class="input-group input-group-merge search-bar">
            <input type="text" class="form-control" name="keyword" id="topbarInputIconLeft" placeholder="Cari Produk Pesanan" aria-label="Search" aria-describedby="topbar-addon" autocomplete="off">
            <button type="submit" name="submit" class="btn btn-gray-800">Cari</button>
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

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group ms-2 ms-lg-3">
      <a href="<?= base_url(); ?>Admin_penjualan/pdf" class="btn btn-sm btn-outline-gray-600" target="_blank">Print Atau Export PDF</a>
    </div>
  </div>
</div>
<div class="card card-body border-0 shadow table-wrapper table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="border-gray-200">No</th>
        <th class="border-gray-200">Nama Produk</th>
        <th class="border-gray-200">Kategori</th>
        <th class="border-gray-200">Nama Penjual</th>
        <th class="border-gray-200">Alamat Penjual</th>
        <th class="border-gray-200">Stok</th>
        <th class="border-gray-200">Berat Satuan</th>
        <th class="border-gray-200">Harga Satuan</th>
        <th class="border-gray-200">Aksi</th>

      </tr>
    </thead>
    <tbody>
      <!-- Item -->
      <?php foreach ($pesanan as $row) : ?>
        <tr>
          <td>
            <?= ++$start; ?>
          </td>
          <td>
            <span class="fw-normal"><?= $row['nama_produk']; ?></span>
          </td>
          <td><span class="fw-normal"><?= $row['kategori']; ?></span></td>
          <td><span class="fw-normal"><?= $row['nama_pemesan']; ?></span></td>
          <td><span class="fw-normal"><?= $row['alamat_pemesan']; ?></span></td>
          <td><span class="fw-bold"><?= $row['stok']; ?>Kg</span></td>
          <td><span class="fw-bold"><?= $row['berat_satuan']; ?>Kg</span></td>
          <td><span class="fw-bold"><?= 'Rp.' . number_format($row['harga_satuan'], 2, ",", "."); ?></span></td>
          <td>
            <div class="btn-group">
              <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon icon-sm">
                  <span class="fas fa-ellipsis-h icon-dark"></span>
                </span>
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu py-0">
                <a class="dropdown-item rounded-top" href="<?= base_url(); ?>Admin_pesanan/detail/<?= $row['id']; ?>"><span class="fas fa-eye me-2"></span>Lihat Detail</a>
                <a class="dropdown-item" href="<?= base_url(); ?>Admin_pesanan/edit/<?= $row['id']; ?>"><span class="fas fa-edit me-2"></span>Edit</a>
                <a class="dropdown-item text-danger rounded-bottom tombol-hapus-kategori" href="<?= base_url(); ?>Admin_pesanan/hapus/<?= $row['id']; ?>"><span class="fas fa-trash-alt me-2"></span>Remove</a>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
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