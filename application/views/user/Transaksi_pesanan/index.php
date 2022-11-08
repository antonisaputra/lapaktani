<div class="container container-profil">
    <div class="bg-ligt">
        <div class="card p-3">
            <h3 class="mb-3">Transaksi Pesanan</h3>  
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status Pesanan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($keranjang as $row) : ?>
                        <?php if ($row['status_barang'] != "Dalam Keranjang") : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['jumlah']; ?>Kg</td>
                                <td><?= 'Rp.' . number_format($row['harga'], '2', ',', '.'); ?></td>
                                <td><?= 'Rp.' . number_format($row['subtotal'], '2', ',', '.'); ?></td>
                                <td><?= $row['status_barang']; ?></td>
                                <?php if ($row['status_barang'] == "Menunggu Pembayaran") : ?>
                                    <td><a href="<?= base_url(); ?>Pesanan/upload_pembayaran/<?= $row['id']; ?>" class="btn btn-success">Upload Bukti Pembayaran</a></td>

                                <?php else : ?>
                                    <td>Bukti Pembayaran Di Upload 
                                        <a href="<?= base_url();?>Pesanan/detail_pesanan/<?= $row['id']; ?>" class="btn btn-success ms-2">Detail</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php $no++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>