<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Students extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Student_model');
        $this->load->model('Class_model');
        $this->load->model('Section_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Students';
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

        // $studentData = $data['students'];
        // foreach($studentData as $student){
        //     $sectionId[] = $student['student_section_id']; 
        // }
        // $sectionName = $this->Student_model->getSectionNames();
        //  echo "<pre>"; print_r($sectionName); exit();

        // $data['students'] = $this->Student_model->getRows();
        $data['students'] = $this->Student_model->getSectionNames();
        $data['title'] = 'Add Student';

        $this->load->view('templates/header');
        $this->load->view('manage_students/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data = $studentData = array();
        $error = '';


        // If add request is submitted 
        if ($this->input->post('Submit')) {

            // $this->form_validation->set_rules('studentId', 'Student Identification', 'required|is_unique[students.student_identification]|xss_clean');

            // Prepare data 
            $studentData = array(
                'student_identification' => $this->input->post('studentId'),
                'student_name' => $this->input->post('name'),
                'student_contact' => $this->input->post('contact'),
                'student_email' => $this->input->post('email'),
                'student_address' => $this->input->post('address'),
                'student_father_name' => $this->input->post('father_name'),
                'student_father_cnic' => $this->input->post('father_cnic'),
                'student_class_id' => $this->input->post('student_class'),
                'student_section_id' => $this->input->post('student_section'),
                'student_admission_fee' => $this->input->post('admission_fee'),
                'student_tuition_fee' => $this->input->post('tuition_fee')
            );

            // if ($this->form_validation->run() == true) {

                // File upload configuration 
                $config['upload_path'] = './uploads/students/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                // Load and initialize upload library 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server 
                if ($this->upload->do_upload('image')) {
                    // Uploaded file data 
                    $fileData = $this->upload->data();
                    $studentData['student_image'] = $fileData['file_name'];
                    // $studentData['file_path'] = basename($fileData['file_path'])."/"; 
                    // $path_name = basename($path_name);
                } else {
                    $error = $this->upload->display_errors();
                }
                //  echo "<pre>"; print_r($_POST); exit();
                // Validate submitted form data 
                // if($this->form_validation->run() == true){ 
                if (empty($error)) {
                    // Insert data 
                    $insert = $this->Student_model->insert($studentData);

                    if ($insert) {
                        $this->session->set_userdata('success_msg', 'Student has been added successfully.');
                        redirect($this->controller);
                    } else {
                        $error = 'Some problems occurred, please try again.';
                    }
                }

                $data['error_msg'] = $error;
            // }
        }

        $data['student'] = $studentData;
        $data['classes'] = $this->Class_model->getRows();
        $data['sections'] = $this->Section_model->getRows();
        $data['title'] = 'Add a Student';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('templates/header', $data);
        $this->load->view('manage_students/add-edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data = $studentData = array();

        // Get image data 
        $con = array('id' => $id);
        $studentData = $this->Student_model->getRows($con);
        $prevImage = $studentData['student_image'];
        $sectionId = $studentData['student_section_id'];
        $sectionName = $this->Section_model->getSectionName($sectionId);
        // echo "<pre>";
        // print_r($sectionName);exit();

        // If update request is submitted 
        if ($this->input->post('Submit')) {
            // Form field validation rules 
            // $this->form_validation->set_rules('studentId', 'Student Identification', 'required|is_unique[students.student_identification]|xss_clean');
            //  if(validation_errors()) echo validation_errors();
            // Prepare gallery data 
            $studentData = array(
                'student_identification' => $this->input->post('studentId'),
                'student_name' => $this->input->post('name'),
                'student_contact' => $this->input->post('contact'),
                'student_email' => $this->input->post('email'),
                'student_address' => $this->input->post('address'),
                'student_father_name' => $this->input->post('father_name'),
                'student_father_cnic' => $this->input->post('father_cnic'),
                'student_class_id' => $this->input->post('student_class'),
                'student_section_id' => $this->input->post('student_section'),
                'student_admission_fee' => $this->input->post('admission_fee'),
                'student_tuition_fee' => $this->input->post('tuition_fee')
            );

            // Validate submitted form data 
            // if ($this->form_validation->run() == true) {
                //     // Upload image file to the server 
                //     if(!empty($_FILES['image']['name'])){ 
                //         $imageName = $_FILES['image']['name']; 

                // File upload configuration 
                $config['upload_path'] = './uploads/students/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                // Load and initialize upload library 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server 
                if ($this->upload->do_upload('image')) {
                    // Uploaded file data 
                    $fileData = $this->upload->data();
                    $studentData['student_image'] = $fileData['file_name'];

                    // Remove old file from the server  
                    // if (!empty($prevImage)) {
                    //     @unlink($this->uploadPath . $prevImage);
                    // }
                } else {
                    // $error = $this->upload->display_errors();
                }
            

            if (empty($error)) {
                // Update image data 
                $update = $this->Student_model->update($studentData, $id);

                if ($update) {
                    $this->session->set_userdata('success_msg', 'Student has been updated successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['student'] = $studentData;
        $data['classes'] = $this->Class_model->getRows();
        $data['sections'] = $this->Section_model->getRows();
        $data['sectionName'] = $sectionName['section_name'];
        $data['title'] = 'Update Student';
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
            $con = array('student_id' => $id);
            $studentData = $this->Student_model->getRows($con);
            $studentData = array(
                'student_is_active' => ('0')
            );
            // echo "<pre>"; print_r($studentData);exit();
            // Delete data 
            $delete = $this->Student_model->update($studentData, $id);

            if ($delete) {
                // Remove file from the server  
                // if (!empty($studentData['student_image'])) {
                //     @unlink($this->uploadPath . $studentData['student_image']);
                // }

                $this->session->set_userdata('success_msg', 'Student has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect($this->controller);
    }
}
