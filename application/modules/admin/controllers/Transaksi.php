<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	public function peminjaman()
	{
		$form = $this->form_builder->create_form();

		if ($form->validate())
		{

		}

		$this->mViewData['form'] = $form;
		$this->render('transaksi/peminjaman');

	}


	public function pengembalian()
	{
		$form = $this->form_builder->create_form();

		if ($form->validate())
		{

		}

		$this->mViewData['form'] = $form;
		$this->render('transaksi/pengembalian');

	}

}
