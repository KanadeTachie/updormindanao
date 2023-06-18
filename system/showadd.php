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
						<button type= "button" class="btn btn-primary" onclick="saveNew()">Save</button>
						<button class="btn btn-warning" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>