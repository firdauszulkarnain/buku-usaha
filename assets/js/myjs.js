$(document).ready(function() {
      // Update Modal
    $('#tambahstock').on('show.bs.modal', function(event) {
      var div = $(event.relatedTarget)
      var modal = $(this)
      modal.find('#id_produk').attr("value", div.data('id_produk'));
    });

    // Masking Uang
    // Format mata uang.
    $('.uang').mask('000.000.000.000', {
      reverse: true
    });

    //  Sweet Alert
  const flashData = $('.flash-data').data('flashdata');
  const title = $('title').text();
//   console.log(flashData);

  if (flashData) {
    Swal.fire({
      title: title,
      text: 'Berhasil ' + flashData,
      icon: 'success'
    });
  }

  $('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
      title: 'Yakin Hapus Data',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus Data!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    })
  });

//   Tabel Kategori
  $('#tabel-kategori').DataTable({
      responsive: true,
        "lengthMenu": [
        [5, 10, 25, 50],
        [5, 10, 25, 50]
    ],
     "columnDefs": [{
        "searchable": false,
        "orderable": false,
        "targets": 1
      }]
    });

//   Tabel Produk
    $('#tabel-produk').DataTable({
      responsive: true,
      "lengthMenu": [
      [5, 10, 25, 50],
      [5, 10, 25, 50]
    ],
     "columnDefs": [{
        "searchable": false,
        "orderable": false,
        "targets": 5,
      }]
    });
    //   Tabel Produk
    $('#tabel-keuangan').DataTable({
      responsive: true,
      "lengthMenu": [
      [5, 10, 25, 50],
      [5, 10, 25, 50]
    ]
    });

    
  });


