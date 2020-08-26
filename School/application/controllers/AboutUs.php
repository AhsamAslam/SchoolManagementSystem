<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {

	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('aboutus');
		$this->load->view('templates/footer');
	}
}
