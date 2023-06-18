<?php
	session_start();
	$x="NO";
	if (isset($_SESSION["login"])) { 
		$x="OK";
	}
	echo $x;
?>