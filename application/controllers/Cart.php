<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Cart extends MY_Controller {

	public function index()
	{
		$this->render('cart');
	}
}
