<?php
class modify extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("changeBooking");
		$this->load->library('session');				
	}
	public function editBooking(){
		$this->load->view("ModifyBookingView");
	}
	public function modifyBooking(){
		$data = array(
		'old_booking_id' =>  $this->input->post('old_booking_id'),
		'start_date' => $this->input->post('start_date'),
		'start_time' => $this->input->post('start_time') ,
		'start' => $this->input->post('start_date').' '.$this->input->post('start_time').':00',
		'end' => $this->input->post('end_date').' '.$this->input->post('end_time').':00',
		'end_date' => $this->input->post('end_date'),
		'end_time' => $this->input->post('end_time'),
		'room_no' => $this->input->post('room_no'),
		'booking_pincode' => $this->input->post('booking_pincode'),
		'booking_city' => $this->input->post('booking_city'),
		'customer_email' => $this->input->post('customer_email')
		);
		
		if(($data['start_date'] == '' && $data['start_time'] == '')){
			$data['start'] = '';
		}
		
		if(($data['end_date'] == '' && $data['end_time'] == '')){
			$data['end'] = '';
		}
		
		if( ($data['start_date'] == '' && $data['start_time'] != '') ||
			($data['start_date'] != '' && $data['start_time'] == '') ||
			($data['end_date'] == '' && $data['end_time'] != '') ||
			($data['end_date'] != '' && $data['end_time'] == '') 
		   ){
			$resulted = array('results' => '1','results2' =>'1');
			$this->load->view('ModifyBookingView');
		}
		
		else{
		
			$this->security->xss_clean($data);
			$result = $this->changeBooking->execute($data);
			if(!$result){
				$resulted = array('results' => '1','results2' =>'0');
				$this->load->view("cancel_modify_view",$resulted);
			}
			else 
			{
				$this->load->view("BookingModifySuccessful");
			}
		}
		
	}
}
	
	?>