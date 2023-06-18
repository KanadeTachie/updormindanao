<div id="loginModal" class="modal" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Login</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="form-group">
                            <div class="col-md-1">	
                            </div>
                            <div class="col-md-10">	
                                <label>User ID</label>
                                <input type="text" class="form-control" id="uid" name="uid"  maxlength="15">
                            </div>
                            <div class="col-md-1">	
                            </div>
                        </div>		
                        <div class="clearfix"></div>							
                        <div class="form-group">
                            <div class="col-md-1">	
                            </div>
                            <div class="col-md-10">	
                                <label>Password</label>
                                <input type="password" class="form-control" id="pwd"  maxlength="15">
                            </div>
                            <div class="col-md-1">	
                            </div>
                        </div>		
                    </row>					
                    <br/><br/>			
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="loginVerify()">Login</button>
            </div>
        </div>
    </div>
</div>