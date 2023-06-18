<?php
	session_start();
	$x="";
	require "connect.php";
	$id = $_REQUEST['id'];
	$pwd = $_REQUEST['pwd'];
	$sql = "SELECT * FROM users WHERE userid='$id' AND password = '$pwd'";
	$result = $conn->query($sql); 
	while($row = $result->fetch_assoc()){
		$_SESSION["login"] = "YES";
		$x="OK";
	}
?>