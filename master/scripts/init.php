<?php

	////////// INIT PREPAGE //////////

	// Get/Set addresses
	$domain = "group.cs.cf.ac.uk/group3";
	$sroot = "/mntL/group/group3";
	$wroot = "/group3";
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	// SET NOCACHE
	header("Pragma: no-cache");
	////////// LOAD FUNCTIONS //////////
	include $sroot."/master/scripts/functions.php";
	
	////////// LOAD ERROR CODES //////////
	include $sroot."/master/scripts/alertify/alerts.php";
	
	////////// LOAD ALERTS, SESSION & CHECK LOGIN SCRIPTS //////////
	include $sroot."/master/scripts/sessions/session.php";
	include $sroot."/master/scripts/sessions/checklogin.php";
	
	////////// LOAD PAGE SETTINGS //////////
	include $sroot."/master/scripts/settings.php";
	
	// URL Booleans
	$curpage = -1;
	if (strpos($url,'/admin') !== false) {
		if ($admin == false) {header("location: http://www.cardiffuac.com");}
		$curpage = 10;
		if (strpos($url,'/admin/users') !== false) {$curpage = 11;}
		else if (strpos($url,'/admin/dates') !== false) {$curpage = 12;}
		else if (strpos($url,'/admin/gallery') !== false) {$curpage = 13;}
	} else {
		if (strpos($url,'/home') !== false || strpos($url,'/dashboard') !== false) {$curpage = 0;}
		else if (strpos($url,'/about') !== false) {$curpage = 1;}
		else if (strpos($url,'/clubs') !== false) {$curpage = 2;}
		else if (strpos($url,'/events') !== false) {$curpage = 3;}
		else if (strpos($url,'/gallery') !== false) {$curpage = 4;}
		else if (strpos($url,'/settings') !== false) {$curpage = 5;}
	}
	
	// Auth names
	$authnames[-1] = 'Guest';
	$authnames[0] = 'Standard User';
	$authnames[1] = 'Club Committee';
	$authnames[2] = 'Club President';
	$authnames[3] = 'Site Admin';
	
	// Class names
	$classnames[0] = 'Beginner';
	$classnames[1] = 'Intermediate';
	$classnames[2] = 'Experienced';
	
	// If admin section of site loaded
	if ($curpage >= 5) {
		$pagetitle = "[Admin] ".$title." - ".$uid;
	} else {
		$pagetitle = $title;
		if ($loggedin == true) {
			$user = getTable("SELECT * FROM users WHERE id='".$uid."'", 1);
			$pagetitle .= " @ ".$user['fname']." ".$user['sname'];
		}
	}
	
?>