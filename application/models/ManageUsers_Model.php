<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class ManageUsers_Model extends CI_Model{
	public function getusersdetails(){
		$query=$this->db->select('firstName,lastName,emailId,regDate,id')
		              ->get('student');
		        return $query->result();      
	}
//Getting particular user deatials on the basis of id	
 public function getuserdetail($uid){
 	$ret=$this->db->select('firstName,lastName,emailId,regDate,id')
 	              ->where('id',$uid)
 	              ->get('student');
 	                return $ret->row();
 }

 // Function for use deletion
 public function deleteuser($uid){
$sql_query=$this->db->where('id', $uid)
                ->delete('student');
            }

}