<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Fee_Sheets extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Fee_Sheet_model');
        $this->load->model('Student_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Fee_Sheets';
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

        $data['fee_sheets'] = $this->Fee_Sheet_model->getRows();
        $data['title'] = 'Submit Fee';

        $this->load->view('templates/header');
        $this->load->view('manage_fee_sheets/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data = $feeSheetData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {

            // Prepare data 
            $feeSheetData = array( 
                'fee_name' => $this->input->post('name'),
                'fee_description' => $this->input->post('description')
            ); 
            
            if (empty($error)) {
                // Insert data 
                $insert = $this->Fee_Sheet_model->insert($feeSheetData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Fee_Sheet has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['students'] = $this->Student_model->getSectionNames();
        $data['feeSheet'] = $feeSheetData; 
        // echo "<pre>"; print_r($data); exit();
        $data['title'] = 'Submit Fee';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('templates/header', $data);
        $this->load->view('manage_fee_sheets/add-edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id){ 
        $data = $feeSheetData = array(); 
         
        // Get image data 
        $con = array('id' => $id); 
        $feeSheetData = $this->Fee_Sheet_model->getRows($con); 
         
        // If update request is submitted 
        if($this->input->post('Submit')){ 
            // Form field validation rules 
            // $this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
            $feeSheetData = array( 
                'fee_name' => $this->input->post('name'),
                'fee_description' => $this->input->post('description')
            ); 
                 
                if(empty($error)){ 
                    // Update image data 
                    $update = $this->Fee_Sheet_model->update($feeSheetData, $id); 
                     
                    if($update){ 
                        $this->session->set_userdata('success_msg', 'Fee_Sheet has been updated successfully.'); 
                        redirect($this->controller); 
                    }else{ 
                        $error = 'Some problems occurred, please try again.'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            // } 
        } 

        $data['feeSheet'] = $feeSheetData; 
        $data['title'] = 'Update Fee_Sheet'; 
        $data['action'] = 'Edit'; 
         
        // Load the edit page view 
        $this->load->view('templates/header', $data); 
        $this->load->view($this->controller.'/add-edit', $data); 
        $this->load->view('templates/footer'); 
    }

    public function delete($id){ 
        // Check whether id is not empty 
        if($id){ 
            $con = array('fee_id' => $id); 
            $feeSheetData = $this->Fee_Sheet_model->getRows($con);
            $feeSheetData = array( 
                'fee_is_active' => ('0')
            ); 
             
            // Delete data 
            $delete = $this->Fee_Sheet_model->update($feeSheetData,$id); 
             
            if($delete){ 
                $this->session->set_userdata('success_msg', 'Fee_Sheet has been removed successfully.'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 

    public function showStudents(){
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 

        $students = $this->Student_model->getRows();
        foreach ($students as $student) {
            $studentsData = array( 
                'fee_student_id' => $student['student_id'],
                'fee_student_class_id' => $student['student_class_id']
            ); 
          }
        
          echo "<pre>"; print_r($studentsData); exit();
        
        if (empty($error)) {
            // Insert data 
            $insert = $this->Fee_Sheet_model->insert($studentsData);

            if ($insert) {
                $this->session->set_userdata('success_msg', 'Fee_Sheet has been added successfully.');
                redirect($this->controller);
            } else {
                $error = 'Some problems occurred, please try again.';
            }
        }

        $data['error_msg'] = $error;

        $data['fee_sheets'] = $this->Fee_Sheet_model->getRows();
        $data['title'] = 'Submit Fee';

        $this->load->view('templates/header');
        $this->load->view('manage_fee_sheets/index', $data);
        $this->load->view('templates/footer');
    }
}
