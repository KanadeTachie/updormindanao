<?php
	include "connect.php";

	$id = 0;
	$owner = $_POST['owner'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$rooms = $_POST['rooms'];
	$occupants = $_POST['occupants'];
	$renthead = $_POST['perhead'];
	$rentroom = $_POST['perroom'];
	$deposit = $_POST['deposit'];
	$advance = $_POST['advance'];
	$transient = $_POST['transient'];
	$electricity = $_POST['electricity'];
	$water = $_POST['water'];
	$internet = $_POST['internet'];
	$other = $_POST['other'];
	$map = $_POST['map'];
	
	$image1 = "";$url1="";
	if ($_FILES['image1']['name'] != "") {
        $image1 = "images/" . $_FILES['image1']['name'];
		$url1 = "http://localhost/Dormisko/system/images/" . $_FILES['image1']['name'];
    	move_uploaded_file( $_FILES['image1']['tmp_name'], $image1) or die( "Could not copy file!");
    }	
	$image2 = "";$ur2="";
	if ($_FILES['image2']['name'] != "") {
        $image2 = "images/" . $_FILES['image2']['name'];
		$url2 = "http://localhost/Dormisko/system/images/" . $_FILES['image2']['name'];
		move_uploaded_file( $_FILES['image2']['tmp_name'], $image2) or die( "Could not copy file!");
    }	
	$image3 = "";$ur3="";
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
		$sql = "INSERT INTO dorms (name, owner, email, contact, address, maplocation, rooms, roomcapacity, rentperhead, rentperroom, deposit, advance, transient, electricity, water, internet, othercharge, imagelink, imagelink2, imagelink3)
			VALUES('$name', '$owner', '$email','$contact', '$address', '$map',  $rooms, $occupants, '$renthead', '$rentroom', '$deposit', '$advance', '$transient', '$electricity', '$water', '$internet', '$other', '$url1', '$url2', '$url3')"; 
	//}
	if ($conn->query($sql) === TRUE) {
		$sql = "SELECT iddorms FROM dorms ORDER BY iddorms DESC";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = $row['iddorms']; 
		$sql="TRUE";
	}
			

	// BFP
	$extinguisher = "NO";
	$exit = "NO";
	$alarm = "NO";
	$detector = "NO";
	$hose = "NO";
	$evac = "NO";

	$sql = "INSERT INTO bfp (iddorms, extinguisher, fireexit, firealarm, smokedetector, firehose, evacroute)
			VALUES($id, '$extinguisher', '$exit', '$alarm','$detector', '$hose', '$evac')"; 
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}

	// SECURITY
	$secu = "NO";
	$cctv = "NO";
	$fence = "NO";
	$gate = "NO";
	$Plight = "NO";
	$grill = "NO";
	$log = "NO";
	$curfew = "NO";
	$Hlight = "NO";
	$Slight = "NO";

	$sql = "INSERT INTO security (iddorm, guard, cctv, fence, maingate, perimeterlight, windowgrill, logbook, curfew, hallwaylight, streetlight)
				VALUES ($id, '$secu', '$cctv', '$fence', '$gate', '$Plight', '$grill', '$log', '$curfew', '$Hlight', '$Slight')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}


	//amenities
	$dry = "NO";
	$washing = "NO";
	$kitchen = "NO";
	$dining = "NO";
	$study = "NO";
	$reception = "NO";

	$sql = "INSERT INTO amenity (iddorm, clothdrying, lavatory, ventilatedkitchen, diningarea, studyarea, receptionarea)
  			VALUES ($id, '$dry', '$washing', '$kitchen', '$dining', '$study', '$reception')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}


	// PRIVACY
	$Olock = "NO";
	$Dlock = "NO";
	$window = "NO";
	$bath = "NO";
	$stay = "NO";

	$sql = "INSERT INTO  privacy (iddorm, lockoutside, doublelockinside, curtain, privacylatch, ownerstayin)
				VALUES ($id, '$Olock', '$Dlock', '$window', '$bath', '$stay')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}

	// SAFETY
	$electrical = "NO";
	$breaker = "NO";
	$gas = "NO";
	$ventilation = "NO";
	$sql = "INSERT INTO  safety (iddorm, electricalchecked, circuitbreaker, gaschecked, lights) VALUES ($id, '$electrical', '$breaker', '$gas', '$ventilation')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}