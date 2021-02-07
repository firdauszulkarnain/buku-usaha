<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#staticBackdrop">
                    Tambah Penjualan Produk
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded">
                        <thead>
                            <tr>
                                <th scope="col" width="5%" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama Produk</th>
                                <th scope="col" width="5%" class="text-center">Unit</th>
                                <th scope="col" width="15%" class="text-center">Total Untung</th>
                                <th scope="col" width="15%" class="text-center">Tanggal Terjual</th>
                                <th scope="col" width="20%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Penjualan Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="produk">Produk Terjual</label>
                        <select class="form-control" id="produk" name="produk">
                            <option disabled selected>Pilih Produk</option>
                            <?php foreach ($produk as $pr) : ?>
                                <option value="<?= $pr['produk_id']; ?>"><?= $pr['nama_produk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">Jumlah Unit Terjual</label>
                        <input type="number" class="form-control" id="unit" name="unit" autocomplete="off" placeholder="Masukan Unit Terjual..">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>