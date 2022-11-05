<div class="container container-profil">
    <div class="bg-ligt">
        <div class="card p-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-1 col-lg-5">
                    <div class="mb-3">
                        <label for="bukti_pembayaran">Upload Pembayaran</label>
                        <input type="file" required name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" aria-label="default input example">
                    </div>
                </div>
                <a href="<?= base_url(); ?>Pesanan/transaksi_pesanan" class="btn btn-danger">Kembali</a>
                <button type="submit" name="upload_pembayaran" class="btn btn-success">Upload Pembayaran</button>
            </form>
        </div>
    </div>
</div>