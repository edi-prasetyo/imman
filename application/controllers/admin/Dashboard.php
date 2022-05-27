<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('transaction_model');
  }
  public function index()
  {
    $id = $this->session->userdata('id');
    $user = $this->user_model->detail($id);
    $kota_id = $user->kota_id;

    $pengurus_dpd = $this->user_model->pengurus_dpd($kota_id);

    $data = [
      'title'                     => 'Dashboard',
      'pengurus_dpd'              => $pengurus_dpd,
      'content'                   => 'admin/dashboard/dashboard'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
}
