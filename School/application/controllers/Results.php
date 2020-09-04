<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Result_model');

        // Default controller name 
        $this->controller = 'Results';
    }
	
	public function index()
	{
        $data['results'] = $this->Result_model->getAllStudents();

		$this->load->view('results',$data);
	}
}
