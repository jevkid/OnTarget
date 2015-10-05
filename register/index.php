<?php
	include "/mntL/group/group3/master/scripts/init.php";
	// PHP START
		
		if ($loggedin == true) {
			header("Location: ".$wroot."/dashboard");
		}
		
	// PHP END
	include $sroot."/master/templates/doctype.php";
	include $sroot."/master/templates/header.php";
?>

	<br>
	<h1>Register</h1>

	<form id="register" action="/group3/master/scripts/sessions/register.php" method="POST">
		<table><tr><td style="text-align:right;">
			First Name:
		</td><td colspan="2">
			<input type="text" name="fname">
		</td></tr><tr><td style="text-align:right;">
			Surname:
		</td><td colspan="2">
			<input type="text" name="sname">
		</td></tr><tr><td style="text-align:right;">
			E-mail:
		</td><td colspan="2">
			<input type="text" name="email">
		</td></tr><tr><td style="text-align:right;">
			Password:
		</td><td colspan="2">
			<input type="password" name="password">
		</td></tr><tr><td style="text-align:right;">
			Facebook ID:
		</td><td colspan="2">
			<input type="text" name="fbid">
		</td></tr><tr><td style="text-align:right;">
			Club:
		</td><td colspan="2">
			<select name="cid">
			<?php
				$clubs = getTable("SELECT * FROM clubs");
				foreach ($clubs as $club) {
					echo "<option value='".$club['id']."'>".$club['name']."</option>";
				}
			?>
			</select>
		</td></tr><tr><td style="text-align:right;">
			Class:
		</td><td colspan="2">
			<select name="class">
				<option value="0">Beginner (&lt; 1 Year)</option>
				<option value="0">Intermediate</option>
				<option value="0">Experienced</option>
			</select>
		</td></tr><tr><td style="text-align:right;">
			Sex:
		</td><td style="width:180px;">
			<input type="radio" name="sex" value="M"> Male
			<input type="radio" name="sex" value="F"> Female
		</td><td rowspan="2" style="text-align:right;" valign="bottom">
			<input type="submit" value="Register">			
		</td></tr><tr><td style="text-align:right;">
			DOB:
		</td><td>
			<input type="date" name="dob">
		</td></tr></table>
		<input type="hidden" name="active" value="1">
		<input type="hidden" name="url" value="<?php echo $url; ?>">
	</form>

<?php
	include $sroot."/master/templates/footer.php";
?>