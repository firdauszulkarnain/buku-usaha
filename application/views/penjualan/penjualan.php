<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <a href="<?= base_url()  ?>keuangan/tambah_penjualan" class="btn btn-primary mb-3">
                    Tambah Penjualan Produk
                </a>

                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded" id="tabel-keuangan">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Produk</th>
                            <th scope="col" width="5%" class="text-center">Unit</th>
                            <th scope="col" width="18%" class="text-center">Keuntungan (Rp)</th>
                            <th scope="col" width="15%" class="text-center">Tanggal Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penjualan as $pj) : ?>
                            <tr>
                                <td class="text-capitalize"><?= $pj['produk_name']; ?>
                                    <span class="badge badge-light float-right"><?= $pj['input'] ?>x Penjualan</span>
                                </td>
                                <td class="text-center"><?= $pj['unit']; ?></td>
                                <td class="text-center"><?= number_format($pj['total_untung'], 0, ',', '.') ?></td>
                                <td class="text-center font-weight-bolder"><?= $pj['tanggal_jual']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-primary btn-lg text-light font-weight-bolder" href="<?= base_url()  ?>keuangan/penjualanToPdf">PDF FILE</a>
            </div>
        </div>
    </section>
</div>