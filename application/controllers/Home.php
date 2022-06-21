<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{
		$this->render('modern/modern');
	}
	public function send_tele($msg)
	{
		$this->telegram_lib->sendmsg($msg);
		$this->telegram_lib->sendlocation("12.114","72.100");
		// $this->telegram_lib->sendimg("/path/to/img","img caption")@img path,@caption=optional
		// $this->telegram_lib->sendaudio("/path/to/audio","audio caption")@audio path,@caption=optional
		// $this->telegram_lib->senddoc("/path/to/doc","doc caption")@doc path,@caption=optional
		// $this->telegram_lib->sendvenue("12.114","72.100","title","address")@lat,@long,@title,@address
		// $this->telegram_lib->sendcontact("9874651230","first name","last name")@phone,@first_name,@last_name=optional
	}
}
