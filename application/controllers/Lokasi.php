<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('lokasi_model');
  }

  function isLogin($user_id)
  {
    if ($user_id == "") {
      redirect('auth');
    }
  }
  public function index()
  {
    $data["dataLokasi"] = $this->lokasi_model->getLokasi();
    $data["menu"] = "lokasi";

    $this->load->view('layout/header', $data);
    $this->load->view('pages/lokasi', $data);
    $this->load->view('layout/footer');
  }

  public function validasiInputSimmbol($data)
  {
    $result = true;
    if (!preg_match("/^[a-z A-Z 0-9 .]*$/", $data["prodi"])) $result = false;
    if (!preg_match("/^[a-z A-Z 0-9 .]*$/", $data["instansi"])) $result = false;
    if (!preg_match("/^[a-z A-Z 0-9 .]*$/", $data["telepon_instansi"])) $result = false;
    if (!preg_match("/^[a-z A-Z 0-9 .]*$/", $data["alamat_instansi"])) $result = false;
    if (!preg_match("/^[a-z A-Z 0-9 .]*$/", $data["kuota"])) $result = false;

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
      redirect('lokasi');
    }
  }

  // Lokasi
  public function addLokasi()
  {
    $id_lokasi = $this->input->post('id_lokasi');
    $data = [
      "prodi" => $this->input->post('prodi'),
      "instansi" => $this->input->post('instansi'),
      "telepon_instansi" => $this->input->post('tlp-instansi'),
      "alamat_instansi" => $this->input->post('alamat-instansi'),
      "kuota" => $this->input->post('kuota')
    ];

    $this->validasiInputSimmbol($data);

    $this->lokasi_model->addLokasi($id_lokasi, $data);
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
