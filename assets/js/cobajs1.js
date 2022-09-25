$('.tombol-hapus-kategori').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success ms-3',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: 'Apa Anda Serius?',
    text: "Ingin Menghapus Data!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya, Hapus Data',
    cancelButtonText: 'Tidak, Batal!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
      swalWithBootstrapButtons.fire(
        'Hapus!',
        'Data Berhasil Dihapus.',
        'success'
      )
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Batal',
        'Data Batal Dihapus :)',
        'error'
      )
    }
  })
});

let flashData = $('.flash-data').data('flashdata');

if (flashData) {
  Swal.fire(
    'Berhasil',
    flashData,
    'success'
  )
}