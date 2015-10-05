<?php
	
	session_start();	
	include "/mntL/group/group3/master/scripts/functions.php";
	$con = connect();
	
	$fname = ucfirst(addslashes($_POST['fname']));
	$sname = ucfirst(addslashes($_POST['sname']));
	$email = $_POST['email'];
	if ($_POST['password'] == "") {$password = "password";}
	else {$password = $_POST['password'];}
	if ($_POST['class'] == "") {$class = "0";}
	else {$class = $_POST['class'];}
	$active = $_POST['active'];
	$dob = $_POST['dob'];
	if (isset($_POST['sex'])) {$sex = $_POST['sex'];} else {$sex = "";}
	$cid = $_POST['cid'];
	$fbid = $_POST['fbid'];
	$date = date("Y-m-d");
	$url = $_POST['url'];
	$auth = 0;

	$emails = getTable("SELECT email FROM users", 1);
	
	$header = $url;
	$alerts = array();
	if ($fname == "" || $sname == "" || $email == "" || $password == "" || $sex == "") {$alerts[] = 3;}
	if (in_array($email,$emails)) {$alerts[] = 5;}
	if (strlen($password) < 5) {$alerts[] = 10;}
	if (strlen($password) > 20) {$alerts[] = 11;}
	if (count($alerts) == 0) {
		$result = mysqli_query($con, "INSERT INTO users (clubid, fname, sname, email, password, class, active, dob, sex, fbid, datejoined) VALUES ('".$cid."', '".$fname."','".$sname."','".$email."','".hash("sha512",$password)."', '".$class."', '".$active."','".$dob."', '".$sex."', '".$fbid."', '".$date."')");
		if ($result == true) {
			$uid = mysqli_insert_id($con);
			$alerts[] = 0;
			$alerts[] = "User registered successfully. You will be able to log in as soon as someone confirms your are a paying member of their club";
			$header = "/group3/";
		} else {
			$alerts[] = 12;
		}
	}
	mysqli_close($con);

	$_SESSION['alerts'] = $alerts;
	header("location: ".$header);

?>