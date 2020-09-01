<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Salaries extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Salary_model');
        $this->load->model('Teacher_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Salaries';
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

        // $data['teachers'] = $this->Teacher_model->getSectionNames();
        $data['salaries'] = $this->Salary_model->getAllTeachers();
        // echo "<pre>"; print_r($data['teachers']);

        $data['title'] = 'Submit Salary';

        $this->load->view('manage_salaries/index', $data);
    }

    public function add()
    {
        $data = $salaryData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {
            // echo "<pre>"; print_r($_POST); exit();

            // Prepare data 
            $salaryData = array(
                'salary_teacher_id' => $this->input->post('salary_teacher'),
                'salary_teacher_amount' => $this->input->post('salary_amount'),
                'salary_paid_date' => $this->input->post('salary_paid_date'),
                'salary_is_paid' => $this->input->post('salaryCheck')
            );

            if (empty($error)) {
                // Insert data 
                $insert = $this->Salary_model->insert($salaryData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Salary has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['teachers'] = $this->Teacher_model->getRows();
        $data['salary'] = $this->Salary_model->getRows();
        // echo "<pre>"; print_r($data); exit();
        $data['title'] = 'Submit Salary';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('manage_salaries/add', $data);
    }

    public function edit($id)
    {
        $data = $salaryData = array();

        // Get image data 
        $con = array('id' => $id);
        $salaryData = $this->Salary_model->getRows($con);

        // If update request is submitted 
        if ($this->input->post('Submit')) {
            // Form field validation rules 
            // $this->form_validation->set_rules('title', 'gallery title', 'required'); 

            // Prepare gallery data 
            $salaryData = array(
                'salary_teacher_amount' => $this->input->post('salary_amount'),
                'salary_paid_date' => $this->input->post('salary_paid_date'),
                'salary_is_paid' => $this->input->post('salaryCheck')
            );

            // echo "<pre>"; print_r($salaryData); exit();
            if (empty($error)) {
                // Update image data 
                $update = $this->Salary_model->update($salaryData, $id);

                if ($update) {
                    $this->session->set_userdata('success_msg', 'Salary has been updated successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['teachers'] = $this->Teacher_model->getRows();
        $data['salary'] = $salaryData;
        $data['title'] = 'Update Salary';
        $data['action'] = 'Edit';

        // Load the edit page view 
        $this->load->view($this->controller . '/add-edit', $data);
    }

    public function delete($id)
    {
        // Check whether id is not empty 
        if ($id) {
            $con = array('salary_id' => $id);
            $salaryData = $this->Salary_model->getRows($con);
            $salaryData = array(
                'salary_is_active' => ('0')
            );

            // Delete data 
            $delete = $this->Salary_model->update($salaryData, $id);

            if ($delete) {
                $this->session->set_userdata('success_msg', 'Salary has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect($this->controller);
    }

    public function showTeachers()
    {
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $result = $this->Salary_model->getTeachersForSalary();
        if (count($result) == 1) {
            $teachersData = array();
            $teachers = $this->Teacher_model->getRows();
            foreach ($teachers as $teacher) {
                $teachersData[] = array(
                    'salary_teacher_id' => $teacher['teacher_id'],
                    'salary_teacher_amount' => $teacher['teacher_salary']
                );
            }

            //   echo "<pre>"; print_r($data['teacherData']); exit();

            if (empty($error)) {
                // Insert data 
                $date = date("Y-m");
                // echo $date; exit();
                $insert = $this->Salary_model->insertArray($teachersData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Salary has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }
        }
        redirect($this->controller);
        
    }
}
