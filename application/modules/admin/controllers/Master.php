<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends Admin_Controller {

	public function mahasiswa()
	{
		$crud = $this->generate_crud('mahasiswa');
		$this->mPageTitle = 'Mahasiswa';
		$crud->fields('foto','nama','id_jurusan','telp','email','tgl_lahir');
		$crud->columns('foto','nama','id_jurusan','telp','email','tgl_lahir');
		$crud->set_relation('id_jurusan','jurusan','nama');
		$crud->set_field_upload('foto','assets/uploads/foto');
		$this->render_crud();
	}

	public function buku()
	{
		$crud = $this->generate_crud('master_buku');
		$this->mPageTitle = 'Buku';
		$this->render_crud();
	}

	public function anggota()
	{
		$crud = $this->generate_crud('master_anggota');
		$this->mPageTitle = 'Anggota';
		$this->render_crud();
	}


	public function jurusan()
	{
		$crud = $this->generate_crud('jurusan');
		$this->mPageTitle = 'jurusan';
		$this->render_crud();
	}

	function show_native()
	{
		$this->mViewData['lempar_data']="saya data Passing";
		$this->render('show_native');
	}

}
