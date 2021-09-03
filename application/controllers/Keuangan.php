<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function penjualan()
    {
        if ($this->session->userdata('bulanJual')) {
            $bulan =  $this->session->userdata('bulanJual');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunJual')) {
            $tahun = $this->session->userdata('tahunJual');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Penjualan Produk';
        $data['penjualan'] = $this->Model_Keuangan->get_penjualan($user_id, $bulan, $tahun);


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('penjualan/penjualan', $data);
        $this->load->view('template/footer');
    }

    public function cariPenjualan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = [
            'bulanJual' => $bulan,
            'tahunJual' => $tahun
        ];
        $this->session->set_userdata($data);
        redirect('keuangan/penjualan');
    }

    public function tambah_penjualan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Data Penjualan Produk';
        $data['produk'] = $this->Model_Keuangan->ambil_produk($user_id);
        $this->form_validation->set_rules('produk', 'Produk', 'required', [
            'required' => 'Pilih Salah Satu Produk'
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'required|max_length[2]|greater_than[0]', [
            'required' => 'Unit Terjual Harus Diisi',
            'max_length' => 'Maksimal Unit Terjual Adalah 99',
            'greater_than' => 'Minimal Unit Terjual Adalah 1'
        ]);

        if ($this->input->post('produk') != null) {
            $id_produk = $this->input->post('produk');
            $data['produk_name'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
            $nama_produk = $data['produk_name']['nama_produk'];
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('penjualan/tambah_penjualan', $data);
            $this->load->view('template/footer');
        } else {

            if ($this->Model_Keuangan->tambah_penjualan($user_id) == 1) {
                $this->session->set_flashdata('error', 'Stock ' . $nama_produk . ' Kurang');
                redirect('keuangan/tambah_penjualan');
            } else {
                $this->session->set_flashdata('pesan', 'Tambah Data Penjualan');
                redirect('keuangan/penjualan');
            }
        }
    }

    public function pembelian()
    {
        if ($this->session->userdata('bulanBeli')) {
            $bulan =  $this->session->userdata('bulanBeli');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunBeli')) {
            $tahun = $this->session->userdata('tahunBeli');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Pembelian Produk';
        $data['pembelian'] = $this->Model_Keuangan->get_pembelian($user_id, $bulan, $tahun);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pembelian/pembelian', $data);
        $this->load->view('template/footer');
    }

    public function cariPembelian()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = [
            'bulanBeli' => $bulan,
            'tahunBeli' => $tahun
        ];
        $this->session->set_userdata($data);
        redirect('keuangan/pembelian');
    }


    // Cetak PDF
    public function penjualanToPdf()
    {
        if ($this->session->userdata('bulanJual')) {
            $bulan =  $this->session->userdata('bulanJual');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunJual')) {
            $tahun = $this->session->userdata('tahunJual');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->Model_Keuangan->penjualan_pdf($user_id, $bulan, $tahun);
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan($bulan);
        $data['tahun'] = $tahun;
        $data['total'] = $this->Model_Keuangan->total_penjualan($user_id, $bulan, $tahun);
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
        if ($this->session->userdata('bulanBeli')) {
            $bulan =  $this->session->userdata('bulanBeli');
        } else {
            $bulan = date('n');
        }
        if ($this->session->userdata('tahunBeli')) {
            $tahun = $this->session->userdata('tahunBeli');
        } else {
            $tahun = date('Y');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->Model_Keuangan->pembelian_pdf($user_id, $bulan, $tahun);
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan($bulan);
        $data['tahun'] = $tahun;
        $data['total'] = $this->Model_Keuangan->total_pembelian($user_id, $bulan, $tahun);

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
