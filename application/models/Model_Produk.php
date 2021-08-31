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
    public function get_produk($user_id)
    {
        return $this->db->get_where('produk', ['user_id' => $user_id])->result_array();
    }

    public function data_kategori($user_id)
    {
        return $this->db->get_where('kategori', ['user_id' => $user_id])->result_array();
    }

    // Tambah Produk
    public function tambah_produk($user_id)
    {
        $jual = $this->input->post('harga_jual');
        $harga_jual = str_replace(".", "", $jual);
        $beli = $this->input->post('harga_beli');
        $harga_beli = str_replace(".", "", $beli);
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $this->input->post('kategori')])->row_array();
        $kategori_name = $data['kategori']['nama_kategori'];
        $data = [
            'nama_produk' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'hrg_beli' => $harga_beli,
            'hrg_jual' => $harga_jual,
            'kategori_name' => $kategori_name,
            'user_id' => $user_id,
            'stock' => 0
        ];

        $this->db->insert('produk', $data);
    }

    public function tambah_stock($user_id)
    {

        $id_produk = $this->input->post('id_produk');
        $add_stock = $this->input->post('stock');
        // Tambah Stock
        $data_produk['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        $stock_now = $data_produk['produk']['stock'];
        $jumlah_stock = $stock_now + $add_stock;
        var_dump($jumlah_stock);

        $data = [
            'stock' => $jumlah_stock
        ];

        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);

        // Beli Barang
        $hrg_beli = $data_produk['produk']['hrg_beli'];
        $produk_name = $data_produk['produk']['nama_produk'];
        $data_beli = [
            'produk_name' => $produk_name,
            'user_id' => $user_id,
            'unit' => $add_stock,
            'total_beli' => ($hrg_beli * $add_stock),
            'tanggal_beli' => date('Y-m-d')
        ];

        $this->db->insert('pembelian', $data_beli);
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
        $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
        return $this->db->query($query)->row_array();
    }

    public function ambil_kat_produk($id_produk, $user_id)
    {
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        $kategori_name = $data['produk']['kategori_name'];
        $query = "SELECT * FROM kategori WHERE user_id = $user_id && nama_kategori != '$kategori_name'";
        return $this->db->query($query)->result_array();
    }


    public function update_produk($id_produk)
    {
        $jual = $this->input->post('harga_jual');
        $harga_jual = str_replace(".", "", $jual);
        $beli = $this->input->post('harga_beli');
        $harga_beli = str_replace(".", "", $beli);
        $data = [
            'nama_produk' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'hrg_beli' => $harga_beli,
            'hrg_jual' => $harga_jual,
            'kategori_name' => $this->input->post('kategori')
        ];

        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
    }
    // Bagian Kategori

    // Ambil Data Kategori Produk
    public function get_kategori($user_id)
    {
        return $this->db->get_where('kategori', ['user_id' => $user_id])->result_array();
    }

    // Tambah Kategori Produk
    public function tambah_kategori($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'nama_kategori' => htmlspecialchars(ucwords($this->input->post('nama_kat')))
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
            'nama_kategori' => htmlspecialchars(ucwords($this->input->post('nama_kat')))
        ];

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }
}
