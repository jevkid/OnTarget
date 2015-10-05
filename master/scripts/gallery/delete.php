<?php

	
	session_start();
	$alerts = array();
	
	$images = $_POST['img'];
	if (count($images) < 1) {$alerts[] = 7;}

	if (count($alerts) == 0) {
		for ($i = 0; $i < count($images); $i++) {
			unlink($_SERVER['DOCUMENT_ROOT']."/i/full/".$images[$i]);
			unlink($_SERVER['DOCUMENT_ROOT']."/i/thumb/".$images[$i]);
		}		
		if (count($images) > 1) {$plural = "s";} else {$plural = "";}
		$alerts[] = 0;
		$alerts[] = "Picture".$plural." deleted successfully";
	}	
	$_SESSION['alerts'] = $alerts;		
	header("location:".$_POST['url']);

?>