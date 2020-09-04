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
        $this->load->model('Class_model');
        $this->load->model('Section_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Fee_Sheets';
    }

    public function index()
    {
        // Get messages from the session 
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['students'] = $this->Student_model->getSectionNames();
        $data['fee_sheets'] = $this->Fee_Sheet_model->getAllStudents();
        // echo "<pre>"; print_r($data['students']);

        $data['title'] = 'Submit Fee';

        $this->load->view('manage_fee_sheets/index', $data);
    }

    public function add()
    {
        $data = $feeSheetData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {

            // Prepare data 
            $feeSheetData = array(
                'fees_student_id' => $this->input->post('fee_student'),
                'fees_student_class_id' => $this->input->post('fee_student_class'),
                'fees_student_class_section_id' => $this->input->post('fee_student_class_section'),
                'fees_submitted_amount' => $this->input->post('fee_amount'),
                'fees_submitted_date' => $this->input->post('fee_submit_date'),
                'fees_is_submitted' => $this->input->post('feeCheck')
            );

            if (empty($error)) {
                // Insert data 
                $insert = $this->Fee_Sheet_model->insert($feeSheetData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Fee has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['students'] = $this->Student_model->getRows();
        $data['classes'] = $this->Class_model->getRows();
        $data['sections'] = $this->Section_model->getRows();
        $data['feeSheet'] = $this->Fee_Sheet_model->getRows();
        // echo "<pre>"; print_r($data); exit();
        $data['title'] = 'Submit Fee';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('manage_fee_sheets/add', $data);
    }

    public function edit($id)
    {
        $data = $feeSheetData = array();

        // Get image data 
        $con = array('id' => $id);
        $feeSheetData = $this->Fee_Sheet_model->getRows($con);

        // If update request is submitted 
        if ($this->input->post('Submit')) {
            // Form field validation rules 
            // $this->form_validation->set_rules('title', 'gallery title', 'required'); 

            // Prepare gallery data 
            $feeSheetData = array(
                'fees_submitted_amount' => $this->input->post('fee_amount'),
                'fees_submitted_date' => $this->input->post('fee_submit_date'),
                'fees_is_submitted' => $this->input->post('feeCheck')
            );

            // echo "<pre>"; print_r($feeSheetData); exit();
            if (empty($error)) {
                // Update image data 
                $update = $this->Fee_Sheet_model->update($feeSheetData, $id);

                if ($update) {
                    $this->session->set_userdata('success_msg', 'Fee has been updated successfully.');
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
        $data['title'] = 'Update Fee_Sheet';
        $data['action'] = 'Edit';

        // Load the edit page view 
        $this->load->view($this->controller . '/add-edit', $data);
    }

    public function delete($id)
    {
        // Check whether id is not empty 
        if ($id) {
            $con = array('fees_id' => $id);
            $feeSheetData = $this->Fee_Sheet_model->getRows($con);
            $feeSheetData = array(
                'fees_is_active' => ('0')
            );

            // Delete data 
            $delete = $this->Fee_Sheet_model->update($feeSheetData, $id);

            if ($delete) {
                $this->session->set_userdata('success_msg', 'Fee has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect($this->controller);
    }

    public function showStudents()
    {
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $result = $this->Fee_Sheet_model->getStudentsForFee();
        if(count($result) == 1)
        {
            $studentsData = array();
            $students = $this->Student_model->getSectionNames();
            foreach ($students as $student) {
                $studentsData[] = array(
                    'fees_student_id' => $student['student_id'],
                    'fees_student_class_id' => $student['student_class_id'],
                    'fees_student_class_section_id' => $student['student_section_id'],
                    'fees_submitted_amount' => $student['student_tuition_fee']
                );
            }

            if (empty($error)) {
                // Insert data 
                // $date = date("Y-m");
                // echo $date; exit();
                $insert = $this->Fee_Sheet_model->insertArray($studentsData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Fee has been added successfully.');
                } else {
                    $this->session->set_userdata('error_msg','Some problems occurred, please try again.');
                }
                
            }
        }
        redirect($this->controller);
    }
}
