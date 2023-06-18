<?php
	include "connect.php";

	$id = $_POST['ownerId'];
	$owner = $_POST['owner'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$rooms = $_POST['rooms'];
	$occupants = $_POST['occupants'];
	$rentroom = $_POST['perroom'];
	$renthead = $_POST['perhead'];
	$deposit = $_POST['deposit'];
	$advance = $_POST['advance'];
	$transient = $_POST['transient'];
	$electricity = $_POST['electricity'];
	$water = $_POST['water'];
	$internet = $_POST['internet'];
	$map = $_POST['map'];
	$other = $_POST['other'];
	
	$image1 = ""; $url1 = $_POST['file1'];
	if ($_FILES['image1']['name'] != "") {
        $image1 = "images/" . $_FILES['image1']['name'];
		$url1 = "http://localhost/Dormisko/system/images/" . $_FILES['image1']['name'];
    	move_uploaded_file( $_FILES['image1']['tmp_name'], $image1) or die( "Could not copy file!");
    }	
	$image2 = ""; $url2 = $_POST['file2'];
	if ($_FILES['image2']['name'] != "") {
        $image2 = "images/" . $_FILES['image2']['name'];
		$url2 = "http://localhost/Dormisko/system/images/" . $_FILES['image2']['name'];
		move_uploaded_file( $_FILES['image2']['tmp_name'], $image2) or die( "Could not copy file!");
    }	
	$image3 = ""; $url3 = $_POST['file3'];
	if ($_FILES['image3']['name'] != "") {
        $image3 = "images/" . $_FILES['image3']['name'];
		$url3 = "http://localhost/Dormisko/system/images/" . $_FILES['image3']['name'];
		move_uploaded_file( $_FILES['image3']['tmp_name'], $image3) or die( "Could not copy file!");
    }	

	/*
	if (isset($_FILES['image'])) {
		$imgData = ($_FILES['image']['tmp_name']);
		$imageProperties = getimageSize($_FILES['image']['tmp_name']);
		$file_size = $_FILES['image']['size'];
		$img = file_get_contents($imgData);

		$sql = "INSERT INTO dorms (name, owner, email, contact, address, maplocation, rooms, roomcapacity, rentperhead, rentperroom, deposit, advance, transient, electricity, water, internet, othercharge, image1, imagelink, imagelink2 imagelink3)
			VALUES('$name', '$owner', '$email','$contact', '$address', '$map',  $rooms, $occupants, '$renthead', '$rentroom', '$deposit', '$advance', '$transient', '$electricity', '$water', '$internet', '$other', '". addslashes($img)."', '$link1', '$link2', '$link3')"; 
	}	
	else { */
		$sql = "UPDATE dorms SET name='$name', owner='$owner', email='$email', contact='$contact', address='$address', maplocation='$map', rooms='$rooms', 
				roomcapacity='$occupants', rentperhead='$renthead', rentperroom='$rentroom', deposit='$deposit', advance='$advance', transient='$transient', 
				electricity='$electricity', water='$water', internet='$internet', othercharge='$other', imagelink='$url1', imagelink2='$url2', imagelink3='$url3' WHERE iddorms=$id";
													
	//}
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}
	echo $sql;


