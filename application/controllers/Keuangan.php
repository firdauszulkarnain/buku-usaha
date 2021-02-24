<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function penjualan()
    {
        $data['title'] = 'Penjualan Produk';
        $data['penjualan'] = $this->Model_Keuangan->get_penjualan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('penjualan/penjualan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_penjualan()
    {
        $data['title'] = 'Tambah Data Penjualan Produk';
        $data['produk'] = $this->Model_Keuangan->ambil_produk();
        $this->form_validation->set_rules('produk', 'Produk', 'required', [
            'required' => 'Pilih Salah Satu Produk'
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'required|max_length[2]|greater_than[0]', [
            'required' => 'Unit Terjual Harus Diisi',
            'max_length' => 'Maksimal Unit Terjual Adalah 99',
            'greater_than' => 'Minimal Unit Terjual Adalah 1'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('penjualan/tambah_penjualan', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Keuangan->tambah_penjualan();
            $this->session->set_flashdata('pesan', 'Tambah Data Penjualan');
            redirect('keuangan/penjualan');
        }
    }

    public function pembelian()
    {
        $data['title'] = 'Pembelian Produk';
        $data['pembelian'] = $this->Model_Keuangan->get_pembelian();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pembelian/pembelian', $data);
        $this->load->view('template/footer');
    }


    // Cetak PDF
    public function penjualanToPdf()
    {
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->Model_Keuangan->penjualan_pdf();
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan();
        $data['total'] = $this->Model_Keuangan->total_penjualan();
        $this->load->view('penjualan/laporan_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render('');
        $this->dompdf->stream('laporan_penjualan.pdf', array('Attachment' => 0));
    }

    // Cetak PDF
    public function pembelianToPdf()
    {
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->Model_Keuangan->pembelian_pdf();
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan();
        $data['total'] = $this->Model_Keuangan->total_pembelian();

        $this->load->view('pembelian/laporan_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render('');
        $this->dompdf->stream('laporan_pembelian.pdf', array('Attachment' => 0));
    }
}
