<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Portfolio extends MY_Controller {


	public function portfolio_1()
	{
		$this->render('portfolio/portfolio_1');
	}
	public function portfolio_2()
	{
		$this->render('portfolio/portfolio_2');
	}
	public function portfolio_3()
	{
		$this->render('portfolio/portfolio_3');
	}
	public function portfolio_4()
	{
		$this->render('portfolio/portfolio_4');
	}
	public function portfolio_single()
	{
		$this->render('portfolio/portfolio_single');
	}
}
