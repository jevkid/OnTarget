<?php

	// Pre printing
	function pre($a) {
		echo "<pre>";
		print_r($a);
		echo "-------------------------------------<br>";
		echo "</pre>";
	}

	// CONNECT > DB
	function connect() {
		$dbhost = "csmysql.cs.cf.ac.uk";
		$dbuser = "group32014";
		$dbpass = "Rybryevov5";
		$dbname = "group32014";
		$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if (mysqli_connect_errno($con)) {
			echo "Failed to connect to MySQL: ".mysqli_connect_error();
		} else {
			return $con;
		}
	}
	
	// DB TABLE > ARRAY
	function getTable($query, $dim=2) {
		$con = connect();
		$array = array();
		$table = mysqli_query($con, $query);
		if (mysqli_num_rows($table) > 1 || $dim >= 2) {
			while($row = mysqli_fetch_assoc($table)) {
				$array[] = $row;
			}
		} else {
			$array = mysqli_fetch_assoc($table);
		}
		mysqli_close($con);
		return $array;
	}
	
	// CALL MATLAB
	function matlab($func) {
		$cmd = 'matlab -nodisplay -nosplash -r "'.$func.', exit"';
		$string = shell_exec($cmd);

		$startsearch = "ans =";
		$start = strpos($string, $startsearch)+strlen($startsearch);

		$result = trim(substr($string, $start));

		return $result;
	}
	
	function getYearsSince($date) {
		if (strtotime(date("Y-m-d")) < strtotime(date($date)) == true) {
			return date("Y")-date($date);}
		else {
			return date("Y")-date($date)-1;
		}
	}
	
	function filterArray($a, $col, $str) {
		$b = array();		
		for ($i = 0; $i < count($a); $i++) {
			if ($a[$i][$col] == $str) {
				$b[] = $a[$i];
			}
		}
		return $b;
	}
	
	function getStats($timeline, $rid=-1, $uid=-1) {
		// Init stats
		$stats['rid'] = $rid;
		$stats['rid'] = $uid;
		$stats['total'] = 0;
		$stats['avg'] = 0;
		$stats['xs'] = 0;
		$stats['golds'] = 0;
		$stats['reds'] = 0;
		$stats['blues'] = 0;
		$stats['blacks'] = 0;
		$stats['whites'] = 0;
		$stats['hits'] = 0;
		$stats['misses'] = 0;
		$stats['recurvetotals'] = array();
		$stats['compoundtotals'] = array();
		$stats['barebowtotals'] = array();
		$stats['longbowtotals'] = array();
		$stats['xbowtotals'] = array();
		$stats['recurveavgs'] = array();
		$stats['compoundavgs'] = array();
		$stats['barebowavgs'] = array();
		$stats['longbowavgs'] = array();
		$stats['xbowavgs'] = array();
		$stats['pa'] = 0;
		$stats['parecurve'] = 0;
		$stats['pacompound'] = 0;
		$stats['pabarebow'] = 0;
		$stats['palongbow'] = 0;
		$stats['pacrossbow'] = 0;
		$stats['pb'] = 0;
		$stats['pbrecurve'] = 0;
		$stats['pbcompound'] = 0;
		$stats['pbbarebow'] = 0;
		$stats['pblongbow'] = 0;
		$stats['pbcrossbow'] = 0;
			
		// Loop through timeline
		for ($i = 0; $i < count($timeline); $i++) {
			
			// If round ids match
			if ($timeline[$i]['rid'] == $rid || $timeline[$i]['rid'] == -1) {
				
				// If user ids match
				if ($timeline[$i]['uid'] == $uid || $timeline[$i]['uid'] == -1) {			
			
					// If shot was a hit
					if ($timeline[$i]['score'] != "M") {
						$stats['hits']++;
						$bowtype = getTable("SELECT bowtype FROM rounds WHERE id=".$timeline[$i]['rid'])[0]['bowtype'];
					
						// If shot was an 'X'
						if ($timeline[$i]['score'] == "X") {
							$stats['xs']++;
							$stats['total'] += 10;
							$stats['roundtotals'][$timeline[$i]['rid']] += 10;
								
						// If shot was between 1 & 10
						} else {
							if ($timeline[$i]['score'] <= 2) {$stats['whites']++;}
							else if ($timeline[$i]['score'] <= 4) {$stats['blacks']++;}
							else if ($timeline[$i]['score'] <= 6) {$stats['blues']++;}
							else if ($timeline[$i]['score'] <= 8) {$stats['reds']++;}
							else if ($timeline[$i]['score'] <= 10) {$stats['golds']++;}
							$stats['total'] += $timeline[$i]['score'];
							$stats[$bowtype.'totals'][$timeline[$i]['rid']][] = $timeline[$i]['score'];// FOR CREATING A TOTALS TABLE | PA AND PB
						}
						
					// If shot was a miss
					} else {
						$stats['misses']++;	
					}
				}
			}
		}
		
		// Convert round totals into round averages
		for ($i = 0; $i < count($stats['recurvetotals']); $i++) {if (count($stats['recurvetotals']) > 0) {$stats['recurveavgs'][] = array_sum($stats['recurvetotals'])/count($stats['recurvetotals']);}}
			if (count($stats['compoundtotals']) > 0) {$stats['compoundavgs'][] = array_sum($stats['compoundtotals'])/count($stats['compoundtotals']);}
			if (count($stats['barebowtotals']) > 0) {$stats['barebowavgs'][] = array_sum($stats['barebowtotals'])/count($stats['barebowtotals']);}
			if (count($stats['longbowtotals']) > 0) {$stats['longbowavgs'][] = array_sum($stats['longbowtotals'])/count($stats['longbowtotals']);}
			if (count($stats['xbowtotals']) > 0) {$stats['xbowavgs'][] = array_sum($stats['xbowtotals'])/count($stats['xbowtotals']);}
		
		// Complete stats
		$stats['arrows'] = count($timeline);
		$stats['avg'] = $stats['total']/$stats['arrows'];
		return $stats;
		
	}
	
	function combineStats($a) {
		$b = $a;
		return $b;
	}
	
?>