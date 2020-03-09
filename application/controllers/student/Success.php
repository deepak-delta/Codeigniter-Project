<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Success extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('uid'))
redirect('student/login');
}
public function index(){
	
	

$this->load->view('student/success_message');

}

}