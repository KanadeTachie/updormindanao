<?php 
	$id = 0;
	if(isset($_REQUEST['id'])) {
		$id = $_REQUEST["id"];
	}
	
	require "connect.php";
	$sql = "SELECT * FROM security WHERE iddorm = $id";
	$result = $conn->query($sql);
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h5 class="modal-title">Security </h5>
</div>
<div class="modal-body">
	<br/>
	<form id = "updateSecurity">

	<?php while($row = $result->fetch_assoc()) { ?>
		<div class="row">	
			<div class="form-group">
				<div class="col-md-1">	
				</div>
				<div class="col-md-3">	
					<label>Security Guard</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['guard'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="hidden" name="recid" value="<?php echo $row['iddorm']??""; ?>">
					<input type="radio" id="secuYes" name="secu" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="secuNo" name="secu" value="NO" <?php echo $false; ?>>
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
					<label>CCTV</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['cctv'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="cctvYes" name="cctv" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="cctvNo" name="cctv" value="NO" <?php echo $false; ?>>
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
					<label>Perimeter Fence</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['fence'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="fenceYes" name="fence" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="fenceNo" name="fence" value="NO" <?php echo $false; ?>>
					<label for="NO"> NO</label><br>
				</div>
			</div>		
		</div>	
		<br/>
		<div class="row">	
			<div class="form-group">
				<div class="col-md-1">	
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['maingate'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-3">	
					<label>Main Gate</label>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="gateYes" name="gate" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="gateNo" name="gate" value="NO" <?php echo $false; ?>>
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
					<label>Perimeter Lights</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['perimeterlight'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="PlightYes" name="Plight" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="PlightNo" name="Plight" value="NO" <?php echo $false; ?>>
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
					<label>Window Grill</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['windowgrill'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="grillYes" name="grill" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="grillNo" name="grill" value="NO" <?php echo $false; ?>>
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
					<label>Logbook</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['logbook'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="logYes" name="log" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="logNo" name="log" value="NO" <?php echo $false; ?>>
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
				<?php		
					$true="";
					$false="checked";
					if ($row['curfew'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="curfewYes" name="curfew" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="curfewNo" name="curfew" value="NO" <?php echo $false; ?>>
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
					<label>Hallway Lights</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['hallwaylight'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="HlightYes" name="Hlight" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="HlightNo" name="Hlight" value="NO" <?php echo $false; ?>>
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
					<label>Street Light</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['streetlight'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="SlightYes" name="Slight" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="SlightNo" name="Slight" value="NO" <?php echo $false; ?>>
					<label for="NO"> NO</label><br>
				</div>
			</div>		
		</div>	
	<?php } ?>
	</form>

	<br/>			
</div>
<div class="modal-footer">
	<button type= "button" class="btn btn-primary" onclick="saveSecurity()">Save</button>
	<button class="btn btn-warning" data-dismiss="modal">Close</button>
</div>
