<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('Doc_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->mViewData['categories']=$this->Doc_model->getCategories();
		$this->mViewData['count']=$this->db->get('users')->num_rows();
		$this->render('home');
	}
}
