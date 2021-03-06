<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // Jadwal
  public function addJadwal($id_pendaftar, $data)
  {
    $sql = "UPDATE tb_pendaftaran 
            SET status_pendaftar = '1' 
            WHERE id_pendaftaran = '$id_pendaftar'";
    $result = $this->db->query($sql);

    $sql = "INSERT INTO tb_jadwal 
              (pendaftar_jadwal,mulai_jadwal,selesai_jadwal,pembimbing_jadwal)
              VALUES ('$id_pendaftar','" . $data["mulai_jadwal"] . "','" . $data["selesai_jadwal"] . "','"  . $data["pembimbing"] . "')";

    $result = $this->db->query($sql);
    return $result;
  }

  public function getJadwal()
  {
    $user = $this->session->userdata("user_id");
    $query = "SELECT A.id_pendaftaran,A.nama_pendaftar,B.instansi_lokasi,D.mulai_jadwal,D.selesai_jadwal,D.pembimbing_jadwal
              FROM tb_pendaftaran A 
              LEFT JOIN tb_lokasi B ON A.instansi_pendaftar = B.id_lokasi
              LEFT JOIN tb_user C ON A.user_pendaftar = C.id_user
              LEFT JOIN tb_jadwal D ON A.id_pendaftaran = D.pendaftar_jadwal
              WHERE C.id_user = '$user'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function getPendaftar($id_pendaftar = null)
  {
    if ($id_pendaftar == "") {
      $query = "SELECT A.*,B.instansi_lokasi
              FROM tb_pendaftaran A 
              LEFT JOIN tb_lokasi B 
              ON A.instansi_pendaftar = B.id_lokasi
              WHERE A.status_pendaftar = '0' ";
    } else {
      $query = "SELECT A.* FROM tb_pendaftaran A 
              WHERE id_pendaftaran = '$id_pendaftar'";
    }

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function getReport($id_pendaftar = 4)
  {
    $query = "SELECT A.*,
              B.instansi_lokasi,B.telepon_lokasi,B.alamat_lokasi,
              C.pembimbing_jadwal,C.mulai_jadwal,C.selesai_jadwal
              FROM tb_pendaftaran A 
              LEFT JOIN tb_lokasi B ON A.instansi_pendaftar = B.id_lokasi
              LEFT JOIN tb_jadwal C ON A.id_pendaftaran = C.pendaftar_jadwal
              WHERE id_pendaftaran = '$id_pendaftar'";

    $result = $this->db->query($query);
    return $result->row();
  }
}
