<?php 
	$isLoginAvailable = "true";
	
	if (strcasecmp($_GET['login'], "lrivas") == 0) {
		$isLoginAvailable = "false";
	}
	
/*	header('Content-type: application/json');
*/	echo $isLoginAvailable;
?>	