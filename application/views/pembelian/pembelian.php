<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <form action="<?= base_url() ?>keuangan/cariPembelian" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <select class="form-control" id="bulan" name="bulan">
                                        <?php
                                        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                        if ($this->session->userdata('bulanBeli')) {
                                            $bln = $this->session->userdata('bulanBeli') - 1;
                                            $temp = $this->session->userdata('bulanBeli');
                                        } else {
                                            $bln = date('n') - 1;
                                            $temp = date('n');
                                        }
                                        echo "<option value=$temp> $bulan[$bln] </option>";

                                        $nilai = count($bulan);
                                        for ($i = 0; $i < $nilai; $i += 1) {
                                            $j = $i + 1;
                                            if ($bulan[$i] != $bulan[$bln]) {
                                                echo "<option value=$j> $bulan[$i] </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <select class="form-control" id="tahun" name="tahun" title="Pilih Tahun">
                                        <?php
                                        if ($this->session->userdata('tahunBeli')) {
                                            $j = $this->session->userdata('tahunBeli');
                                        } else {
                                            $j = date('Y');
                                        }
                                        echo "<option value=$j> $j </option>";
                                        for ($i = 2021; $i <= date('Y') + 10; $i += 1) {
                                            if ($i != $j) {
                                                echo "<option value='$i'> $i </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 mt-1">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

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