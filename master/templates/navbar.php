
<?php if ($loggedin == true) { $right = 714; ?>

    <a id="settingsbut" class="toprightnavbut" href="/group3/settings" <?php if ($curpage == 4) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?>></a>
    <form action="<?php echo $wroot; ?>/master/scripts/sessions/logout.php" method="POST">
    	<input type="submit" value="Logout" id="logout" class="toprightnavbut">
    	<input type="hidden" name="url" value="<?php echo $url; ?>">
    </form>
                           
<?php if ($admin == true) { $right = 642; ?>

	<li><a href="<?php echo $wroot; ?>/admin" <?php if ($curpage == 10) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> >Admin</a></li>
	
<?php } } ?>

<ul style="margin:0px 0px 0px <?php echo $right; ?>px">
	<li><a <?php if ($curpage == 3) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="<?php echo $wroot; ?>/gallery">Gallery</a></li>
	<li><a <?php if ($curpage == 2) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="<?php echo $wroot; ?>/clubs">Clubs</a></li>
	<li><a <?php if ($curpage == 1) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="<?php echo $wroot; ?>/about">About</a></li>
	<li><a <?php if ($curpage == 0) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="<?php echo $wroot; ?>/">Home</a></li>
</ul>