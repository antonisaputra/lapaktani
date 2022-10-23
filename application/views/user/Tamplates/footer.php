<footer>
    <div class="container">
        <div class="ikuti-kami">
            <div class="row">
                <div class="col-lg-9 py-3">
                    <div class="d-flex">
                        <img src="<?= base_url(); ?>assets/user/img/TONI.png" width="30" height="40px" class="d-inline-block align-text-top">
                        <p class="ms-3" id="name-brand">Lapak Tani</p>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <div class="d-flex flex-ikuti-kami">
                        <h5 class="fw-bold mt-1">Ikuti Kami</h5>
                        <a href="">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-lengkap">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4">Hubungi Kami</h5>
                    <p>Jl. Letjen Ibrahim Adje No. 122A, Bogor</p>
                    <p>Cs@lapaktani.com</p>
                    <p>Jam Layanan: 09.00-17.00 WIB</p>
                </div>
                <div class="col-lg-4 text-center panduan-umum">
                    <h5 class="fw-bold mb-4">Panduan Umum</h5>
                    <a href="tentang.html">
                        <p>Tentang lapak tani</p>
                    </a>
                    <a href="#">
                        <p>Panduan Lapak tani</p>
                    </a>
                </div>
                <div class="col-lg-4 text-end panduan-umum">
                    <h5 class="fw-bold mb-4">Pembelian</h5>
                    <a href="#">
                        <p>Cara pembelian di lapak tani</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer-copyright">
    <div class="container">
        <div class="copyright">
            <p class="text-center">Lapak Tani &copy; 2022</p>
        </div>
    </div>
</div>
<script>
    function sum(coba) {
        var txtFirstNumberValue = document.getElementById('banyak_barang').value;
        var result = parseInt(txtFirstNumberValue) * coba;
        if (!isNaN(result)) {
            var reverse = result.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            document.getElementById('harga_total').innerHTML = "Rp." + ribuan + ',00';
        }
    }
</script>
<script src="<?= base_url(); ?>assets/user/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?= base_url(); ?>assets/js/cobajs1.js"></script>
<script src="<?= base_url(); ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi_produk');
    CKEDITOR.replace('deskripsi_produk_penjualan');
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        })
    }
</script>
</body>

</html>