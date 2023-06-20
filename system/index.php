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
	<title>Admin | UPDormindanao</title>
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/sc-2.0.0/datatables.min.js"></script>
</head>

<body>
	<div id="header1" style="">
	</div>
	
	<!-- MAIN CONTENT --> <!-- VISIBLE ONLY TO USER ON LOAD -->
	<div id="content">
		<div class="paper paper-polar" style="background-color: rgb(220, 53, 69);" >
			<div class="row">
				<div class="col-md-1">				
				</div>
				<div class="col-md-10">
					<h1 class="text-center lead" style="font-size: 50px; font-weight:bold; 
					color: white;
					">DORMS | ADMIN</h1>
				</div>
				<div class="col-md-1">		
					<button type="button" class="btn btn-success" onclick="showLogin()" data-toggle="tooltip" title="Login"><span class="glyphicon glyphicon-pencil"></span></button>	
				</div>
			</div>
		</div>
		<div class="paper paper-polar" >
			<div class="row">	
				<div class="col-xs-12"><br>
					<input type="hidden" id="login">
					<div class="col-md-1">
						<button type="button" class="btn btn-success" onclick="showAdd()" data-toggle="tooltip" title="New Dorm"><span class="glyphicon glyphicon-plus"></span></button>	
					</div>
					<div class="col-md-7">
					</div>
					<form>
						<div class="col-md-3">
							<input type="text" class="form-control" id="search" name="search" maxlength="45"  placeholder="Search Owner / Name">
						</div>
						<div class="col-md-1">
							<input type="hidden" name="trans" value = "SEARCH">
							<button type="submit" class="btn btn-success btn-block">Search</button>	
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
											<button class="btnView btn btn-success" name = "AMENITY" id="<?php echo $row['iddorms'] ?>">Amenity</button>
											<button class="btnView btn btn-success" name = "BFP" id="<?php echo $row['iddorms'] ?>">Fire Safety</button>
											<button class="btnView btn btn-success" name = "PRIVACY" id="<?php echo $row['iddorms'] ?>">Privacy</button>
											<button class="btnView btn btn-success" name = "SAFETY" id="<?php echo $row['iddorms'] ?>">Safety</button>
											<button class="btnView btn btn-success" name = "SECURITY" id="<?php echo $row['iddorms'] ?>">Security</button>
											<button class="btnView btn btn-warning" name = "DELETE" id="<?php echo $row['iddorms'] ?>">Delete</button>
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
	<!-- END OF MAIN CONTENT -->

	<!-- MODALS -->
	<form id="newDorm">
		<?php include 'showadd.php'; ?>			<!-- ADD DORM MODAL -->
		<?php include 'showLogin.php'; ?>		<!-- ADMIN LOGIN MODAL -->
	</form>

	<!-- BACKDROP FOR DORMS ON INTERACT -->
	<div class="modal fade" id="modal-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg">
			<div class="modal-content" id="modal-form-content">
			</div>
		</div>
	</div>
	
	<!-- jQuery SCRIPTS FOR SHOWING AND HIDING MODALS -->
	<script src="showDetails.js"></script>
								
	<!-- SCRIPTS FOR SAVING UPDATED DETAILS -->
	<script src="saveDetails.js"></script>
	<script src="saveNew.js"></script>
	<script src="saveUpdate.js"></script>
	<script src="updateDetails.js"></script>
	
	<!-- SCRIPT FOR LOGIN VERIFICATION -->
	<script src="loginVerify.js"></script>

	<script src="imageDisplay.js"></script>
	
</body>