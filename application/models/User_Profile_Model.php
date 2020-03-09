<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Profile_Model extends CI_Model{

public function getprofile($userid){
	$query=$this->db->select('firstName,lastName,emailId,regDate')
                ->where('id',$userid)
                ->from('student')
                ->get();
  return $query->row();  
}

public function update_profile($fname,$lname,$userid){
$data = array(
               'firstName' =>$fname,
               'lastName' => $lname,
               'addNumber' => $userid
            );

$sql_query=$this->db->where('id', $userid)
                ->update('student', $data); 


}


}