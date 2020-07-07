<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Persyaratan_model extends CI_Model
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
}
