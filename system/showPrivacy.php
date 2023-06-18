<div class="modal fade" id="privacyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Privacy </h5>
            </div>
            <div class="modal-body">
                    <br/>
                    <div class="row">	
                        <div class="form-group">
                            <div class="col-md-8">	
                                <label>Lock (outside the Room)</label>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="OlockYes" name="Olock" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="OlockNo" name="Olock" value="NO">
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
                            <div class="col-md-2">	
                                <input type="radio" id="DlockYes" name="Dlock" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="Dlock" name="Dlock" value="NO">
                                <label for="NO"> NO</label><br>
                            </div>
                        </div>		
                    </div>	
                    <br/>
                    <div class="row">	
                        <div class="form-group">
                            <div class="col-md-8">	
                                <label>Window Covering that provides privacy and can be opened and closed by the room residents</label>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="windowYes" name="window" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="windowNo" name="window" value="NO">
                                <label for="NO"> NO</label><br>
                            </div>
                        </div>		
                    </div>	
                    <br/>
                    <div class="row">	
                        <div class="form-group">
                            <div class="col-md-8">	
                                <label>Privacy Latch that can be securely latched from the  inside without a key in a shared bathroom or toilet</label>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="bathYes" name="bath" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="batchNo" name="bath" value="NO">
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
                            <div class="col-md-2">	
                                <input type="radio" id="stayYes" name="stay" value="YES">
                                <label for="Yes"> YES</label><br>
                            </div>
                            <div class="col-md-2">	
                                <input type="radio" id="stayNo" name="stay" value="NO">
                                <label for="NO"> NO</label><br>
                            </div>
                        </div>		
                    </div>	
                <br/>			
            </div>
            <div class="modal-footer">
                <button type= "button" class="btn btn-primary" onclick="showBfp()">Fire Protection </button>
                <button type= "button" class="btn btn-primary" onclick="showAmenity()">Amenities</button>
                <button type= "button" class="btn btn-primary" onclick="showSecurity()">Security</button>
                <button type= "button" class="btn btn-primary" onclick="showSafety()">Safety</button>
                <button class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>