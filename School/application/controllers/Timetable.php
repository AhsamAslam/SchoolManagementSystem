<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable extends CI_Controller {

	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('timetable');
		$this->load->view('templates/footer');
	}
}
