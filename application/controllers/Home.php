<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->isLogin($this->session->userdata('user_id'));
    $this->load->library('form_validation');
    $this->load->model('home_model');
  }

  function isLogin($user_id)
  {
    if ($user_id == "") {
      redirect('auth');
    }
  }

  public function index()
  {
    $this->load->view('layout/header');
    $this->load->view('pages/home');
    $this->load->view('layout/footer');
  }
}
