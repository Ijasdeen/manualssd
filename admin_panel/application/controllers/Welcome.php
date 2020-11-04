<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('home/home');
		$this->load->view('layouts/footer');
	}
}
