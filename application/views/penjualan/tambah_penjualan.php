<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?= $this->session->flashdata('error'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="produk">Produk Terjual</label>
                                <select class="form-control text-capitalize" id="produk" name="produk">
                                    <option disabled selected>Pilih Produk</option>
                                    <?php foreach ($produk as $pr) : ?>
                                        <option value="<?= $pr['id_produk']; ?>" class="text-capitalize"><?= $pr['nama_produk']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('produk', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="unit">Jumlah Unit Terjual</label>
                                <input type="number" class="form-control" id="unit" name="unit" autocomplete="off" placeholder="Masukan Unit Terjual.." value="<?= set_value('unit');  ?>">
                                <?= form_error('unit', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url(); ?>keuangan/penjualan" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>