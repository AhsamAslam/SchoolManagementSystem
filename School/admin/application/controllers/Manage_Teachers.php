<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Teachers extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load product model 
        $this->load->model('teacher_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        // Default controller name 
        $this->controller = 'Manage_Teachers';
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

        $data['teachers'] = $this->teacher_model->getRows();
        $data['title'] = 'Add Teacher';

        $this->load->view('templates/header');
        $this->load->view('Manage_Teachers/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data = $teacherData = array();
        $error = '';

        // If add request is submitted 
        if ($this->input->post('Submit')) {
            // Form field validation ruless 
            // $this->form_validation->set_rules('name', 'teacher name', 'required'); 
            // $this->form_validation->set_rules('teacher_contact', 'teacher contact', 'required'); 
            // $this->form_validation->set_rules('teacher_email', 'teacher email', 'required'); 
            // $this->form_validation->set_rules('teacher_address', 'teacher address', 'required'); 
            // $this->form_validation->set_rules('teacher_father_name', 'father name', 'required'); 
            // $this->form_validation->set_rules('teacher_father_cnic', 'father cnic', 'required'); 
            // $this->form_validation->set_rules('teacher_image', 'teacher image', 'required'); 

            // Prepare data 
            $teacherData = array(
                'teacher_name' => $this->input->post('name'),
                'teacher_contact' => $this->input->post('contact'),
                'teacher_email' => $this->input->post('email'),
                'teacher_address' => $this->input->post('address'),
                'teacher_cnic' => $this->input->post('teacher_cnic')
            );
            // File upload configuration 
            $config['upload_path'] = './uploads/teachers/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library 
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server 
            if ($this->upload->do_upload('image')) {
                // Uploaded file data 
                $fileData = $this->upload->data();
                $teacherData['teacher_image'] = $fileData['file_name'];
                // $teacherData['file_path'] = basename($fileData['file_path'])."/"; 
                // $path_name = basename($path_name);
            } else {
                $error = $this->upload->display_errors();
            }
            //  echo "<pre>"; print_r($_POST); exit();
            // Validate submitted form data 
            // if($this->form_validation->run() == true){ 
            if (empty($error)) {
                // Insert data 
                $insert = $this->teacher_model->insert($teacherData);

                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Teacher has been added successfully.');
                    redirect($this->controller);
                } else {
                    $error = 'Some problems occurred, please try again.';
                }
            }

            $data['error_msg'] = $error;
            // } 
        }

        $data['teacher'] = $teacherData; 
        $data['title'] = 'Add a Teacher';
        $data['action'] = 'Upload';

        // Load the add page view 
        $this->load->view('templates/header', $data);
        $this->load->view('Manage_Teachers/add-edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id){ 
        $data = $teacherData = array(); 
         
        // Get image data 
        $con = array('id' => $id); 
        $teacherData = $this->teacher_model->getRows($con); 
        $prevImage = $teacherData['teacher_image']; 
         
        // If update request is submitted 
        if($this->input->post('Submit')){ 
            // Form field validation rules 
            // $this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
            $teacherData = array( 
                'teacher_name' => $this->input->post('name'),
                'teacher_contact' => $this->input->post('contact'),
                'teacher_email' => $this->input->post('email'),
                'teacher_address' => $this->input->post('address'),
                'teacher_cnic' => $this->input->post('teacher_cnic')
            ); 
             
            // Validate submitted form data 
            // if($this->form_validation->run() == true){ 
            //     // Upload image file to the server 
            //     if(!empty($_FILES['image']['name'])){ 
            //         $imageName = $_FILES['image']['name']; 
                     
                    // File upload configuration 
                    $config['upload_path'] = './uploads/teachers/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('image')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $teacherData['teacher_image'] = $fileData['file_name']; 
                         
                        // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink($this->uploadPath.$prevImage);  
                        } 
                    }else{ 
                        $error = $this->upload->display_errors();  
                    } 
                // } 
                 
                if(empty($error)){ 
                    // Update image data 
                    $update = $this->teacher_model->update($teacherData, $id); 
                     
                    if($update){ 
                        $this->session->set_userdata('success_msg', 'Teacher has been updated successfully.'); 
                        redirect($this->controller); 
                    }else{ 
                        $error = 'Some problems occurred, please try again.'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            // } 
        } 

        $data['teacher'] = $teacherData; 
        $data['title'] = 'Update Teacher'; 
        $data['action'] = 'Edit'; 
         
        // Load the edit page view 
        $this->load->view('templates/header', $data); 
        $this->load->view($this->controller.'/add-edit', $data); 
        $this->load->view('templates/footer'); 
    }

    public function delete($id){ 
        // Check whether id is not empty 
        if($id){ 
            $con = array('teacher_id' => $id); 
            $teacherData = $this->teacher_model->getRows($con); 
            $teacherData = array( 
                'teacher_is_active' => ('0')
            ); 
             
            // Delete data 
            $delete = $this->teacher_model->update($teacherData,$id); 
             
            if($delete){ 
                // Remove file from the server  
                if(!empty($teacherData['teacher_image'])){ 
                    @unlink($this->uploadPath.$teacherData['teacher_image']);  
                }  
                 
                $this->session->set_userdata('success_msg', 'Teacher has been removed successfully.'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
}
