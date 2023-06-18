<?php 
	$id = 0;
	if(isset($_REQUEST['id'])) {
		$id = $_REQUEST["id"];
	}
	
	require "connect.php";
	$sql = "SELECT * FROM amenity WHERE iddorm = $id";
	$result = $conn->query($sql);

	$true="";
	$false="checked";
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h5 class="modal-title">Amenites</h5>
</div>
<form id="updateAmenity">
	<div class="modal-body">
		<br/>
		<?php while($row = $result->fetch_assoc()) { ?>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-8">	
						<label>Clothes line or other clothes drying facility</label>
					</div>
					<?php		
						$true="";
						$false="checked";
						if ($row['clothdrying'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="hidden" name="recid" value="<?php echo $row['iddorm']??""; ?>">
						<input type="radio" id="dryYes" name="dry" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="dryNo" name="dry" value="NO" <?php echo $false; ?>>
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
					<?php		
						$true="";
						$false="checked";
						if ($row['lavatory'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="washingYes" name="washing" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="washingNo" name="washing" value="NO" <?php echo $false; ?>>
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
					<?php		
						$true="";
						$false="checked";
						if ($row['ventilatedkitchen'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="kitchenYes" name="kitchen" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="kitchenNo" name="kitchen" value="NO" <?php echo $false; ?>>
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
					<?php		
						$true="";
						$false="checked";
						if ($row['diningarea'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="diningYes" name="dining" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="diningNo" name="dining" value="NO" <?php echo $false; ?>>
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
					<?php		
						$true="";
						$false="checked";
						if ($row['studyarea'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="studyYes" name="study" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="studyNo" name="study" value="NO" <?php echo $false; ?>>
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
					<?php		
						$true="";
						$false="checked";
						if ($row['receptionarea'] == "YES")	{
							$true="checked";
							$false="";
						}
					?>
					<div class="col-md-2">	
						<input type="radio" id="receptionYes" name="reception" value="YES" <?php echo $true; ?>>
						<label for="Yes"> YES</label><br>
					</div>
					<div class="col-md-2">	
						<input type="radio" id="receptionNo" name="reception" value="NO" <?php echo $false; ?>>
						<label for="NO"> NO</label><br>
					</div>
				</div>		
			</div>	
		<?php } ?>
		<br/>			
	</div>
			
	<div class="modal-footer">
		<button type= "button" onclick="saveAmenity()" class="btn btn-primary">Save</button>
		<button class="btn btn-warning" data-dismiss="modal">Close</button>
	</div>
</form>

		