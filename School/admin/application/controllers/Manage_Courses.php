<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Courses extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('Course_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Courses';
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

        $data['courses'] = $this->Course_model->getRows();
        $data['title'] = 'Add Course';

        $this->load->view('manage_courses/index', $data);
    }

    public function add()
    {
        $data = $courseData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {

            // Prepare data 
            $courseData = array(
                'course_name' => $this->input->post('name'),
                'course_level' => $this->input->post('level'),
                'course_publisher_name' => $this->input->post('publisher'),
                'course_medium' => $this->input->post('medium')
            );
            // echo "<pre>";
            // print_r($_POST);
            // exit();
            if (empty($error)) {
                // Insert data 
                $insert = $this->Course_model->insert($courseData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Course has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['course'] = $courseData;
        $data['title'] = 'Add a Course';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('manage_courses/add-edit', $data);
    }

    public function edit($id)
    {
        $data = $courseData = array();

        // Get image data 
        $con = array('id' => $id);
        $courseData = $this->Course_model->getRows($con);

        // If update request is submitted 
        if ($this->input->post('Submit')) {
            $courseData = array(
                'course_name' => $this->input->post('name'),
                'course_level' => $this->input->post('level'),
                'course_publisher_name' => $this->input->post('publisher'),
                'course_medium' => $this->input->post('medium')
            );

            if (empty($error)) {
                // Update image data 
                $update = $this->Course_model->update($courseData, $id);

                if ($update) {
                    $this->session->set_userdata('success_msg', 'Course has been updated successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['course'] = $courseData;
        $data['title'] = 'Update Course';
        $data['action'] = 'Edit';

        // Load the edit page view 
        $this->load->view($this->controller . '/add-edit', $data);
    }

    public function delete($id)
    {
        // Check whether id is not empty 
        if ($id) {
            $con = array('course_id' => $id);
            $courseData = $this->Course_model->getRows($con);
            $courseData = array(
                'course_is_active' => '0'
            );

            // Delete data 
            $delete = $this->Course_model->update($courseData,$id);

            if ($delete) {
                // Remove file from the server  
                // if (!empty($courseData['course_image'])) {
                //     @unlink($this->uploadPath . $courseData['course_image']);
                // }

                $this->session->set_userdata('success_msg', 'Course has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect($this->controller);
    }
}
