<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
    public function registrasi()
    {
        $data = [
            "username" => htmlspecialchars($this->input->post('username')),
            "namaUsaha" => htmlspecialchars($this->input->post('namaUsaha')),
            "password" => htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT))
        ];
        $this->db->insert('user', $data);
    }
}
