<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('pendaftaran_model');
  }

  public function index()
  {
    $id_pendaftar = $this->uri->segment(3);
    if (is_null($id_pendaftar)) {
      $id_pendaftar = $this->session->userdata('user_id');
    }

    $data["dataUser"] = $id_pendaftar;
    $data["dataInstansi"] = $this->pendaftaran_model->getInstansi();

    $this->load->view('layout/header');
    $this->load->view('pages/pendaftaran', $data);
    $this->load->view('layout/footer');
  }

  public function manajemen()
  {
    $data["dataInstansi"] = $this->pendaftaran_model->getInstansi();
    $data["dataPendaftar"] = $this->pendaftaran_model->getPendaftar();

    $this->load->view('layout/header');
    $this->load->view('pages/mPendaftaran', $data);
    $this->load->view('layout/footer');
  }

  // Pendaftaran 
  public function daftar()
  {
    // Validasi Inputan
    $this->form_validation->set_rules('nim', 'nim', 'required|trim', [
      'required' => 'NIM wajib di isi'
    ]);
    $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
      'required' => 'Nama wajib di isi'
    ]);
    $this->form_validation->set_rules('tempat-lahir', 'tempat-lahir', 'required|trim', [
      'required' => 'Tempat Lahir wajib di isi'
    ]);
    $this->form_validation->set_rules('tanggal-lahir', 'tanggal-lahir', 'required|trim', [
      'required' => 'Tanggal Lahir wajib di Isi'
    ]);
    $this->form_validation->set_rules('kelamin', 'kelamin', 'required|trim', [
      'required' => 'Jenis Kelamin belum di pilih'
    ]);
    $this->form_validation->set_rules('agama', 'agama', 'required|trim', [
      'required' => 'Agama wajib di isi'
    ]);
    $this->form_validation->set_rules('telepon', 'telepon', 'required|trim', [
      'required' => 'Telepon wajib di isi'
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
      'required' => 'Alamat wajib di isi'
    ]);
    $this->form_validation->set_rules('nama-wali', 'nama-wali', 'required|trim', [
      'required' => 'Nama Wali wajib di isi'
    ]);
    $this->form_validation->set_rules('alamat-wali', 'alamat-wali', 'required|trim', [
      'required' => 'Alamat Wali wajib di isi'
    ]);
    $this->form_validation->set_rules('telepon-wali', 'telepon-wali', 'required|trim', [
      'required' => 'Telepon Wali wajib di isi'
    ]);
    $this->form_validation->set_rules('pendidikan-wali', 'pendidikan-wali', 'required|trim', [
      'required' => 'Pendidikan Wali wajib di isi'
    ]);
    $this->form_validation->set_rules('pekerjaan-wali', 'pekerjaan-wali', 'required|trim', [
      'required' => 'Pekerjaan Wali wajib di isi'
    ]);
    $this->form_validation->set_rules('prodi', 'prodi', 'required|trim', [
      'required' => 'Prodi belum dipilih'
    ]);
    $this->form_validation->set_rules('instansi', 'instansi', 'required|trim', [
      'required' => 'Instansi wajib di isi'
    ]);

    // Validasi Input User gagal
    if ($this->form_validation->run() == false) {
      $data["dataUser"] = $this->input->post('user_pendaftar');
      $data["dataInstansi"] = $this->pendaftaran_model->getInstansi();
      $this->load->view('layout/header');
      $this->load->view('pages/pendaftaran', $data);
      $this->load->view('layout/footer');
      return false;
    }

    $id = $this->input->post('id_pendaftar');

    // Update Tidak perlu upload gambar
    if ($id === "") {
      // Validasi Upload Gambar
      $bukti = $_FILES['bukti-pembayaran']['name'];
      if ($bukti == '') {
      } else {
        $config['upload_path'] = './assets/bukti_pembayaran';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if (!$this->upload->do_upload('bukti-pembayaran')) {
          $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Pendaftaran Gagal,</strong> Silahkan upload bukti pembayaran.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'
          );
          return false;
        }
      }
    }

    $data = [
      "nim_pendaftar" => $this->input->post('nim'),
      "nama_pendaftar" => $this->input->post('nama'),
      "tempat_lahir_pendaftar" => $this->input->post('tempat-lahir'),
      "tanggal_lahir_pendaftar" => $this->input->post('tanggal-lahir'),
      "jk_pendaftar" => $this->input->post('kelamin'),
      "agama_pendaftar" => $this->input->post('agama'),
      "telepon_pendaftar" => $this->input->post('telepon'),
      "alamat_pendaftar" => $this->input->post('alamat'),
      "nama_wali_pendaftar" => $this->input->post('nama-wali'),
      "alamat_wali_pendaftar" => $this->input->post('alamat-wali'),
      "telepon_wali_pendaftar" => $this->input->post('telepon-wali'),
      "pendidikan_wali_pendaftar" => $this->input->post('pendidikan-wali'),
      "pekerjaan_wali_pendaftar" => $this->input->post('pekerjaan-wali'),
      "prodi_pendaftar" => $this->input->post('prodi'),
      "instansi_pendaftar" => $this->input->post('instansi')
    ];

    if ($id === "") {
      $data["bukti_lunas_pendaftar"] = $this->upload->data('file_name');
    }

    $data["status_pendaftar"] = "0";
    $data["user_pendaftar"] = $this->input->post('user_pendaftar');
    $data["tanggal_daftar_pendaftar"] = date("Y-m-d");

    // Insert or Update Database
    $this->pendaftaran_model->daftar($data, $id);

    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pendaftaran Berhasil,</strong> Tunggu Penjadwalan Dari Pihak Kampus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('pendaftaran');
  }

  public function deletePendaftar()
  {
    $id_pendaftar = $this->uri->segment(3);
    $this->pendaftaran_model->deletePendaftar($id_pendaftar);
    redirect('pendaftaran/manajemen');
  }

  public function editPendaftar()
  {
    $id_pendaftar = $this->uri->segment(3);
    $data["dataPendaftar"] = $this->pendaftaran_model->getPendaftar($id_pendaftar);
    $data["dataInstansi"] = $this->pendaftaran_model->getInstansi();

    $this->load->view("layout/header");
    $this->load->view("pages/editPendaftaran", $data);
    $this->load->view("layout/footer");
  }
}
