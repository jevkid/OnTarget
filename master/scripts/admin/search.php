<?php

	$arr = array();
	$arr = explode(",",$_POST['arr']);

	// If requesting as AJAX
	if (isset($_POST['str'])) {	
		session_start();
		include $_SERVER['DOCUMENT_ROOT']."/master/scripts/functions.php";
		$con = connect();	
		
		$phrase = trim(strtolower($_POST['str']));
		$phrase = mysqli_escape_string($con,$phrase);
		$words = preg_split("/\s+/", $phrase);
		$words = array_filter($words);
	// If requesting as HTTP
	} else {
		$con = connect();
		$words = array();
	}
	echo "<table class='nospace pad' style='width:100%;'><tr><td style='width:25px;'>"
			."<input id='checkall' type='checkbox'>"
			."</td><td style='width:120px;'>&nbsp;Student ID</td><td>&nbsp;Name</td><td>&nbsp;No. Sessions</td><td>&nbsp;No. Scores</td><td>&nbsp;Class</td><td>&nbsp;Committee</td></tr>";
	
	// Do it twice for active and inactive
	for ($active = 1; $active >= 0; $active--) {
				
		$query = mysqli_query($con,"SELECT * FROM users ORDER BY fname ASC");
		$rescount = 0;
		if (empty($words)) {$echo = true;}
		// Loop through users
		while ($row = mysqli_fetch_assoc($query)) {
			if (!empty($words)) {
				$echo = false;
				// Loop through words
				for ($i = 0; $i < count($words); $i++) {
					// If the any of the search words match a user field
					if ($row['class'] == 0) {$class = "Beginner";}
					if ($row['class'] == 1) {$class = "Intermediate";}
					if ($row['class'] == 2) {$class = "Experienced";}
					if ((strpos(strtoupper($row['stuid']),strtoupper($words[$i])) !== false) ||
						(strpos(strtoupper($row['fname']),strtoupper($words[$i])) !== false) ||
						(strpos(strtoupper($row['sname']),strtoupper($words[$i])) !== false) ||
						(strpos(strtoupper($class),strtoupper($words[$i])) !== false) ||
						(strpos(strtoupper($row['com']),strtoupper($words[$i])) !== false)) {
						$echo = true;
					}
				}
			}
			if ($row['active'] == $active) {
				// Output
				echo "<tr class='searchresult' style='background-color:";
				if ($active == 1) {
					if ($row['id'] == $_SESSION['userid']) {echo "#393;";}
					else if ($rescount%2 == 1) {echo "#C33;";} else {echo "#966;";}
				} else {
					if ($rescount%2 == 1) {echo "#111;";} else {echo "#444;";}
				}
				if ($echo == false) {
					echo "display:none;";
				}
				echo "	'>"
						."	<td>"
						.			"<input class='checkbox' type='checkbox' name='actionusers[]' value='".$row['id']."'";
				if (in_array($row['id'],$arr)) {echo " checked";}
				echo ">"
						."	</td><td>"
						.     $row['stuid']
						."	</td><td>"
						.			$row['fname']." ".$row['sname']
						."	</td><td>"
						.			count(getTable("register","*","WHERE userid='".$row['id']."'"))
						."	</td><td>"
						.			count(getTable("register","*","WHERE userid='".$row['id']."' AND score<>''"))
						."	</td><td>";
				if ($row['class'] == 0) {echo "Beginner";}
				else if ($row['class'] == 1) {echo "Intermediate";}
				else if ($row['class'] == 2) {echo "Experienced";}
				echo "	</td><td>";
				if ($row['com'] == "") {echo "-";} else {echo $row['com'];}
				echo "  </td>"
						."</tr>";
				if ($echo == true) {$rescount += 1;}
			}
		}
	}
	echo "</table>";
	mysqli_close($con);
	
?>