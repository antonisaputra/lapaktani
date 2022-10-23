<div class="container container-profil">
    <div class="bg-ligt">
        <div class="card p-3">
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($keranjang as $row): ?>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama_produk']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td><?= 'Rp.'. number_format($row['harga'], '2',',','.'); ?></td>
                        <td><?= 'Rp.'. number_format($row['subtotal'], '2',',','.'); ?></td>
                        <td><a href="<?= base_url(); ?>Status_pesanan/" class="btn btn-success">Lanjut Proses</a></td>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>