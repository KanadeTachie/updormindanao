<?php     

   $conn =  new mysqli("localhost", "root", "","dormitory");  
   if ($conn->connect_error) {
      die($conn->connect_error);
   }
?>
