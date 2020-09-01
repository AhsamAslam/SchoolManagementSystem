<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculty extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load model 
		$this->load->model('teacher_model');

		// Default controller name 
		$this->controller = 'Faculty';
	}

	public function index()
	{
		$data['teachers'] = $this->teacher_model->getRows();

		$this->load->view('faculty',$data);
	}
}
