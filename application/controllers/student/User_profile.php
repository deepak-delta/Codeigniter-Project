<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User_profile extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('uid'))
redirect('student/login');
$this->load->model('User_Profile_Model');
}

public function index(){
$userid = $this->session->userdata('uid');
$profiledetails=$this->User_Profile_Model->getprofile($userid);
$this->load->view('student/user_profile',['profile'=>$profiledetails]);

}


public function updateprofile(){
$this->form_validation->set_rules('firstname','First Name','required|alpha');
$this->form_validation->set_rules('lastname','Last  Name','required|alpha');
$this->form_validation->set_rules('id','Admission Number','required|exact_length[7]');
if($this->form_validation->run()){
$fname=$this->input->post('firstname');
$lname=$this->input->post('lastname');
$adnumber=$this->input->post('id');
$userid = $this->session->userdata('uid');
$this->User_Profile_Model->update_profile($fname,$lname,$adnumber,$userid);
$this->session->set_flashdata('success','Profile updated successfull.');
return redirect('student/user_profile');

} else {
	$this->session->set_flashdata('error', 'Something went wrong. Please try again with valid format.');
redirect('student/user_profile');
}

}


public function uploadImage() { 


	$config['upload_path']   = './uploads/'; 
	$config['allowed_types'] = 'gif|jpg|png'; 
	$config['max_size']      = 1024;
	$this->load->library('upload', $config);


	if ( ! $this->upload->do_upload('image')) {
	   $error = array('error' => $this->upload->display_errors()); 
	   $this->load->view('imageUploadForm', $error); 
	}else { 
	   print_r('Image Uploaded Successfully.');
	   exit;
	} 
 }
}
