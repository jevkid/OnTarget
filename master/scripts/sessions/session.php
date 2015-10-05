<?php
	
	session_start();
	// Error alerts/init
	if (!isset($_SESSION['alerts'])) {
		$_SESSION['alerts'] = array();
	}

?>