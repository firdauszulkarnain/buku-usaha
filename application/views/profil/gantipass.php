<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-8 mt-3">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="card">
                    <div class="card-body mb-3">
                        <form action="<?= base_url() ?>profil/ganti_password" method="POST">
                            <div class="row mb-1">
                                <div class="col-md-6 text-center">
                                    <span class="badge badge-light rounded-circle mt-5"><img src="<?= base_url() ?>assets/img/shop.png" alt="" width="200"></span>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="old_password">Password Lama</label>
                                        <input type="password" class="form-control" id="old_password" name="old_password" autocomplete="off">
                                        <?php if ($this->session->flashdata('old_password')) : ?>
                                            <small class="form-text text-danger"><?= $this->session->flashdata('old_password'); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password1">Password Baru</label>
                                        <input type="password" class="form-control" id="new_password1" name="new_password1" autocomplete="off">
                                        <?= form_error('new_password1', '<small class="form-text text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password2">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="new_password2" name="new_password2" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="<?= base_url() ?>profil">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
    </section>
</div>