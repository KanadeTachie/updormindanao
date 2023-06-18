<?php 
	$id = 0;
	if(isset($_REQUEST['id'])) {
		$id = $_REQUEST["id"];
	}
	
	require "connect.php";
	$sql = "SELECT * FROM safety WHERE iddorm = $id";
	$result = $conn->query($sql);
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h5 class="modal-title">Safety </h5>
</div>
<form id="updateSafety">
	<div class="modal-body">
		<br/>
		<?php while($row = $result->fetch_assoc()) { ?>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-8">	
						<label>All Electrical installation and fixtures are checked by a licensed electrician at least once in every three years</label>
					</div>
					<?php		
						$true="";
						$false="checked";
						if ($row['electricalchecked'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="electriclYes" name="electrical" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="electricalNo" name="electrical" value="NO" <?php echo $false; ?>>
						<label for="NO"> NO</label><br>
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-8">	
						<label>All Electrical circuits are connected to appropriate circuit breakers</label>
					</div>
					<?php		
						$true="";
						$false="checked";
						if ($row['circuitbreaker'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="hidden" name="recid" value="<?php echo $row['iddorm']??""; ?>">
						<input type="radio" id="breakerYes" name="breaker" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="breakerNo" name="breaker" value="NO" <?php echo $false; ?>>
						<label for="NO"> NO</label><br>
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-8">	
						<label>All gas installations and fittings are checked by a licensed gas fitter once at least every two years</label>
					</div>
					<?php		
						$true="";
						$false="checked";
						if ($row['gaschecked'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="gasYes" name="gas" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="gasNo" name="gas" value="NO" <?php echo $false; ?>>
						<label for="NO"> NO</label><br>
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-8">	
						<label>All rooms, bathrooms, shower rooms, toilets, and laundry areas are provided with ventilation</label>
					</div>
					<?php		
						$true="";
						$false="checked";
						if ($row['lights'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="ventilationYes" name="ventilation" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="ventilationNo" name="ventilation" value="NO" <?php echo $false; ?>>
						<label for="NO"> NO</label><br>
					</div>
				</div>		
			</div>	
		<?php } ?>
		<br/>			
	</div>
	<div class="modal-footer">
		<button type= "button" onclick="saveSafety()" class="btn btn-primary">Save</button>
		<button class="btn btn-warning" data-dismiss="modal">Close</button>
	</div>
	</div>
</form>
		