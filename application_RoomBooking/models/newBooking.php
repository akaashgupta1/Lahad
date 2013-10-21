<?php
class newBooking extends CI_Model {

   
   
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
    
    function createBooking($hotelPlace,$roomType,$guestNumber,$startDateTime,$endDateTime,$bookId)
    {	
		echo ($bookId);
		//dynamically creates a booking id using the date and time of booking
		//echo($bookId);
        //echo($hotelPlace);
        //echo ($startDateTime->format('Y-m-d H:i:s'));
        //echo ($startDateTime->format('Y-m-d H:i:s'));
        if($hotelPlace==NULL)
		{
			return FALSE;
		}

        $bookingPincode= $this->db->query("SELECT DISTINCT h.pincode FROM hotel h WHERE h.city = '$hotelPlace' ");
       // $bookingCity= "chennai";
        if($bookingPincode->num_rows!=0)
        {
        $row = $bookingPincode->row();
	

        //echo $row->pincode;
        $userArray=$this->session->userdata('logged_in');
        if(!$userArray)
        {
           // echo("Please login");
            $this->load->view("Login_View\guestLogin");
            return FALSE;
        }
        $customerEmail=$userArray['username'];
        $room_no= $this->getRoomNumber($hotelPlace,$roomType,$startDateTime,$endDateTime,$customerEmail,$row->pincode);
		if($room_no)
		{
        //echo($room_no->room_number);
        //echo($startDateTime);
            $query= $this->db->query("INSERT INTO booking VALUES('$bookId',STR_TO_DATE('$startDateTime', '%Y-%m-%d%H:%i'),STR_TO_DATE('$endDateTime', '%Y-%m-%d%H:%i'),$room_no->room_number,$row->pincode,'$hotelPlace','$customerEmail')");
            if($query)
		    {
			     return TRUE;

		    }
		}
        }
		return false;
    }

  public function getRoomNumber($hotelPlace,$roomType,$startDateTime,$endDateTime,$customerEmail,$bookingPincode)
{

     //SELECT 
     //FROM booking b,hotel h,room r 
     //where h.name = $hotelName and   
    //$startTime= ;
    //$endTime=;
	    if($bookingPincode==NULL)
		{
			$bookingPincode=0;
		}
			$roomArray = $this->db->query("SELECT r.room_number FROM ROOM r WHERE r.hotel_city =  '$hotelPlace' AND r.hotel_pincode = 241154 AND r.type =  '$roomType'
			AND r.room_number NOT IN (
             SELECT b.room_no
            FROM ROOM r, booking b
             WHERE b.booking_pincode =$bookingPincode
            AND b.booking_city =  '$hotelPlace'
            AND r.hotel_city = b.booking_city
            AND r.room_number = b.room_no
            AND r.type =  '$roomType'
            AND r.hotel_pincode = b.booking_pincode
            AND (
            (
            STR_TO_DATE('$startDateTime', '%Y-%m-%d%H:%i') <= b.start
            AND  STR_TO_DATE('$endDateTime', '%Y-%m-%d%H:%i') >= b.end
            )
            OR (
            STR_TO_DATE('$startDateTime', '%Y-%m-%d%H:%i') >= b.start
            AND  STR_TO_DATE('$startDateTime', '%Y-%m-%d%H:%i') <= b.end
            )
            OR (
            STR_TO_DATE('$endDateTime', '%Y-%m-%d%H:%i') >= b.start
            AND  STR_TO_DATE('$endDateTime', '%Y-%m-%d%H:%i') <= b.end
)
)
)"
);


    $roomNo = $roomArray->row();
    //echo("hello");
    //echo ($roomNo->room_number);
    return $roomNo;
}
    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
	
	 function bookingCancellation($bookId)
    {
        $count = 0;
        
        $cancelQuery = $this->db->query("SELECT * FROM booking WHERE booking_Id = '$bookId'");
        
                    $count=$cancelQuery->num_rows();
        //echo($count);
        
        if($count >0)
        {    
            $roomArray = $this->db->query("DELETE FROM booking WHERE booking_Id = '$bookId'");
             return true;
     }
        
        else
            return false;
    }
	function retrievebookingnumbers($username)
	{
		$allbookings=$this->db->query("SELECT * FROM booking b WHERE b.customer_email= '$username'");
		$stringBooking=NULL;
		if($allbookings->num_rows!=0)
		{
		foreach ($allbookings->result_array() as $row)
		{
			$stringBooking=$stringBooking.$row['booking_id'];
			if($allbookings->num_rows!=1)
				$stringBooking=$stringBooking.',';
		}
		}
		return $stringBooking;
	}
}
?>