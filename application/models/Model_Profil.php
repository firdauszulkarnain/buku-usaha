<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Profil extends CI_Model
{
    public function update_profil($user_id)
    {
        $data = [
            'namaUsaha' => htmlspecialchars($this->input->post('namaUsaha'))
        ];

        $this->db->where('id_username', $user_id);
        $this->db->update('user', $data);
    }

    public function update_password($user_id)
    {
        $data = [
            "password" => htmlspecialchars(password_hash($this->input->post('new_password1'), PASSWORD_DEFAULT))
        ];

        $this->db->where('id_username', $user_id);
        $this->db->update('user', $data);
    }
}
