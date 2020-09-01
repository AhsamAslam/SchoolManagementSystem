<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Sections extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Section_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Sections';
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

        $data['sections'] = $this->Section_model->getRows();
        $data['title'] = 'Add Section';

        $this->load->view('manage_sections/index', $data);
    }

    public function add()
    {
        $data = $sectionData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {

            // Prepare data 
            $sectionData = array( 
                'section_name' => $this->input->post('name'),
                'section_description' => $this->input->post('description')
            ); 
            
            if (empty($error)) {
                // Insert data 
                $insert = $this->Section_model->insert($sectionData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Section has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['section'] = $sectionData; 
        $data['title'] = 'Add a Section';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('manage_sections/add-edit', $data);
    }

    public function edit($id){ 
        $data = $sectionData = array(); 
         
        // Get image data 
        $con = array('id' => $id); 
        $sectionData = $this->Section_model->getRows($con); 
         
        // If update request is submitted 
        if($this->input->post('Submit')){ 
            // Form field validation rules 
            // $this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
            $sectionData = array( 
                'section_name' => $this->input->post('name'),
                'section_description' => $this->input->post('description')
            ); 
                 
                if(empty($error)){ 
                    // Update image data 
                    $update = $this->Section_model->update($sectionData, $id); 
                     
                    if($update){ 
                        $this->session->set_userdata('success_msg', 'Section has been updated successfully.'); 
                        redirect($this->controller); 
                    }else{ 
                        $error = 'Some problems occurred, please try again.'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            // } 
        } 

        $data['section'] = $sectionData; 
        $data['title'] = 'Update Section'; 
        $data['action'] = 'Edit'; 
         
        // Load the edit page view 
        $this->load->view($this->controller.'/add-edit', $data); 
    }

    public function delete($id){ 
        // Check whether id is not empty 
        if($id){ 
            $con = array('section_id' => $id); 
            $sectionData = $this->Section_model->getRows($con);
            $sectionData = array( 
                'section_is_active' => ('0')
            ); 
             
            // Delete data 
            $delete = $this->Section_model->update($sectionData,$id); 
             
            if($delete){ 
                $this->session->set_userdata('success_msg', 'Section has been removed successfully.'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
}
