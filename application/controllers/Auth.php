<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Username Tidak Boleh Kosong'
            ]
        );
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', 'Login');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Password Salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Username Belum Terdaftar');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]',
            [
                'required' => 'Username Tidak Boleh Kosong',
                'is_unique' => 'Username Telah Digunakan'
            ]
        );
        $this->form_validation->set_rules('namaUsaha', 'Nama Usaha', 'required|trim', [
            'required' => 'Nama Usaha Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'required' => 'Password Tidak Boleh Kosong',
                'matches' => 'Konfirmasi Password Salah',
                'min_length' => 'Minimal Password 6 Karakter'
            ]
        );

        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registrasi');
        } else {
            $this->Model_Auth->registrasi();
            $this->session->set_flashdata('pesan', 'Registrasi Akun');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('bulanJual');
        $this->session->unset_userdata('tahunJual');
        $this->session->unset_userdata('bulanBeli');
        $this->session->unset_userdata('tahunBeli');
        $this->session->set_flashdata('pesan', 'Logout');
        redirect('auth');
    }
}
