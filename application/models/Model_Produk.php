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

        $query = "SELECT `produk`.*, `kategori`.`nama_kategori` as kategori 
                FROM `produk` JOIN `kategori`
                ON `produk`.`kategori_id` = `kategori`.`id_kategori`
                ORDER BY `produk`.`id_produk` DESC LIMIT  $start, $limit";
        return $this->db->query($query)->result_array();
    }

    public function data_kategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    // Tambah Produk
    public function tambah_produk()
    {
        $data = [
            'nama_produk' => htmlspecialchars($this->input->post('nama')),
            'hrg_beli' => htmlspecialchars($this->input->post('harga_beli')),
            'hrg_jual' => htmlspecialchars($this->input->post('harga_jual')),
            'kategori_id' => $this->input->post('kategori'),
            'stock' => 0
        ];

        $this->db->insert('produk', $data);
    }

    public function tambah_stock($add_stock)
    {

        $id = $this->input->post('id_produk');

        $data_stock['jumlah'] = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
        $stock_now = $data_stock['jumlah']['stock'];
        $data = [
            'stock' => $stock_now + $add_stock
        ];

        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }

    // Hapus Produk

    public function hapus_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }

    // Update Produk
    public function ambil_produk($id_produk)
    {
        $query = "SELECT *
                FROM `produk` JOIN `kategori`
                ON `produk`.`kategori_id` = `kategori`.`id_kategori` 
                WHERE produk.id_produk = $id_produk";
        return $this->db->query($query)->row_array();
    }

    public function ambil_kat_produk($id_produk)
    {
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        $id_kategori = $data['produk']['kategori_id'];
        $query = "SELECT * FROM kategori WHERE id_kategori != $id_kategori";
        return $this->db->query($query)->result_array();
    }


    public function update_produk($id_produk)
    {
        $data = [
            'nama_produk' => htmlspecialchars($this->input->post('nama')),
            'hrg_beli' => htmlspecialchars($this->input->post('harga_beli')),
            'hrg_jual' => htmlspecialchars($this->input->post('harga_jual')),
            'kategori_id' => $this->input->post('kategori')
        ];

        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
    }
    // Bagian Kategori
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
            'nama_kategori' => htmlspecialchars($this->input->post('nama_kat'))
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
            'nama_kategori' => htmlspecialchars($this->input->post('nama_kat'))
        ];

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }
}
