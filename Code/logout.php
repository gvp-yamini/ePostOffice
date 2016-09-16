<?php
 session_start();
    unset($_SESSION['SESS_USERNAME']);
	unset($_SESSION['SESS_FNAME']);
	unset($_SESSION['SESS_LNAME']);
	unset($_SESSION['SESS_EMAIL']);
	unset($_SESSION['SESS_BDAY']);
	
	
	unset($_SESSION['SESS_STREETNAME']);
	unset($_SESSION['SESS_CITY']);
	unset($_SESSION['SESS_STATE']);
	unset($_SESSION['SESS_PCODE']);
	unset($_SESSION['SESS_COUNTRY']);
	
 header('location: index1.html');
 exit;
 ?>