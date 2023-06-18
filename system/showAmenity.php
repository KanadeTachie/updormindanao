<div class="modal fade" id="amenityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Amenites </h5>
            </div>  
            <div class="modal-body">
                    <br/>
                    <div class="row">	
                        <div class="form-group">
                            <div class="col-md-8">	
                                <label>Clothes line or other clothes drying facility</label>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="dryYes" name="dry" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="dryNo" name="dry" value="NO">
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
                            <div class="col-md-2">	
                                <input type="radio" id="washingYes" name="washing" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="washingNo" name="washing" value="NO">
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
                            <div class="col-md-2">	
                                <input type="radio" id="kitchenYes" name="kitchen" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="kitchenNo" name="kitchen" value="NO">
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
                            <div class="col-md-2">	
                                <input type="radio" id="diningYes" name="dining" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="diningNo" name="dining" value="NO">
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
                            <div class="col-md-2">	
                                <input type="radio" id="studyYes" name="study" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="studyNo" name="study" value="NO">
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
                            <div class="col-md-2">	
                                <input type="radio" id="receptionYes" name="reception" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="receptionNo" name="reception" value="NO">
                                <label for="NO"> NO</label><br>
                            </div>
                        </div>		
                    </div>	
                <br/>			
            </div>
            <div class="modal-footer">
                <button type= "button" class="btn btn-primary" onclick="showBfp()">Fire Protection </button>
                <button type= "button" class="btn btn-primary" onclick="showSecurity()">Security</button>
                <button type= "button" class="btn btn-primary" onclick="showPrivacy()">Privacy</button>
                <button type= "button" class="btn btn-primary" onclick="showSafety()">Safety</button>
                
                <button class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>