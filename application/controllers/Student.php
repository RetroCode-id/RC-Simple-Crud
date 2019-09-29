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
      'base_url' => 'http://localhost/Ci-Project/Ci-latihan/student/index',
      'total_rows' => $this->db->get('tbl_students')->num_rows(),
      'per_page' => 5,
      'full_tag_open' => '<nav><ul class="pagination justify-content-center pagination-sm">',
      'full_tag_close' => '</ul></nav>',
      'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
      'cur_tag_close' => '</a></li>',
      'num_tag_open' => '<li class="page-item">',
      'num_tag_close' => '</li>',
      'next_link' => '->',
      'next_tag_open' => '<li class="page-item">',
      'next_tag_close' => '</li>',
      'prev_link' => '<-',
      'prev_tag_open' => '<li class="page-item">',
      'prev_tag_close' => '</li>',
      'first_tag_open' => '<li class="page-item">',
      'first_tag_close' => '</li>',
      'last_tag_open' => '<li class="page-item">',
      'last_tag_close' => '</li>'
    ];
    $config['attributes'] = array('class' => 'page-link');
    // INISIALIZE PEGINATION
    $this->pagination->initialize($config);
    $data['start'] = $this->uri->segment(3);

    $data['students'] = $this->Student_model->getStudents($config['per_page'], $data['start']);
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
