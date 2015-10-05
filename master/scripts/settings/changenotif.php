<?php
	
	//////////////////////
	session_start();
	$sroot = "/mntL/group/group3";
	include $sroot."/master/scripts/functions.php";	

	$url = $_POST['url'];
	$notifs = $_POST['notifs'];
	$notification = "0";
	$newsletter = "0";

	foreach ($notifs as $notif) {
		if ($notif == "notifications") {$notification = "1";}
		if ($notif == "newsletters") {$newsletter = "1";}
	}
	$con = connect();
	$query = "UPDATE users SET emailnotifications='".$notification."', emailnewsletters='".$newsletter."' WHERE id='".$_SESSION['uid']."'";
	$result = mysqli_query($con, $query);
	if ($result == true) {
		$alerts[] = 0;
		$alerts[] = "E-mail notification preferences saved";
	} else {
		$alerts[] = 12;
	}
	$_SESSION['alerts'] = $alerts;
	header("location: ".$url);

?>