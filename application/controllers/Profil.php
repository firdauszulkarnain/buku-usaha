<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['title'] = 'Profil Usaha';
        $data['nama'] = $data['user']['namaUsaha'];

        $this->form_validation->set_rules('namaUsaha', 'Nama Usaha', 'required|trim', [
            'required' => 'Nama Usaha Tidak Boleh Kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('profil/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Profil->update_profil($user_id);
            $this->session->set_flashdata('pesan', 'Update Profil');
            redirect('dashboard');
        }
    }

    public function ganti_password()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $user_password = $data['user']['password'];
        $data['title'] = 'Ganti Password';
        $data['nama'] = $data['user']['namaUsaha'];

        $this->form_validation->set_rules(
            'old_password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Lama Tidak Boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'new_password1',
            'Password',
            'required|trim|min_length[6]|matches[new_password2]',
            [
                'required' => 'Password Baru Tidak Boleh Kosong',
                'matches' => 'Konfirmasi Password Tidak Sesuai',
                'min_length' => 'Minimal Password 6 Karakter'
            ]
        );

        $this->form_validation->set_rules(
            'new_password2',
            'Password',
            'required|trim'
        );
        $password = $this->input->post('old_password');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('profil/gantipass', $data);
            $this->load->view('template/footer');
        } else {
            if (password_verify($password, $user_password)) {
                $this->Model_Profil->update_password($user_id);
                $this->session->set_flashdata('pesan', 'Update Password');
                redirect('profil');
            } else {
                $this->session->set_flashdata('old_password', 'Password Lama Tidak Sesuai');
                redirect('profil/ganti_password');
            }
        }
    }
}
