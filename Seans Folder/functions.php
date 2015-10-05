<?php

	function getMatlabcat() {
		return "<br><br><span style='font-family:\"Courier New\", Courier, monospace';>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_,'|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_.-''``-...___..--';)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/_&nbsp;\'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__..-'&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;,--...--'''<br>        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\&nbsp;&nbsp;&nbsp;&nbsp;.`--'''&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`-';'&nbsp;&nbsp;&nbsp;MATLABCAT&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp;;&nbsp;;<br>&nbsp;__...--''&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___...--_..'&nbsp;&nbsp;.;.'<br>(,__....----'''&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(,..--''&nbsp;&nbsp;</span>";
	}

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