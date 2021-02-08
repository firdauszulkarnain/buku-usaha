<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url(); ?>/produk/tambah_produk">
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" autocomplete="off" placeholder="Masukan Nama Produk..." value="<?= set_value('nama');  ?>">
                                <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-row">
                                <div class="form-group col-md-6">
                                    <label for="harga_beli">Harga Beli Produk (Rp)</label>
                                    <input type="text" class="form-control uang" id="harga_beli" name="harga_beli" autocomplete="off" placeholder="Masukan Harga Beli Produk..." value="<?= set_value('harga_beli');  ?>">
                                    <?= form_error('harga_beli', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class=" form-group col-md-6">
                                    <label for="harga_jual">Harga Jual Produk (Rp)</label>
                                    <input type="text" class="form-control uang" id="harga_jual" name="harga_jual" autocomplete="off" placeholder="Masukan Harga Jual Produk..." value="<?= set_value('harga_jual');  ?>">
                                    <?= form_error('harga_jual', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="kategori">Kategori Produk</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option disabled selected>Pilih Kategori Produk</option>
                                    <?php foreach ($kategori as $kt) : ?>
                                        <option value="<?= $kt['id_kategori'] ?>"><?= $kt['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kategori', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url(); ?>produk/data_produk" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>