<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends Admin_Controller {

	public function index()
	{
		$crud = $this->generate_crud('anggota');
		varDebug($crud);
		$this->mPageTitle = 'Anggota';
		$this->render_crud();
	}

}
