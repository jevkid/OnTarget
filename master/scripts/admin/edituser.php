<?php

	session_start();	
	include $_SERVER['DOCUMENT_ROOT']."/master/scripts/functions.php";	
	$con = connect();
	
	$alerts = array();
	$action = $_POST['edituseraction'];
	$actiontb = $_POST['edituserTB'];
	$actionpw = $_POST['edituserPW'];
	$actioncom = $_POST['edituserCom'];
	$actionteam = $_POST['edituserTeam'];
	$actionclass = $_POST['edituserClass'];
	$session = $_POST['session'];
	$bowtype = $_POST['bowtype'];
	$score = $_POST['score'];
	$conftext = strtoupper($_POST['conftext']);
	$actionusers = $_POST['actionusers'];
	
	$header = $_POST['url'];
			
	$ok = true;
	if (empty($actionusers)) {$alerts[] = 13; $ok = false;}
	if ($action == "") {$alerts[] = 14; $ok = false;}
	if ($ok == true) {
		
		if ($action == "add_score") {
			
			if (isset($_POST['score'])) {				
				// Add score
				$scores = str_replace(" ","",$actiontb);
				if (preg_match('/((([1-9]|10):)?(([1-9]|1[0-2]|M|X);))+/', $string) == 0) {$alerts[] = 23;}
				$alerts[] = "fghdfg";
				if (count($alerts) > 0) {
					$header = "http://www.cardiffuac.com/admin/users/addscore?actionuser=".$actionusers[0];
				} else {
					
				}				
			} else {
				// Send to add score form
				$header = "http://www.cardiffuac.com/admin/users/addscore?actionuser=".$actionusers[0];				          
      }
			
		} else if ($action == "reset_pw") {
			
			// Reset password
			if ($actionpw == "") {$actionpw = "password";}
			else {
				if (strlen($actionpw) < 5) {$alerts[] = 10;}
				if (strlen($actionpw) > 20) {$alerts[] = 11;}
			}
			if (count($alerts) == 0) {
				$ok = true;
				for ($i = 0; $i < count($actionusers); $i++) {
					$result = mysqli_query($con,"UPDATE users SET password='".hash("sha512", $actionpw)."' WHERE id='".$actionusers[$i]."'");				
					if ($result == false) {$ok = false;}
				}
				if (count($actionusers) > 1) {$plural = "s";} else {$plural = "";}
				if ($ok == true) {
					$alerts[] = "Password".$plural." changed successfully";
					$alerts[] = 0;
				} else {
					$alerts[] = 12;
				}
			}
			
		} else if ($action == "add_com") {
			
			// Add to committee 
			// HANDOVER
			$coms = getTable("users","com");
			if ($actioncom == "") {$alerts[] = 22;}
			else if ($actioncom == "President") {
				if ($_SESSION['com'] != "President") {$alerts[] = 18;}
				if (count($actionusers) > 1) {$alerts[] = 19;}
				if (count($alerts) == 0) {
					if (mysqli_query($con,"UPDATE users SET com='President' WHERE id='".$actionusers[0]."'")) {
						$result = mysqli_query($con,"UPDATE users SET com='' WHERE id='".$_SESSION['userid']."'");
						if ($result == true) {
							$_SESSION['com'] = "";
							$alerts[] = "Club President has been replaced";
							$alerts[] = 0;
							mysqli_close($con);
							$_SESSION['alerts'] = $alerts;
							header("location: /");
						} else {
							$alerts[] = 12;
						}
					}
				}
			}	else {
				if (count($actionusers) > 1 || in_array($actioncom,$coms)) {$alerts[] = 19;}
				if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE id='".$actionusers[0]."' && com=''")) == 0) {$alerts[] = 20;}
				if ($_SESSION['com'] != "President") {$alerts[] = 18;}
				if (count($alerts) == 0) {
					$result = mysqli_query($con,"UPDATE users SET com='".$actioncom."' WHERE id='".$actionusers[0]."'");
					if ($result == true) {
						$alerts[] = "User promoted to club ".$actioncom;
						$alerts[] = 0;
					} else {
						$alerts[] = 12;
					}
				}			
			}
			
		} else if ($action == "remove_com") {
			
			// Remove from committee
			if ($_SESSION['com'] != "President") {$alerts[] = 18;}
			if ($actiontb != $conftext) {$alerts[] = 15;}
			if (count($alerts) == 0) {
				$ok = true;
				for ($i = 0; $i < count($actionusers); $i++) {
					if ($actionusers[$i] == $_SESSION['userid']) {$alerts[] = 21;}
					else {
						$result = mysqli_query($con,"UPDATE users SET com='' WHERE id='".$actionusers[$i]."'");				
						if ($result == false) {$ok = false;}
					}
				}
				if (count($actionusers) > 1) {$plural = "s";} else {$plural = "";}
				if ($ok == true) {
					$alerts[] = "User".$plural." removed from the committee";
					$alerts[] = 0;
				} else {
					$alerts[] = 12;
				}
			}
		
		} else if ($action == "act") {
			
			// Activate membership
			if ($actiontb != $conftext) {$alerts[] = 15;}
			if (count($alerts) == 0) {
				$ok = true;
				for ($i = 0; $i < count($actionusers); $i++) {
					$result = mysqli_query($con,"UPDATE users SET active='1' WHERE id='".$actionusers[$i]."'");
					if ($result == false) {$ok = false;}
				}
				if (count($actionusers) > 1) {$plural = "s";} else {$plural = "";}
				if ($ok == true) {
					$alerts[] = "User's membership".$plural." activated successfully";
					$alerts[] = 0;
				} else {
					$alerts[] = 12;
				}				
			}			
			
		} else if ($action == "deact") {
			
			// Deactivate membership
			if ($actiontb != $conftext) {$alerts[] = 15;}
			if (count($alerts) == 0) {
				$ok = true;
				for ($i = 0; $i < count($actionusers); $i++) {
					$result = mysqli_query($con,"UPDATE users SET active='0' WHERE id='".$actionusers[$i]."'");
					if ($result == false) {$ok = false;}
				}
				if (count($actionusers) > 1) {$plural = "s";} else {$plural = "";}
				if ($ok == true) {
					$alerts[] = "User's membership".$plural." deactivated successfully";
					$alerts[] = 0;
				} else {
					$alerts[] = 12;
				}				
			}		
			
		} else if ($action == "del_scores") {
			
			// Delete scores
			if ($actiontb != $conftext) {$alerts[] = 15;}
			if (count($alerts) == 0) {
				$ok = true;
				for ($i = 0; $i < count($actionusers); $i++) {
					$result = mysqli_query($con,"DELETE FROM scores WHERE userid='".$actionusers[$i]."'");
					if ($result == false) {$ok = false;}
				}
				if (count($actionusers) > 1) {$plural = "s";} else {$plural = "";}
				if ($ok == true) {
					$alerts[] = "User".$plural." scores deleted successfully";
					$alerts[] = 0;
				} else {
					$alerts[] = 12;
				}				
			}
			
		} else if ($action == "del_user") {
			
			// Delete user
			if ($actiontb != $conftext) {$alerts[] = 15;}
			if (count($alerts) == 0) {
				$ok = true;
				for ($i = 0; $i < count($actionusers); $i++) {
					if ($actionusers[$i] == $_SESSION['userid']) {$alerts[] = 17;}
					else {
						$result = mysqli_query($con,"DELETE FROM users WHERE id='".$actionusers[$i]."'");
						mysqli_query($con,"DELETE FROM scores WHERE userid='".$actionusers[$i]."'");
						if ($result == false) {$ok = false;}
					}
				}
				if (count($actionusers) > 1) {$plural = "s";} else {$plural = "";}
				if ($ok == true) {
					$alerts[] = "User".$plural." and scores deleted successfully";
					$alerts[] = 0;
				} else {
					$alerts[] = 12;
				}				
			}
			
		} else if ($action == "add_team") {
			
		} else if ($action == "remove_team") {
			
		} else if ($action == "change_class") {
			
			// Change class
			
			if ($class == "") {$alert[] = 24;}
			if (count($alerts) == 0) {
				$ok = true;
				for ($i = 0; $i < count($actionusers); $i++) {
					$result = mysqli_query($con,"UPDATE users SET class='".$actionclass."' WHERE id='".$actionusers[$i]."'");
					if ($result == false) {$ok = false;}
				}
				if (count($actionusers) > 1) {$plural = "es";} else {$plural = "";}
				if ($ok == true) {
					$alerts[] = "User's class".$plural." updated successfully";
					$alerts[] = 0;
				} else {
					$alerts[] = 12;
				}				
			}
			
		}
	}
		
	mysqli_close($con);
	$_SESSION['alerts'] = $alerts;
	header("location: ".$header);

?>