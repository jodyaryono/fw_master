<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Home page
*/
class Vue extends MY_Controller {

	public function index($index=1)
	{
		// $this->render('modern/modern');
		switch ($index) {
			case 1:
			$this->render('vue/home');
			break;
			case 2:
			$this->render('vue/app');
			break;
			case 3:
			$this->render('vue/app2');
			break;
			case 4:
			$this->render('vue/app3');
			break;

			default:
			// code...
			break;
		}
	}
}
