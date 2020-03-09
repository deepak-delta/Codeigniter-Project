<?php
class Studentregistration_Model extends CI_Model 
{


	public function validateregister($userid){
		$query=$this->db->where('addNumber',$userid);
		$account=$this->db->get('studentdetails')->row();
		if($account==NULL)
		{
			return TRUE;
			
		}
		
		else{
			return FALSE;

		}
		
	}


	function saverecords($userid,$urn,$fn,$mn,$ln,$bd,$ei,$mobn,$g,$fatnam,$motnam,$addr,$city,$pc,$state,$coun,
    $cxb,$cxp,$cxyp,$cxib,$cxip,$cxiyp,$gradb,$gradp,$gradyp,$tsn,$tsl,$twsn,$twsl,$cour,$bls,$bl,$trai)
	{
    $query="insert into studentdetails values('$userid','$urn','$fn','$mn','$ln','$bd','$ei','$mobn','$g',
            '$fatnam','$motnam','$addr','$city','$pc','$state','$coun','$cxb','$cxp','$cxyp','$cxib','$cxip','$cxiyp',
            '$gradb','$gradp','$gradyp','$tsn','$tsl','$twsn','$twsl','$cour','$bls','$bl','$trai')";
	$this->db->query($query);
    }
	


    function displayrecords($userid)
	 {
		
		$query=$this->db->select("*")
                 ->from("studentdetails")
				 ->where("addNumber", $userid)
				 ->get();
						
		
		return $query->result();
	}

	/*function deleterecords($id)
	{
		$this->db->query("delete  from users where user_id='".$id."'");
	}
	
	function displayrecordsById($id)
	{
		$query=$this->db->query("select * from users where user_id='".$id."'");
		return $query->result();
	}
	
	function updaterecords($name,$email,$mobile,$id)
	{
		$query=$this->db->query("update users SET name='$name',email='$email',mobile='$mobile' where user_id='".$id."'");
	}	*/
}