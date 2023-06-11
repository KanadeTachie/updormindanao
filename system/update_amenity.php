<?php
	include "connect.php";

	// BFP
	$extinguisher = "NO";
	$exit = "NO";
	$alarm = "NO";
	$detector = "NO";
	$hose = "NO";
	$evac = "NO";

	$id = $_POST["recid"];
	$dry = "NO";
	if (isset($_POST['dry']))
  	{
		$dry = $_POST["dry"];
	}
	$washing = "NO";
	if (isset($_POST['washing']))
  	{
		$washing = $_POST["washing"];
	}
	$kitchen = "NO";
	if (isset($_POST['kitchen']))
  	{
		$kitchen = $_POST["kitchen"];
	}
	$dining = "NO";
	if (isset($_POST['dining']))
  	{
		$dining = $_POST["dining"];
	}
	$study = "NO";
	if (isset($_POST['study']))
  	{
		$study = $_POST["study"];
	}
	$reception = "NO";
	if (isset($_POST['reception']))
  	{
		$reception = $_POST["reception"];
	}

	$sql = "UPDATE amenity SET clothdrying='$dry', lavatory='$washing', ventilatedkitchen='$kitchen', diningarea='$dining', studyarea='$study', receptionarea='$reception' WHERE iddorm = $id";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}
	
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}
?>