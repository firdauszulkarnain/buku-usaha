<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Keuangan extends CI_Model
{
    public function hitung_pembelian()
    {
        return $this->db->get('pembelian')->num_rows();
    }
    public function get_pembelian($limit, $start)
    {
        if (!$start)
            $start = 0;

        $query = "SELECT `pembelian`.`id_pembelian`, SUM(`pembelian`.`total_beli`) as total_beli, SUM(`pembelian`.`unit`) as unit , `pembelian`.`tanggal_beli` as tanggal_beli, `produk`.`nama_produk` as produk
                FROM pembelian JOIN produk
                ON `pembelian`.`produk_id` = `produk`.`id_produk`
                GROUP BY produk, DAY(`pembelian`.`tanggal_beli`)
                ORDER BY `pembelian`.`id_pembelian` DESC LIMIT  $start, $limit";
        return $this->db->query($query)->result_array();
    }

    public function ambil_produk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function hitung_penjualan()
    {
        return $this->db->get('penjualan')->num_rows();
    }

    public function get_penjualan($limit, $start)
    {
        if (!$start)
            $start = 0;

        $query = "SELECT `penjualan`.`id_penjualan`,  SUM(`penjualan`.`total_untung`) as total_untung, SUM(`penjualan`.`unit`) as unit , `penjualan`.`tanggal_jual` as tanggal_jual, `produk`.`nama_produk` as produk
                FROM penjualan JOIN produk
                ON `penjualan`.`produk_id` = `produk`.`id_produk`
                  GROUP BY produk, DAY(`penjualan`.`tanggal_jual`)
                ORDER BY `penjualan`.`id_penjualan` DESC LIMIT  $start, $limit";
        return $this->db->query($query)->result_array();
    }


    public function tambah_penjualan()
    {
        $id_produk = $this->input->post('produk');
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        $harga_jual = $data['produk']['hrg_jual'];
        $harga_beli = $data['produk']['hrg_beli'];
        $laba_bersih = $harga_jual - $harga_beli;
        $unit = $this->input->post('unit');
        $data = [
            'produk_id' => $id_produk,
            'unit' => $unit,
            'total_untung' => $laba_bersih * $unit,
            'tanggal_jual' => date('Y-m-d')
        ];

        $this->db->insert('penjualan', $data);
    }
}
