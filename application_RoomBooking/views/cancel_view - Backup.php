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
<p>
  <?php
      $userArray=$this->session->userdata('logged_in');
      echo("Welcome,");
      echo($userArray['first_name']);
     // <html><br/></html>;
?>
</p>
<p>Enter Booking ID To Cancel: </p>
  <form id="cancelForm" name="cancelForm" method="post" action="http://localhost/Lahad/cancelBooking/removeBookingData" onsubmit= "return validateForm()">
    <label>
    <input type="text" name="bookID" id="bookID" />
    </label>
    <label>
    <input type="submit" name="Submit" id="Submit" value="Submit" />
    </label>
  
  </form>
<p>&nbsp;</p>
</body>