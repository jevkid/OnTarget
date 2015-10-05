<?php
	
	// Settings
	
	$image_dir = $_SERVER['DOCUMENT_ROOT']."/i/full/";
	$thumb_dir = $_SERVER['DOCUMENT_ROOT']."/i/thumb/";
	$thumb_width = 100;
	$thumb_height = 100;
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	
	$alerts = array();
	
	session_start();	
	include $_SERVER['DOCUMENT_ROOT']."/master/scripts/functions.php";
	
	// Upload File
	
	$filename = $_FILES['fupload']['name'];
	
	if (count($filename) <= 1 && $filename[0] == "") {
		$alerts[] = 7;		
	} else {
	
		// Loop through each file
		for ($i = 0; $i < count($filename); $i++) {
		
			$temp = explode(".", $filename[$i]);
			$extension = end($temp);
			
			if ((($_FILES["fupload"]["type"][$i] == "image/gif")
			|| ($_FILES["fupload"]["type"][$i] == "image/jpeg")
			|| ($_FILES["fupload"]["type"][$i] == "image/jpg")
			|| ($_FILES["fupload"]["type"][$i] == "image/pjpeg")
			|| ($_FILES["fupload"]["type"][$i] == "image/x-png")
			|| ($_FILES["fupload"]["type"][$i] == "image/png"))
			&& ($_FILES["fupload"]["size"][$i] < 10485760)
			&& in_array($extension, $allowedExts)) {
				if ($_FILES["fupload"]["error"][$i] > 0) {
					$alerts[] = "ERROR#8! Return Code: ".$_FILES["fupload"]["error"][$i];
				} else {
					if (file_exists($image_dir.$filename[$i])) {
						$alerts[] = "ERROR #9! \'".$filename[$i]."\' already exists";
					} else {					
						
						// Move file to permanent location
						move_uploaded_file($_FILES["fupload"]["tmp_name"][$i], $image_dir.$filename[$i]);					
						// Create Thumbnail
						if(preg_match('/[.](jpg)$/', $filename[$i])) {
							$image = imagecreatefromjpeg($image_dir.$filename[$i]);
						} else if (preg_match('/[.](gif)$/', $filename[$i])) {
							$image = imagecreatefromgif($image_dir.$filename[$i]);
						} else if (preg_match('/[.](png)$/', $filename[$i])) {
							$image = imagecreatefrompng($image_dir.$filename[$i]);
						}		
						$width = imagesx($image);
						$height = imagesy($image);		
						$original_aspect = $width/$height;
						$thumb_aspect = $thumb_width/$thumb_height;		
						if ($original_aspect >= $thumb_aspect) {
							$new_height = $thumb_height;
							$new_width = $width/($height/$thumb_height);
						}	else {
							$new_width = $thumb_width;
							$new_height = $height/($width/$thumb_width);
						}		
						$thumb = imagecreatetruecolor($thumb_width, $thumb_height);		
						// Resize and crop
						imagecopyresampled($thumb,
															 $image,
															 0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
															 0 - ($new_height - $thumb_height) / 2, // Center the image vertically
															 0, 0,
															 $new_width, $new_height,
															 $width, $height);
						imagejpeg($thumb, $thumb_dir.$filename[$i], 80);
					}
				}
			} else {
				$alerts[] = 6;
			}
		}
		if (count($filename) > 1) {$plural = "s";} else {$plural = "";}
		$alerts[] = "File".$plural." successfully uploaded to: ".str_replace($_SERVER['DOCUMENT_ROOT'],"",$image_dir);
		$alerts[] = 0;
	}
	
	if (count($alerts) > 0) {
		$_SESSION['alerts'] = $alerts;		
	}
	header("location:".$_POST['url']);

?>