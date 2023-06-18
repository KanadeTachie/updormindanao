function saveBfp(){
    let form = new FormData(document.getElementById('updateBfp'));
    $.ajax({
        type: "POST",
        url: `update_bfp.php`,
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        success: function(result){
            location.reload();
            alert('Fire Protection record updated...');
            //console.log(result);
            $('#modal-form').modal('hide');
        },
        error: function(result){
        },
        complete: function(){
        }
    });   

    $("#newModal").modal("hide");
}

function saveAmenity(){
    let form = new FormData(document.getElementById('updateAmenity'));
    $.ajax({
        type: "POST",
        url: `update_amenity.php`,
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        success: function(result){
            location.reload();
            alert('Amenity record updated...');
            //console.log(result);
            $('#modal-form').modal('hide');
        },
        error: function(result){
        },
        complete: function(){
        }
    });   

    $("#newModal").modal("hide");
}

function savePrivacy(){
    let form = new FormData(document.getElementById('updatePrivacy'));
    $.ajax({
        type: "POST",
        url: `update_privacy.php`,
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        success: function(result){
            location.reload();
            alert('Privavy record updated...');
            //console.log(result);
            $('#modal-form').modal('hide');
        },
        error: function(result){
        },
        complete: function(){
        }
    });   

    $("#newModal").modal("hide");
}

function saveSecurity(){
    let form = new FormData(document.getElementById('updateSecurity'));
    $.ajax({
        type: "POST",
        url: `update_security.php`,
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        success: function(result){
            location.reload();
            alert('Security record updated...');
            //console.log(result);
            $('#modal-form').modal('hide');
        },
        error: function(result){
        },
        complete: function(){
        }
    });   

    $("#newModal").modal("hide");
}

function saveSafety(){
    let form = new FormData(document.getElementById('updateSafety'));
    $.ajax({
        type: "POST",
        url: `update_safety.php`,
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        success: function(result){
            location.reload();
            alert('Safety record updated...');
            //console.log(result);
            $('#modal-form').modal('hide');
        },
        error: function(result){
        },
        complete: function(){
        }
    });   

    $("#newModal").modal("hide");
}