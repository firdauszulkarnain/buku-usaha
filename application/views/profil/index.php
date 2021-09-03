<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-8 mt-3">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="card">
                    <div class="card-body mb-3">
                        <form action="<?= base_url() ?>profil" method="POST">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <span class="badge badge-light rounded-circle mt-5"><img src="<?= base_url() ?>assets/img/shop.png" alt="" width="200"></span>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" disabled id="username" value="<?= $user['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaUsaha">Nama Usaha</label>
                                        <input type="text" class="form-control" id="namaUsaha" name="namaUsaha" value="<?= $user['namaUsaha'] ?>" autocomplete="off">
                                        <?= form_error('namaUsaha', '<small class="form-text text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <a class="btn btn-primary" href="<?= base_url() ?>profil/ganti_password">Ganti Password</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
    </section>
</div>