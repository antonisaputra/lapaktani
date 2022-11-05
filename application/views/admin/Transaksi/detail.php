<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Transaksi <?= $user['username']; ?></h5>
            <p class="card-text">Waktu : <span><?= date('d F Y h:i:s A', strtotime($transaksi['tanggal_transaksi'])); ?></span></p>
            <p class="card-text">Email : <span><?= $user['email']; ?></span></p>
            <p class="card-text">Alamat : <span><?= $transaksi['alamat']; ?></span></p>
            <table class="table text-center table-hover table-striped">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0; 
                            $no = 1;
                            foreach($keranjang as $row): ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= 'Rp.' . number_format($row['harga'], 2, ",", "."); ?></td>
                                <td>3</td>
                                <td><?= 'Rp.' . number_format($row['subtotal'], 2, ",", "."); ?></td>
                            </tr>
                            <?php 
                            $total += $row['subtotal'];
                            $no++;
                            endforeach; ?>
                            <tr>
                                <td colspan="4" class="fw-bold">Total Harga</td>
                                <td class="text-success fw-bold"><?= 'Rp.' . number_format($total, 2, ",", "."); ?></td>
                            </tr>
                        </tbody>
                    </table>
            <p class="card-text">Sub Harga : <span><?= 'Rp.' . number_format($total, 2, ",", "."); ?></span></p>
            <p class="card-text">Ongkir : <span><?= 'Rp.' . number_format($transaksi['ongkir'], 2, ",", "."); ?> Kg</span></p>
            <p class="card-text">Total Belanjaan : <span><?= 'Rp.' . number_format(($transaksi['ongkir'] + $total), 2, ",", "."); ?></span></p>
            <p class="card-text">Kurir : <span><?= $transaksi['kurir']; ?></span></p>
            <p class="card-text">No Rekening : <span><?= $transaksi['no_rek']; ?></span></p>
            <p class="card-text">Metode Pembayaran : <span><?= $pembayaran['metode_pembayaran']; ?></span></p>
            <p class="card-text">Catatan Pembelian : <span><?= $transaksi['catatan_pembelian']; ?></span></p>
        </div>

        <a href="<?= base_url(); ?>Admin_transaksi" class="btn btn-danger mb-3 ms-3" style="width:200px !important;">Kembali</a>
    </div>
</div>