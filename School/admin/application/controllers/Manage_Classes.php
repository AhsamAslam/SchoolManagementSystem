<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Classes extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Class_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Classes';
    }

    public function index()
    {
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 

        $data['classes'] = $this->Class_model->getRows();
        $data['title'] = 'Add Class';

        $this->load->view('manage_classes/index', $data);
    }

    public function add()
    {
        $data = $classData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {

            // Prepare data 
            $classData = array( 
                'class_name' => $this->input->post('name'),
                'class_description' => $this->input->post('description')
            ); 
            
            if (empty($error)) {
                // Insert data 
                $insert = $this->Class_model->insert($classData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Class has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['class'] = $classData; 
        $data['title'] = 'Add a Class';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('manage_classes/add-edit', $data);
    }

    public function edit($id){ 
        $data = $classData = array(); 
         
        // Get image data 
        $con = array('id' => $id); 
        $classData = $this->Class_model->getRows($con); 
         
        // If update request is submitted 
        if($this->input->post('Submit')){ 
            // Form field validation rules 
            // $this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
            $classData = array( 
                'class_name' => $this->input->post('name'),
                'class_description' => $this->input->post('description')
            ); 
                 
                if(empty($error)){ 
                    // Update image data 
                    $update = $this->Class_model->update($classData, $id); 
                     
                    if($update){ 
                        $this->session->set_userdata('success_msg', 'Class has been updated successfully.'); 
                        redirect($this->controller); 
                    }else{ 
                        $error = 'Some problems occurred, please try again.'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            // } 
        } 

        $data['class'] = $classData; 
        $data['title'] = 'Update Class'; 
        $data['action'] = 'Edit'; 
         
        // Load the edit page view 
        $this->load->view($this->controller.'/add-edit', $data); 
    }

    public function delete($id){ 
        // Check whether id is not empty 
        if($id){ 
            $con = array('class_id' => $id); 
            $classData = $this->Class_model->getRows($con); 
            $classData = array( 
                'class_is_active' => ('0')
            ); 
             
            // Delete data 
            $delete = $this->Class_model->update($classData,$id); 
             
            if($delete){ 
                $this->session->set_userdata('success_msg', 'Class has been removed successfully.'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
}
