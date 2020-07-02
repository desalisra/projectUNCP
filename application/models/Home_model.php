<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // Persyaratan
  public function getPersyaratan($id_persyaratan = null)
  {
    if (is_null($id_persyaratan)) {
      $query = $this->db->query("SELECT * FROM tb_persyaratan");
    } else {
      $query = $this->db->query("SELECT * FROM tb_persyaratan WHERE id_persyaratan = '$id_persyaratan' ");
    }
    return $query->result_array();
  }

  public function addPersyaratan($id_persyaratan = null, $persyaratan)
  {
    if ($id_persyaratan == "") {
      $this->db->query("INSERT INTO tb_persyaratan (persyaratan) VALUES ('$persyaratan') ");
    } else {
      $this->db->query("UPDATE tb_persyaratan SET persyaratan = '$persyaratan' WHERE id_persyaratan = '$id_persyaratan' ");
    }
  }

  public function deletePersyaratan($id_persyaratan)
  {
    $this->db->query("DELETE FROM tb_persyaratan WHERE id_persyaratan = '$id_persyaratan' ");
  }

  // Lokasi
  public function getLokasi($id_lokasi = null)
  {
    if (is_null($id_lokasi)) {
      $query = $this->db->query("SELECT * FROM tb_lokasi");
    } else {
      $query = $this->db->query("SELECT * FROM tb_lokasi WHERE id_lokasi = '$id_lokasi' ");
    }
    return $query->result_array();
  }

  public function addLokasi($id_lokasi = null, $prodi, $instansi)
  {
    if (is_null($id_lokasi)) {
      $this->db->query("INSERT INTO tb_lokasi (prodi_lokasi,instansi_lokasi) VALUES ('$prodi','$instansi') ");
    } else {
      $this->db->query("UPDATE tb_lokasi SET prodi_lokasi = '$prodi', instansi_lokasi = '$instansi' WHERE id_lokasi = '$id_lokasi' ");
    }
  }

  public function deleteLokasi($id_lokasi)
  {
    $this->db->query("DELETE FROM tb_lokasi WHERE id_lokasi = '$id_lokasi' ");
  }

  // Pendaftaran
  public function getInstansi()
  {
    $query = $this->db->query("SELECT id_lokasi,instansi_lokasi FROM tb_lokasi");
    return $query->result_array();
  }

  public function daftar()
  {
    $id = $this->input->post('id_pendaftar');
    $nama = $this->input->post('nama');
    $nim = $this->input->post('nim');
    $prodi = $this->input->post('prodi');
    $kelamin = $this->input->post('kelamin');
    $instansi = $this->input->post('instansi');
    $telepon = $this->input->post('telepon');
    $user = $this->session->userdata("user_id");

    if ($id == "") {
      $query = "INSERT INTO tb_pendaftaran 
              (nama_pendaftar, nim_pendaftar, prodi_pendaftar, jk_pendaftar, instansi_pendaftar, tlp_pendaftar,status_pendaftar,user_pendaftar)
              VALUES ('$nama','$nim','$prodi','$kelamin','$instansi','$telepon','0','$user')";
    } else {
      $query = "UPDATE tb_pendaftaran
                SET nama_pendaftar = '$nama',
                  nim_pendaftar = '$nim', 
                  prodi_pendaftar = '$prodi', 
                  jk_pendaftar = '$kelamin', 
                  instansi_pendaftar = '$instansi', 
                  tlp_pendaftar = '$telepon'
                WHERE id_pendaftaran = '$id'";
    }


    $result = $this->db->query($query);
    return $result;
  }

  public function getPendaftar($id_pendaftar = null)
  {
    if ($id_pendaftar == "") {
      $query = "SELECT A.*,B.instansi_lokasi
              FROM tb_pendaftaran A 
              LEFT JOIN tb_lokasi B 
              ON A.instansi_pendaftar = B.id_lokasi";
    } else {
      $query = "SELECT A.* FROM tb_pendaftaran A 
              WHERE id_pendaftaran = '$id_pendaftar'";
    }

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function deletePendaftar($id_pendaftar)
  {
    $this->db->query("DELETE FROM tb_jadwal WHERE pendaftar_jadwal = '$id_pendaftar' ");
    $this->db->query("DELETE FROM tb_pendaftaran WHERE id_pendaftaran = '$id_pendaftar' ");
  }

  // Jadwal
  public function addJadwal($id_pendaftar, $jadwal, $pembimbing)
  {
    $query = "UPDATE tb_pendaftaran SET status_pendaftar = '1' WHERE id_pendaftaran = '$id_pendaftar'";
    $result = $this->db->query($query);

    $query = "INSERT INTO tb_jadwal 
              (pendaftar_jadwal,tanggal_jadwal,pembimbing_jadwal)
              VALUES ('$id_pendaftar','$jadwal','$pembimbing')";

    $result = $this->db->query($query);
    return $result;
  }

  public function getJadwal()
  {
    $user = $this->session->userdata("user_id");
    $query = "SELECT D.tanggal_jadwal,B.instansi_lokasi,D.pembimbing_jadwal
              FROM tb_pendaftaran A 
              LEFT JOIN tb_lokasi B ON A.instansi_pendaftar = B.id_lokasi
              LEFT JOIN tb_user C ON A.user_pendaftar = C.id_user
              LEFT JOIN tb_jadwal D ON A.id_pendaftaran = D.pendaftar_jadwal
              WHERE C.id_user = '$user' ";


    $result = $this->db->query($query);
    return $result->result_array();
  }
}
