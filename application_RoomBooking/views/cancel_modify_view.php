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
.style6 {color: #996B49}
body {
	margin-left: 1px;
}
.style8 {color: #996B49; font-size: 18px; }
.style12 {font-size: 14px; color: #666666; }
-->
</style></head>
<body bgcolor="#F4FFE4">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#5C743D">
  <tr bgcolor="#D5EDB3">
    <td colspan="3" rowspan="2"><a href="http://localhost/Lahad/login"><img src="http://localhost/mm_health_photo.jpg" alt="Header image" width="360" height="101" border="0" /></a></td>
    <td colspan="5" rowspan="2" align="center" valign="bottom" id="logo"><p align="center">The Lahad<span class="style1">TM</span></p>
    <p align="center" class="style3">JUST A PLACE TO CHILL.</p>
    <p class="style2">&nbsp;</p></td>
    <td width="218" height="50">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td width="218" height="51">&nbsp;</td>
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
    <td width="167" id="dateformat"><div align="center"><strong><a href="http://localhost/Lahad/cancelBooking/displayBooking">MODIFY/CANCEL BOOKING</a></strong></div></td>
    <td width="179" height="20" id="dateformat"><div align="center"><strong><a href="http://localhost/Lahad/registration/register_user">REGISTER USER</a></strong></div></td>
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
    <td colspan="6" align="center" valign="top" bordercolor="#5C743D" border = 1px>
      
      <div align="right">
       <table width="535" height="374" border="0" align="center" cellpadding="0" cellspacing="5" bordercolor="#5C743D">
          <tr valign="top">
            <br /><td height="58" align="center" bordercolor="#5C743D" class="pageName"><div align="center">WELCOME PEEPS.</div>
              <div><?php  if($userarray['username']!=NULL) {?>
 	<form id="cancelForm" name="cancelForm" method="post" action="http://localhost/Lahad/cancelBooking/cancel_Booking">
    <label><span class="subHeader style2"><em>CANCEL BOOKING</em><br />
    <br />
    Enter Booking ID To Cancel:</span><span class="bodyText"></label>
    <?php if($results=='0') { ?><br /><span class="style6"><span class="style3">INCORRECT BOOKING ID</span>.</span><?php } ?>
    <br />
    <br />
    <label>
    <input type="text" name="bookID" id="bookID" />
    </label>
    <label>
    <input type="submit" name="Submit" id="Submit" value="Submit" />
    </label>
  </form><?php } ?></div>
  <?php  if($userarray['username']==NULL) {?>
	 <br />
	 <span class="style3">Please Login First.</span>
	 <p>
	   <?php }?></p><?php  if($userarray['username']!=NULL) {?>
	 <hr />
	 <form action = "http://localhost/Lahad/modify/modifyBooking" method = "post">
       <p class="subHeader style2"><em>MODIFY BOOKING</em></p>
       <p><span class="subHeader style2">         Details of Booking to be modified</span><span class="subHeader style3">: 
         <?php if($results2=='0') { ?><br />
       </span><span class="style6 style3">INCORRECT BOOKING ID</span><span class="subHeader style3"><span class="style8">.</span>
       <?php } ?>
              </span>       </p>
       <p><span class="smallText style3">Booking ID :</span> 
         <input name = "old_booking_id" placeholder = "Booking ID" /> 
                </br> 
                </br>
       </p>
       <p class="subHeader"><span class="style2">New Details of the Booking [leave attributes blank to retain values] : </span></br> 
                </br>
                <!-- <input name = "booking_id" placeholder = "Booking ID" /> </br> </br> -->
         </p>
       <p><span class="smallText style7"><span class="smallText style3">Start Date : 
                <input name = "start_date"  type = "date" /> 
                </br> 
               
                <br />
                Start Time :
                <input name = "start_time"  type = "time" /> 
                </br> 
               
                <br />
                End Date : 
                <input name = "end_date" type = "date" /> 
                </br> 
               
                <br />
                End Time : 
                <input name = "end_time" type = "time" />
                </br>
                
                <br />
                Room Number : 
                <input name = "room_no"  />
                  </br>
                  
                  <br />
         Pincode : 
         <input name = "booking_pincode"  />
         <br /> 
         <br/>
                City : 
                <input name = "booking_city"  />
                <br /> 
                <br />
                Email :
                </span>
         <input name = "customer_email"  />
                  </br>
                  </br>
                  <br />
<input type = "submit" value = "Change" />
                                   </p>
       </form><?php } ?>
 </td> 
       </tr>
    </table>
        <br />
        &nbsp;<br />
    </div></td><td width="219">&nbsp;</td>
 </tr>
  <tr>
    <td width="180" bgcolor="#99CC66">&nbsp;</td>
    <td width="45" bgcolor="#99CC66">&nbsp;</td>
    <td width="195" bgcolor="#99CC66">&nbsp;</td>
    <td width="99" bgcolor="#99CC66">&nbsp;</td>
    <td width="66" bgcolor="#99CC66">&nbsp;</td>
    <td width="169" bgcolor="#99CC66">&nbsp;</td>
	<td colspan="2" bgcolor="#99CC66">&nbsp;</td>
	<td width="219" bgcolor="#99CC66">&nbsp;</td>
  </tr>
</table>
</body>
</html>
