		<!-- FIRE PROTECTION MODAL -->
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