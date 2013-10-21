<?php
class admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("admin_model");		
		$this->load->library('session');
	}
	
	public function display(){
		$this->load->view("admin_page.php");
	}
	
	public function process(){
	$resulted = array('results' => '1');
	 switch($this->input->post('query')){
		case "Add Hotel": $this->load->view("AddHotel",$resulted);
		 break;
		case "Delete Hotel": $this->load->view("DeleteHotel",$resulted);
		 break;
		case "Modify Hotel": $this->load->view("ModifyHotel",$resulted);
		 break;
		case "Add Room": $this->load->view("AddRoom",$resulted);
		 break;
		case "Delete Room": $this->load->view("DeleteRoom",$resulted);
		 break;
		case "Modify Room": $this->load->view("ModifyRoom",$resulted);
		 break;
		case "Add User": $this->load->view("Login_view/guestRegistration");
		 break;
		case "Remove User": $this->load->view("removeUser",$resulted);
		 break;
		default:
		 $this->load->view("admin_page");
		 
		 
	    }
	  
	}
	
	public function addHotel(){
	$data = array(
	'name' => $this->input->post('name'),
	'description' => $this->input->post('description'),
	'pincode' => $this->input->post('pincode'),
	'city' => $this->input->post('city'),
	'country' => $this->input->post('country'),
	'serial_no' => $this->input->post('serial_no'),
	'street' => $this->input->post('street')
	);
	$this->security->xss_clean($data);
	$result = $this->admin_model->addHotel($data);
	if(!$result){
		$resulted = array('results' => '0');
		$this->load->view('AddHotel',$resulted);
	}
	else
		$this->load->view('AdminSuccessful');
  }
	
   public function modifyHotel(){
	$data = array(
	'old_pincode' => $this->input->post('old_pincode'),
	'old_city' => $this->input->post('old_city'),
	'name' => $this->input->post('name'),
	'description' => $this->input->post('description'),
	'pincode' => $this->input->post('pincode'),
	'city' => $this->input->post('city'),
	'country' => $this->input->post('country'),
	'serial_no' => $this->input->post('serial_no'),
	'street' => $this->input->post('street')
	);
	
	$this->security->xss_clean($data);
	$result = $this->admin_model->modifyHotel($data);
	if(!$result){
		$resulted = array('results' => '0');
		$this->load->view('ModifyHotel',$resulted);
	}
	else
		$this->load->view('AdminSuccessful');
   }
   
   public function deleteHotel(){
	$data = array(
			'city' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode')
			);
	$this->security->xss_clean($data);
	$result = $this->admin_model->deleteHotel($data);
	if(!$result){
				$resulted = array('results' => '0');
		$this->load->view('DeleteHotel',$resulted);
	}
	else
		$this->load->view('AdminSuccessful');
   }
   
   public function addRoom(){
	$data = array(
	'room_number' => $this->input->post('room_number'),
	'hotel_city' => $this->input->post('hotel_city'),
	'hotel_pincode' => $this->input->post('hotel_pincode'),
	'type' => $this->input->post('type')
	
	);
	
	$this->security->xss_clean($data);
	$result = $this->admin_model->addRoom($data);
	if(!$result){
		$resulted = array('results' => '0');
		$this->load->view('AddRoom',$resulted);
	}
	else
		$this->load->view('AdminSuccessful');
   }
  
  public function modifyRoom(){
	$data = array(
	'old_room_number' => $this->input->post('old_room_number'),
	'old_hotel_city' => $this->input->post('old_hotel_city'),
	'old_hotel_pincode' => $this->input->post('old_hotel_pincode'),
	'room_number' => $this->input->post('room_number'),
	'hotel_city' => $this->input->post('hotel_city'),
	'hotel_pincode' => $this->input->post('hotel_pincode'),
	'type' => $this->input->post('type')
	);
	
	$this->security->xss_clean($data);
	$result = $this->admin_model->modifyRoom($data);
	if(!$result){
		$resulted = array('results' => '0');
		$this->load->view('ModifyRoom',$resulted);
	}
	else
		$this->load->view('AdminSuccessful');
   }
   
   public function deleteRoom(){
	$data = array(
			'hotel_city' => $this->input->post('hotel_city'),
			'hotel_pincode' => $this->input->post('hotel_pincode'),
			'room_number' => $this->input->post('room_number')
			);
	$this->security->xss_clean($data);
	$result = $this->admin_model->deleteRoom($data);
	if(!$result){
		$resulted = array('results' => '0');
		$this->load->view('DeleteRoom',$resulted);
	}
	else
		$this->load->view('AdminSuccessful');
   }
   
      
   public function removeUser(){
		$data = array(
				'email' => $this->input->post('email'),
				);
		$this->security->xss_clean($data);
		$result = $this->admin_model->deleteUser($data);
		if(!$result){
			$resulted = array('results' => '0');
			$this->load->view('removeUser',$resulted);
		}
		else
			$this->load->view('AdminSuccessful');
	
   }
   
}
?>