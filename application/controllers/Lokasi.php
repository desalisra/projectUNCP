<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('lokasi_model');
  }


  public function index()
  {
    $data["dataLokasi"] = $this->lokasi_model->getLokasi();

    $this->load->view('layout/header');
    $this->load->view('pages/lokasi', $data);
    $this->load->view('layout/footer');
  }

  // Lokasi
  public function addLokasi()
  {
    $id_lokasi = $this->input->post('id_lokasi');
    $prodi = $this->input->post('prodi');
    $instansi = $this->input->post('instansi');


    $this->lokasi_model->addLokasi($id_lokasi, $prodi, $instansi);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Disimpan</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('lokasi');
  }

  public function deleteLokasi()
  {
    $id_lokasi = $this->uri->segment(3);
    $this->lokasi_model->deleteLokasi($id_lokasi);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Hapus</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('lokasi');
  }

  public function editLokasi()
  {
    $id_lokasi = $this->uri->segment(3);
    $data["dataLokasi"] = $this->lokasi_model->getLokasi($id_lokasi);
    echo json_encode($data);
  }
}
