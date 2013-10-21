<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>The Lahad</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://localhost/mm_health_nutr.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
<style type="text/css">
<!--
.style1 {font-size: 8px}
.style2 {font-size: 16px}
.style3 {font-size: 14px; }
.style5 {font-size: 16px; color: #5C743D; }
body {
	margin-left: 1px;
}
.style6 {color: #996B49}
.style7 {color: #
	color: #99CC66;
	color: #99cc66;
}
-->
</style></head>
<body bgcolor="#F4FFE4">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#5C743D">
  <tr bgcolor="#D5EDB3">
    <td colspan="3" rowspan="2"><a href="http://localhost/Lahad/login"><img src="http://localhost/mm_health_photo.jpg" alt="Header image" width="360" height="101" border="0" /></a></td>
    <td colspan="5" rowspan="2" align="center" valign="bottom" id="logo"><p align="center">The Lahad<span class="style1">TM</span></p>
    <p align="center" class="style3">JUST A PLACE TO CHILL.</p>
    <p class="style2">&nbsp;</p></td>
    <td width="219" height="50">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td width="219" height="51">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="9" bgcolor="#5C743D"><img src="http://localhost/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

  <tr>
    <td colspan="9" bgcolor="#99CC66" background="http://localhost/mm_dashed_line.gif"><img src="http://localhost/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>
  <tr bgcolor="#99CC66">
  	<td id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
    <td id="dateformat" height="20">&nbsp;</td>
    <td height="20" id="dateformat"><?php $userarray=$this->session->userdata('logged_in');
		  $user=$userarray['username'];
		   $query = $this->db->query("SELECT isAdmin FROM users WHERE email='$user'");
		  $result=$query->row();
		  if($user!=NULL && $result->isAdmin==1) {?>
        <div align="center"><strong><a href="http://localhost/Lahad/admin/display">ADMIN PANEL</a></strong></div>
      <?php } ?></td>
    <td height="20" colspan="2" id="dateformat"><div align="center"><strong><a href="http://localhost/Lahad/search">SEARCH</a></strong></div></td>
    <td height="20" id="dateformat"><div align="center"><a href="http://localhost/Lahad/processBooking/customer_book">BOOK</a></div></td>
    <td width="164" id="dateformat"><div align="center"><strong><a href="http://localhost/Lahad/cancelBooking/displayBooking">MODIFY/CANCEL BOOKING</a></strong></div></td>
    <td width="173" height="20" id="dateformat"><div align="center"><strong><a href="http://localhost/Lahad/registration/register_user">REGISTER USER</a></strong></div></td>
    <td id="dateformat" height="20">	<?php
	$userarray=$this->session->userdata('logged_in');
	if($userarray['username']!=NULL)
	{?>
      <div align="center"><a href="http://localhost/Lahad/login/logout">LOGOUT</a></div>
    <?php } ?></td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#99CC66" background="http://localhost/mm_dashed_line.gif"><img src="http://localhost/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="9" bgcolor="#5C743D"><img src="http://localhost/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

 <tr>
    <td width="192" height="450" valign="top" bgcolor="#5C743D">
	<?php
	$userarray=$this->session->userdata('logged_in');
	if($userarray['username']==NULL)
	{?>
    <form name="guestLogin" action="http://localhost/Lahad/login/checkLogin" class="input" method="post">
	<table border="0" cellspacing="0" cellpadding="0" width="100%" id="navigation">
        <tr>
          <td width="199" align="center" valign="top" bgcolor="#99CC66">&nbsp;
            <p><span class="style5">&nbsp;LOGIN</span><br />          
          </p></td>
        </tr>
        <tr>
          <td width="199"><p align="center" class="quote style2">Username:<input name="username" type="text" class="username" />
          </p>          </td>
        </tr>
        
        <tr>
          <td width="199"><p align="center" class="quote style2">Password:<br />
              <input name="password" type="password" class="Passowrd" /></p>          </td>
        </tr>
        <tr>
          <td height="65">
            <div align="center">
              <input type="submit" class="submit" value="Submit" />            
          &nbsp;</div></td>
        </tr>
      </table>
      </form>
	  <?php }	 ?> 
	 <?php 
	 if($userarray['username']!=NULL)
	 {
	 $userarray=$this->session->userdata('logged_in');?>
	 <p align="center" class="quote style2">WELCOME, <br />
      <?php echo($userarray['first_name']);?></p>
	 <?php } ?>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="47">&nbsp;</td>
    <td colspan="6" valign="top" border = 1px bordercolor="#5C743D">
      
      <div align="right">
        <table width="601" height="363" border="0" align="center" cellpadding="0" cellspacing="5" bordercolor="#5C743D">
          <tr>
            <td width="591" height="47" align="center" bordercolor="#5C743D" class="pageName"><div align="center">WELCOME PEEPS.</div></td>
          </tr>
          
          <tr><?php  if($userarray['username']!=NULL) {?>
            <td valign="top" bordercolor="#5C743D" class="bodyText"><p align="center" class="style3"><span class="style6">Your Booking Was Successful.</span><br />
              The Details Are:<br /><br />
              <strong><?php echo('Booking ID: ');?></strong>
			  <?php echo($bookid)?><br />
             <strong><?php echo('Hotel Name: ');?></strong>
			  <?php echo($hotelName)?><br />
             <strong> <?php echo('Room Type: ');?></strong>
              <?php echo($roomType)?><br />
             <strong> <?php echo('Start Date: ');?></strong>
              <?php echo($startDate)?><br />
             <strong> <?php echo('Start Time: ');?></strong>
              <?php echo($startTime)?><br />
             <strong> <?php echo('End Date: ');?></strong>
              <?php echo($endDate)?><br />
             <strong> <?php echo('End Time: ');?></strong>
              <?php echo($endTime)?><br />
                <br />
              </p>
              <?php }?>
  <?php  if($userarray['username']==NULL) {?>
	<td valign="top" bordercolor="#5C743D" class="bodyText"><p align="center" class="style3 style7">Please Login First.</p>
	<?php }?>
          <p align="center" class="style3">&nbsp;</p>          
          </tr>
        </table>
        <br />
        &nbsp;<br />
    </div></td><td width="219">&nbsp;</td>
 </tr>
  <tr>
    <td width="192" bgcolor="#99CC66">&nbsp;</td>
    <td width="47" bgcolor="#99CC66">&nbsp;</td>
    <td width="173" bgcolor="#99CC66">&nbsp;</td>
    <td width="69" bgcolor="#99CC66">&nbsp;</td>
    <td width="109" bgcolor="#99CC66">&nbsp;</td>
    <td width="173" bgcolor="#99CC66">&nbsp;</td>
	<td colspan="2" bgcolor="#99CC66">&nbsp;</td>
	<td width="219" bgcolor="#99CC66">&nbsp;</td>
  </tr>
</table>
</body>
</html>
