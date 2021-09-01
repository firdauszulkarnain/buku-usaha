<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function data_produk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Data Produk';
        $data['produk'] = $this->Model_Produk->get_produk($user_id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('produk/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_produk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Data Produk';
        $data['kategori'] = $this->Model_Produk->data_kategori($user_id);

        $this->form_validation->set_rules(
            'nama',
            'Nama Produk',
            'trim|required|is_unique[produk.nama_produk]|regex_match[/^([-a-z0-9_ ])+$/i]',
            [
                'required' => "Nama Menu Harus Diisi",
                'is_unique' => "Nama Kategori Sudah Ada",
                'regex_match' => "Karakter Inputan Salah"
            ]

        );

        $this->form_validation->set_rules(
            'harga_beli',
            'Harga Beli',
            'trim|required|numeric|min_length[4]',
            [
                'required' => "Harga Beli Harus Diisi",
                'numeric' => "Inputan Hanya Menerima Karakter Angka",
                'min_length' => "Minimal Harga Rp. 1.000.-"
            ]
        );
        $this->form_validation->set_rules(
            'harga_jual',
            'Harga Jual',
            'trim|required|numeric|min_length[4]',
            [
                'required' => "Harga Jual Harus Diisi",
                'numeric' => "Inputan Hanya Menerima Karakter Angka",
                'min_length' => "Minimal Harga Rp. 1.000.-"
            ]
        );
        $this->form_validation->set_rules(
            'kategori',
            'kategori',
            'required',
            [
                'required' => "Kategori Harus Diisi",
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('produk/tambah_produk', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Produk->tambah_produk($user_id);
            $this->session->set_flashdata('pesan', 'Tambah Produk');
            redirect('produk/data_produk');
        }
    }

    // Tambah Stock Produk
    public function tambah_stock()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $this->form_validation->set_rules(
            'stock',
            'Stock',
            'required',
            [
                'required' => "Kategori Harus Diisi",
            ]
        );
        if ($this->form_validation->run() == false) {
            redirect('produk/data_produk');
        } else {
            $this->Model_Produk->tambah_stock($user_id);
            $this->session->set_flashdata('pesan', 'Tambah Stock Produk');
            redirect('produk/data_produk');
        }
    }

    // Hapus Produk
    public function hapus_produk($id_produk)
    {
        $this->Model_Produk->hapus_produk($id_produk);
        $this->session->set_flashdata('pesan', 'Hapus Produk');
        redirect('produk/data_produk');
    }

    public function update_produk($id_produk)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Update Produk';
        $data['produk'] = $this->Model_Produk->ambil_produk($id_produk);
        $data['kategori'] = $this->Model_Produk->ambil_kat_produk($id_produk, $user_id);
        $this->form_validation->set_rules(
            'nama',
            'Nama Produk',
            'trim|required|regex_match[/^([-a-z0-9_ ])+$/i]',
            [
                'required' => "Nama Menu Harus Diisi",
                'regex_match' => "Karakter Inputan Salah"
            ]

        );

        $this->form_validation->set_rules(
            'harga_beli',
            'Harga Beli',
            'trim|required|numeric|min_length[4]',
            [
                'required' => "Harga Beli Harus Diisi",
                'numeric' => "Inputan Hanya Menerima Karakter Angka",
                'min_length' => "Minimal Harga Rp. 1.000.-"
            ]
        );
        $this->form_validation->set_rules(
            'harga_jual',
            'Harga Jual',
            'trim|required|numeric|min_length[4]',
            [
                'required' => "Harga Jual Harus Diisi",
                'numeric' => "Inputan Hanya Menerima Karakter Angka",
                'min_length' => "Minimal Harga Rp. 1.000.-"
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('produk/update_produk', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Produk->update_produk($id_produk);
            $this->session->set_flashdata('pesan', 'Update Produk');
            redirect('produk/data_produk');
        }
    }

    // Kategori Index
    public function kategori()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Kategori Produk';
        $data['kategori'] = $this->Model_Produk->get_kategori($user_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    // Tambah Kategori Produk
    public function tambah_kategori()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Kategori Produk';
        $this->form_validation->set_rules(
            'nama_kat',
            'Nama Kategori',
            'trim|required|is_unique[kategori.nama_kategori]|regex_match[/^([a-z ])+$/i]',
            [
                'required' => "Nama Kategori Harus Diisi",
                'is_unique' => "Nama Kategori Sudah Ada",
                'regex_match' => "Inputan Hanya Menerima Karakter Huruf"
            ]

        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('kategori/tambah_kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Produk->tambah_kategori($user_id);
            $this->session->set_flashdata('pesan', 'Tambah Kategori Produk');
            redirect('produk/kategori');
        }
    }

    // Hapus Kategori 
    public function hapus_kategori($id_kategori)
    {
        $this->Model_Produk->hapus_kategori($id_kategori);
        $this->session->set_flashdata('pesan', 'Hapus Kategori Produk ');
        redirect('produk/kategori');
    }

    // Update Kategori
    public function update_kategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Update Kategori Produk';
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
        $this->form_validation->set_rules(
            'nama_kat',
            'Nama Kategori',
            'trim|required|is_unique[kategori.nama_kategori]|regex_match[/^([a-z ])+$/i]',
            [
                'required' => "Nama Menu Harus Diisi",
                'is_unique' => "Nama Kategori Sudah Ada",
                'regex_match' => "Inputan Hanya Menerima Karakter Huruf"
            ]

        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('kategori/update_kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Produk->update_kategori($id_kategori);
            $this->session->set_flashdata('pesan', 'Update Kategori Produk');
            redirect('produk/kategori');
        }
    }
}
