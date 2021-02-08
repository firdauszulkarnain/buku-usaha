<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <?= $this->session->flashdata('pesan'); ?>
                <a href="<?= base_url(); ?>produk/tambah_produk" class="btn btn-lg btn-primary mb-3 font-weight-bold">
                    Tambah Produk
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" width="5%" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" width="15%" class="text-center">Harga Beli (Rp)</th>
                                <th scope="col" width="15%" class="text-center">Harga Jual (Rp)</th>
                                <th scope="col" width="5%" class="text-center">Stock</th>
                                <th scope="col" class="text-center">Kategori</th>
                                <th scope="col" width="20%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $pr) : ?>
                                <tr>
                                    <th scope="row"><?= $start + 1; ?></th>
                                    <td class="text-capitalize"><?= $pr['nama_produk']; ?></td>
                                    <td class="text-center"><?= number_format($pr['hrg_beli'], 0, ',', '.') ?></td>
                                    <td class="text-center"><?= number_format($pr['hrg_jual'], 0, ',', '.') ?></td>
                                    <td class="text-center font-weight-bolder"><?= $pr['stock']; ?></td>
                                    <td class="text-center"><?= $pr['kategori']; ?></td>
                                    <td class="text-center">
                                        <!-- Button Tambah Stock -->
                                        <a href="javascript:;" data-id_produk="<?= $pr['id_produk']; ?>" data-toggle="modal" data-target="#tambahstock">
                                            <button class=" btn btn-sm btn-light"><i class="fas fa-plus"></i></button>
                                        </a>
                                        <!-- Button Update -->
                                        <a href="<?= base_url(); ?>produk/update_produk/<?= $pr['id_produk']; ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <a href="<?= base_url(); ?>produk/hapus_produk/<?= $pr['id_produk']; ?>" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php $start++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="float-right mt-2">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade mt-5" id="tambahstock" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm mt-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Stock Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>produk/tambah_stock" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_produk" name="id_produk">
                    <div class="form-group">
                        <label for="stock">Stock Produk</label>
                        <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="Masukan stock Produk...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>