<?php
class cancelBooking extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model("newBooking");
		$this->load->library('session');	
	}

	public function cancelBookingForm($allBookings)
	{
		$resulted = array('results' => '1','results2' =>'1','Bookings'=>$allBookings);
		$this->load->view("cancel_modify_view",$resulted);
	}
	public function displayBooking()
	{	
		$userarray= $this->session->userdata('logged_in');
		$allBookings=NULL;
		if($userarray['username']!=NULL)
		{
			$allBookings=($this->newBooking->retrievebookingnumbers($userarray['username']));	
			
		}$this->cancelBookingForm($allBookings);
	}

	public function cancel_Booking()
	{
		
		$this->load->library('form_validation');

		$bookId = $this->input->post('bookID');
	

		$this->form_validation->set_rules('bookID', 'bookID', 'trim|required|xss_clean');
		
		if($this->newBooking->bookingCancellation($bookId))
			$this->load->view("BookingModifySuccessful");

		else
		{
		$resulted = array('results' => '0','results2' =>'1');
		$this->load->view("cancel_modify_view",$resulted);
		}
	}
}