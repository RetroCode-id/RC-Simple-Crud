<?php

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
  }

  public function index()
  {
    $data['judul'] = 'Login Page';
    $this->form_validation->set_rules('nama_user', 'Nama_User', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('login/index');
      $this->load->view('templates/footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $nama_user = $this->input->post('nama_user');
    $password = $this->input->post('password');
    $user = $this->db->get_where('tbl_user', ['nama_user' => $nama_user])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $this->session->set_userdata(['nama_user' => $user['nama_user']]);
        redirect('student');
      } else {
        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
        Password Yang Anda Masukan <strong>Salah</strong>
        </div>');
        redirect('login');
      }
    } else {
      $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
      User Dengan Akses Tersebut <strong>Tidak Ditemukan</strong>
      </div>');
      redirect('login');
    }
  }

  public function register()
  {
    $data['judul'] = 'Register Page';

    $this->form_validation->set_rules('nama_user', 'Nama_User', 'required|is_unique[tbl_user.nama_user]', [
      'is_unique' => 'Nama User Sudah Ada!',
      'required' => 'Form Ini Harus Diisi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]', [
      'min_length' => 'Terlalu Pendek!',
      'required' => 'Form Ini Harus Diisi!'
    ]);
    $this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'required|is_unique[tbl_user.nama_lengkap]', [
      'is_unique' => 'Nama User Sudah Ada!',
      'required' => 'Form Ini Harus Diisi!'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('login/register');
      $this->load->view('templates/footer');
    } else {
      $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
      Akun Berhasil <strong>Di Registrasi!</strong>
      </div>');
      $this->Login_model->register();
      redirect('login');
    }
  }
}
