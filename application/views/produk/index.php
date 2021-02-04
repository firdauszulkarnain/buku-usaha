<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Harga Beli</th>
                                <th scope="col" class="text-center">Harga Jual</th>
                                <th scope="col" class="text-center">Stock</th>
                                <th scope="col" class="text-center">Kategori</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $pr) : ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?= $pr['nama_barang']; ?></td>
                                    <td>Rp. <?= number_format($pr['hrg_beli'], 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($pr['hrg_jual'], 0, ',', '.') ?></td>
                                    <td class="text-center font-weight-bolder"><?= $pr['stock']; ?></td>
                                    <td>Speaker</td>
                                    <td class="text-center">
                                        <!-- Button Tambah Stock -->
                                        <a href="#" class="btn btn-sm btn-light"><i class="fas fa-plus"></i></a>
                                        <!-- Button Update -->
                                        <a href="#" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <a href="#" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>