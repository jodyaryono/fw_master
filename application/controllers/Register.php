<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Register extends MY_Controller {

	public function index()
	{
		$this->render('register');
	}
}
