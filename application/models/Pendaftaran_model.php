<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // Pendaftaran
  public function getInstansi()
  {
    $query = $this->db->query("SELECT id_lokasi,instansi_lokasi FROM tb_lokasi");
    return $query->result_array();
  }

  public function daftar($data, $id = null)
  {
    if ($id === "") {
      $this->db->insert('tb_pendaftaran', $data);
    } else {
      $sql = "UPDATE tb_pendaftaran SET ";
      $sql = $sql . "nim_pendaftar = '" . $data["nim_pendaftar"] . "',";
      $sql = $sql . "nama_pendaftar = '" . $data["nama_pendaftar"] . "',";
      $sql = $sql . "tempat_lahir_pendaftar = '" . $data["tempat_lahir_pendaftar"] . "',";
      $sql = $sql . "tanggal_lahir_pendaftar = '" . $data["tanggal_lahir_pendaftar"] . "',";
      $sql = $sql . "jk_pendaftar = '" . $data["jk_pendaftar"] . "',";
      $sql = $sql . "agama_pendaftar = '" . $data["agama_pendaftar"] . "',";
      $sql = $sql . "telepon_pendaftar = '" . $data["telepon_pendaftar"] . "',";
      $sql = $sql . "alamat_pendaftar = '" . $data["alamat_pendaftar"] . "',";
      $sql = $sql . "nama_wali_pendaftar = '" . $data["nama_wali_pendaftar"] . "',";
      $sql = $sql . "alamat_wali_pendaftar = '" . $data["alamat_wali_pendaftar"] . "',";
      $sql = $sql . "telepon_wali_pendaftar = '" . $data["telepon_wali_pendaftar"] . "',";
      $sql = $sql . "pendidikan_wali_pendaftar = '" . $data["pendidikan_wali_pendaftar"] . "',";
      $sql = $sql . "pekerjaan_wali_pendaftar = '" . $data["pekerjaan_wali_pendaftar"] . "',";
      $sql = $sql . "prodi_pendaftar = '" . $data["prodi_pendaftar"] . "',";
      $sql = $sql . "instansi_pendaftar = '" . $data["instansi_pendaftar"] . "' ";
      $sql = $sql . "WHERE id_pendaftaran = '$id' ";

      $result = $this->db->query($sql);
    }
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

  public function getKuota($id_instansi)
  {
    $sql = "SELECT A.kuota_lokasi, COUNT(B.instansi_pendaftar) AS pendaftar
            FROM tb_lokasi A
            LEFT JOIN tb_pendaftaran B
            ON A.id_lokasi = B.instansi_pendaftar
            WHERE A.id_lokasi = '$id_instansi'
            GROUP BY A.id_lokasi";
    $result = $this->db->query($sql);
    return $result->row();
  }
}
