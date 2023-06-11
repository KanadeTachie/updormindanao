<?php 
	session_start();
	if (isset($_SESSION["login"])) { 
		$search ="";
		if (isset($_REQUEST['search'])) {
			$search = $_REQUEST['search'];
		}	
		$sql = "SELECT * FROM dorms";
		if ($search != "") {
			$sql = "SELECT * FROM dorms WHERE owner LIKE '%$search%' OR name LIKE '%$search%'";
		}	
	}
	else {
		$sql = "SELECT * FROM dorms WHERE iddorms= 0";
	}
	require "connect.php";
	$result = $conn->query($sql);
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/main.css">
	<link href="js/toastr.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/sc-2.0.0/datatables.min.js"></script>
</head>

<body>
	<div id="header1">
	</div>
		
	<div id="content">
		<div class="paper paper-polar" >
			<div class="row">
				<div class="col-md-1">				
				</div>
				<div class="col-md-10">
					<h4 class="text-center">ISKO DORMS</h4>
				</div>
				<div class="col-md-1">		
				<button type="button" class="btn btn-primary" onclick="showLogin()" data-toggle="tooltip" title="Login"><span class="glyphicon glyphicon-pencil"></span></button>	
				</div>
			</div>
		</div>
		<div class="paper paper-polar" >
			<div class="row">	
				<div class="col-xs-12"><br>
					<input type="hidden" id="login">
					<div class="col-md-1">
						<button type="button" class="btn btn-primary" onclick="showAdd()" data-toggle="tooltip" title="New Dorm"><span class="glyphicon glyphicon-plus"></span></button>	
					</div>
					<div class="col-md-7">
					</div>
					<form>
						<div class="col-md-3">
							<input type="text" class="form-control" id="search" name="search" maxlength="45"  placeholder="search owner/name">
						</div>
						<div class="col-md-1">
							<input type="hidden" name="trans" value = "SEARCH">
							<button type="submit" class="btn btn-primary btn-block">Search</button>	
						</div>
					</form>
				</div>
				<div class="col-xs-12">
					<br>
					<br/>
				</div>
				
				<div class="col-xs-12" >
					<input type="hidden" name="trans" value = "ADD">
					<div class="col-md-12">
                        <table class="table table-hover" id="ds" style="width:100%">
							<thead>
								<tr>
									<th>Name</th>
									<th>Owner</th>
									<th>Address</th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>
                            <?php while($row = $result->fetch_assoc()){ ?>
                                    <tr> 
                                        <td>
											<a href="#" class="btnView" name = "UPDATE" id="<?php echo $row['iddorms'] ?>"><?php echo $row['name'] ?></a>
										</td>
                                        <td><?php echo $row['owner']??""; ?></td>
                                        <td><?php echo $row['address']??""; ?></td>
										<td >
											<button class="btnView" name = "AMENITY" id="<?php echo $row['iddorms'] ?>">Amenity</button>
											<button class="btnView" name = "BFP" id="<?php echo $row['iddorms'] ?>">Fire Safety</button>
											<button class="btnView" name = "PRIVACY" id="<?php echo $row['iddorms'] ?>">Privacy</button>
											<button class="btnView" name = "SAFETY" id="<?php echo $row['iddorms'] ?>">Safety</button>
											<button class="btnView" name = "SECURITY" id="<?php echo $row['iddorms'] ?>">Security</button>
											<button class="btnView" name = "DELETE" id="<?php echo $row['iddorms'] ?>">Delete</button>
										</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
						</table>
						
						<div class="col-xs-12">
						<br>
						</div>
						<div id="details" style="display:none;">
						</div>
					</div>		
					
				</div>	
			</div>
		</div>
	</div>

	<form id="newDorm">
		<div class="modal fade" id="newModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">New Dorm</h5>
					</div>
					<div class="modal-body">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">	
										<label>Registered Owner</label>
										<input type="text" class="form-control" id="owner" name="owner" maxlength="45" placeholder="Owner">
									</div>
								</div>	
							</div>	
							<br/>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">	
										<label>Dormitory Name</label>
										<input type="text" class="form-control" id="name" name="name" maxlength="45"  placeholder="Name">
									</div>
								</div>	
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-12">	
										<label>Address</label>
										<input type="text" class="form-control" id="address" name="address" maxlength="45"  placeholder="Address">
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-6">	
										<label>email</label>
										<input type="text" class="form-control" id="email" name="email" maxlength="25"  placeholder="email">
									</div>
									<div class="col-md-6">	
										<label>Contact#</label>
										<input type="text" class="form-control" id="contact" name="contact" maxlength="25"  placeholder="Contact Number">
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-3">	
										<label># of Rooms</label>
										<input type="number" class="form-control" id="rooms" name="rooms" maxlength="3"  value="1">
									</div>
									<div class="col-md-3">	
										<label>Occupants per Rm</label>
										<input type="number" class="form-control" id="occupants" name="occupants" maxlength="2" value="1">
									</div>
									<div class="col-md-3">	
										<label>Deposit</label>
										<input type="text" class="form-control" id="deposit" name="deposit" maxlength="12"  placeholder="ex 1 Month">
									</div>
									<div class="col-md-3">	
										<label>Advance</label>
										<input type="text" class="form-control" id="advance" name="advance" maxlength="12"   placeholder="ex 1 Month">
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-3">	
										<label>Rent per Rooms</label>
										<input type="text" class="form-control" id="perroom" name="perroom" maxlength="12"  placeholder="ex 1 1000 - 2,000">
									</div>
									<div class="col-md-3">	
										<label>Rent per Head</label>
										<input type="text" class="form-control" id="perhead" name="perhead" maxlength="12"  placeholder = "ex 1 1000 - 2,000">
									</div>
									<div class="col-md-3">	
										<label>Other Charges</label>
										<input type="text" class="form-control" id="other" name="other" maxlength="12"  placeholder = "ex 1 N/A">
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-3">	
										<label>Transient</label>
										<input type="text" class="form-control" id="transient" name="transient" maxlength="12" placeholder="ex 1 N/A">
									</div>
									<div class="col-md-3">	
										<label>Electricity</label>
										<input type="text" class="form-control" id="electricity" name="electricity" maxlength="12" placeholder="ex Metered">
									</div>
									<div class="col-md-3">	
										<label>Water</label>
										<input type="text" class="form-control" id="water" name="water" maxlength="12" placeholder="ex 1 Metered">
									</div>
									<div class="col-md-3">	
										<label>Internet</label>
										<input type="text" class="form-control" id="internet" name="internet" maxlength="12" placeholder="ex 1 None">
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-12">	
										<label>Map Location</label>
										<input type="text" class="form-control" id="map" name="map" maxlength="45" placeholder="clDRP4wuBcLr2_fgoCUJmIjkLf8vB2s&ehbc=2E312F">
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-4">	
										<p><input type="file"  accept="image/*" name="image1" id="image1" onchange="loadFile(event)"></p>
										<p><label for="image" style="cursor: pointer;">Upload Dorm Image-1</label></p>
										<p><img id="output" width="200"/></p>
									</div>
									<div class="col-md-4">	
										<p><input type="file"  accept="image/*" name="image2" id="image2" onchange="loadFile2(event)"></p>
										<p><label for="image" style="cursor: pointer;">Upload Dorm Image-2</label></p>
										<p><img id="output2" width="200"/></p>
									</div>
									<div class="col-md-4">	
										<p><input type="file"  accept="image/*" name="image3" id="image2" onchange="loadFile3(event)"></p>
										<p><label for="image" style="cursor: pointer;">Upload Dorm Image-3</label></p>
										<p><img id="output3" width="200"/></p>
									</div>
								</div>		
							</div>		
							<br/><br/>			
					</div>
					<div class="modal-footer">
						<button type= "button" class="btn btn-primary" onclick="showBfp()">Fire Protection</button>
						<button type= "button" class="btn btn-primary" onclick="showPrivacy()">Privacy</button>
						<button type= "button" class="btn btn-primary" onclick="showAmenity()">Amenity</button>
						<button type= "button" class="btn btn-primary" onclick="showSecurity()">Security</button>
						<button type= "button" class="btn btn-primary" onclick="showSafety()">Safety</button>
						<button type= "button" class="btn btn-primary" onclick="saveNew()">Save</button>
						<button class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="bfpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Fire Safety </h5>
					</div>
					<div class="modal-body">
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-3">	
										<label>Fire Extinguisher</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="extYes" name="extinguisher" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="extNo" name="extinguisher" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-3">	
										<label>Fire Exit</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="exitYes" name="exit" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="exitNo" name="exit" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-3">	
										<label>Fire Alarm</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="alarmYes" name="alarm" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="alarmNo" name="alarm" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-3">	
										<label>Smoke Detector</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="detectorYes" name="detector" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="detectorNo" name="detector" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-3">	
										<label>Fire Hose Cabinet</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="hoseYes" name="hose" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="hoseNo" name="hose" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-3">	
										<label>Evacuation Route</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="evacYes" name="evac" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="evacNo" name="evac" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
						<br/>			
					</div>
					<div class="modal-footer">
						<button type= "button"  class="btn btn-primary" onclick="showPrivacy()">Privacy</button>
						<button type= "button" class="btn btn-primary" onclick="showAmenity()">Amenity</button>
						<button type= "button" class="btn btn-primary" onclick="showSecurity()">Security</button>
						<button type= "button" class="btn btn-primary" onclick="showSafety()">Safety</button>
						<button class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="securityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Security </h5>
					</div>
					<div class="modal-body">
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>SSecurity guard especially at night time</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="secuYes" name="secu" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="secuNo" name="secu" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>CCTV</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="cctvYes" name="cctv" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="cctvNo" name="cctv" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Perimeter Fence</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="fenceYes" name="fence" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="fenceNo" name="fence" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Main Gate Entrance Lock</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="gateYes" name="gate" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="gateNo" name="gate" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Perimeter Lights</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="PlightYes" name="Plight" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="PlightNo" name="Plight" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Window Grilles</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="grillYes" name="grill" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="grillNo" name="grill" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Record/Logbook (to record in and out of the Residents visitor</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="logYes" name="log" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="logNo" name="log" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-3">	
										<label>Curfew</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="curfewYes" name="curfew" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="curfewNo" name="curfew" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Properly lighted hallways and corridors</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="HlightYes" name="Hlight" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="HlightNo" name="Hlight" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Street Light</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="SlightYes" name="Slight" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="SlightNo" name="Slight" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
						<br/>			
					</div>
					<div class="modal-footer">
						<button type= "button" class="btn btn-primary" onclick="showBfp()">Fire Protection</button>
						<button type= "button" class="btn btn-primary" onclick="privacy()">Privacy</button>
						<button type= "button" class="btn btn-primary" onclick="amenity()">Amenity</button>
						<button type= "button" class="btn btn-primary" onclick="showSafety()">Safety</button>
						<button class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="amenityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Amenites </h5>
					</div>
					<div class="modal-body">
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Clothes line or other clothes drying facility</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="dryYes" name="dry" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="dryNo" name="dry" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Wash through or basin plumbed to a continuous and  adequate supply of water</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="washingYes" name="washing" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="washingNo" name="washing" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Well Ventilated Kitchen Area</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="kitchenYes" name="kitchen" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="kitchenNo" name="kitchen" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Dining Area</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="diningYes" name="dining" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="diningNo" name="dining" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Provision for conducive study area</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="studyYes" name="study" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="studyNo" name="study" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Common Area/Reception for Visitors</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="receptionYes" name="reception" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="receptionNo" name="reception" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
						<br/>			
					</div>
					<div class="modal-footer">
						<button type= "button" class="btn btn-primary" onclick="showBfp()">Fire Protection </button>
						<button type= "button" class="btn btn-primary" onclick="showSecurity()">Security</button>
						<button type= "button" class="btn btn-primary" onclick="showPrivacy()">Privacy</button>
						<button type= "button" class="btn btn-primary" onclick="showSafety()">Safety</button>
						<button class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="privacyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Privacy </h5>
					</div>
					<div class="modal-body">
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Lock (outside the Room)</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="OlockYes" name="Olock" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="OlockNo" name="Olock" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Double Lock Inside The Room</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="DlockYes" name="Dlock" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="Dlock" name="Dlock" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Window Covering that provides privacy and can be opened and closed by the room residents</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="windowYes" name="window" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="windowNo" name="window" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Privacy Latch that can be securely latched from the  inside without a key in a shared bathroom or toilet</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="bathYes" name="bath" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="batchNo" name="bath" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>Stay-in owner/landlord/landlady</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="stayYes" name="stay" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="stayNo" name="stay" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
						<br/>			
					</div>
					<div class="modal-footer">
						<button type= "button" class="btn btn-primary" onclick="showBfp()">Fire Protection </button>
						<button type= "button" class="btn btn-primary" onclick="showAmenity()">Amenities</button>
						<button type= "button" class="btn btn-primary" onclick="showSecurity()">Security</button>
						<button type= "button" class="btn btn-primary" onclick="showSafety()">Safety</button>
						<button class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="safetyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Safety </h5>
					</div>
					<div class="modal-body">
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>All Electrical installation and fixtures are checked by a licensed electrician at least once in every three years</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="electriclYes" name="electrical" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="electricalNo" name="electrical" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>All Electrical circuits are connected to appropriate circuit  breakers</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="breakerYes" name="breaker" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="breakerNo" name="breaker" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>All gas installations and fittings are checked by a  licensed gas fitter once at least every two years</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="gasYes" name="gas" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="gasNo" name="gas" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
							<br/>
							<div class="row">	
								<div class="form-group">
									<div class="col-md-8">	
										<label>All rooms, bathrooms, shower rooms, toilets, and laundry  areas are provided with ventilation</label>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="ventilationYes" name="ventilation" value="YES">
										<label for="Yes"> YES</label><br>
									</div>
									<div class="col-md-2">	
										<input type="radio" id="ventilationNo" name="ventilation" value="NO">
										<label for="NO"> NO</label><br>
									</div>
								</div>		
							</div>	
						<br/>			
					</div>
					<div class="modal-footer">
					<button type= "button" class="btn btn-primary" onclick="showBfp()">Fire Protection</button>
						<button type= "button" class="btn btn-primary" onclick="showPrivacy()">Privacy</button>
						<button type= "button" class="btn btn-primary" onclick="showAmenity()">Amenity</button>
						<button type= "button" class="btn btn-primary" onclick="showSecurity()">Security</button>
						<button class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div id="loginModal" class="modal" role="dialog">
			<div class="modal-dialog modal-dialog-scrollable modal-sm">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Login</h5>
					</div>
					<div class="modal-body">
						<div class="row">
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-10">	
										<label>User ID</label>
										<input type="text" class="form-control" id="uid" name="uid"  maxlength="15">
									</div>
									<div class="col-md-1">	
									</div>
								</div>		
								<div class="clearfix"></div>							
								<div class="form-group">
									<div class="col-md-1">	
									</div>
									<div class="col-md-10">	
										<label>Password</label>
										<input type="password" class="form-control" id="pwd"  maxlength="15">
									</div>
									<div class="col-md-1">	
									</div>
								</div>		
							</row>					
							<br/><br/>			
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" onclick="loginVerify()">Login</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<div class="modal fade" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg">
			<div class="modal-content" id="modal-form-content">
				
			</div>
		</div>
	</div>

	<script>
		var loadFile = function(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
		var loadFile2 = function(event) {
			var image = document.getElementById('output2');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
		var loadFile3 = function(event) {
			var image = document.getElementById('output3');
			image.src = URL.createObjectURL(event.target.files[0]);
		};

		let updateDorm = (id) => {
    		$('#modal-form-content').html('').load( 'update_dorm_load.php', { id: id }, (res) => {
       			$('#modal-form').modal('show');
   			}).on('error', () => {
       			alert('Error in loading content');
       			console.log('Error loading content');
    		});
		}

		let updateBfp = (id) => {
    		$('#modal-form-content').html('').load( 'update_bfp_load.php', { id: id }, (res) => {
       			$('#modal-form').modal('show');
   			}).on('error', () => {
       			alert('Error in loading content');
       			console.log('Error loading content');
    		});
		}

		let updateSecurity = (id) => {
    		$('#modal-form-content').html('').load( 'update_security_load.php', { id: id }, (res) => {
       			$('#modal-form').modal('show');
   			}).on('error', () => {
       			alert('Error in loading content');
       			console.log('Error loading content');
    		});
		}

		let updatePrivacy = (id) => {
    		$('#modal-form-content').html('').load( 'update_privacy_load.php', { id: id }, (res) => {
       			$('#modal-form').modal('show');
   			}).on('error', () => {
       			alert('Error in loading content');
       			console.log('Error loading content');
    		});
		}

		let updateAmenity = (id) => {
    		$('#modal-form-content').html('').load( 'update_amenity_load.php', { id: id }, (res) => {
       			$('#modal-form').modal('show');
   			}).on('error', () => {
       			alert('Error in loading content');
       			console.log('Error loading content');
    		});
		}

		let updateSafety = (id) => {
    		$('#modal-form-content').html('').load( 'update_safety_load.php', { id: id }, (res) => {
       			$('#modal-form').modal('show');
   			}).on('error', () => {
       			alert('Error in loading content');
       			console.log('Error loading content');
    		});
		}

		$( document ).ready(function() {

			$('.btnView').click(function(){	
				var id = $(this).attr('id');
        		var name = $(this).attr('name');
				
        		if (name == "DELETE") {
					if (confirm("Do you want to delete this record?") == true) {
						$.ajax({
								type : "get",
								url : `deletedorm.php`,
								cache : false,
								data : {id : id},
								success: function(result){
									location.reload();
								},
								error: function(result){
								},
								complete: function(){
							}
						});   
					} else 
					{
    				
					}
				}
				else if (name == "BFP") {
					updateBfp(id);
					//location.reload();
				}
				else if (name == "PRIVACY") {
					updatePrivacy(id);
				}
				else if (name == "SECURITY") {
					updateSecurity(id);
				}
				else if (name == "AMENITY") {
					updateAmenity(id);
				}
				else if (name == "SAFETY") {
					updateSafety(id);
				}
				else if (name == "UPDATE") {
					updateDorm(id);
				}
			});
		});

		function showAdd(){
			$.ajax({
				type: "POST",
				url: `session.php`,
				cache: false,
				processData: false,
				contentType: false,
				success: function(result){
					if (result == "OK") {
						$("#newModal").modal({backdrop: 'static',keyboard: false});
					}
					else {
						alert('You need to login!');
						return false;
					}
				}
			});  
			

		}

		function showBfp(){
			$("#securityModal").modal('hide');
			$("#amenityModal").modal('hide');
			$("#privacyModal").modal('hide');
			$("#safetyModal").modal('hide');
			$("#bfpModal").modal({backdrop: 'static',keyboard: false});
		}
		function showSecurity(){
			$("#bfpModal").modal('hide');
			$("#amenityModal").modal('hide');
			$("#privacyModal").modal('hide');
			$("#safetyModal").modal('hide');
			$("#securityModal").modal({backdrop: 'static',keyboard: false});
		}
		function showAmenity(){
			$("#securityModal").modal('hide');
			$("#securityModal").modal('hide');
			$("#privacyModal").modal('hide');
			$("#safetyModal").modal('hide');
			$("#amenityModal").modal({backdrop: 'static',keyboard: false});
		}
		function showPrivacy(){
			$("#securityModal").modal('hide');
			$("#amenityModal").modal('hide');
			$("#bfpModal").modal('hide');
			$("#safetyModal").modal('hide');
			$("#privacyModal").modal({backdrop: 'static',keyboard: false});
		}
		function showSafety(){
			$("#securityModal").modal('hide');
			$("#amenityModal").modal('hide');
			$("#privacyModal").modal('hide');
			$("#bfpModal").modal('hide');
			$("#safetyModal").modal({backdrop: 'static',keyboard: false});
		}
		function showLogin(){
			$("#loginModal").modal({backdrop: 'static',keyboard: false});
		}
		function saveNew(){
			var $owner = $('#owner').val();
			var $name = $('#name').val();
			var $address = $('#address').val();
			
			if ($owner.trim() == '') {
				alert('Owner name not valid!');
				return false;
			}
			if ($name.trim() == '') {
				alert('Dorm name not valid!');
				return false;
			}
			if ($address.trim() == '') {
				alert('Address not valid!');
				return false;
			}
									
			let form = new FormData(document.getElementById('newDorm'));
			$.ajax({
				type: "POST",
				url: `newdorm.php`,
				cache: false,
				data: form,
				processData: false,
				contentType: false,
				success: function(result){
					location.reload();
					//console.log(result);
				},
				error: function(result){
				},
				complete: function(){
				}
			});   

			$("#newModal").modal("hide");
		}

		function loginVerify(){
			var xid = $('#uid').val();
			var xpwd = $('#pwd').val();
			
			if (xid.trim() == '') {
				alert('Userid not valid!');
				return false;
			}
			if (xpwd.trim() == '') {
				alert('Password not valid!');
				return false;
			}
									
			$.ajax({
				type: "get",
				url: `login.php`,
				cache: false,
				data: {id:xid, pwd:xpwd},
				success: function(result){
					if (result == "OK") {
						location.reload();
					}
					else {
						alert('Login FAILED!');	
					}
				},
				error: function(result){
				},
				complete: function(){
				}
			});   

			$("#newModal").modal("hide");
		}

		function saveUpdate(){
			var $owner = $('#Uowner').val();
			var $name = $('#Uname').val();
			var $address = $('#Uaddress').val();
			
			if ($owner.trim() == '') {
				alert('Owner name not valid!');
				return false;
			}
			if ($name.trim() == '') {
				alert('Dorm name not valid!');
				return false;
			}
			if ($address.trim() == '') {
				alert('Address not valid!');
				return false;
			}
									
			let form = new FormData(document.getElementById('updateDorm'));
			$.ajax({
				type: "POST",
				url: `update_dorm.php`,
				cache: false,
				data: form,
				processData: false,
				contentType: false,
				success: function(result){
					location.reload();
					//console.log(result);
					$('#modal-form').modal('hide');
				},
				error: function(result){
				},
				complete: function(){
				}
			});   

			$("#newModal").modal("hide");
		}

		function saveBfp(){
			let form = new FormData(document.getElementById('updateBfp'));
			$.ajax({
				type: "POST",
				url: `update_bfp.php`,
				cache: false,
				data: form,
				processData: false,
				contentType: false,
				success: function(result){
					location.reload();
					//console.log(result);
					$('#modal-form').modal('hide');
				},
				error: function(result){
				},
				complete: function(){
				}
			});   

			$("#newModal").modal("hide");
		}
		
		function savePrivacy(){
			let form = new FormData(document.getElementById('updatePrivacy'));
			$.ajax({
				type: "POST",
				url: `update_privacy.php`,
				cache: false,
				data: form,
				processData: false,
				contentType: false,
				success: function(result){
					location.reload();
					alert('Privavy record updated...');
					//console.log(result);
					$('#modal-form').modal('hide');
				},
				error: function(result){
				},
				complete: function(){
				}
			});   

			$("#newModal").modal("hide");
		}

		function saveSecurity(){
			let form = new FormData(document.getElementById('updateSecurity'));
			$.ajax({
				type: "POST",
				url: `update_security.php`,
				cache: false,
				data: form,
				processData: false,
				contentType: false,
				success: function(result){
					location.reload();
					alert('Security record updated...');
					//console.log(result);
					$('#modal-form').modal('hide');
				},
				error: function(result){
				},
				complete: function(){
				}
			});   

			$("#newModal").modal("hide");
		}
		
	</script>

</body>