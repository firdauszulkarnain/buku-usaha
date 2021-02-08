<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <?= $this->session->flashdata('pesan'); ?>
                <a href="<?= base_url(); ?>produk/tambah_kategori" class="btn btn-primary mb-3">
                    Tambah Kategori
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" width="10%" class="text-center">No</th>
                                <th scope="col" width="70%" class="text-center">Nama Kategori</th>
                                <th scope="col" width="20%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $kt) : ?>
                                <tr>
                                    <th scope="row"><?= 1 + $start; ?></th>
                                    <td class="text-capitalize"><?= $kt['nama_kategori']; ?></td>
                                    <td class="text-center">
                                        <!-- Button Update -->
                                        <a href="<?= base_url(); ?>/produk/update_kategori/<?= $kt['id_kategori'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <a href="<?= base_url(); ?>/produk/hapus_kategori/<?= $kt['id_kategori'] ?>" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
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