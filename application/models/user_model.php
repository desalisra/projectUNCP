<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // User
  public function getUser($id_user = null)
  {
    $sql = "";

    if (is_null($id_user)) {
      $sql = "SELECT * FROM tb_user WHERE level_user = 'User'";
    } else {
      $sql = "SELECT * FROM tb_user WHERE id_user = '$id_user' AND level_user = 'User'";
    }

    $result = $this->db->query($sql);
    return $result->result_array();
  }

  public function addUser($data)
  {
    $sql = "";

    if ($data["id_user"] == "") {
      // Insert data
      $sql = "INSERT INTO tb_user (nama_user,email_user,pass_user,level_user) VALUES (";
      $sql = $sql . "'" . $data["nama"] . "',";
      $sql = $sql . "'" . $data["username"] . "',";
      $sql = $sql . "'" . md5($data["password1"]) . "',";
      $sql = $sql . "'User'";
      $sql = $sql . ")";
    } else {
      // Update data
      $sql = "UPDATE tb_user SET ";
      $sql = $sql . "nama_user = '" . $data["nama"] . "', ";
      $sql = $sql . "email_user = '" . $data["username"] . "', ";
      if ($data["password1"] != "") {
        $sql = $sql . "nama_user = '" . $data["password1"] . "',";
      }
      $sql = substr($sql, 0, strlen($sql) - 2);
      $sql = $sql . "WHERE id_user = '" . $data["id_user"] . "'";
    }

    $this->db->query($sql);
  }

  public function deleteUser($id_user)
  {
    $sql = "DELETE FROM tb_user WHERE id_user = '$id_user' AND level_user = 'User'";
    $this->db->query($sql);
  }
}
