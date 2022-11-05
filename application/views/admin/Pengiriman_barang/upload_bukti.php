<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <h3>Upload Bukti Barang Sampai</h3>
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-6">
                        <!-- Form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Foto Bukti Barang Sampai</label><br>
                                <input class="form-control" name="gambar" type="file" id="gambar">
                            </div>
                            <a href="<?= base_url(); ?>Barang_terkirim" class="btn btn-danger">Kembali</a>
                            <button type="submit" name="upload_sampai" class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle">
                                Upload Bukti Pembayaran
                            </button>
                        </form>
                        <!-- End of Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>