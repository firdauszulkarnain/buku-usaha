<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function penjualan()
    {
        $data['title'] = 'Penjualan Produk';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('penjualan/penjualan', $data);
        $this->load->view('template/footer');
    }

    public function pembelian()
    {
        $data['title'] = 'Pembelian Produk';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pembelian/pembelian', $data);
        $this->load->view('template/footer');
    }
}
