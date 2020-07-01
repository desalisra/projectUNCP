<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }



  public function validasi_login()
  {
    $email  = $this->input->post('username');
    $password = $this->input->post('password');
    $pass  = md5($password);

    $query    = $this->db->query("SELECT * FROM tb_user WHERE email_user = '$email' AND pass_user = '$pass'");

    $n_data    = $query->num_rows();
    $r_data    = $query->row();

    if ($n_data === 1) {
      $data = array(
        'user_id' => $r_data->id_user,
        'user_level' => $r_data->level_user,
        'user_nama' => $r_data->nama_user,
        'user_valid' => true
      );
      $this->session->set_userdata($data);
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Login Gagal,</strong> Email atau Password Salah.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('auth');
    }
  }
}
