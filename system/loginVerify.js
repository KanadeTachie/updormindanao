function loginVerify(){
    var xid = $('#uid').val();
    var xpwd = $('#pwd').val();
    
    if (xid.trim() == '') {
        alert('Userid not valid!');
        return false;
    }
    if (xpwd.trim() == '') {
        alert('Password not valid!');
        return false;
    }
                            
    $.ajax({
        type: "get",
        url: `login.php`,
        cache: false,
        data: {id:xid, pwd:xpwd},
        success: function(result){
            if (result == "OK") {
                location.reload();
            }
            else {
                alert('Login FAILED!');	
            }
        },
        error: function(result){
        },
        complete: function(){
        }
    });   

    $("#newModal").modal("hide");
}