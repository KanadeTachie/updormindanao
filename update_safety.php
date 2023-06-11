<?php
	include "connect.php";

	$id = $_POST["recid"];
	$electrical = "NO";
	if (isset($_POST['electrical']))
  	{
		$electrical = $_POST["electrical"];
	}
	$breaker = "NO";
	if (isset($_POST['window']))
  	{
		$breaker = $_POST["breaker"];
	}
	$gas = "NO";
	if (isset($_POST['gas']))
  	{
		$gas = $_POST["gas"];
	}
	$ventilation = "NO";
	if (isset($_POST['ventilation']))
  	{
		$ventilation = $_POST["ventilation"];
	}

	$sql = "UPDATE safety SET WHERE iddorm=";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}
	echo $sql;
//$sql = "UPDATE safety SET (iddorm, electricalchecked, circuitbreaker, gaschecked, lights) VALUES ($id, '$electrical', '$breaker', '$gas', '$ventilation')";