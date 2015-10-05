<?php

	session_start();	
	include "/mntL/group/group3/master/scripts/functions.php";	
	$con = connect();
	
	// Get username and password sent from form 
	$myemail = mysqli_real_escape_string($con,stripslashes($_POST['myemail'])); 
	$mypassword = mysqli_real_escape_string($con,stripslashes($_POST['mypassword'])); 
	
	// Init error array
	$alerts = array();
	
	$data = mysqli_query($con,"SELECT * FROM users WHERE email='".$myemail."'");
	$row = mysqli_fetch_array($data);
	
	mysqli_close($con);
	
	// ERROR CHECKING
	if (mysqli_num_rows($data) != 1) {$alerts[] = 1;};
	if ($row['password'] != hash("sha512", $mypassword)) {$alerts[] = 2;}
	if ($myemail == "" || $mypassword == "") {$alerts[] = 3;}
	if ($row['active'] == 0) {$alerts[] = 16;}
		
	// If no errors..
	if (count($alerts) == 0) {
		// Register session"
		$_SESSION['uid'] = $row['id'];
		$_SESSION['auth'] = $row['auth'];
	} else {
		$_SESSION['alerts'] = $alerts;
	}
	header("location: ".$_POST['url']);
  
?>