<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nama_kat">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kat" name="nama_kat" autocomplete="off" value="<?= $kategori['nama']; ?>">
                                <?= form_error('nama_kat', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url(); ?>/produk/kategori" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>