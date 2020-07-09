<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // Lokasi
  public function getLokasi($id_lokasi = null)
  {
    if (is_null($id_lokasi)) {
      $sql = "SELECT A.*,COUNT(C.instansi_pendaftar) AS pendaftar
              FROM tb_lokasi A
              LEFT JOIN tb_pendaftaran C
              ON A.id_lokasi = C.instansi_pendaftar
              GROUP BY A.id_lokasi";
      $result = $this->db->query($sql);
    } else {
      $result = $this->db->query("SELECT * FROM tb_lokasi WHERE id_lokasi = '$id_lokasi' ");
    }
    return $result->result_array();
  }

  public function addLokasi($id_lokasi = null, $data)
  {
    if ($id_lokasi == "") {
      $sql = "INSERT INTO tb_lokasi (prodi_lokasi,instansi_lokasi,kuota_lokasi) VALUES (";
      $sql = $sql . "'" . $data["prodi"] . "',";
      $sql = $sql . "'" . $data["instansi"] . "',";
      $sql = $sql . "'" . $data["kuota"] . "'";
      $sql = $sql . ")";
    } else {
      $sql = "UPDATE tb_lokasi SET ";
      $sql = $sql . "prodi_lokasi = '" . $data["prodi"] . "',";
      $sql = $sql . "instansi_lokasi = '" . $data["instansi"] . "',";
      $sql = $sql . "kuota_lokasi = '" . $data["kuota"] . "'";
      $sql = $sql . "WHERE id_lokasi = '$id_lokasi'";
    }

    $this->db->query($sql);
  }

  public function deleteLokasi($id_lokasi)
  {
    $this->db->query("DELETE FROM tb_lokasi WHERE id_lokasi = '$id_lokasi' ");
  }
}
