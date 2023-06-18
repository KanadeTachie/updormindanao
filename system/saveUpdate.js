function saveUpdate(){
    var $owner = $('#Uowner').val();
    var $name = $('#Uname').val();
    var $address = $('#Uaddress').val();
    
    if ($owner.trim() == '') {
        alert('Owner name not valid!');
        return false;
    }
    if ($name.trim() == '') {
        alert('Dorm name not valid!');
        return false;
    }
    if ($address.trim() == '') {
        alert('Address not valid!');
        return false;
    }
                            
    let form = new FormData(document.getElementById('updateDorm'));
    $.ajax({
        type: "POST",
        url: `update_dorm.php`,
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        success: function(result){
            location.reload();
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