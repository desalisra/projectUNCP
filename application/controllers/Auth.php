<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('auth_model');
  }

  public function cek_aktif()
  {
    if ($this->session->userdata('user_id') == true) {
      redirect('home');
    }
  }

  public function index()
  {
    $this->cek_aktif();
    $this->load->view('layout/header');
    $this->load->view('pages/login');
    $this->load->view('layout/footer');
  }

  public function login()
  {
    $this->form_validation->set_rules('username', 'username', 'required|trim', [
      'required' => 'Username Wajib Di isi'
    ]);
    $this->form_validation->set_rules('password', 'oassword', 'required|trim|min_length[4]', [
      'required' => 'Password Wajib Di isi',
      'min_length' => 'Password Min 4 karakter'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('layout/header');
      $this->load->view('pages/login');
      $this->load->view('layout/footer');
    } else {
      $this->auth_model->validasi_login();
      redirect('home');
    }
  }

  public function logout()
  {
    $data = array(
      'user_id' => "",
      'user_level' => "",
      'user_nama' => "",
      'user_valid'   => false
    );
    $this->session->set_userdata($data);
    redirect('auth');
  }
}
