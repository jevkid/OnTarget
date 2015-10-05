<?php

	session_start();	
	include $_SERVER['DOCUMENT_ROOT']."/group3/master/scripts/functions.php";	
	$con = connect();
	
	// Get passwords sent from form 
	$oldpw = mysqli_real_escape_string($con,stripslashes($_POST['oldpw']));
	$newpw = mysqli_real_escape_string($con,stripslashes($_POST['newpw']));
	$confnewpw = mysqli_real_escape_string($con,stripslashes($_POST['confnewpw']));
	
	// Init error array
	$alerts = array();
	
	$data = mysqli_query($con,"SELECT * FROM users WHERE id='".$_SESSION['uid']."'");
	$row = mysqli_fetch_array($data);
	
	mysqli_close($con);
		
	if ($row['password'] != hash("sha512", $oldpw)) {$alerts[] = 2;}
	if ($newpw == "" || $confnewpw == "") {$alerts[] = 3;}
	if ($newpw != $confnewpw) {$alerts[] = 4;}
	if (strlen($newpw) < 5) {$alerts[] = 10;}
	if (strlen($newpw) > 20) {$alerts[] = 11;}
	
	// If no errors..
	if (count($alerts) == 0) {
		$con = connect();
		$result = mysqli_query($con,"UPDATE users SET password='".hash("sha512", $newpw)."' WHERE id='".$_SESSION['uid']."'");
		if ($result == true) {
			$alerts[] = "Password changed successfully!";
			$alerts[] = 0;
		} else {
			$alerts[] = 12;
		}
		mysqli_close($con);
	}
	$_SESSION['alerts'] = $alerts;
	header("location:".$_POST['url']);	
  
?>