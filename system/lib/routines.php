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
function gettable($command){
	$table = array();
	require "connect.php";
	
	//$conn =  new mysqli("10.0.1.8", "dims", "dims2017","parkstickers");  

     	if ($conn->connect_error) {
        	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
     	}
	$conn->set_charset("utf8");

	if ($result=$conn->query($command)){
		$table = $result->fetch_all(MYSQLI_ASSOC);
	} 
	$conn->close();
	unset($conn);
	return $table;
}

function t_SQL($command){
	require "connect.php";
	$sql="FALSE";
     	if ($conn->connect_error) {
        	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		$sql="CONN ERR";
     	}
	$conn->set_charset("utf8");
	if ($conn->query($command) === TRUE) {
		$sql="TRUE";
	}
	$conn->close();
	unset($conn);
	return $sql;
}


function getmultitable($command){
	$acom = explode(";",$command);
	require "connect.php";
	$tables = array();
	$i = 'test';
	$conn->multi_query($command);
	//die($acom[0]."-".$acom[1]."-".$acom[2]."-".$acom[3]);
	for ($x = 0; $x < count($acom)-1; $x++){
			if ($result=$conn->store_result()) {
				$tables[] = $result->fetch_all(MYSQLI_ASSOC);
			} else { $tables[] =array(error=>$acom[$x]);}
			$conn->next_result();
	}
	$conn->close();
	unset($conn);
	return $tables;
}

?>