<?php

	if (isset($_SESSION['uid']) && $_SESSION['uid'] != '') {
		$loggedin = true;
		$uid = $_SESSION['uid'];
		$auth = $_SESSION['auth'];
	} else {
		$loggedin = false;
		$uid = -1;
		$auth = -1;
	}
	if ($auth >= 1) {$admin = true;} else {$admin = false;}

?>