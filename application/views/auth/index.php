<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='<?= base_url(); ?>/assets/img/icon/favicon.ico' rel='shortcut icon'>
    <title>Login Buku Usaha</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-8 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">LOGIN BUKU USAHA</h1>
                            </div>
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> <?= $this->session->flashdata('error'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <form class="user" method="POST" action="<?= base_url('auth') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" autocomplete="off" value="<?= set_value('username');  ?>">
                                    <?= form_error('username', '<small class="form-text text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" autocomplete="off">
                                    <?= form_error('password', '<small class="form-text text-danger pl-3">', '</small>') ?>
                                </div>
                                <button class="btn btn-info btn-user btn-block" type="submit">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <p class="small">Belum Punya Akun? Silahkan <a href="<?= base_url('auth/registrasi') ?>" class="text-decoration-none text-info"><b>Registrasi</b> </a></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/js/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <!-- 
    <script src="<?= base_url(); ?>assets/js/myjs.js"></script> -->

    <script>
        $(document).ready(function() {
            const flashData = $('.flash-data').data('flashdata');
            if (flashData) {
                Swal.fire({
                    title: 'Berhasil ' + flashData,
                    text: '',
                    icon: 'success'
                });
            }
        })
    </script>
</body>

</html>