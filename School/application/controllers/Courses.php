<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Course_model');
        // Default controller name 
        $this->controller = 'Courses';
    }
	
	public function index()
	{
        $data['courses'] = $this->Course_model->getRows();
		$this->load->view('courses',$data);
	}
}
