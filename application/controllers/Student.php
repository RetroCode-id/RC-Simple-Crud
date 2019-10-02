<?php

class Student extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Student_model');
  }

  public function index()
  {
    $data['judul'] = 'Students Page';
    // LOAD PEGINATION
    $this->load->library('pagination');
    // CONFIG PEGINATION
    $config = [
      'total_rows' => $this->db->get('tbl_students')->num_rows(),
      'per_page' => 5
    ];
    $this->pagination->initialize($config);
    $data['start'] = $this->uri->segment(3);

    // CEK APAKAH ADA INPUTAN DI SEARCH
    if ($this->input->post('keyword')) {
      $data['keyword'] = $this->input->post('keyword');
      sleep(1);
    } else {
      $data['keyword'] = null;
    }

    $data['students'] = $this->Student_model->getStudents($config['per_page'], $data['start'], $data['keyword']);
    $data['user'] = $this->db->get_where(
      'tbl_user',
      ['nama_user' => $this->session->userdata('nama_user')]
    )->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('student/index', $data);
    $this->load->view('templates/footer');
  }

  public function logout()
  {
    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Selamat <strong>Tinggal</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('login');
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail Page';
    $data['student'] = $this->Student_model->getStudentById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('student/detail', $data);
    $this->load->view('templates/footer');
  }

  public function delete($id)
  {
    $this->Student_model->deleteStudent($id);
    $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    This Student Has been <strong>Deleted!</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('student');
  }

  public function insert()
  {
    $data['judul'] = "Insert Student Page";
    $data['jurusan'] = [
      'Rekayasa Perangkat Lunak',
      'Teknik Mesin',
      'Teknik Listrik',
      'Teknik Las'
    ];
    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'Form Ini Harus Diisi!'
    ]);
    $this->form_validation->set_rules('kelas', 'Kelas', 'required', [
      'required' => 'Form Ini Harus Diisi!'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('student/insert', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Student_model->insertStudent();
      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      This Student Has been <strong>Insert!</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('student');
    }
  }

  public function update($id)
  {
    $data['judul'] = "Update Student Page";
    $data['jurusan'] = [
      'Rekayasa Perangkat Lunak',
      'Teknik Mesin',
      'Teknik Listrik',
      'Teknik Las'
    ];
    $data['student'] = $this->Student_model->getStudentById($id);

    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'Form Ini Harus Diisi!'
    ]);
    $this->form_validation->set_rules('kelas', 'Kelas', 'required', [
      'required' => 'Form Ini Harus Diisi!'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('student/update', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Student_model->updateStudent();
      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      This Student Has been <strong>Updated!</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('student');
    }
  }
}
