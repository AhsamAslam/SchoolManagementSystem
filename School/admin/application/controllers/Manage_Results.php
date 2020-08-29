<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Results extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Result_model');
        $this->load->model('Student_model');
        $this->load->model('Class_model');
        $this->load->model('Section_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Results';
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

        $data['results'] = $this->Result_model->getAllStudents();
        // echo "<pre>"; print_r($data['results']); exit();
        $data['title'] = 'Add Result';

        $this->load->view('templates/header');
        $this->load->view('manage_results/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data = $resultData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {

            // Prepare data 
            $resultData = array(
                'result_student_id' => $this->input->post('result_student'),
                'result_student_class_id' => $this->input->post('result_student_class'),
                'result_student_class_section_id' => $this->input->post('result_student_class_section'),
                'result_total_marks' => $this->input->post('total_marks'),
                'result_obtained_marks' => $this->input->post('obtained_marks')
            );
            // echo "<pre>"; print_r($_POST); exit();
            if (empty($error)) {
                // Insert data 
                $insert = $this->Result_model->insert($resultData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Result has been added successfully.');
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
            // echo "<pre>"; print_r($data['students']); exit();

        $data['result'] = $resultData;
        $data['title'] = 'Add a Result';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('templates/header', $data);
        $this->load->view('manage_results/add-edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data = $resultData = array();

        // Get previous data 
        $con = array('id' => $id);
        $resultData = $this->Result_model->getRows($con);
            // echo "<pre>"; print_r($data['students']); exit();

        // If update request is submitted 
        if ($this->input->post('Submit')) {
            $resultData = array(
                'result_student_id' => $this->input->post('result_student'),
                'result_student_class_id' => $this->input->post('result_student_class'),
                'result_student_class_section_id' => $this->input->post('result_student_class_section'),
                'result_total_marks' => $this->input->post('total_marks'),
                'result_obtained_marks' => $this->input->post('obtained_marks')
            );

            if (empty($error)) {
                // Update data 
                $update = $this->Result_model->update($resultData, $id);

                if ($update) {
                    $this->session->set_userdata('success_msg', 'Result has been updated successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['students'] = $this->Student_model->getSectionNames();
        $data['classes'] = $this->Class_model->getRows();
        $data['sections'] = $this->Section_model->getRows();
        $data['result'] = $resultData;
        $data['title'] = 'Update Result';
        $data['action'] = 'Edit';

        // Load the edit page view 
        $this->load->view('templates/header', $data);
        $this->load->view($this->controller . '/add-edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        // Check whether id is not empty 
        if ($id) {
            $con = array('result_id' => $id);
            $resultData = $this->Result_model->getRows($con);
            $resultData = array(
                'result_is_active' => '0'
            );

            // Delete data 
            $delete = $this->Result_model->update($resultData,$id);

            if ($delete) {
                $this->session->set_userdata('success_msg', 'Result has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect($this->controller);
    }
}
