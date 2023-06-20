<?php 
	$id = 0;
	if(isset($_REQUEST['id'])) {
		$id = $_REQUEST["id"];
	}
	//var_dump($id);
	require "connect.php";
	$sql = "SELECT * FROM privacy WHERE iddorm = $id";
	$result = $conn->query($sql);
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h5 class="modal-title">Privacy </h5>
</div>
<div class="modal-body">
	<form id="updatePrivacy">
	<?php while($row = $result->fetch_assoc()) { ?>
		<br/>
		<div class="row">	
			<div class="form-group">
				<div class="col-md-8">	
					<label>Lock (outside the Room)</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['lockoutside'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="hidden" name="recid" value="<?php echo $row['iddorm']??""; ?>">
					<input type="radio" id="OlockYes" name="Olock" value="YES"<?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="OlockNo" name="Olock" value="NO"<?php echo $false; ?>>
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
				<?php		
					$true="";
					$false="checked";
					if ($row['doublelockinside'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="DlockYes" name="Dlock" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="Dlock" name="Dlock" value="NO" <?php echo $false; ?>>
					<label for="NO"> NO</label><br>
				</div>
			</div>		
		</div>	
		<br/>
		<div class="row">	
			<div class="form-group">
				<div class="col-md-8">	
					<label>Window Covering that provides privacy and can be opened and closed by the room residents</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['curtain'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="windowYes" name="window" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="windowNo" name="window" value="NO" <?php echo $false; ?>>
					<label for="NO"> NO</label><br>
				</div>
			</div>		
		</div>	
		<br/>
		<div class="row">	
			<div class="form-group">
				<div class="col-md-8">	
					<label>Privacy Latch that can be securely latched from the inside without a key in a shared bathroom or toilet</label>
				</div>
				<?php		
					$true="";
					$false="checked";
					if ($row['privacylatch'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="bathYes" name="bath" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="batchNo" name="bath" value="NO" <?php echo $false; ?>>
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
				<?php		
					$true="";
					$false="checked";
					if ($row['ownerstayin'] == "YES")	{
						$true="checked";
						$false="";
					}
				?>
				<div class="col-md-2">	
					<input type="radio" id="stayYes" name="stay" value="YES" <?php echo $true; ?>>
					<label for="Yes"> YES</label><br>
				</div>
				<div class="col-md-2">	
					<input type="radio" id="stayNo" name="stay" value="NO" <?php echo $false; ?>>
					<label for="NO"> NO</label><br>
				</div>
			</div>		
		</div>	
		<br/>			
	<?php } ?>
	</form>
</div>

<div class="modal-footer">
	<button type= "button" onclick="savePrivacy()" class="btn btn-success">Save</button>
	<button class="btn btn-warning" data-dismiss="modal">Close</button>
</div>
</div>

		