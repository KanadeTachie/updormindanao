<?php
	include "connect.php";

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM dorms WHERE iddorms = $id";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}
			
	echo $sql;