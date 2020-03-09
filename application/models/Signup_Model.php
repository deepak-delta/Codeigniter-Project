<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Signup_Model extends CI_Model{

	public function insert($fname,$lname,$emailid,$id,$password,$status){
$data=array(
			'id'=>$id,
			'firstName'=>$fname,
			'lastName'=>$lname,
			'emailId'=>$emailid,
			'userPassword'=>$password,
			'isActive'=>$status
		);
$sql_query=$this->db->insert('student',$data);
if($sql_query){
$this->session->set_flashdata('success', 'Registration successfull');
		redirect('student/signup');
	}
	else{
		$this->session->set_flashdata('error', 'Somthing went worng. Error!!');
		redirect('student/signup');
	}

	}


}