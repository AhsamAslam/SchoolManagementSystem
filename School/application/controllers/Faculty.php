<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

	
	public function index()
	{
		// $this->load->view('templates/header');
		$this->load->view('faculty');
		// $this->load->view('templates/footer');
	}
}
