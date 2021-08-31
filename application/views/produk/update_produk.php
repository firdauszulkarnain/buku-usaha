<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" autocomplete="off" placeholder="Masukan Nama Produk..." value="<?= $produk['nama_produk']  ?>">
                                <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-row">
                                <div class="form-group col-md-6">
                                    <label for="harga_beli">Harga Beli Produk (Rp)</label>
                                    <input type="text" class="form-control uang" id="harga_beli" name="harga_beli" autocomplete="off" placeholder="Masukan Harga Beli Produk..." value="<?= number_format($produk['hrg_beli'], 0, ',', '.') ?>">
                                    <?= form_error('harga_beli', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class=" form-group col-md-6">
                                    <label for="harga_jual">Harga Jual Produk (Rp)</label>
                                    <input type="text" class="form-control uang" id="harga_jual" name="harga_jual" autocomplete="off" placeholder="Masukan Harga Jual Produk..." value="<?= number_format($produk['hrg_jual'], 0, ',', '.') ?>">
                                    <?= form_error('harga_jual', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="kategori">Kategori Produk</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option value="<?= $produk['kategori_name'] ?>"><?= $produk['kategori_name'] ?></option>
                                    <?php foreach ($kategori as $kt) : ?>
                                        <option value="<?= $kt['nama_kategori'] ?>"><?= $kt['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kategori', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url(); ?>/produk/data_produk" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>