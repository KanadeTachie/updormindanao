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