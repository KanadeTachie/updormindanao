<?php
	include "connect.php";

	$id = $_POST["recid"];
	$electrical = "NO";
	if (isset($_POST['electrical']))
  	{
		$electrical = $_POST["electrical"];
	}
	$breaker = "NO";
	if (isset($_POST['breaker']))
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

	$sql = "UPDATE safety SET electricalchecked='$electrical', circuitbreaker='$breaker', gaschecked='$gas', lights='$ventilation'  WHERE iddorm = $id";
	if ($conn->query($sql) === TRUE) {
	}