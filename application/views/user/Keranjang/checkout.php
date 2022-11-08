<div class="container container-profil">
        <div class="bg-ligt">
            <div class="card shadow py-4">
                <div class="card-body ms-5">
                    <h4 class="mb-3">Checkout</h4>
                    <form action="" method="POST">
                        <div class="mb-1 col-lg-10">
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="username" id="nama" class="form-control"
                                    aria-label="default input example" value="<?= queryUser('username'); ?>" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nohp">No.Handphone</label>
                                <input type="text" name="" id="nohp" class="form-control"
                                    aria-label="default input example" value="<?= queryUser('no_hp'); ?>" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input class="form-control" name="alamat"  value="<?= queryUser('alamat'); ?>"
                                    id="alamat" aria-label="Disabled input example" disabled></input>
                            </div>
                            <h5>Pilih Motode Pembayaran</h5>
                            <?php foreach($pembayaran as $row): ?>
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="bank" type="checkbox" value="<?= $row['id']; ?>" id="BRI">
                                <label class="form-check-label ts-1" for="BRI">
                                    <?= $row['metode_pembayaran']; ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                            <?=form_error('bank','<small class="text-danger ms-3">','</small>'); ?>
                            <div class="mb-3">
                                <label for="no_rek">Nomor Rekning</label>
                                <input type="number" name="no_rek" id="nama" class="form-control"
                                    aria-label="default input example" value="<?= queryUser('username'); ?>">
                                    <?=form_error('no_rek','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                            <h5>Pilih Kurir</h5>
                            <?php foreach($kurir as $row): ?>
                            <div class="form-check mb-3 form-kurir">
                                <input class="form-check-input" type="checkbox" value="<?= $row['id']; ?>" name="kurir" id="<?= $row['kurir']; ?>">
                                <label class="form-check-label ts-1" for="<?= $row['kurir']; ?>">
                                    <?= $row['kurir']; ?> : <?= 'Rp.' . number_format($row['ongkir'], 2, ",", "."); ?>
                                </label>  
                            </div>
                            <?php endforeach; ?>
                            <?=form_error('kurir','<small class="text-danger ms-3">','</small>'); ?>
                            <!-- <h5>Pilih Paket Expedisi</h5>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="Paket Kilat" id="paket-kilat-khusus">
                                <label class="form-check-label ts-1" for="paket-kilat-khusus">
                                    Paket Kilat Khusus <span class="text-success fw-bold">Rp.17.000</span> Ekstenasi Pengiriman 2-3 Hari
                                </label>
                                
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="Paket Kilat" id="paket-kilat-khusus">
                                <label class="form-check-label ts-1" for="paket-kilat-khusus">
                                    Express Day Barang <span class="text-success fw-bold">Rp.36.000</span> Ekstenasi Pengiriman 1 Hari
                                </label>
                            </div> -->
                        </div>

                        <div class="mb-3">
                                <label for="catatanpembelian" class="form-label">Catatan Pembelian</label>
                                <textarea class="form-control" name="catatan_pembelian"
                                    id="catatanpembelian" rows="3"></textarea>
                                    <?=form_error('catatan_pembelian','<small class="text-danger ms-3">','</small>'); ?>
                            </div>
                        <!-- <a href="profil.html" class="btn btn-danger">Kembali</a> -->
                        <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>