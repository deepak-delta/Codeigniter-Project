<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Viewonly extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('uid'))
redirect('student/login');
}

    function index()
    {
      $userid = $this->session->userdata('uid');
	  $this->load->model('Studentregistration_Model');
      $result['data']=$this->Studentregistration_Model->displayrecords($userid);
      $this->load->view('student/student_details_view',$result);
    }




}