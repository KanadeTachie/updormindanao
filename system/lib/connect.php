<?php     
     $conn =  new mysqli("10.0.1.8", "dims", "dims2017","parkstickers");  

     if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
     }
	$conn->set_charset("utf8");
?>
