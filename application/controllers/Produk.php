<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Produk';

        $this->load->library('pagination');
        // Halaman Pagination
        $config['total_rows'] = $this->Model_Produk->hitung_produk();
        $config['base_url'] = 'http://localhost/buku-usaha/produk/';
        // Total Baris Pagination
        $config['per_page'] = 3;

        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI

        $data['start'] = $this->uri->segment(3);
        $data['produk'] = $this->Model_Produk->get_produk($config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('produk/index', $data);
        $this->load->view('template/footer');
    }

    // Kategori Index
    public function kategori()
    {
        $data['title'] = 'Kategori Produk';

        $this->load->library('pagination');
        // Halaman Pagination
        $config['total_rows'] = $this->Model_Produk->hitung_kategori();
        $config['base_url'] = 'http://localhost/buku-usaha/produk/kategori';
        // Total Baris Pagination
        $config['per_page'] = 3;

        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI

        $data['start'] = $this->uri->segment(3);
        $data['kategori'] = $this->Model_Produk->get_kategori($config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    // Tambah Kategori Produk
    public function tambah_kategori()
    {
        $data['title'] = 'Tambah Kategori Produk';
        $this->form_validation->set_rules(
            'nama_kat',
            'Nama Kategori',
            'trim|required|is_unique[kategori.nama]|regex_match[/^([a-z ])+$/i]',
            [
                'required' => "Nama Menu Harus Diisi",
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
            $this->Model_Produk->tambah_kategori();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> Tambah Kategori Produk
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('produk/kategori');
        }
    }

    // Hapus Kategori 
    public function hapus_kategori($id_kategori)
    {
        $this->Model_Produk->hapus_kategori($id_kategori);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Berhasil</strong> Hapus Kategori Produk 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('produk/kategori');
    }

    // Update Kategori
    public function update_kategori($id_kategori)
    {
        $data['title'] = 'Update Kategori Produk';
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
        $this->form_validation->set_rules(
            'nama_kat',
            'Nama Kategori',
            'trim|required|is_unique[kategori.nama]|regex_match[/^([a-z ])+$/i]',
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
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> Update Kategori Produk
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('produk/kategori');
        }
    }
}
