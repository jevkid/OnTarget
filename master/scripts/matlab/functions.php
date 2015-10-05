<?php

	function matlab($cmd) {
		$string = shell_exec("matlab -nodisplay -r \"".$cmd.", exit\"");
		$string = " ".$string;
		$ini = strpos($string, "ans =");
		if ($ini == 0) {
			$result = "";
		} else {
			$ini += strlen("ans =");
			$len = strpos($string,">>", $ini)-$ini;
			$result = trim(substr($string, $ini, $len));
		}
		return $result;
	}

?>