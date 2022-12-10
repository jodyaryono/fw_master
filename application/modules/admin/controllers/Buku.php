<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends Admin_Controller {

	public function index()
	{
		$crud = $this->generate_crud('buku');
		$this->mPageTitle = 'Buku';
		$this->render_crud();
	}

}
