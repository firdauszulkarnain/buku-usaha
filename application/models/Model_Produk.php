<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Produk extends CI_Model
{
    public function hitungdata()
    {
        return $this->db->get('kategori')->num_rows();
    }

    // Ambil Data Kategori Produk
    public function getkategori($limit, $start)
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
