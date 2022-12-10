<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function index()
	{
		$this->load->model('user_model');
		// $this->mViewData['count'] = array(
		// 	'users' => $this->users->count_all(),
		// );
		$this->mViewData['count']=$this->db->get('users')->num_rows();
		$this->render('home');
	}
}
