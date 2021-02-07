<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function penjualan()
    {
        $data['title'] = 'Penjualan Produk';

        $data['produk'] = $this->Model_Keuangan->ambil_produk();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('penjualan/penjualan', $data);
        $this->load->view('template/footer');
    }

    public function pembelian()
    {
        $data['title'] = 'Pembelian Produk';
        // $data['pembelian'] = $this->Model_Produk->ambil_pembelian();

        $this->load->library('pagination');
        // Halaman Pagination
        $config['total_rows'] = $this->Model_Keuangan->hitung_pembelian();
        $config['base_url'] = 'http://localhost/buku-usaha/keuangan/pembelian';
        // Total Baris Pagination
        $config['per_page'] = 3;

        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI

        $data['start'] = $this->uri->segment(3);
        $data['pembelian'] = $this->Model_Keuangan->get_pembelian($config['per_page'], $data['start']);
        // END PAGINATION

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pembelian/pembelian', $data);
        $this->load->view('template/footer');
    }
}
