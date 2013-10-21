<?php

class admin_model extends CI_Model{
	public function __construct(){
	parent::__construct();
	$this->load->database();
	}
    public function addHotel($data){
	$query = "INSERT INTO hotel VALUES(
			 '".$data['name']."','"
			 .$data['description']."',"
			 .$data['pincode'].",'"
			 .$data['city']."','"
			 .$data['country']."',"
			 .$data['serial_no'].",'"
			 .$data['street']."')";
	
	$result = $this->db->query($query);
	return $result;
	}
	
	public function modifyHotel($data){
	 $query = "SELECT * FROM hotel WHERE city = '"
	         .$data['old_city'].
			 "' AND pincode = "
			 .$data['old_pincode'];
			 			   
	$result = $this->db->query($query);
	if(!$result)
		return $result;
	$match = $result->row_array();
	
	foreach($match as $key => $value){
		if($data[$key] != ""){
			if($key == 'description' && $data[$key][0] == '+'){
				$match[$key] = $match[$key].'|'.substr($data[$key], 1);
				
			}
			else{
				$match[$key] = $data[$key];
			}
			
			
		}
	}
	
	$query ="UPDATE hotel SET name = '".
			 $match['name']."',".
			 "description = '".
			 $match['description']."',".
			 "pincode = ".
			 $match['pincode'].",".
			 "city = '".
			 $match['city']."',".
			 "country = '".
			 $match['country']."',".
			 "serial_no = ".
			 $match['serial_no'].",".
			 "street = '".
			 $match['street']."'".
	         " WHERE city = '"
	         .$data['old_city'].
			 "' AND pincode = "
			 .$data['old_pincode']
			 ;
			 			   
			
	if($result){
		$result2 = $this->db->query($query);
		return $result2;
		
	}
	else{
		return FALSE;
	}
			  
	}
	
	public function deleteHotel($data){
		$query = "DELETE FROM hotel WHERE city = '"
	         .$data['city'].
			 "' AND pincode = "
			 .$data['pincode'];
		$result = $this->db->query($query);
		return $result;
	}
	
	public function addRoom($data){
	$query = "INSERT INTO room VALUES(
			 ".$data['room_number'].",'"
			 .$data['hotel_city']."',"
			 .$data['hotel_pincode'].",'"
			 .$data['type'].")";
	
	$result = $this->db->query($query);
	return $result;
	}
	
	public function modifyRoom($data){
	
	 $query = "SELECT * FROM room WHERE hotel_city = '"
	         .$data['old_hotel_city'].
			 "' AND hotel_pincode = "
			 .$data['old_hotel_pincode'].
			 " AND room_number = "
			 .$data['old_room_number']
			 ;
			 			   
	$result = $this->db->query($query);
	if(!$result)
		return $result;
	$match = $result->row_array();
	
	foreach($match as $key => $value){
		if($data[$key] != ""){
			$match[$key] = $data[$key];
		}
	}
	
	
	
	$query = "UPDATE room SET hotel_city = '".
			 $match['hotel_city']."',".
			 "hotel_pincode = ".
			 $match['hotel_pincode'].",".
			 "type = '".
			 $match['type']."',".
			 " WHERE hotel_city = '"
	         .$data['old_hotel_city'].
			 "' AND hotel_pincode = "
			 .$data['old_hotel_pincode'].
			 " AND room_number = "
			 .$data['old_room_number']
			 ;
			 			   
	$result2 = $this->db->query($query);
		
	if($result && $result2){
		 return TRUE;
	 }
	else{
		 return FALSE;
	}
	
  }
  
  public function deleteRoom($data){
		$query = "DELETE FROM room WHERE hotel_city = '"
	         .$data['hotel_city'].
			 "' AND hotel_pincode = "
			 .$data['hotel_pincode'].
			 " AND room_number = "
			 .$data['room_number']
			 ;
		$result = $this->db->query($query);
		return $result;
	}
	
	public function deleteUser($data){
		$query = "DELETE FROM users WHERE email = '"
	         .$data['email']
			 ;
		$result = $this->db->query($query);
		return $result;
	}
	
}