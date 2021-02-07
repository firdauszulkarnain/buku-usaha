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

        $query = "SELECT `pembelian`.*, `produk`.`nama_produk` as produk
                FROM pembelian JOIN produk
                ON `pembelian`.`produk_id` = `produk`.`id_produk`
                ORDER BY `pembelian`.`id_pembelian` DESC LIMIT  $start, $limit";
        return $this->db->query($query)->result_array();
    }

    public function ambil_produk()
    {
        return $this->db->get('produk')->result_array();
    }
}
