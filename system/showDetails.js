function showLogin(){
    $("#loginModal").modal({backdrop: 'static',keyboard: false});
}

function showBfp(){
    $("#securityModal").modal('hide');
    $("#amenityModal").modal('hide');
    $("#privacyModal").modal('hide');
    $("#safetyModal").modal('hide');
    $("#bfpModal").modal({backdrop: 'static',keyboard: false});
}

function showAmenity(){
    $("#bfpModal").modal('hide');
    $("#securityModal").modal('hide');
    $("#privacyModal").modal('hide');
    $("#safetyModal").modal('hide');
    $("#amenityModal").modal({backdrop: 'static',keyboard: false});
}

function showAdd(){
    $.ajax({
        type: "POST",
        url: `session.php`,	
        cache: false,
        processData: false,
        contentType: false,
        success: function(result){
            if (result == "OK") {
                $("#newModal").modal({backdrop: 'static',keyboard: false});
            }
            else {
                alert('You need to login!');
                return false;
            }
        }
    });  
}

function showSecurity(){
    $("#bfpModal").modal('hide');
    $("#amenityModal").modal('hide');
    $("#privacyModal").modal('hide');
    $("#safetyModal").modal('hide');
    $("#securityModal").modal({backdrop: 'static',keyboard: false});
}

function showSafety(){
    $("#securityModal").modal('hide');
    $("#amenityModal").modal('hide');
    $("#privacyModal").modal('hide');
    $("#bfpModal").modal('hide');
    $("#safetyModal").modal({backdrop: 'static',keyboard: false});
}

function showPrivacy(){
    $("#securityModal").modal('hide');
    $("#amenityModal").modal('hide');
    $("#bfpModal").modal('hide');
    $("#safetyModal").modal('hide');
    $("#privacyModal").modal({backdrop: 'static',keyboard: false});
}