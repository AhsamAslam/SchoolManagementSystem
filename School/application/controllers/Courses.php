<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('courses');
		$this->load->view('templates/footer');
	}
}
