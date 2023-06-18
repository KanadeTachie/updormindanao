<?php
	include "connect.php";

	$id = $_POST["recid"];
	$secu = "NO";
	if (isset($_POST['secu']))
  	{
		$secu = $_POST["secu"];
	}
	$cctv = "NO";
	if (isset($_POST['cctv']))
  	{
		$cctv  = $_POST["cctv"];
	}
	$fence = "NO";
	if (isset($_POST['fence']))
  	{
		$fence = $_POST["fence"];
	}
	$gate = "NO";
	if (isset($_POST['gate']))
  	{
		$gate  = $_POST["gate"];
	}
	$Plight = "NO";
	if (isset($_POST['Plight']))
  	{
		$Plight = $_POST["Plight"];
	}
	$grill = "NO";
	if (isset($_POST['grill']))
  	{
		$grill = $_POST["grill"];
	}
	$log = "NO";
	if (isset($_POST['log']))
  	{
		$log = $_POST["log"];
	}
	$curfew = "NO";
	if (isset($_POST['curfew']))
  	{
		$curfew = $_POST["curfew"];
	}
	$Hlight = "NO";
	if (isset($_POST['Hlight']))
  	{
		$Hlight = $_POST["Hlight"];
	}
	$Slight = "NO";
	if (isset($_POST['Slight']))
  	{
		$Slight = $_POST["Slight"];
	}

	$sql = "UPDATE security SET guard='$secu', cctv='$cctv', fence='$fence', maingate='$gate', perimeterlight='$Plight', 
	               windowgrill='$grill', logbook='$log', curfew='$curfew', hallwaylight='$Hlight', streetlight='$Slight'			
				   WHERE iddorm = $id";
	if ($conn->query($sql) === TRUE) {
	}
