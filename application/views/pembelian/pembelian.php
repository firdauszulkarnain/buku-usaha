<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded" id="tabel-keuangan">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Produk</th>
                            <th scope="col" width="5%" class="text-center">Unit</th>
                            <th scope="col" width="15%" class="text-center">Total Dana (Rp) </th>
                            <th scope="col" width="15%" class="text-center">Tanggal Beli</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pembelian as $pb) : ?>
                            <tr>
                                <td class="text-capitalize"><?= $pb['produk_name']; ?></td>
                                <td class="text-center"><?= $pb['unit']; ?></td>
                                <td class="text-center"><?= number_format($pb['total_beli'], 0, ',', '.') ?></td>
                                <td class="text-center font-weight-bolder"><?= $pb['tanggal_beli']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-primary btn-lg text-light font-weight-bolder" href="<?= base_url()  ?>keuangan/pembelianToPdf">PDF FILE</a>
            </div>
    </section>
</div>