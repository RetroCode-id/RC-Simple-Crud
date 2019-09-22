<?php

class Student_model extends CI_Model
{
  public function getAllStudent()
  {
    return $this->db->get('tbl_students')->result_array();
  }

  public function getStudentById($id)
  {
    return $this->db->get_where('tbl_students', ['id' => $id])->row_array();
  }

  public function deleteStudent($id)
  {
    $this->db->delete('tbl_students', ['id' => $id]);
  }

  public function insertStudent()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'kelas' => $this->input->post('kelas'),
      'jurusan' => $this->input->post('jurusan')
    ];

    $this->db->insert('tbl_students', $data);
  }

  public function updateStudent()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'kelas' => $this->input->post('kelas'),
      'jurusan' => $this->input->post('jurusan')
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tbl_students', $data);
  }
}
