<?php

class Login_model extends CI_Model
{
  public function register()
  {
    $data = [
      'nama_user' => $this->input->post('nama_user'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'nama_lengkap' => $this->input->post('nama_lengkap')
    ];

    $this->db->insert('tbl_user', $data);
  }
}
