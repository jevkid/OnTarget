<?php
	include "/mntL/group/group3/master/scripts/init.php";
	// PHP START

	if (isset($_GET['did'])) {
		$discipline = $_GET['did'];
	} else {
		$discipline = "COM";
	}

	function getDisciplines() {
		$disciplines['COM'] = "";
		$disciplines['MER'] = "AND u.sex='M' AND u.class >= 1 AND r.bowtype='recurve'";
		$disciplines['MEC'] = "AND u.sex='M' AND u.class >= 1 AND r.bowtype='compound'";
		$disciplines['MEB'] = "AND u.sex='M' AND u.class >= 1 AND r.bowtype='barebow'";
		$disciplines['MEL'] = "AND u.sex='M' AND u.class >= 1 AND r.bowtype='longbow'";
		$disciplines['MBR'] = "AND u.sex='M' AND u.class = 0 AND r.bowtype='recurve'";
		$disciplines['MBC'] = "AND u.sex='M' AND u.class = 0 AND r.bowtype='compound'";
		$disciplines['MBB'] = "AND u.sex='M' AND u.class = 0 AND r.bowtype='barebow'";
		$disciplines['MBL'] = "AND u.sex='M' AND u.class = 0 AND r.bowtype='longbow'";
		$disciplines['FER'] = "AND u.sex='F' AND u.class >= 1 AND r.bowtype='recurve'";
		$disciplines['FEC'] = "AND u.sex='F' AND u.class >= 1 AND r.bowtype='compound'";
		$disciplines['FEB'] = "AND u.sex='F' AND u.class >= 1 AND r.bowtype='barebow'";
		$disciplines['FEL'] = "AND u.sex='F' AND u.class >= 1 AND r.bowtype='longbow'";
		$disciplines['FBR'] = "AND u.sex='F' AND u.class = 0 AND r.bowtype='recurve'";
		$disciplines['FBC'] = "AND u.sex='F' AND u.class = 0 AND r.bowtype='compound'";
		$disciplines['FBB'] = "AND u.sex='F' AND u.class = 0 AND r.bowtype='barebow'";
		$disciplines['FBL'] = "AND u.sex='F' AND u.class = 0 AND r.bowtype='longbow'";
		return $disciplines;
	}

	function globClubLeaderboard($discipline) {
		$disciplines = getDisciplines();
	    $clubs = getTable("SELECT
							SUM(t.score) AS score,
							AVG(t.score) AS avg,
							c.id AS cid,
							c.name AS clubname
							FROM timeline AS t, users AS u, clubs AS c, rounds AS r
							WHERE u.id = t.userid AND c.id = u.clubid AND r.id = t.roundid ".$disciplines[$discipline]."
							GROUP BY c.id
							ORDER BY score DESC");
		$output = "<h2>Club Leaderboard:</h2>"
			."<table class='leaderboard'>"
	    	."<tr><td>Club</td><td>Total Score</td><td>Average Score</td></tr>";
	    for ($i = 0; $i < count($clubs); $i++) {
	    	$output .= "<tr><td><a href='/group3/clubs?cid=".$clubs[$i]['cid']."'>"
	    		.$clubs[$i]['clubname']
	    		."</a></td><td style='width:200px;'>"
	    		.$clubs[$i]['score']
	    		."</td><td style='width:200px;'>"
	    		.round($clubs[$i]['avg'],2)
	    		."</td></tr>";
	    }
	    $output .= "</table>";
	    return $output;
	}

	function globUserLeaderboard($discipline) {
		$disciplines = getDisciplines();
		$users = getTable("SELECT u.id AS uid, u.fname AS fname, u.sname AS sname, u.sex AS sex, SUM(t.score) AS score, AVG(t.score) AS avg, c.name AS clubname, c.id AS clubid
							FROM users AS u, timeline AS t, rounds AS r, clubs AS c
							WHERE u.id = t.userid AND r.id = t.roundid AND c.id = u.clubid ".$disciplines[$discipline]."
							GROUP BY u.id
							ORDER BY score DESC");

		$output = "<h2>Individual Leaderboard:</h2>"
	    	."<table class='leaderboard'>"
	    	."<tr><td>Name</td><td>Club</td><td>Total Score</td><td>Average Score</td></tr>";
	    for ($i = 0; $i < count($users); $i++) {
	    	$output .= "<tr><td><a href='/group3/dashboard?uid=".$users[$i]['uid']."'>"
	    		.$users[$i]['fname']." ".$users[$i]['sname']
	    		."</a></td><td><a href='/group3/clubs?cid=".$users[$i]['clubid']."'>"
	    		.$users[$i]['clubname']
	    		."</a></td><td style='width:200px;'>"
	    		.$users[$i]['score']
	    		."</td><td style='width:200px;'>"
	    		.round($users[$i]['avg'],2)
	    		."</td></tr>";
	    }
	    $output .= "</table>";
	    return $output;
	}

	function userLeaderboard($club, $discipline) {
		$disciplines = getDisciplines();
		$users = getTable("SELECT u.id AS uid, u.fname AS fname, u.sname AS sname, u.sex AS sex, SUM(t.score) AS score, AVG(t.score) AS avg
							FROM users AS u, timeline AS t, rounds AS r
							WHERE u.clubid='".$club['cid']."' AND u.id = t.userid AND r.id = t.roundid ".$disciplines[$discipline]."
							GROUP BY u.id
							ORDER BY score DESC");

		$output = "<h2>Leaderboard:</h2>"
	    	."<table class='leaderboard'>"
	    	."<tr><td>Name</td><td>Total Score</td><td>Average Score</td></tr>";
	    for ($i = 0; $i < count($users); $i++) {
	    	$output .= "<tr><td><a href='/group3/dashboard?uid=".$users[$i]['uid']."'>"
	    		.$users[$i]['fname']." ".$users[$i]['sname']
	    		."</a></td><td>"
	    		.$users[$i]['score']
	    		."</td><td>"
	    		.round($users[$i]['avg'],2)
	    		."</td></tr>";
	    }
	    $output .= "</table>";
	    return $output;
	}

	// PHP END
	include $sroot."/master/templates/doctype.php";
	include $sroot."/master/templates/header.php";

	if (isset($_GET['cid'])) {$cid = $_GET['cid'];} else {$cid = "";}
	if ($cid != "") {

		// SHOW CLUB INFORMATION
		$club = getTable("SELECT c.id AS cid, l.id AS lid, c.name AS clubname, l.name AS locationname, l.lat AS lat, l.`long` AS lon
							FROM clubs AS c, locations AS l
							WHERE c.id = ".$cid."
							AND l.id = c.id", 1);

		echo "<br><table style='margin:0;padding:0;width:100%;'><tr><td valign='top' style='width:165px;'>";
		if (file_exists($sroot."/i/clubs/".$cid.".png")) {
			$dpsrc = $cid;
		} else {
			$dpsrc = "default";
		}
		echo "<div id='clubpic' style=\"background-image:url('/group3/i/clubs/".$dpsrc.".png');\"></div><br>"
			."</td><td valign='top'>"
			."<h1 style='text-align:left;'>".$club['clubname']."</h1>"
			."</td></tr></table>";

		echo userLeaderboard($club, $discipline)
			."<br>"
			."<iframe id='location'
			    src='https://www.google.com/maps/embed/v1/view?key=AIzaSyBhbfMxlVl6tZ8AaQbz5wDMzVdLppBqqkg
			  	&center=".$club['lat'].",".$club['lon']."
			  	&zoom=16"
			."'></iframe>"
			."<br>";
	} else {

		?>

	    <br><h1>Global Leaderboards</h1><br>
	    <p>
	    	Below is a list of all the participating clubs using our service in order of their average scores. You can change the leaderboard category by using the drop-down box to the right. If you are an orgasiser for an archery club and you would like your club to participate in our league system, please contact us via <a href="mailto:info@ontarget.org">info@ontarget.org</a>.
	    </p><br>

	    <div style="width:100%;text-align:right;position:relative;">
		    <form action="" method="GET" onChange="this.submit()" style="position:absolute;top:5px;right:0px;">
		    	<span style="position:relative;top:3px;left:-3px;">Discipline:</span>
		    	<select name="did" style="font-size:18px;">
		    		<option value="COM" <?php if ($discipline == "COM") {echo "selected";} ?>>Combined</option>
		    		<option value="MBR" <?php if ($discipline == "MBR") {echo "selected";} ?>>Mens Beginner Recurve</option>
		    		<option value="MBC" <?php if ($discipline == "MBC") {echo "selected";} ?>>Mens Beginner Compound</option>
		    		<option value="MBB" <?php if ($discipline == "MBB") {echo "selected";} ?>>Mens Beginner Barebow</option>
		    		<option value="MBL" <?php if ($discipline == "MBL") {echo "selected";} ?>>Mens Beginner Longbow</option>
		    		<option value="MER" <?php if ($discipline == "MER") {echo "selected";} ?>>Mens Experienced Recurve</option>
		    		<option value="MEC" <?php if ($discipline == "MEC") {echo "selected";} ?>>Mens Experienced Compound</option>
		    		<option value="MEB" <?php if ($discipline == "MEB") {echo "selected";} ?>>Mens Experienced Barebow</option>
		    		<option value="MEL" <?php if ($discipline == "MEL") {echo "selected";} ?>>Mens Experienced Longbow</option>
		    		<option value="FBR" <?php if ($discipline == "FBR") {echo "selected";} ?>>Womens Beginner Recurve</option>
		    		<option value="FBC" <?php if ($discipline == "FBC") {echo "selected";} ?>>Womens Beginner Compound</option>
		    		<option value="FBB" <?php if ($discipline == "FBB") {echo "selected";} ?>>Womens Beginner Barebow</option>
		    		<option value="FBL" <?php if ($discipline == "FBL") {echo "selected";} ?>>Womens Beginner Longbow</option>
		    		<option value="FER" <?php if ($discipline == "FER") {echo "selected";} ?>>Womens Experienced Recurve</option>
		    		<option value="FEC" <?php if ($discipline == "FEC") {echo "selected";} ?>>Womens Experienced Compound</option>
		    		<option value="FEB" <?php if ($discipline == "FEB") {echo "selected";} ?>>Womens Experienced Barebow</option>
		    		<option value="FEL" <?php if ($discipline == "FEL") {echo "selected";} ?>>Womens Experienced Longbow</option>
		    	</select>
		    </form>
	    </div>

	    <?php

	    echo globClubLeaderboard($discipline);
	    echo globUserLeaderboard($discipline);
	    echo "<br>";
	   	
	}
		
	include $sroot."/master/templates/footer.php";

?>