<?php
	include "connect.php";

	$id = $_POST["recid"];
	$Olock = "NO";
	if (isset($_POST['Olock']))
  	{
		$Olock = $_POST["Olock"];
	}
	$Dlock = "NO";
	if (isset($_POST['Dlock']))
  	{
		$Dlock = $_POST["Dlock"];
	}
	$window = "NO";
	if (isset($_POST['window']))
  	{
		$window = $_POST["window"];
	}
	$bath = "NO";
	if (isset($_POST['bath']))
  	{
		$bath = $_POST["bath"];
	}
	$stay = "NO";
	if (isset($_POST['stay']))
  	{
		$stay = $_POST["stay"];
	}

	$sql = "UPDATE privacy SET  lockoutside='$Olock', doublelockinside='$Dlock', curtain='$window', privacylatch='$bath', ownerstayin='$stay' WHERE iddorm=$id";
	//var_dump($sql);
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}
	echo $sql;