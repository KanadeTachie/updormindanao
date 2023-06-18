	<?php 
		$id = 0;
		if(isset($_REQUEST['id'])) {
			$id = $_REQUEST["id"];
		}
		require "connect.php";
		$sql = "SELECT * FROM dorms WHERE iddorms = $id";
		$result = $conn->query($sql);
		
	?>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h5 class="modal-title">Update Dorm</h5>
	</div>
	<div class="modal-body">
		<?php while($row = $result->fetch_assoc()) { ?>
			<form id="updateDorm">
			<div class="row">
				<div class="form-group">
					<div class="col-md-12">	
						<label>Registered Owner</label>
						<input type="text" class="form-control" id="Uowner" name="owner" maxlength="45" value="<?php echo $row['owner']??""; ?>">
						<input type="hidden" name="ownerId" value="<?php echo $row['iddorms']??""; ?>">
					</div>
				</div>	
			</div>	
			<br/>
			<div class="row">
				<div class="form-group">
					<div class="col-md-12">	
						<label>Registered Name</label>
						<input type="text" class="form-control" id="Uname" name="name" maxlength="45" value="<?php echo $row['name']??""; ?>">
					</div>
				</div>	
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-12">	
						<label>Address</label>
						<input type="text" class="form-control" id="Uaddress" name="address" maxlength="45"  value="<?php echo $row['address']??""; ?>">
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-6">	
						<label>email</label>
						<input type="text" class="form-control" id="email" name="email" maxlength="25"  value="<?php echo $row['email']??""; ?>">
					</div>
					<div class="col-md-6">	
						<label>Contact#</label>
						<input type="text" class="form-control" id="contact" name="contact" maxlength="25"  value="<?php echo $row['contact']??""; ?>">
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-3">	
						<label># of Rooms</label>
						<input type="number" class="form-control" id="rooms" name="rooms" maxlength="3" value="<?php echo $row['rooms']??"1"; ?>">
					</div>
					<div class="col-md-3">	
						<label>Occupants per Rm</label>
						<input type="number" class="form-control" id="occupants" name="occupants" maxlength="2" value="<?php echo $row['roomcapacity']??"1"; ?>">
					</div>
					<div class="col-md-3">	
						<label>Deposit</label>
						<input type="text" class="form-control" id="deposit" name="deposit" maxlength="12"  value="<?php echo $row['deposit']??""; ?>">
					</div>
					<div class="col-md-3">	
						<label>Advance</label>
						<input type="text" class="form-control" id="advance" name="advance" maxlength="12"   value="<?php echo $row['advance']??""; ?>">
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-3">	
						<label>Rent per Rooms</label>
						<input type="text" class="form-control" id="perroom" name="perroom" maxlength="12"  value="<?php echo $row['rentperroom']??""; ?>">
					</div>
					<div class="col-md-3">	
						<label>Rent per Head</label>
						<input type="text" class="form-control" id="perhead" name="perhead" maxlength="12"  value="<?php echo $row['rentperhead']??""; ?>">
					</div>
					<div class="col-md-3">	
						<label>Other Charges</label>
						<input type="text" class="form-control" id="other" name="other" maxlength="12"  value="<?php echo $row['othercharge']??""; ?>">
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-3">	
						<label>Transient</label>
						<input type="text" class="form-control" id="transient" name="transient" maxlength="12" value="<?php echo $row['transient']??""; ?>">
					</div>
					<div class="col-md-3">	
						<label>Electricity</label>
						<input type="text" class="form-control" id="electricity" name="electricity" maxlength="12" value="<?php echo $row['electricity']??""; ?>">
					</div>
					<div class="col-md-3">	
						<label>Water</label>
						<input type="text" class="form-control" id="water" name="water" maxlength="12" value="<?php echo $row['water']??""; ?>">
					</div>
					<div class="col-md-3">	
						<label>Internet</label>
						<input type="text" class="form-control" id="internet" name="internet" maxlength="12" value="<?php echo $row['internet']??""; ?>">
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-12">	
						<label>Map Location</label>
						<input type="textr" class="form-control" id="Umap" name="map" maxlength="45" value="<?php echo $row['maplocation']??""; ?>">
					</div>
				</div>		
			</div>	
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-12">	
						<label>Image URL-1</label>
						<input type="textr" class="form-control" id="Ulink1" name="link1" maxlength="145" value="<?php echo $row['imagelink']??""; ?>">
					</div>
				</div>		
			</div>	
			<br/>
			<br/>
			<div class="row">	
				<div class="form-group">
					<div class="col-md-4">	
						<p><input type="file"  accept="image/*" name="image1" id="image1" onchange="uloadFile(event)"></p>
						<p><label for="image" style="cursor: pointer;">Upload Dorm Image-1</label></p>
						<p><img id="uOutput" width="200" src="<?php echo $row['imagelink']??""; ?>	"/></p>
						<input type="hidden" name="file1" value="<?php echo $row['imagelink']??""; ?>">
					</div>
					<div class="col-md-4">	
						<p><input type="file"  accept="image/*" name="image2" id="image2" onchange="uloadFile2(event)"></p>
						<p><label for="image" style="cursor: pointer;">Upload Dorm Image-2</label></p>
						<p><img id="uOutput2" width="200"/></p>
						<input type="hidden" name="file2" value="<?php echo $row['imagelink2']??""; ?>">
					</div>
					<div class="col-md-4">	
						<p><input type="file"  accept="image/*" name="image3" id="image2" onchange="uloadFile3(event)"></p>
						<p><label for="image" style="cursor: pointer;">Upload Dorm Image-3</label></p>
						<p><img id="uOutput3" width="200"/></p>
						<input type="hidden" name="file3" value="<?php echo $row['imagelink3']??""; ?>">
					</div>
				</div>		
			</div>
			</form>

		<?php } ?>
		<br/><br/>			
	</div>
	<div class="modal-footer">
		<button type= "button" onclick="saveUpdate()" class="btn btn-primary">Save</button>
		<button class="btn btn-warning" data-dismiss="modal">Close</button>
	</div>

</div>
