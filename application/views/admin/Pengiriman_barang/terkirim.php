<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
  <div class="container-fluid px-0">
    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
      <div class="d-flex align-items-center">
        <!-- Search form -->
        <form action="" method="POST" class="navbar-search form-inline" id="navbar-search-main">
          <div class="input-group input-group-merge search-bar">
            <input type="text" class="form-control" name="keyword" id="topbarInputIconLeft" placeholder="Cari Barang Terkirim" aria-label="Search" aria-describedby="topbar-addon" autocomplete="off">
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
<div class="card card-body border-0  mt-3 shadow table-wrapper table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="border-gray-200">No</th>
        <th class="border-gray-200">Nama Produk</th>
        <th class="border-gray-200">Jumlah</th>
        <th class="border-gray-200">Harga Satuan</th>
        <th class="border-gray-200">Subtotal</th>
        <th class="border-gray-200">Nama Pembeli</th>
        <th class="border-gray-200">Email</th>
        <th class="border-gray-200">No.Heandphone</th>
        <th class="border-gray-200">Alamat</th>
        <th class="border-gray-200">Status</th>
      </tr>
    </thead>
    <tbody>
      <!-- Item -->
      <?php foreach ($proses_pengiriman as $row) : ?>
        <tr>
          <td>
            <?= ++$start; ?>
          </td>
          <td>
            <span class="fw-normal"><?= $row['nama_produk']; ?></span>
          </td>
          <td><span class="fw-normal"><?= $row['jumlah']; ?>Kg</span></td>
          <td><span class="fw-normal"><?= 'Rp.' . number_format($row['harga'], 2, ",", "."); ?></span></td>
          <td><span class="fw-normal"><?= 'Rp.' . number_format($row['subtotal'], 2, ",", "."); ?></span></td>
          <td><span class="fw-bold"><?= $row['username']; ?></span></td>
          <td><span class="fw-bold"><?= $row['email']; ?></span></td>
          <td><span class="fw-bold"><?= $row['no_hp'] ?></span></td>
          <td><span class="fw-bold"><?= $row['alamat'] ?></span></td>
          <td><span class="fw-bold"><?= $row['status_barang'] ?></span></td>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
    <nav aria-label="Page navigation example">
      <?= $this->pagination->create_links(); ?>
    </nav>
  </div>
</div>