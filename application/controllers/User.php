<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('user_model');
  }

  function isLogin($user_id)
  {
    if ($user_id == "") {
      redirect('auth');
    }
  }

  public function index()
  {
    $data["dataUser"] = $this->user_model->getUser();

    $this->load->view('layout/header');
    $this->load->view('pages/user', $data);
    $this->load->view('layout/footer');
  }

  public function addUser()
  {
    // Get Data Inputan 
    $data = [
      "id_user" => $this->input->post('id_user'),
      "nama" => $this->input->post('nama'),
      "username" => $this->input->post('username'),
      "password1" => $this->input->post('password1'),
      "password2" => $this->input->post('password2')
    ];

    $pesan_error = "";
    $pesan_sucess = "";

    if ($data["password1"] != $data["password2"]) {
      $pesan_error = $pesan_error . "Password tidak sama, ";
    }

    if ($pesan_error != "") {
      $pesan_error = substr($pesan_error, 0, strlen($pesan_error) - 2);

      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Save Data Gagal,</strong> ' . $pesan_error  . '.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('user');
    } else {
      $this->user_model->addUser($data);

      if ($data["id_user"] == "") {
        $pesan_sucess = "Data berhasil di tambah";
      } else {
        $pesan_sucess = "Data berhasil di ubah";
      }
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Save Berhasil,</strong> ' . $pesan_sucess  . '.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('user');
    }
  }

  public function deleteUser()
  {
    $id_user = $this->uri->segment(3);
    $this->user_model->deleteUser($id_user);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hapus Berhasil,</strong> Data berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('user');
  }

  public function editUser()
  {
    $id_user = $this->uri->segment(3);
    $data["dataUser"] = $this->user_model->getUser($id_user);
    echo json_encode($data);
  }
}
