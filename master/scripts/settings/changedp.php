<?php

	session_start();	
	include $_SERVER['DOCUMENT_ROOT']."/group3/master/scripts/functions.php";	
	$con = connect();
	
	// Get passwords sent from form 
	$fburl = mysqli_real_escape_string($con,stripslashes($_POST['fburl']));
	
	// Init error array
	$alerts = array();
	
	$data = mysqli_query($con,"SELECT * FROM users WHERE id='".$_SESSION['uid']."'");
	$row = mysqli_fetch_array($data);
	
	mysqli_close($con);
		
	if (strpos(file_get_contents("http://graph.facebook.com/".$fburl."/picture?type=large"),"error") !== false) {$alerts[] = 28;}
	
	// If no errors..
	if (count($alerts) == 0) {
		$con = connect();
		$result = mysqli_query($con,"UPDATE users SET fbid='".$fburl."' WHERE id='".$_SESSION['uid']."'");
		if ($result == true) {
			$alerts[] = "Picture updated successfully";
			$alerts[] = 0;
		} else {
			$alerts[] = 12;
		}
		mysqli_close($con);
	}
	$_SESSION['alerts'] = $alerts;
	header("location:".$_POST['url']);	
  
?>