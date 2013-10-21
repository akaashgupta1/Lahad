<?php

class changeBooking extends CI_Model{
	public function __construct(){
	parent::__construct();
	$this->load->database();
	}
	
	public function execute($data){
		$query = "SELECT start, end, room_no, booking_pincode, booking_city, customer_email FROM booking WHERE booking_id = '"
				 .$data['old_booking_id']."'";
							   
		$result = $this->db->query($query);
		if(!$result)
			return $result;
		$match = $result->row_array();
		
		
		foreach($match as $key => $value){
			if($data[$key] != ""){
				$match[$key] = $data[$key];
								
			}
		}
		
		$query = "DELETE FROM booking WHERE booking_id = '"
				 .$data['old_booking_id']."'";
							   
			
		if($result){
			$result2 = $this->db->query($query);
			if($result2){
				return $this->addBooking($match);
			}
			else
				return FALSE;
			
		}
		else{
			return FALSE;
		}
	}
	
	public function addBooking($data){
	
	$query = "INSERT INTO booking VALUES(
			 ".$data['booking_id'].",'"
			 .$data['start']."','"
			 .$data['end']."',"
			 .$data['room_no'].","
			 .$data['booking_pincode'].",'"
			 .$data['booking_city']."','"
			 .$data['customer_email']."')";
	
	$result = $this->db->query($query);
	return $result;
	}
	
}
	
?>