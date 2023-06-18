<?php
	include "connect.php";

	// BFP
	$extinguisher = "NO";
	$exit = "NO";
	$alarm = "NO";
	$detector = "NO";
	$hose = "NO";
	$evac = "NO";

	$id = $_POST["id"];
	if (isset($_POST['extinguisher']))
  	{
		$extinguisher = $_POST["extinguisher"];
	}
	if (isset($_POST['exit']))
  	{
		$exit = $_POST["exit"];
	}
	if (isset($_POST['alarm']))
  	{
		$alarm = $_POST["alarm"];
	}
	if (isset($_POST['detector']))
  	{
		$detector = $_POST["detector"];
	}
	if (isset($_POST['hose']))
  	{
		$hose = $_POST["hose"];
	}
	if (isset($_POST['evac']))
  	{
		$evac = $_POST["evac"];
	}

	$sql = "UPDATE bfp SET extinguisher='$extinguisher', fireexit='$exit', firealarm='$alarm', smokedetector='$detector', firehose='$hose', evacroute='$evac' WHERE iddorms=$id";
	
	if ($conn->query($sql) === TRUE) {
	}
?>