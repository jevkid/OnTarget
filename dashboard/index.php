<?php
	include "/mntL/group/group3/master/scripts/init.php";
	// PHP START
	
	// If not logged in
	if ($loggedin == false) {
		header("Location: ".$wroot);
	// If logged in
	} else {
	
		include $sroot."/master/templates/doctype.php";
		include $sroot."/master/templates/header.php";		
		
		// Init
		$xarray = array( );
		$yarray = array();
		
		// Override user id?
		if (isset($_GET['uid'])) {$uid = $_GET['uid'];}
		else {$uid = $_SESSION['uid'];}

		$rounds = getTable("SELECT r.id, e.date, e.name AS `eventname`, r.bowtype, r.distance, r.target, l.name AS `locationname`, l.lat, l.long 
			FROM rounds r, `events` e, locations l
			WHERE r.id
			IN (			
				SELECT roundid
				FROM timeline
				WHERE `userid`='".$uid."'
			)
			&& r.eventid = e.id
			&& e.locationid = l.id
			ORDER BY e.date DESC");

		// Are there any scoresheets to show?
		$foundscores = mysqli_num_rows(mysqli_query(connect(),"SELECT * FROM timeline WHERE userid='".$uid."'"));

		if ($foundscores > 0) { // Yes
		
			// Get round id
			if (isset($_GET['rid'])) {$rid = $_GET['rid'];}
			else {$rid = $rounds[0]['id'];}
			
			// Get tables from database
			$timeline = getTable("SELECT id, userid AS `uid`, roundid AS `rid`, score, angle, x FROM timeline WHERE roundid
				IN (			
					SELECT roundid
					FROM timeline
					WHERE roundid=".$rid."
				)");
			$users = getTable("SELECT id, clubid AS `cid`, fname, sname, dob, email, class, auth, datejoined, active FROM users WHERE id IN (SELECT userid FROM timeline WHERE `roundid`='".$rid."')");
			for ($i = 0; $i < count($users); $i++) {
				if ($users[$i]['id'] == $uid) {
					$userinfo = $users[$i];
				}
			}			
			for ($i = 0; $i < count($rounds); $i++) {
				$roundstats[] = getStats($timeline, $rounds[$i]['id'], $uid);
			}
			$stats = combineStats($roundstats);
			// Remove timeline rows that aren't relevant
			$timeline = filterArray($timeline, "rid", $rid);
			
			//$userstats = getStats($timeline, -1, $uid);
		}
		
	?>
  
	<br>
	<div id="scores">
  
  
  
  
  
  
  
  
  
  
  
		<div id="userinfo">
				<table style="width:1180px;" class="nospace nopad"><tr><td style="width:150px;">
					<div style="background-image:url('<?php
			        	$userinfo = getTable("SELECT * FROM users WHERE id='".$uid."'", 1);
			        	if ($userinfo["fbid"] == "" || file_get_contents("https://graph.facebook.com/".$userinfo["fbid"]."/picture?type=large") === false) {
			                echo "/group3/i/users/default.jpg";
			            } else {
			                echo "https://graph.facebook.com/".$userinfo["fbid"]."/picture?type=large";
			            }
			        ?>');width:150px;height:150px;background-position:center;background-size:cover;border-radius:20px;"></div>
				</td><td style="padding:12px 0px 0px 15px;line-height:24px;" valign="top">
					<span style="font-size:24px;font-weight:bold;margin-bottom:8px;display:block;border-radius:20px;"><?php echo $userinfo['fname']." ".$userinfo['sname']; ?></span>
					Position: <?php echo $authnames[$userinfo['auth']]; ?><br>
					Class: <?php echo $classnames[$userinfo['class']]; ?><br>
					Age: <?php $age = getYearsSince($userinfo['dob']);
											if ($age >= 18) {echo $age." (Senior)";} else {echo $age." (Junior)";} ?><br>
					Member Since: <?php echo date("jS M Y",strtotime($userinfo['datejoined']))." (";
															$yearsactive = getYearsSince($userinfo['datejoined']);
															if ($yearsactive > 1) {$plural = "s";} else {$plural = "";}
															if ($yearsactive < 1) {echo "&lt 1 year)";}
															else {echo $yearsactive." year".$plural.")";}?>
				</td><td rowspan="2" style="text-align:right;width:520px;">
				
				
					<a class="twitter-timeline" href="https://twitter.com/OnTargetGroup3" data-widget-id="576375913937514496">Tweets by @OnTargetGroup3</a>
                    
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

				
				
				</td></tr><tr><td colspan="2">
					<h2>Submit a new score:</h2>
					<form action="<?php echo $wroot; ?>/master/scripts/matlab/analysis.php" method="post" enctype="multipart/form-data">
						Event:
						<select name="eid">
							<?php
								$events = getTable("SELECT * FROM events WHERE `date`<=CURRENT_DATE() ORDER BY 'date' DESC LIMIT 10");
								foreach ($events as $event) {
									echo "<option value='".$event["id"]."'>".date("d-m-Y", strtotime($event["date"]))." ".$event["name"];
								}
							?>
						</select>
						Distance: <input type="number" step="10" value="30" max="150" min="10" name="distance">
						Target: <input type="number" step="20" value="60" max="120" min="40" name="target">
						Bowtype: 
						<select name="bowtype">
							<option value="recurve">Recurve</option>
							<option value="compound">Compound</option>
							<option value="barebow">Barebow</option>
							<option value="longbow">Longbow</option>
							<option value="crossbow">Crossbow</option>
						</select><br>
						Files:
						<select name="vori">
							<option value="i" selected>Image(s)</option> 
							<option value="v">Video</option>
						</select>
						<input type="file" id="file" name="files[]" accept="image/*" multiple><br>
						<input type="submit" value="Upload Score">
					</form>
				
				</td></tr></table>
		</div>
    
    
    
    
    <?php
		
		if ($foundscores == 0) { // No
			echo "<div style='height:180px;text-align:center;padding-top:80px;line-height:40px;'>"
				."	You haven't submitted any scores yet!"
				."</div>";
		} else { // Yes

    ?>
    
    
    
    
    <br>
    <div id="panel">
				
		<div id="selector">
	      	<span style="font-size:24px;font-weight:bold;position:relative;top:-3px;">Score Sheet</span>  
	        <form action="" method="get">
				<?php if (isset($_GET['uid'])) {echo "<input type='hidden' name='uid' value='".$_GET['uid']."'>";} ?>
					<select id="sessionoptions" name="rid" onChange="this.form.submit()" style="padding:0;marign:0;font-size:20px;height:30px;width:590px;">
				<?php 

					$shortname['recurve'] = "[R]";
					$shortname['compound'] = "[C]";
					$shortname['barebow'] = "[B]";
					$shortname['longbow'] = "[L]";
					$shortname['crossbow'] = "[X]";

					for ($i = 0; $i < count($rounds); $i++) {
						echo "<option value='".$rounds[$i]['id']."'";
					if ($rounds[$i]['id'] == $rid) {echo " selected";}
						echo ">".$shortname[$rounds[$i]['bowtype']]." ".date("d/m/y", strtotime($rounds[$i]['date']))." | ".$rounds[$i]['eventname'];
						echo "</option>";
					}

				?>
				</select>
	        </form>
      </div>
		
      	<div id="scoresheet">
        <?php
        	$end = 0;
         	$p = 0;
         	$user_start = 0;
			foreach ($users as $user) {
         		$rt = 0;
         		$ac = 0;
				echo "<div class='userScoreContainer'>"
					."<div class='scoreButtons' style='position:relative;'>"
					."	<span style='font-size:20px;font-weight:bold;position:relative;top:-5px;left:10px;'>"
					."		<input type='checkbox' onChange='showHideArrows(".$user['id'].")' checked> "
					.$user['fname']." ".$user['sname'].":</span>"
					."	<div style='position:absolute;top:17px;font-size:12px;right:19px;'>R/T</div>"
					."	<div style='position:absolute;top:17px;font-size:12px;right:71px;'>E/T</div>"
					."	<div style='position:absolute;top:17px;font-size:12px;right:346px;'>E/T</div>";
				for ($i = 0; $i < count($timeline); $i++) {

					if ($timeline[$i]['uid'] == $user['id']) {
						if ($i%12 == 0) {echo "<div class='set12'>";}
						if ($i%3 == 0) {echo "<div class='set3'>";}
						$rt += $timeline[$i]['score'];
						$end += $timeline[$i]['score'];
						if ($timeline[$i]['score'] == "0") {$scorestr = "M";} else if ($timeline[$i]['x'] == "1") {$scorestr = "X";} else {$scorestr = $timeline[$i]['score'];} 
						echo "<div id='box".$i."' class='set1 score".$scorestr." box' onMouseOver='highlight(this)' onMouseOut='unhighlight(this)'>".$scorestr."</div>";					
						if (($i+1)%12 == 0 || $i+1 == count($timeline)) {
							echo "</div><div id='";
							for ($j = $user_start; $j <= $i; $j++) {if ($j == $user_start) {echo "rtl".$j;} else {echo "-".$j;}}
							echo "' class='setrt' onMouseOver='highlight(this)' onMouseOut='unhighlight(this)'>".$rt."</div>";
						}				
						if (($i+1)%6 == 0 || $i+1 == count($timeline)) {
							echo "<div id='";
							for ($j = $p; $j < $p+6; $j++) {if ($j <= $i) {if ($j == $p) {echo "end".$j;} else {echo "-".$j;}}}
							$p = $j;
							echo "' class='setend' onMouseOver='highlight(this)' onMouseOut='unhighlight(this)'>".$end."</div>";
							$end = 0;
							$j++;
						}
						if (($i+1)%3 == 0 || $i+1 == count($timeline)) {echo "</div>";}
						$ac++;
					}
				}
				$barwidth = 601/$ac;

	  			echo "</div>"
	  				."<div class='scoreDetails' id='scoreDetails".$user['id']."' style='height:0px;'>"
	  				."<div class='scoregraph'>";
				$multiplier = 5;
				$c = 0;
				for ($i = 0; $i < count($timeline); $i++) {
					if ($timeline[$i]['uid'] == $user['id']) {
						echo "<div id='bar".$i."' class='bar graph".$timeline[$i]['score']."' style='width:".($barwidth-1)."px;background-color:#999;float:left;position:absolute;bottom:0px;left:".($barwidth*$c)."px;height:";
						if ($timeline[$i]['x'] == 1) {echo 10*$multiplier;}
						else if ($timeline[$i]['score'] == "0") {echo 0;}
						else {echo $timeline[$i]['score']*$multiplier;}
						echo "px;";
						if ($i < count($timeline)-1) {echo "border-right:1px Solid #000;";}
						echo "' onMouseOver='highlight(this)' onMouseOut='unhighlight(this)'></div>";
						$c++;
					}					
				}
				echo "</div>";				

			?>

				<table class="stats" class="nospace"><tr><td style="width:230px;padding:15px 15px 10px 0px;text-align:right;line-height:26px;">
					Score:<br>
					Hits | Misses:<br>
					Average Hit:<br>
					Personal Avg:<br>
					Personal Best:
				</td><td style="border-right:1px Solid #FFF;padding:15px 0px 10px 0px;text-align:left;line-height:26px;width:162px;">
					<?php //echo $score['total']."/".$score['arrows']*10; ?><br>
					<?php //echo $score['hits']; ?> | <?php //echo $stats['misses']; ?><br>    
					<?php //echo round($score['total']/$score['arrows'],2); ?><br>
					<?php
						/*$cmp = round($score['total']/$score['arrows']-$stats['pa'.$score['bowtype']],2);
						if ($cmp > 0) {echo "<img class='arrow' src='/i/Up.png' alt='' />";}
						else if ($cmp < 0) {echo "<img class='arrow' src='/i/Down.png' alt='' />";}
						else {echo "<img class='arrow' src='/i/Neutral.png' alt='' />";}
						if ($cmp < 0) {
							$cmp = -1 * abs($cmp);
							echo $cmp;
						} else if ($cmp > 0) {
							echo "+".$cmp;
						} else {
							echo $cmp;
						}*/
					?><br>
					<?php
						/*$cmp = round($score['total']/$score['arrows']-$stats['pb'.$score['bowtype']],2);
						if ($cmp > 0) {echo "<img class='arrow' src='/i/Up.png' alt='' />";}
						else if ($cmp < 0) {echo "<img class='arrow' src='/i/Down.png' alt='' />";}
						else {echo "<img class='arrow' src='/i/Neutral.png' alt='' />";}
						if ($cmp < 0) {
							$cmp = -1 * abs($cmp);
							echo $cmp;
						} else if ($cmp > 0) {
							echo "+".$cmp;
						} else {
							echo $cmp;
						}*/
					?>
				</td><td style="padding:15px 15px 10px 15px;text-align:right;line-height:26px;">
					Golds:<br>
					Reds:<br>
					Blues:<br>
					Blacks:<br>
					Whites:    
				</td><td style="padding:15px 35px 10px 0px;text-align:left;line-height:26px;">
					<?php //echo $score['golds']; ?><br>
					<?php //echo $score['reds']; ?><br>
					<?php //echo $score['blues']; ?><br>
					<?php //echo $score['blacks']; ?><br>
					<?php //echo $score['whites']; ?>
				</td><td style="width:20px;">
					<div class="sRing sRingG"></div>
					<div class="sRing sRingR"></div>
					<div class="sRing sRingB"></div>
					<div class="sRing sRingK"></div>
					<div class="sRing sRingW"></div>
				</td></tr></table>
				<div style="width:100%;text-align:center;height:30px;line-height:30px;">
					<input type="checkbox" style="height:18px;width:18px;" onClick="crosshairToggle(this);" checked> Show Average Crosshair<br>
				</div>

		<?php
				echo "</div></div>"
	  				."<div class='scoreDetailsButton' id='scoreDetailsButton".$user['id']."' onClick='showHideDetails(".$user['id'].");'>Click to See Details</div>";
	  			$user_start = $ac;
			}							
		?>				
		</div>			
		</div>
    
    
    
    
    
    
    
    
		<div id="target">
			
			<?php
						
				// Calculate dots X & Y values and output
				$c = 0;
				foreach ($users as $user) {
					for ($i = 0; $i < count($timeline); $i++) {
						if ($user['id'] == $timeline[$i]['uid']) {
							$ring = 9-$timeline[$i]['score'];
							$adj = 39;
							$angle = deg2rad($timeline[$i]['angle']);
							if ($timeline[$i]['x'] == 1) {$dist = 39;}
							else if ($timeline[$i]['score'] == 10) {$dist = 20;}
							else {$dist = 27;}
							$x = ((($ring*$dist)+$adj)*sin($angle))+260;
							$y = -((($ring*$dist)+$adj)*cos($angle))+260;
							$xarray[] = $x;
							$yarray[] = $y;
							echo "<div id='dot".$c."' class='dot' style='top:".$y."px;left:".$x."px;' onMouseOver='highlight(this)' onMouseOut='unhighlight(this)'></div>";
							$c++;
						}
					}
				}
				// Calculate Avg, Max & Min values of X & Y
				$xavg = array_sum($xarray)/count($xarray);
				$yavg = array_sum($yarray)/count($yarray);
				// Output Average crosshair & Spread circle
				echo "<div id='x' class='crosshair' style='left:0px;top:".($yavg+9)."px;'></div>";
				echo "<div id='y' class='crosshair' style='left:".($xavg+9)."px;top:0px;'></div>";
							
			?>
		</div>
		
    
    <?php //if ($cmp >= 0) { ?><div id="pbmedal"></div><?php // } ?>
		
    <div id="alltimestats">    
    
    	<table style="width:100%;"><tr><td style="padding:8px 0px 0px 15px;font-size:14px;text-align:right;" valign="top">
				<span style="font-size:24px;font-weight:bold;margin-bottom:8px;display:block;"><center>All Time Statistics:</center></span>
      </td><td>
			
			</td><td>
				Rounds Shot:<br>
				Arrows Shot:<br>
				Points Scored:<br> 
				Average Hit:<br>
				Hit Percentage:
			</td><td style="padding:38px 0px 0px 15px;font-size:14px;" valign="top">
				<?php
					//echo $stats['rounds']
					//echo $stats['arrows']."<br>";
					//echo $stats['points']."<br>";
					//echo $stats['pa']."<br>";
					//echo $stats['hitpercentage'];
				?>
			</td><td style="padding:5px 0px 0px 15px;;width:100px;font-size:14px;text-align:right;" valign="top"> 
				Golds:<br>
				Reds:<br>
				Blues:<br>
				Blacks:<br>
				Whites:<br>
				Hits:<br>
				Misses:
			</td><td style="padding:5px 0px 0px 15px;font-size:14px;" valign="top">
				<?php
					//echo $stats['xs']."<br>";
					//echo $stats['golds']."<br>";
					//echo $stats['reds']."<br>";
					//echo $stats['blues']."<br>";
					//echo $stats['blacks']."<br>";
					//echo $stats['whites']."<br>";
					//echo $stats['hits']."<br>";
					//echo $stats['misses'];
				?>
			</td><td style="padding:12px 0px 0px 15px;line-height:20px;text-align:right;" valign="top">   
				<span style="font-size:18px;font-weight:bold;margin-bottom:8px;display:block;">Personal Bests:</span>
        Recurve:<br>
        Compound:<br>
        Barebow:<br>
        Longbow:<br>
        Crossbow:    
			</td><td style="padding:40px 0px 0px 15px;line-height:20px;" valign="top">   
				<?php
					//echo round($stats['pbrecurve'],2)."<br>";
					//echo round($stats['pbcompound'],2)."<br>";
					//echo round($stats['pbbarebow'],2)."<br>";
					//echo round($stats['pblongbow'],2)."<br>";
					//echo round($stats['pbcrossbow'],2)."<br>";
				?>
			</td></tr></table>
    
    
      <div id="timeline">
        <div style="position:absolute;top:12px;left:75px;font-size:22px;font-weight:bold;">
          Timeline
        </div>
        <div class="key" style="left:270px;background-color:#093;top:22px;">
          <div>Recurve</div>
        </div>
        <div class="key" style="left:450px;background-color:#F33;top:22px;">
          <div>Compound</div>
        </div>
        <div class="key" style="left:650px;background-color:#F90;top:22px;">
          <div>Barebow</div>
        </div>
        <div class="key" style="left:840px;background-color:#0FF;top:22px;">
          <div>Longbow</div>
        </div>
        <div class="key" style="left:1020px;background-color:#63F;top:22px;">
          <div>Crossbow</div>
        </div>
        <div id="timelineylabel">
          10<br>
          <br>
          8<br>
          <br>
          6<br>
          <br>
          4<br>
          <br>
          2<br>
          <br>
          0<br>
        </div>
        	
        <div id="timelinedotcontainer">
      
          <?php
          
            // Reverse the scores order for the timeline
            //usort($stats, "sortSessionsFunctionReverse");
            
            // Init bowtype counters
            $counters['recurve'] = 0;
            $counters['compound'] = 0;
            $counters['barebow'] = 0;
            $counters['longbow'] = 0;
            $counters['crossbow'] = 0;
            $j = 0;;
            
            // Loop through scores
            for ($i = 0; $i < count($scores); $i++) {
              
              echo "<div id='timelinedot".$scores[$i]['bowtype'].$counters[$scores[$i]['bowtype']]."' class='timelinedot timelinedot".$scores[$i]['bowtype']."' style='background-color:";
              if ($scores[$i]['bowtype'] == "recurve") {echo "#093;";}
              else if ($scores[$i]['bowtype'] == "compound") {echo "#F33;";}
              else if ($scores[$i]['bowtype'] == "barebow") {echo "#F90;";}
              else if ($scores[$i]['bowtype'] == "longbow") {echo "#0FF;";}
              else if ($scores[$i]['bowtype'] == "crossbow") {echo "#63F;";}
              else {echo "#FFF;";}
              
              // Get dot x & y values
              $top = 16+((10-($scores[$i]["total"]/$scores[$i]['arrows']))/10*146);
              $left = ((1130/$datecounter)*$j)+5;
              if ($scores[$i]['id'] == $sid) {
                echo "border:2px Solid #FFF;";
                $top -= 2;
                $left -= 2;
              }
              
              echo "left:".$left."px;top:".$top."px;";
              echo "	'>"
                  ."	<div>"
                  ."		"
                  ."		<strong>".date("D jS M Y", strtotime($scores[$i]["date"]))."</strong><br>"
                  ."		Score: ".($scores[$i]["total"]."/".$scores[$i]["arrows"]*10)
                  ."		"
                  ."		"
                  ."	</div>"
                  ."</div>";
                  $counters[$scores[$i]['type']]++;
              if ($scores[$i]['date'] != $scores[$i+1]['date']) {$j++;}
            }
            for ($i = 0; $i <= 4; $i++) {
              echo "<div class='ylines' style='top:".(($timelinedotsize/2)+(29*$i)+16)."px;border-top:1px Solid ";
              if ($i%5 == 0) {echo "#CCC";} else {echo "#666";}
              if ($i == 10) {echo ";background-color:rgba(0,0,0,0)";}
              echo ";'></div>";						
            }				
                  
          ?>
			
					<script type="text/javascript">
              
            rels = document.getElementsByClassName('timelinedotrecurve');
            cels = document.getElementsByClassName('timelinedotcompound');
            bels = document.getElementsByClassName('timelinedotbarebow');
            lels = document.getElementsByClassName('timelinedotlongbow');
            xels = document.getElementsByClassName('timelinedotcrossbow');
            for (var i = 0; i < rels.length-1; i++) {
              connect(rels[i], rels[i+1], "#093", 3);
            }				
            for (var i = 0; i < cels.length-1; i++) {
              connect(cels[i], cels[i+1], "#F33", 3);
            }				
            for (var i = 0; i < bels.length-1; i++) {
              connect(bels[i], bels[i+1], "#F90", 3);
            }					
            for (var i = 0; i < lels.length-1; i++) {
              connect(lels[i], lels[i+1], "#0FF", 3);
            }		
            for (var i = 0; i < xels.length-1; i++) {
              connect(xels[i], xels[i+1], "#63F", 3);
            }
              
          </script>
          
        </div>					
			</div>
		</div>
	</div>

	<?php
			}
		}
	?>	

 	<br>
  
<!-- CONTENT END -->
  
<?php
	include $sroot."/master/templates/footer.php";
?>