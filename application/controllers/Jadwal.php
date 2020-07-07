<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('jadwal_model');
  }

  function isLogin($user_id)
  {
    if ($user_id == "") {
      redirect('auth');
    }
  }


  public function index()
  {
    $data["dataPendaftar"] = $this->jadwal_model->getPendaftar();
    $data["dataJadwal"] = $this->jadwal_model->getJadwal();


    $this->load->view('layout/header');
    $this->load->view('pages/jadwal', $data);
    $this->load->view('layout/footer');
  }

  // Jadwal
  public function editJadwal()
  {
    $id_pendaftar = $this->uri->segment(3);
    $data["dataPendaftar"] = $this->jadwal_model->getPendaftar($id_pendaftar);
    echo json_encode($data);
  }

  public function addJadwal()
  {
    $id_pendaftar = $this->input->post('id_pendaftar');
    $jadwal = $this->input->post('jadwal');
    $pembimbing = $this->input->post('pembimbing');

    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dijadwalkan</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );

    $this->jadwal_model->addJadwal($id_pendaftar, $jadwal, $pembimbing);
    redirect('jadwal');
  }

  public function exportPDF($id_pendaftaran)
  {
    include APPPATH . 'third_party/fpdf/fpdf.php';

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(189, 7, 'FORMULIR PENDAFTARAN MAHASISWA PKL FAKULTAS SAINS', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(189, 7, 'UNIVERSITAS COKROAMINOTO PALOPO', 0, 1, 'C');

    $pdf->Cell(10, 10, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(189, 7, 'Biodata Mahasiswa', 0, 1);
    $pdf->Cell(10, 3, '', 0, 1);

    $data = $this->jadwal_model->getReport($id_pendaftaran);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 7, 'NIM', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->nim_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Nama Mahasiswa', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->nama_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Tempat Lahir', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->tempat_lahir_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Tanggal Lahir', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->tanggal_lahir_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Jenis Kelamin', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->jk_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Agama', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->agama_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Telepon', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->telepon_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Alamat', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->alamat_pendaftar, 0, 1);

    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(189, 7, 'Data Wali', 0, 1);
    $pdf->Cell(10, 3, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 7, 'Nama Wali', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->nama_wali_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Alamat Wali', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->alamat_wali_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Telpon Wali', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->telepon_wali_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Pendidikan Wali', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->pendidikan_wali_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Pekerjaan Wali', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->pekerjaan_wali_pendaftar, 0, 1);

    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(189, 7, 'Data PKL', 0, 1);
    $pdf->Cell(10, 3, '', 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 7, 'Program Studi', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->prodi_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Instansi PKL', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->instansi_lokasi, 0, 1);
    $pdf->Cell(50, 7, 'Tanggal Daftar', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Cell(10, 7, $data->tanggal_daftar_pendaftar, 0, 1);
    $pdf->Cell(50, 7, 'Bukti Lunas', 0, 0);
    $pdf->Cell(10, 7, ':', 0, 0);
    $pdf->Image(base_url('assets/bukti_pembayaran/') . $data->bukti_lunas_pendaftar, 70, 188, 35);


    $pdf->Cell(10, 50, '', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(140, 7, 'Diterima Oleh :', 0, 0);
    $pdf->Cell(49, 7, 'Diserahkan Oleh :', 0, 1);
    $pdf->Cell(10, 20, '', 0, 1);
    $pdf->Cell(140, 7, '_______________', 0, 0);
    $pdf->Cell(49, 7, '_______________', 0, 1);

    $pdf->Output();
  }
}
