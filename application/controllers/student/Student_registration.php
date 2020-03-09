<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_registration extends CI_Controller 
{
	function __construct(){
	parent::__construct();
	if(! $this->session->userdata('uid'))
	redirect('student/login');
	}
	

	public function index()
	{
		$userid = $this->session->userdata('uid');
		$this->load->model('Studentregistration_Model');

		$reg=$this->Studentregistration_Model->validateregister($userid);

		echo $reg;
		if($reg == TRUE)
		{
			$ad = array(
				'number' => $userid,
				
			);

			$this->load->view('student/student_registration_form',$ad);

			if($this->input->post('save'))
			{
				$urn=$this->input->post('urn'); 
				$fn=$this->input->post('First_Name'); 
				$mn=$this->input->post('middle_Name');
				$ln=$this->input->post('Last_Name');
				$bd=$this->input->post('Birthday');
				$ei=$this->input->post('Email_Id');
				$mobn=$this->input->post('Mobile_Number'); 
				$g=$this->input->post('Gender'); 
				$fatnam=$this->input->post('Father_Name');
				$motnam=$this->input->post('Mother_Name');
				$addr=$this->input->post('Address');
				$city=$this->input->post('City');
				$pc=$this->input->post('Pin_Code');
				$state=$this->input->post('State');
				$coun=$this->input->post('Country'); 
				$cxb=$this->input->post('ClassX_Board'); 
				$cxp=$this->input->post('ClassX_Percentage');
				$cxyp=$this->input->post('ClassX_YrOfPassing');
				$cxib=$this->input->post('ClassXII_Board');
				$cxip=$this->input->post('ClassXII_Percentage');
				$cxiyp=$this->input->post('ClassXII_YrOfPassing');
				$gradb=$this->input->post('Graduation_Board');
				$gradp=$this->input->post('Graduation_Percentage'); 
				$gradyp=$this->input->post('Graduation_YrOfPassing'); 
				$tsn=$this->input->post('10School_Name');
				$tsl=$this->input->post('10School_location');
				$twsn=$this->input->post('12School_Name');
				$twsl=$this->input->post('12School_location');
				$cour=$this->input->post('Course');
				$bls=$this->input->post('backlogs');
				$bl=$this->input->post('Backlog');
				$trai=$this->input->post('training');

				$this->Studentregistration_Model->saverecords($userid,$urn,$fn,$mn,$ln,$bd,$ei,$mobn,$g,$fatnam,$motnam,$addr,$city,$pc,$state,$coun,
				$cxb,$cxp,$cxyp,$cxib,$cxip,$cxiyp,$gradb,$gradp,$gradyp,$tsn,$tsl,$twsn,$twsl,$cour,$bls,$bl,$trai);		
				
				redirect('student/Success');
			}

		}
		else{

		    redirect('student/Viewonly');
		}

		

	}


	


	/*public function deletedata()
	{
		$id=$this->input->get('id');
		$this->Hello_Model->deleterecords($id);
		redirect("Hello/dispdata");
	}


	public function updatedata()
	{
		$id=$this->input->get('id');
		$result['data']=$this->Hello_Model->displayrecordsById($id);
		$this->load->view('update_records',$result);	
	
		if($this->input->post('update'))
		{
			$n=$this->input->post('name');
			$e=$this->input->post('email');
			$m=$this->input->post('mobile');
			$this->Hello_Model->updaterecords($n,$e,$m,$id);
			redirect("Hello/dispdata");
		}
	}*/
}
?>