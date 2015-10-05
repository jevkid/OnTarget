    </div>
  </div>

	</div>

  <div id="footer">
  
    <div style="position:absolute;z-index:2;left:0px;top:2px;">
      <div class="fb-like" data-href="https://www.facebook.com/pages/Cardiff-University-Archery-Club/236805839699160" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>
    
    <div style="position:absolute;width:100%;line-height:50px;z-index:1;">
      &copy; OnTarget <?php echo date("Y"); ?> | Designed by <a href="/group3">Group 3</a>
    </div>

    <div style="position:absolute;right:0px;z-index:2;" onclick="switchQR();">
      <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&amp;data=<?php echo $url; ?>" title="QRHyperlink" style="height:48px;" alt="" />
    </div>
    
  </div>
  
	<?php	
		if (count($_SESSION['alerts']) > 0) {
			$type = "error";
			$alertmsg = "";
			for ($i = 0; $i < count($_SESSION['alerts']); $i++) {
				if ($_SESSION['alerts'][$i] == "0") {
					$type = "success";
				} else {
					if (is_numeric($_SESSION['alerts'][$i])) {
						$alertmsg .= $alert[$_SESSION['alerts'][$i]]."<br>";
					} else {
						$alertmsg .= $_SESSION['alerts'][$i]."<br>";
					}
				}
			}
			echo "<script type='text/javascript'>alertify.".$type."(\"".$alertmsg."\");</script>";
			unset($_SESSION['alerts']);
		}			
	?>

	<div id="bigQR" style="display:none;">
		<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&amp;data=<?php echo $url; ?>" style="margin:0px auto;border:10px Solid #333;border-radius:20px;height:100%;" alt="" onClick="switchQR();" />
    </div>

</body>
</html>