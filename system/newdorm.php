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

	if (isset($_POST['extinguisher']))
  	{
		$extinguisher = $_POST["extinguisher"];
	}
	if (isset($_POST['exit']))
  	{
		$exit = $_POST["exit"];
	}
	if (isset($_POST['alarm']))
  	{
		$alarm = $_POST["alarm"];
	}
	if (isset($_POST['detector']))
  	{
		$detector = $_POST["detector"];
	}
	if (isset($_POST['hose']))
  	{
		$hose = $_POST["hose"];
	}
	if (isset($_POST['evac']))
  	{
		$evac = $_POST["evac"];
	}

	$sql = "INSERT INTO bfp (iddorms, extinguisher, fireexit, firealarm, smokedetector, firehose, evacroute)
			VALUES($id, '$extinguisher', '$exit', '$alarm','$detector', '$hose', '$evac')"; 
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}

	// SECURITY
	$secu = "NO";
	if (isset($_POST['secu']))
  	{
		$secu = $_POST["secu"];
	}
	$cctv = "NO";
	if (isset($_POST['cctv']))
  	{
		$cctv  = $_POST["cctv"];
	}
	$fence = "NO";
	if (isset($_POST['fence']))
  	{
		$fence = $_POST["fence"];
	}
	$gate = "NO";
	if (isset($_POST['gate']))
  	{
		$gate  = $_POST["gate"];
	}
	$Plight = "NO";
	if (isset($_POST['Plight']))
  	{
		$Plight = $_POST["Plight"];
	}
	$grill = "NO";
	if (isset($_POST['grill']))
  	{
		$grill = $_POST["grill"];
	}
	$log = "NO";
	if (isset($_POST['log']))
  	{
		$log = $_POST["log"];
	}
	$curfew = "NO";
	if (isset($_POST['curfew']))
  	{
		$curfew = $_POST["curfew"];
	}
	$Hlight = "NO";
	if (isset($_POST['Hlight']))
  	{
		$Hlight = $_POST["Hlight"];
	}
	$Slight = "NO";
	if (isset($_POST['Slight']))
  	{
		$Slight = $_POST["Slight"];
	}

	$sql = "INSERT INTO security (iddorm, guard, cctv, fence, maingate, perimeterlight, windowgrill, logbook, curfew, hallwaylight, streetlight)
				VALUES ($id, '$secu', '$cctv', '$fence', '$gate', '$Plight', '$grill', '$log', '$curfew', '$Hlight', '$Slight')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}


	//amenities
	$dry = "NO";
	if (isset($_POST['dry']))
  	{
		$dry = $_POST["dry"];
	}
	$washing = "NO";
	if (isset($_POST['washing']))
  	{
		$washing = $_POST["washing"];
	}
	$kitchen = "NO";
	if (isset($_POST['kitchen']))
  	{
		$kitchen = $_POST["kitchen"];
	}
	$dining = "NO";
	if (isset($_POST['dining']))
  	{
		$dining = $_POST["dining"];
	}
	$study = "NO";
	if (isset($_POST['study']))
  	{
		$study = $_POST["study"];
	}
	$reception = "NO";
	if (isset($_POST['reception']))
  	{
		$reception = $_POST["reception"];
	}

	$sql = "INSERT INTO amenity (iddorm, clothdrying, lavatory, ventilatedkitchen, diningarea, studyarea, receptionarea)
  			VALUES ($id, '$dry', '$washing', '$kitchen', '$dining', '$study', '$reception')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}


	// PRIVACY
	$Olock = "NO";
	if (isset($_POST['Olock']))
  	{
		$Olock = $_POST["Olock"];
	}
	$Dlock = "NO";
	if (isset($_POST['Dlock']))
  	{
		$Dlock = $_POST["Dlock"];
	}
	$window = "NO";
	if (isset($_POST['window']))
  	{
		$window = $_POST["window"];
	}
	$bath = "NO";
	if (isset($_POST['bath']))
  	{
		$bath = $_POST["bath"];
	}
	$stay = "NO";
	if (isset($_POST['stay']))
  	{
		$stay = $_POST["stay"];
	}

	$sql = "INSERT INTO  privacy (iddorm, lockoutside, doublelockinside, curtain, privacylatch, ownerstayin)
				VALUES ($id, '$Olock', '$Dlock', '$window', '$bath', '$stay')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}

	// SAFETY
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
	$sql = "INSERT INTO  safety (iddorm, electricalchecked, circuitbreaker, gaschecked, lights) VALUES ($id, '$electrical', '$breaker', '$gas', '$ventilation')";
	if ($conn->query($sql) === TRUE) {
		$sql="TRUE";
	}

	echo $sql;


