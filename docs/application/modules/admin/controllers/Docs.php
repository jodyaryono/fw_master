<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends Admin_Controller {

  public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
    $this->load->model('Doc_model');
	}

  public function colors()
  {
    $crud = $this->generate_crud('doc_colors');
    $this->mPageTitle = 'Warna';
    $this->render_crud();
  }

  public function settings()
  {
    $crud = $this->generate_crud('doc_settings');
    $this->mPageTitle = 'Settings';
    $this->render_crud();
  }

  public function categories()
  {
    $crud = $this->generate_crud('doc_categories');
    $crud->set_relation('color','doc_colors','color');
    $this->mPageTitle = 'Categories';
    $this->render_crud();
  }

}
