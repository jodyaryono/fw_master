<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends Admin_Controller {

	public function index()
	{
		$crud = $this->generate_crud('media');
		$crud->set_subject('Media');
		$crud->set_field_upload('file_url','assets/uploads/media');
		$this->mPageTitle = 'Media';
		$this->render_crud();
	}

}
