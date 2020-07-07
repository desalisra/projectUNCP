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
      $query = $this->db->query("SELECT * FROM tb_lokasi");
    } else {
      $query = $this->db->query("SELECT * FROM tb_lokasi WHERE id_lokasi = '$id_lokasi' ");
    }
    return $query->result_array();
  }

  public function addLokasi($id_lokasi = null, $prodi, $instansi)
  {
    if ($id_lokasi == "") {
      $sql = "INSERT INTO tb_lokasi (prodi_lokasi,instansi_lokasi) VALUES ('$prodi','$instansi') ";
    } else {
      $sql = "UPDATE tb_lokasi SET prodi_lokasi = '$prodi', instansi_lokasi = '$instansi' WHERE id_lokasi = '$id_lokasi' ";
    }

    $this->db->query($sql);
  }

  public function deleteLokasi($id_lokasi)
  {
    $this->db->query("DELETE FROM tb_lokasi WHERE id_lokasi = '$id_lokasi' ");
  }
}
