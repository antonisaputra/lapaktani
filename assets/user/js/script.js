$('.tombol-checkout').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn ms-2 btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Apa Anda Yakin ?',
        text: "Pastikan Data Yang Dimasukkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Checkout sekarang!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
                'Checkout!',
                'Data Berhasil Checkout',
                'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Batal!',
                'Checkout Dibatalkan',
                'error'
            )
        }
    });
});

$('.tombol-hapus-keranjang').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apa Anda Yakin',
        text: "Barang Dikeranjang Dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    });
});

$('.btn-beli-langsung').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn ms-2 btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Apa Anda Yakin ?',
        text: "Barang Langsung Dibeli!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Beli sekarang!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
                'Ya!',
                'Barang Langsung Dibeli',
                'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Batal!',
                'Barang Tidak Langsung Dibeli',
                'error'
            )
        }
    });
});