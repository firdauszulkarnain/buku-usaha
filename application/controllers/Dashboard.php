<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['total_bulan'] = $this->Model_Keuangan->total_bulan();
        $data['bulan'] = $this->Model_Keuangan->ambil_bulan();
        $data['jual'] = $this->Model_Keuangan->total_jual();
        $data['total_tahun'] = $this->Model_Keuangan->total_tahun();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
