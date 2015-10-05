<?php
	
	//////////////////////
	session_start();
	$sroot = "/mntL/group/group3";
	include $sroot."/master/scripts/functions.php";	
	
	// Analysis vars
	$vori = $_POST['vori'];

	// Data vars
	$eid = $_POST['eid'];
	$bowtype = $_POST['bowtype'];
	$distance = $_POST['distance'];
	$target = $_POST['target'];

	//////////////////////
	$shots = "";
	foreach($_FILES['files']['tmp_name'] as $file) {
		if ($vori == "i") {
			$func = "doImageAnalysis ".$file;
		} else {
			$func = "doVideoAnalysis ".$file;
		}
		// CALLS MATLAB PROGRAM
		$shots .= matlab($func);
		// TEMPORARY FAKE DATA THAT DODGES THE MATLAB PROGRAM COMPLETELY
		/*$scorelength = 12;
		$posscores = array("0","1","2","3","4","5","6","7","8","9","10","X");
		for ($i = 0; $i < $scorelength; $i++) {
			$tmpscore = $posscores[rand(0, count($posscores)-1)];
			if ($tmpscore != "X") {$tmpscore = round(($tmpscore+10)/2);}
			$tmpangle = rand(0, 359);
			$shots .= $_SESSION['uid'].":".$tmpscore.":".$tmpangle.";";
		}*/
	}
	echo $shots;

	// Split rounds
	$shotarr = array_filter(explode(";", $shots));
	$con = connect();
	// Create a round
	$query = "INSERT INTO rounds (eventid, bowtype, distance, target) VALUES ('".$eid."', '".$bowtype."', '".$distance."', '".$target."')";
	//mysqli_query($con, $query);
	$roundid = mysqli_insert_id($con);
	foreach($shotarr as $shot) {
		$s = explode(":", $shot);
		if ($s[1] == "X") {$score = "10";$x = "1";} else {$score = $s[1];$x = "0";}
		$query = "INSERT INTO timeline (userid, roundid, score, angle, x) VALUES ('".$s[0]."', '".$roundid."', '".$score."', '".$s[2]."', '".$x."')";
		//mysqli_query($con, $query);
	}
	mysqli_close($con);

	$alerts = array();
	$alerts[] = "0";
	$alerts[] = "Score added successfully";

	$_SESSION['alerts'] = $alerts;
	//header("location: /group3/dashboard/");

?>