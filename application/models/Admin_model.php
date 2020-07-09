<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // User
  public function getAdmin($id_user = null)
  {
    $sql = "";

    if (is_null($id_user)) {
      $sql = "SELECT * FROM tb_user WHERE level_user = 'Admin'";
    } else {
      $sql = "SELECT * FROM tb_user WHERE id_user = '$id_user' AND level_user = 'Admin'";
    }

    $result = $this->db->query($sql);
    return $result->result_array();
  }

  public function addAdmin($data)
  {
    $sql = "";

    if ($data["id_user"] == "") {
      // Insert data
      $sql = "INSERT INTO tb_user (nama_user,email_user,pass_user,level_user) VALUES (";
      $sql = $sql . "'" . $data["nama"] . "',";
      $sql = $sql . "'" . $data["username"] . "',";
      $sql = $sql . "'" . $data["password1"] . "',";
      $sql = $sql . "'Admin'";
      $sql = $sql . ")";
    } else {
      // Update data
      $sql = "UPDATE tb_user SET ";
      $sql = $sql . "nama_user = '" . $data["nama"] . "',";
      $sql = $sql . "email_user = '" . $data["username"] . "',";
      if ($data["password1"] != "") {
        $sql = $sql . "pass_user = '" . $data["password1"] . "',";
      }

      $sql = substr($sql, 0, strlen($sql) - 1);
      $sql = $sql . " WHERE id_user = '" . $data["id_user"] . "'";
    }

    $this->db->query($sql);
  }

  public function deleteAdmin($id_user)
  {
    $sql = "DELETE FROM tb_user WHERE id_user = '$id_user' AND level_user = 'Admin'";
    $this->db->query($sql);
  }
}
