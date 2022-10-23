
    <div class="container container-profil">
        <div class="bg-ligt">
            <div class="card shadow py-4">
                <div class="card-body ms-5 me-5">
                    <h4 class="mb-3 text-success fw-bold">Detail Transaksi</h4>
                    <p>Berikut Adalah Detail Transaksi Pembelian dan Pengiriman </p>
                    <p><span class="fw-bold pe-3">Status : </span><?= $riwayat['status']; ?></p>
                    <p><span class="fw-bold pe-3">Tanggal Transaksi : </span><?= $riwayat['tanggal_transaksi']; ?></p>
                    <p><span class="fw-bold pe-3">Id Transaksi : </span><?= $riwayat['id']; ?></p>
                    <p><span class="fw-bold pe-3">Daftar Produk </span></p>
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
                    <h5 class="fw-bold text-success my-3">Informasi Pengiriman</h5><hr>
                    <p><span class="fw-bold pe-3">Nama Penerima : </span><?= queryUser('username'); ?></p>
                    <p><span class="fw-bold pe-3">Kurir : </span><?= $riwayat['kurir']; ?></p>
                    <p><span class="fw-bold pe-3">Alamat Pengiriman : </span><?= queryUser('alamat'); ?></p>
                    <h5 class="fw-bold text-success my-3">Informasi Pembayaran</h5><hr>
                    <p><span class="fw-bold pe-3">Total Harga : </span><?= 'Rp.' . number_format($total, 2, ",", "."); ?></p>
                    <p><span class="fw-bold pe-3">Ongkos Kirim : </span><?= 'Rp.' . number_format($riwayat['ongkir'], 2, ",", "."); ?></p>
                    <p><span class="fw-bold pe-3">Total Pembayaran : </span><?= 'Rp.' . number_format($riwayat['ongkir']+$total, 2, ",", "."); ?></p>
                    <p>Silahkan Transfer Sebanyak <?= 'Rp.' . number_format($riwayat['ongkir']+$total, 2, ",", "."); ?> Ke Rekening Dibawah Ini:</p>
                    <p>Cantumkan Id Transaksi : Pada Berita Transaksi</p>
                    <p>Upload Bukti Transaksi</p>
                    <div class="col-lg-5">
                        <form action="" method="post">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Upload Buki</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Upload Bukti</button>
                            <!-- <a href="" class="btn btn-warning mt-3">Cetak Nota</a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
