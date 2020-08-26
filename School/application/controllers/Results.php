<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {

	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('results');
		$this->load->view('templates/footer');
	}
}
