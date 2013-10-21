<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lahad</title>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:11px;
	top:8px;
	width:332px;
	height:250px;
	z-index:1;
}
-->
</style>
<script>
function validateForm()
{
	//var x= document.forms["bookForm"][]
	return true;
}

</script>
</head>

<body>
<?php
      $userArray=$this->session->userdata('logged_in');
      echo("Welcome,");
      echo($userArray['first_name']);
     // <html><br/></html>;
?>

<div id="apDiv1">
  <br/><br/>
  <form id="bookForm" name="bookForm" method="post" action="http://localhost/Lahad/processBooking/retrieveBookingData" onsubmit= "return validateForm()">
    Hotel Name: &emsp;
    <select name="hotel_name" id="hotel_name">
      <option selected="selected"> New York</option>
      <option> Cairo</option>
      <option> LA</option>
      <option> Bali</option>
      <option> Singapore</option>
      <option> Hanoi</option>
      <option> Rome</option>
      <option> New Delhi</option>
      <option> Paris</option>
      <option> Pretoria</option>
      <option> Hong Kong</option>
    </select>
    <label> <br />
    <br />
    Room Type: &emsp;
    <select name="room_type" id="room_type">
      <option>Single Bed Room</option>
      <option>Double Bed Room</option>
      <option>Standard Suite</option>
      <option>Deluxe Suite</option>
      <option>Emperor Suite</option>
    </select>
    </label>
    <label> <br />
    <br />
    Number of Guests: &emsp;
    <select name="guest_number" id="guest_number">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
    </label>
    <label> <br />
    <br />
    Start Date: &emsp;
    <input name="start_date" type="date" id="start_date" value="DD-MM-YYYY" />
    </label>
    <label> <br />
    <br />
    Check-In Time: 
    <input name="inTime" type="time" id="inTime" value="HH-MM-SS" />
    <br />
    <br />
    End Date: &emsp;
     <input name="end_date" type="date" value="YYYY" />
    </label>
    <p>Check-out Time: 
      <label>
      <input name="outTime" type="time" value="HH-MM-SS" />
      </label>
      <br/>
      <br/>
      <input type="submit" class="submit" value="Submit" />
    </p>
  </form>
  <p></p>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

