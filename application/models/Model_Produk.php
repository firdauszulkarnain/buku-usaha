<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Produk extends CI_Model
{
    // Produk
    public function hitung_produk()
    {
        return $this->db->get('produk')->num_rows();
    }

    // Ambil Data Kategori Produk
    public function get_produk($limit, $start)
    {
        if (!$start)
            $start = 0;
        return $this->db->get('produk', $limit, $start)->result_array();
    }

    public function data_kategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    // Tambah Produk
    public function tambah_produk()
    {
        $data = [
            'nama_barang' => htmlspecialchars($this->input->post('nama')),
            'hrg_beli' => htmlspecialchars($this->input->post('harga_beli')),
            'hrg_jual' => htmlspecialchars($this->input->post('harga_jual')),
            'kategori_id' => $this->input->post('kategori'),
            'stock' => 0
        ];

        $this->db->insert('produk', $data);
    }

    public function tambah_stock($add_stock)
    {

        $id = $this->input->post('id_barang');
        $data_stock['jumlah'] = $this->db->get_where('produk', ['id_barang' => $id])->row_array();
        $stock_now = $data_stock['jumlah']['stock'];
        $data = [
            'stock' => $stock_now + $add_stock
        ];

        $this->db->where('id_barang', $id);
        $this->db->update('produk', $data);
    }

    public function hitung_kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }

    // Ambil Data Kategori Produk
    public function get_kategori($limit, $start)
    {
        if (!$start)
            $start = 0;
        return $this->db->get('kategori', $limit, $start)->result_array();
    }

    // Tambah Kategori Produk
    public function tambah_kategori()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama_kat'))
        ];

        $this->db->insert('kategori', $data);
    }

    // Hapus Kategori Produk

    public function hapus_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }

    public function update_kategori($id_kategori)
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama_kat'))
        ];

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }
}
