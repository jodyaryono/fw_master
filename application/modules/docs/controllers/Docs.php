<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
    $this->load->model('Docs_model');
		$this->load->model('Admin_user_model');
	}

  public function index()
  {
		$this->db->order_by('sort','asc');
		$this->db->select('dokumentasi_modul.id,sort,keterangan,icon,color_name,modules');
		$this->db->join('modules', 'dokumentasi_modul.modul = modules.id');
		$this->db->join('colors', 'dokumentasi_modul.color = colors.id');
		$modules=$this->db->get('dokumentasi_modul')->result();
		//var_dump($modules);
		$data['modules']=$modules;

    $this->load->view('home',$data);
  }
	public function content($id)
	{
		$this->db->where('dokumentasi_modul.id',$id);

		$this->db->order_by('sort','asc');
		$this->db->join('modules', 'dokumentasi_modul.modul = modules.id');
		$this->db->join('colors', 'dokumentasi_modul.color = colors.id');
		$this->db->join('admin_users', 'dokumentasi_modul.updated_by = admin_users.id');
		$data['data']=$this->db->get('dokumentasi_modul')->row();
		$this->db->where('id_dokumentasi_modul',$id);
		$this->db->where('parent is null OR parent=""');
		$data['submodul']=$this->db->get('dokumentasi_submodul')->result();

		$this->load->view('content',$data);
	}
}
