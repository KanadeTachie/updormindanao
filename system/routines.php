<?php
	function getrow($command, $none=true){
		require "connect.php";
		$row = array();
		if ($result=$conn->query($command)){
			if ($none) {$row = $result->fetch_assoc();}
		} else $row = array('error');
		$conn->close();
		unset($conn);
		
		return $row;
	}
	function getrowRead($command, $none=true){
		require "connect.php";
		$row = array();
		if ($result=$connRead->query($command)){
			if ($none) {$row = $result->fetch_assoc();}
		} else $row = array('error');
		$connRead->close();
		unset($connRead);
		
		return $row;
	}
	function gettable($command){
		require "connect.php";

		$table = array();
		if ($result=$conn->query($command)){
			$table = $result->fetch_all(MYSQLI_ASSOC);
		} 
		$conn->close();
		unset($conn);
		
		return $table;
	}

?>