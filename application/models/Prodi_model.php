<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prodi_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // Prodi
  public function getProdi($id_prodi = null)
  {
    if (is_null($id_prodi)) {
      $query = $this->db->query("SELECT * FROM tb_prodi");
    } else {
      $query = $this->db->query("SELECT * FROM tb_prodi WHERE id_prodi = '$id_prodi' ");
    }
    return $query->result_array();
  }

  public function addProdi($id_prodi = null, $prodi)
  {
    if ($id_prodi == "") {
      $this->db->query("INSERT INTO tb_prodi (prodi) VALUES ('$prodi') ");
    } else {
      $this->db->query("UPDATE tb_prodi SET prodi = '$prodi' WHERE id_prodi = '$id_prodi' ");
    }
  }

  public function deleteProdi($id_prodi)
  {
    $this->db->query("DELETE FROM tb_prodi WHERE id_prodi = '$id_prodi' ");
  }
}
