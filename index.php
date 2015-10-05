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

<!-- CONTENT START -->
  	<br>
    <br>
    <div style="width:1200px;text-align:center;position:relative;">
	    <h1 style="display:inline-block;position:relative;top:-80px;margin-right:15px;">Welcome to </h1><img src="<?php echo $wroot; ?>/i/logoBig2.png" alt="" style="display:inline;height:200px;" />
    </div>
    <br>
    <p style="width:1200px;text-align:center;">
    	OnTarget is an online service that lets you and archery clubs across the world compete against eachother via our unqiue e-leagues.<br>
      <br>
      Simply sign up your club and start uploading scores. You can even use our<br>
      video and image analysis tools to record your scores and improve your shooting! (<a href="<?php echo $wroot;?>/about">Read More</a>)
    </p>
    <br>
    <br>
    <div style="position:relative;width:306px;margin:0px auto;">
      <form action="<?php echo $wroot; ?>/register" method="post">
        <input type="submit" class="submitbutton" value="Register" style="left:25px;">
      </form>
      
      <form id="loginform" action="<?php echo $wroot; ?>/master/scripts/sessions/login.php" method="post">
        <input id="email" type="text" name="myemail" placeholder="E-mail"><br>
        <input id="password" type="password" name="mypassword" placeholder="Password"><br>
        <input type="hidden" name="url" value="<?php echo $url; ?>"><br><br>
        <input id="login" type="submit" name="login" class="submitbutton" value="Log In" style="right:25px;">
      </form>
    </form>
    
    <br>
   
<!-- CONTENT END -->

<?php
	include $sroot."/master/templates/footer.php";
?>