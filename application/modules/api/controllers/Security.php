<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Security extends Api_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Admin_user_model');
    $this->load->library('session');
    $this->load->helper('custom');
  }
    public function list_users_get(){
        $data=$this->db->get('admin_users')->result();
        
        return $this->response($data);
    }
}