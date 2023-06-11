<?php     
     $conn =  new mysqli("localhost", "root", "","dormitory");  
     if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
     }
	 $conn->set_charset("utf8");
	 $conn->query("SET time_zone = '+8:00'");


?>
