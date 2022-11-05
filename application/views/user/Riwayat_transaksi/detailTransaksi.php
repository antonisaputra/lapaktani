
    <div class="container container-profil">
        <div class="bg-ligt">
            <div class="card shadow py-4">
                <div class="card-body ms-5 me-5">
                    <h4 class="mb-3 text-success fw-bold">Detail Transaksi</h4>
                    <p>Berikut Adalah Detail Transaksi Pembelian dan Pengiriman </p>
                    <p><span class="fw-bold pe-3">Tanggal Transaksi : </span><?= date('d F Y h:i:s A', strtotime($riwayat['tanggal_transaksi'])); ?></p>
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
                                <th scope="col">Status </th>
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
                                <td><?= $row['jumlah']; ?>Kg</td>
                                <td><?= 'Rp.' . number_format($row['subtotal'], 2, ",", "."); ?></td>
                                <td><?= $row['status_barang']; ?></td>
                            </tr>
                            <?php 
                            $total += $row['subtotal'];
                            $no++;
                            endforeach; ?>
                            <tr>
                                <td colspan="5" class="fw-bold">Total Harga</td>
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
                    <p>Silahkan Transfer Sebanyak <?= 'Rp.' . number_format($riwayat['ongkir']+$total, 2, ",", "."); ?> Ke Rekening Dibawah Ini: <span class="fw-bold text-success"><?= $bank['metode_pembayaran']; ?> No.Rek <?= $bank['no_rekening']; ?></span></p>
                    <p>Dan Upload Bukti Pembayaran Masing-Masing Barang Di <span class="text-success fw-bold"> Menu Transaksi Pesanan</span></p>
                    <?php foreach($keranjang as $k):  ?>
                        <?php $pembayaran = $this->db->get_where('bukti_pembayaran',['id_keranjang' => $k['id']])->result(); ?>
                        <?php foreach($pembayaran as $p): ?>
                            <img src="<?= base_url(); ?>assets/upload/<?= $p->bukti_pembayaran; ?>" alt="" srcset="" width="150" class="me-5">
                            <img src="<?= base_url(); ?>assets/upload/<?= $p->bukti_barang_sampai; ?>" alt="" srcset="" width="150" class="me-5">
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
