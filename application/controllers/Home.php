<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('home_model');
  }

  // Cek Login
  public function cek_aktif()
  {
    if ($this->session->userdata('user_id') == "") {
      redirect('auth');
    }
  }

  public function index()
  {
    $this->cek_aktif();
    $this->load->view('layout/header');
    $this->load->view('pages/home');
    $this->load->view('layout/footer');
  }

  // Routing Pages
  public function pages()
  {
    $this->cek_aktif();
    $page = $this->uri->segment(3);

    $data["dataPersyaratan"] = $this->home_model->getPersyaratan();
    $data["dataLokasi"] = $this->home_model->getLokasi();
    $data["dataInstansi"] = $this->home_model->getInstansi();
    $data["dataPendaftar"] = $this->home_model->getPendaftar();
    $data["dataJadwal"] = $this->home_model->getJadwal();



    if ($page != "") {
      $this->load->view("layout/header");
      $this->load->view("pages/$page", $data);
      $this->load->view("layout/footer");
    } else {
      $this->index();
    }
  }

  // Persyaratan
  public function addPersyaratan()
  {
    $id_persyaratan = $this->input->post('id_persyaratan');
    $persyaratan = $this->input->post('persyaratan');

    $this->home_model->addPersyaratan($id_persyaratan, $persyaratan);
    redirect('home/pages/persyaratan');
  }

  public function deletePersyaratan()
  {
    $id_persyaratan = $this->uri->segment(3);
    $this->home_model->deletePersyaratan($id_persyaratan);
    redirect('home/pages/persyaratan');
  }

  public function editPersyaratan()
  {
    $id_persyaratan = $this->uri->segment(3);
    $data["dataPersyaratan"] = $this->home_model->getPersyaratan($id_persyaratan);
    echo json_encode($data);
  }

  // Lokasi
  public function addLokasi()
  {
    $id_lokasi = $this->input->post('id_lokasi');
    $prodi = $this->input->post('prodi');
    $instansi = $this->input->post('instansi');

    $this->home_model->addLokasi($id_lokasi, $prodi, $instansi);
    redirect('home/pages/lokasi');
  }

  public function deleteLokasi()
  {
    $id_lokasi = $this->uri->segment(3);
    $this->home_model->deleteLokasi($id_lokasi);
    redirect('home/pages/lokasi');
  }

  public function editLokasi()
  {
    $id_lokasi = $this->uri->segment(3);
    $data["dataLokasi"] = $this->home_model->getLokasi($id_lokasi);
    echo json_encode($data);
  }

  // Pendaftaran 
  public function daftar()
  {
    $daftar = $this->home_model->daftar();
    if ($daftar) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Pendaftaran Berhasil,</strong> Tunggu Penjadwalan Dari Pihak Kampus.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Pendaftaran Gagal,</strong> Silahkan Cek Inputan Anda.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
    }

    redirect('home/pages/pendaftaran');
  }

  public function deletePendaftar()
  {
    $id_pendaftar = $this->uri->segment(3);
    $this->home_model->deletePendaftar($id_pendaftar);
    redirect('home/pages/lokasi');
  }

  public function editPendaftar()
  {
    $id_pendaftar = $this->uri->segment(3);
    $data["dataPendaftar"] = $this->home_model->getPendaftar($id_pendaftar);
    $data["dataInstansi"] = $this->home_model->getInstansi();

    $this->load->view("layout/header");
    $this->load->view("pages/editPendaftaran", $data);
    $this->load->view("layout/footer");
  }

  // Jadwal
  public function editJadwal()
  {
    $id_pendaftar = $this->uri->segment(3);
    $data["dataPendaftar"] = $this->home_model->getPendaftar($id_pendaftar);
    echo json_encode($data);
  }

  public function addJadwal()
  {
    $id_pendaftar = $this->input->post('id_pendaftar');
    $jadwal = $this->input->post('jadwal');
    $pembimbing = $this->input->post('pembimbing');

    $this->home_model->addJadwal($id_pendaftar, $jadwal, $pembimbing);
    redirect('home/pages/jadwal');
  }
}
