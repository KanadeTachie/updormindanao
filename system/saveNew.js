function saveNew(){
    var $owner = $('#owner').val();
    var $name = $('#name').val();
    var $address = $('#address').val();
    
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
                            
    let form = new FormData(document.getElementById('newDorm'));
    $.ajax({
        type: "POST",
        url: `newdorm.php`,
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        success: function(result){
            location.reload();
            //console.log(result);
        },
        error: function(result){
        },
        complete: function(){
        }
    });   

    $("#newModal").modal("hide");
}