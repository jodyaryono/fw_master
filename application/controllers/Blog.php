<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Blog extends MY_Controller {


	public function home()
	{
		$this->render('blog/home');
	}
	public function home2()
	{
		$this->render('blog/home2');
	}
	public function blog_post()
	{
		$this->render('blog/blog_post');
	}

}
