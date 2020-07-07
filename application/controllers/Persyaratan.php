<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persyaratan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('Persyaratan_model');
  }

  public function index()
  {
    $data["dataPersyaratan"] = $this->Persyaratan_model->getPersyaratan();
    $this->load->view('layout/header');
    $this->load->view('pages/persyaratan', $data);
    $this->load->view('layout/footer');
  }

  // Persyaratan
  public function addPersyaratan()
  {
    $id_persyaratan = $this->input->post('id_persyaratan');
    $persyaratan = $this->input->post('persyaratan');
    $this->Persyaratan_model->addPersyaratan($id_persyaratan, $persyaratan);

    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Disimpan</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );

    redirect('persyaratan');
  }

  public function deletePersyaratan()
  {
    $id_persyaratan = $this->uri->segment(3);
    $this->Persyaratan_model->deletePersyaratan($id_persyaratan);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Hapus</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('persyaratan');
  }

  public function editPersyaratan()
  {
    $id_persyaratan = $this->uri->segment(3);
    $data["dataPersyaratan"] = $this->Persyaratan_model->getPersyaratan($id_persyaratan);
    echo json_encode($data);
  }
}
