<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-7">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <a href="<?= base_url(); ?>produk/tambah_kategori" class="btn btn-primary mb-3">
                    Tambah Kategori
                </a>

                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded" id="tabel-kategori">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Kategori</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $kt) : ?>
                            <tr>
                                <td class="text-capitalize"><?= $kt['nama_kategori']; ?></td>
                                <td class="text-center">
                                    <!-- Button Update -->
                                    <a href="<?= base_url(); ?>/produk/update_kategori/<?= $kt['id_kategori'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                    <!-- Button Hapus -->
                                    <!-- <a href="<?= base_url(); ?>/produk/hapus_kategori/<?= $kt['id_kategori'] ?>" class="btn btn-sm btn-danger text-light tombol-hapus"><i class="fas fa-trash-alt"></i></a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>