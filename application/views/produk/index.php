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
                                <th scope="col" width="18%" class="text-center">Harga Beli</th>
                                <th scope="col" width="18%" class="text-center">Harga Jual</th>
                                <th scope="col" width="5%" class="text-center">Stock</th>
                                <th scope="col" class="text-center">Kategori</th>
                                <th scope="col" width="20%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $pr) : ?>
                                <tr>
                                    <th scope="row"><?= $start + 1; ?></th>
                                    <td><?= $pr['nama_barang']; ?></td>
                                    <td>Rp. <?= number_format($pr['hrg_beli'], 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($pr['hrg_jual'], 0, ',', '.') ?></td>
                                    <td class="text-center font-weight-bolder"><?= $pr['stock']; ?></td>
                                    <td>Speaker</td>
                                    <td class="text-center">
                                        <!-- Button Tambah Stock -->
                                        <a href="javascript:;" data-id_barang="<?= $pr['id_barang']; ?>" data-toggle="modal" data-target="#tambahstock">
                                            <button class=" btn btn-sm btn-light"><i class="fas fa-plus"></i></button>
                                        </a>
                                        <!-- Button Update -->
                                        <a href="<?= base_url(); ?>produk/hapus_produk/<?= $pr['id_barang']; ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <a href="#" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php $start++; ?>
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

<!-- Modal -->
<div class="modal fade mt-5" id="tambahstock" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Stock Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>produk/tambah_stock" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_barang" name="id_barang">
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



<!-- Modal Ubah -->
<!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data</h4>
            </div>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="hidden" id="id" name="id">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Tuliskan Alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tuliskan Pekerjaan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div> -->
<!-- END Modal Ubah -->
<script>
    $(document).ready(function() {
        $('#tambahstock').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget)
            var modal = $(this)
            modal.find('#id_barang').attr("value", div.data('id_barang'));
        });
    });
</script>