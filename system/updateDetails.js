let updateDorm = (xid) => {
    $('#modal-form-content').html('').load( 'update_dorm_load.php', { id: xid }, (res) => {
           $('#modal-form').modal('show');
       }).on('error', () => {
           alert('Error in loading content');
           console.log('Error loading content');
    });
}

let updateBfp = (id) => {
    $('#modal-form-content').html('').load( 'update_bfp_load.php', { id: id }, (res) => {
           $('#modal-form').modal('show');
       }).on('error', () => {
           alert('Error in loading content');
           console.log('Error loading content');
    });
}

let updateSecurity = (id) => {
    $('#modal-form-content').html('').load( 'update_security_load.php', { id: id }, (res) => {
           $('#modal-form').modal('show');
       }).on('error', () => {
           alert('Error in loading content');
           console.log('Error loading content');
    });
}

let updatePrivacy = (id) => {
    $('#modal-form-content').html('').load( 'update_privacy_load.php', { id: id }, (res) => {
           $('#modal-form').modal('show');
       }).on('error', () => {
           alert('Error in loading content');
           console.log('Error loading content');
    });
}

let updateAmenity = (id) => {
    $('#modal-form-content').html('').load( 'update_amenity_load.php', { id: id }, (res) => {
           $('#modal-form').modal('show');
       }).on('error', () => {
           alert('Error in loading content');
           console.log('Error loading content');
    });
}

let updateSafety = (id) => {
    $('#modal-form-content').html('').load( 'update_safety_load.php', { id: id }, (res) => {
           $('#modal-form').modal('show');
       }).on('error', () => {
           alert('Error in loading content');
           console.log('Error loading content');
    });
}

$( document ).ready(function() {
    $('.btnView').click(function(){	
        var id = $(this).attr('id');
        var name = $(this).attr('name');
        
        if (name == "DELETE") {
            if (confirm("Do you want to delete this record?") == true) {
                $.ajax({
                    type : "get",
                    url : `deletedorm.php`,
                    cache : false,
                    data : {id : id},
                    success: function(result){
                        if (result == "TRUE"){
                            location.reload();
                            alert("Record successfully deleted");
                        }
                            
                    },
                    error: function(result){
                    },
                    complete: function(){
                    }
                });   
            } else {
            }
        } else if (name == "BFP")
            updateBfp(id);
        else if (name == "PRIVACY")
            updatePrivacy(id);
        else if (name == "SECURITY")
            updateSecurity(id);
        else if (name == "AMENITY")
            updateAmenity(id);
        else if (name == "SAFETY")
            updateSafety(id);
        else if (name == "UPDATE")
            updateDorm(id);
        
    }); //btnView
}); //Document Ready