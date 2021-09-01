<html><head>
  <title></title>
  <style>
    h1 {
      font-family: Arial;
      text-transform: uppercase;
      font-weight: 400;
      margin-top: 10px;
      text-align: center;
      color: black
    }
    p {
      color: black;
      font-family: Arial;
      font-weight: 400;
    }
    .total {
      text-align: right;
      margin-right: 20px;
    }
    .text {
      font-size: 16px;
    }
    .harga {
      font-size: 24px;
      margin-top: -15px;
    }
    .bulan {
      text-align: center;
      margin-top: 0px;
      font-size: 20px;
    }
    hr {
      width: 50%;
      margin-top: -10px;
    }
    #tabel {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }
    #tabel td,
    #tabel th {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    #tabel th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #6777EF;
      color: white;
    }
  </style>
</head><body>
  <h1>Data Penjualan</h1>
  <hr size="1px">
  <p class="bulan"><?= $bulan; ?> 2021</p>
  <table id="tabel">
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Unit</th>
      <th>Keuntungan (Rp)</th>
      <th>Tanggal Terjual</th>
    </tr>
    <?php $start = 0; ?>
    <?php foreach ($laporan as $lp) : ?>
      <tr>
        <td><?= $start + 1; ?></td>
        <td><?= $lp['produk_name']; ?></td>
        <td><?= $lp['unit']; ?></td>
        <td><?= number_format($lp['total_untung'], 0, ',', '.') ?></td>
        <td><?= $lp['tanggal_jual']; ?></td>
      </tr>
      <?php $start++; ?>
    <?php endforeach; ?>
  </table>
  <div class="total">
    <p class="text">Total Penjualan <?= $bulan; ?> <?= $tahun ?></p>
    <p class="harga">Rp. <?= number_format($total['total_untung'], 0, ',', '.') ?></p>
  </div>
</body></html>