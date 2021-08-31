<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
  <section class="section">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary text-light font-weight-bold">
            Rp.
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 style="font-size: 12px;">Laba Bersih - <span class="text-primary"><?= $bulan ?></span></h4>
            </div>
            <div class="card-body">
              <?= number_format($total_bulan['total_bulan'], 0, ',', '.') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-shopping-bag"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 style="font-size: 12px;">Total Jual - <span class="text-primary"><?= $bulan ?></span></h4>
            </div>
            <div class="card-body">
              <?= $jual['total_jual']; ?>x
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary text-light font-weight-bold">
            Rp.
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 style="font-size: 12px;">Laba Bersih - <span class="text-primary"><?= date('Y') ?></span></h4>
            </div>
            <div class="card-body">
              <?= number_format($total_tahun['total_tahun'], 0, ',', '.') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>