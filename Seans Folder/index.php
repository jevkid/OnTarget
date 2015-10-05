<?php
	
	//////////////////////
	
	$sroot = "/mntL/group/group3";
	include $sroot."/matlab/functions.php";	
	$imgdir = $sroot."/i/";
	
	//////////////////////
	
	$result = matlab("doImageAnalysis('".$imgdir."')");
	
	//$result = shell_exec("matlab -r \"add('hello','world')\" -nodisplay");
	
	echo $result;
	
?>