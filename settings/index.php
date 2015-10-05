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
        
        $userinfo = getTable("SELECT * FROM users WHERE id='".$_SESSION['uid']."'", 1);
	
?>

<!-- CONTENT START -->
	
    <br>
    <h1>Settings</h1>
    <br>
    <br>
    <div style="overflow:auto;">
        <div style="margin:0px auto;width:420px;text-align:center;float:left;overflow:auto;">
            <h2>Change your display picture:</h2>
            <br>
            <?php
                echo "<img src='";
            	if ($userinfo["fbid"] == "" || file_get_contents("https://graph.facebook.com/".$userinfo["fbid"]."/picture?type=large") === false) {
                    echo "/group3/i/users/default.jpg";
                } else {
                    echo "https://graph.facebook.com/".$userinfo["fbid"]."/picture?type=large";
                }
            	echo "' alt='' style='float:left;height:150px;margin:0px auto;'";
            ?>
            <br><br>
            <form action="/group3/master/scripts/settings/changedp.php" method="post" style="float:left;text-align:left;margin-left:8px;position:relative;top:20px;">
                Facebook ID:<br>
                <input type="text" name="fburl" style="width:150px;"><br>
                <p class="caption">(Uses your Facebook profile picture)</p>
                <input type="hidden" name="url" value="<?php echo $url; ?>">
                <input type="submit" name="changedp" value="Submit">
            </form>  
        </div>
        <div style="margin:0px auto;width:376px;text-align:center;float:left;">
            <h2>Change your password:</h2>
            <br>
            <form action="/group3/master/scripts/settings/changepw.php" method="post">
                <table id = "pass"><tr><td align="right">
                    Old Password:</td><td><input type="password" name="oldpw">
                </td></tr><tr><td align="right">
                    New Password:</td><td><input type="password" name="newpw" maxlength="20">
                </td></tr><tr><td align="right">
                    Confirm New Password:</td><td><input type="password" name="confnewpw" maxlength="20">
                </td></tr>
                    </table>
                    <tr><td colspan="2">
                    <br>
                    <input type="hidden" name="url" value="<?php echo $url; ?>">
                    <input type="submit" name="changepw" value="Submit">
                </td></tr>
    <!--            </table>-->
            </form>  
        </div>
        <div style="margin:0px auto;width:322px;float:right;">
            <h2>Subscription/Notification Options:</h2>
            <br>
            <form action="/group3/master/scripts/settings/changenotif.php" method="post">
                <input type="checkbox" name="notifs[]" value="notifications" <?php if ($userinfo['emailnotifications']) {echo "checked";} ?>> Email me notifications<br>
                <input type="checkbox" name="notifs[]" value="newsletters" <?php if ($userinfo['emailnewsletters']) {echo "checked";} ?>> Email me ONTarget newsletters<br>
                <br>
                <input type="hidden" name="url" value="<?php echo $url; ?>">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <br>
    <br>

<!-- CONTENT END -->

<?php
	   include $sroot."/master/templates/footer.php";
    }
?>