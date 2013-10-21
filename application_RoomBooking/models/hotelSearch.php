<?php
class hotelSearch extends CI_Model{
	public function __construct(){
	parent::__construct();
	$this->load->database();
	$query = "CREATE OR REPLACE VIEW hotelSearch as
			SELECT city, country, street, description
			FROM hotel";
	$result = $this->db->query($query);
	}

	public function searchHotel($data){
		$query = "SELECT * FROM hotelSearch WHERE
				city LIKE '%".$data."%' OR
				street LIKE '%".$data."%' OR
				country LIKE '%".$data."%' OR
				description LIKE '%".$data."%'";
		$result = $this->db->query($query);
		if ($result->num_rows == 0){
			return False;
		}
		else return $result;
	}
	
}
?>