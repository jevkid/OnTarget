<?php
	
	//////////////////////
	
	$sroot = "/mntL/group/group3";
	include $sroot."/master/scripts/functions.php";	
	$imgdir = $sroot."/i/";
	
	//////////////////////
	
	$cmd1 = "\"doImageAnalysis('/mntL/group/group3/i/'), exit\"";
	$cmd2 = "\"doImageAnalysis('".$imgdir."'), exit\"";
	$result = shell_exec("matlab -nodisplay -r ".$cmd2);
	
	//$result = matlab("doImageAnalysis('".$imgdir."')");
	
	echo $cmd1."<br>".$cmd2."<br>";
	echo $result;
	
?>