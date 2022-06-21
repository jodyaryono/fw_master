<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Modern extends MY_Controller {

	public function index()
	{
		$this->render('modern/modern');
	}
	public function about()
	{
		$this->render('modern/about');
	}
	
}
