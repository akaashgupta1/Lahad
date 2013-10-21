<?php
class processBooking extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model("newBooking");
		$this->load->library('session');	
	}
	
	public function customer_book($place=Null)
	{
			if(isset($place)) {
				$data['option'] = urldecode($place);
			}
			else {
				$data['option'] = 'Null';
			}
			$this->load->view("booking_view", $data);
			
	}
	
	public function retrieveBookingData()
	{
	//	$this->load->library('form_validation');
	//	$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|xss_clean');
	//	$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|xss_clean');
		$stringDateTime = $this->input->post('start_date').$this->input->post('inTime');
		$startDateTime = ($this->input->post('start_date').$this->input->post('inTime'));
		$endDateTime = ($this->input->post('end_date').$this->input->post('outTime'));
	 	$hotelName = $this->input->post('hotel_name');
	 	$guestNumber = $this->input->post('guest_number');
	 	$checkInTime = $this->input->post('inTime');
	 	$checkOutTime = $this->input->post('outTime');
	 	$roomType = $this->input->post('room_type');
		$bookId = date('YmdHis');
		 //$userArray=$this->session->userdata('logged_in');
		 //$customerEmail=$userArray['first_name'];
		// $difference = $startDate->diff($endDate);
		// echo($difference->days);
		// $difference1 = $startDate->diff($endDate);
		// echo($difference1->days);
	
		//$query= $this->db->query("INSERT INTO booking VALUES('$startDateTime',)");	
		if(!($this->newBooking->createBooking($hotelName,$roomType,$guestNumber,$startDateTime,$endDateTime,$bookId)))
			{
				$this->load->view("booking_unsuccessful_view");
			}	
		else 
			{
			$data = array(
				'bookid' => $bookId,
               'hotelName' => $hotelName,
               'roomType' => $roomType,
               'startDate' => $this->input->post('start_date'),
			   'endDate' => $this->input->post('end_date'),
			   'startTime' => $checkInTime,
			   'endTime' => $checkOutTime
          );
				$this->load->view("booking_successful_view",$data);
			}
		;
	}
	}
?>