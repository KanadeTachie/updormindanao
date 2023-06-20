<?php 
	$id = 0;
	if(isset($_REQUEST['id'])) {
		$id = $_REQUEST["id"];
	}
	
	require "connect.php";
	$sql = "SELECT * FROM bfp WHERE iddorms = $id";
	$result = $conn->query($sql);

	$extT=""; 
	$extF="checked";
	$exitT="";	
	$exitF="checked";
	$alarmT="";
	$alarmF="checked";
	$detectorT="";	
	$detectorF="checked";
	$hoseT="";	
	$hoseF="checked";
	$evacT="";	
	$evacF="checked";
	
	while($row = $result->fetch_assoc()) { 

		if($row['extinguisher'] == "YES") {
			$extT="checked";
			$extF="";
		}
		if($row['firealarm'] == "YES") {
			$alarmT="checked";
			$alarmF="";
		}
		if($row['smokedetector'] == "YES") {
			$detectorT="checked";
			$detectorF="";
		}
		if($row['firehose'] == "YES") {
			$hoseT="checked";
			$hoseF="";
		}
		if($row['evacroute'] == "YES") {
			$evacT="checked";
			$evacF="";
		}
		if($row['fireexit'] == "YES") {
			$exitT="checked";
			$exitF="";
		}
	}
	
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h5 class="modal-title">Fire Safety </h5>
</div>

<form id="updateBfp">
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
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="radio" id="extYes" name="extinguisher" value="YES" <?php echo $extT; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="extNo" name="extinguisher" value="NO" <?php echo $extF; ?>>
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
					<input type="radio" id="exitYes" name="exit" value="YES" <?php echo $exitT; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="exitNo" name="exit" value="NO"  <?php echo $exitF; ?>>
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
					<input type="radio" id="alarmYes" name="alarm" value="YES"  <?php echo $alarmT; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="alarmNo" name="alarm" value="NO"  <?php echo $alarmF; ?>>
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
					<input type="radio" id="detectorYes" name="detector" value="YES"   <?php echo $detectorT; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="detectorNo" name="detector" value="NO"  <?php echo $detectorF; ?>>
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
					<input type="radio" id="hoseYes" name="hose" value="YES"  <?php echo $hoseT; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="hoseNo" name="hose" value="NO"  <?php echo $hoseF; ?>>
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
					<input type="radio" id="evacYes" name="evac" value="YES"  <?php echo $evacT; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="evacNo" name="evac" value="NO"  <?php echo $evacF; ?>>
					<label for="NO"> NO</label><br>
				</div>
			</div>		
		</div>	
	<br/>			
</div>
<div class="modal-footer">
	<button type= "button" onclick="saveBfp()" class="btn btn-success">Save</button>
	<button class="btn btn-warning" data-dismiss="modal">Close</button>
</div>
</form>

		