<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2021 Firdaus Zulkarnain</a>
  </div>
</footer>
</div>
</div>

<!-- JQuery -->
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- JQUERY MASKING UANG -->
<script src="<?= base_url() ?>/assets/js/jquery.mask.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

<!-- JS Libraies
<script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

<!-- Template JS File -->
<script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
<script src="<?= base_url(); ?>/assets/js/custom.js"></script>
<script src="<?= base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url(); ?>/assets/js/page/index.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>





<script>
  // Update Modal
  $(document).ready(function() {
    $('#tambahstock').on('show.bs.modal', function(event) {
      var div = $(event.relatedTarget)
      var modal = $(this)
      modal.find('#id_produk').attr("value", div.data('id_produk'));
    });

    // Masking Uang
    // Format mata uang.
    $('.uang').mask('000.000.000', {
      reverse: true
    });
  });


  const flashData = $('.flash-data').data('flashdata');
  const title = $('title').text();
  console.log(flashData);

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
</script>
</body>

</html>