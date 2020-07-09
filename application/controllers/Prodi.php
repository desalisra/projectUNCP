<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('Prodi_model');
  }

  function isLogin($user_id)
  {
    if ($user_id == "") {
      redirect('auth');
    }
  }

  public function index()
  {
    $data["dataProdi"] = $this->Prodi_model->getProdi();
    $this->load->view('layout/header');
    $this->load->view('pages/prodi', $data);
    $this->load->view('layout/footer');
  }

  public function validasiInputSimmbol($data)
  {
    $result = true;
    if (!preg_match("/^[a-z A-Z 0-9 .]*$/", $data)) $result = false;

    if (!$result) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Save Gagal</strong> Inputan tidak boleh mengandung simbol.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('prodi');
    }
  }

  // Prodi
  public function addProdi()
  {
    $id_prodi = $this->input->post('id_prodi');
    $prodi = $this->input->post('prodi');

    $this->validasiInputSimmbol($prodi);

    $this->Prodi_model->addProdi($id_prodi, $prodi);

    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Disimpan</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );

    redirect('prodi');
  }

  public function deleteProdi()
  {
    $id_prodi = $this->uri->segment(3);
    $this->Prodi_model->deleteProdi($id_prodi);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Hapus</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('prodi');
  }

  public function editProdi()
  {
    $id_prodi = $this->uri->segment(3);
    $data["dataProdi"] = $this->Prodi_model->getProdi($id_prodi);
    echo json_encode($data);
  }
}
