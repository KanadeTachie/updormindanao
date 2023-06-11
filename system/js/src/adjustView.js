
function getdetails(){
	var tk = qs['tk'];
	var today = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	var caption = "Adjustment Transactions on Alloment As of "+ stoday;
	let xtitle = "Fund Balance Details";
		var table = $('#ds').DataTable( {"destroy":true, "searching":false,
		dom: 'lfrtBip', 
		buttons: [
            'copy', {extend : 'excelHtml5',title : xtitle
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}, 
			{extend: 'pdf', 
			title : xtitle
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true},
			{extend: 'print',
			title : xtitle,
			 messageTop: caption, messageBottom: '<br/> Prepared by: '+ fullname + ' ' +stoday, footer:true
			
			}
        ],
		"ajax": "controllers/adjustController.php?trans=getdetails&tk="+tk,
        "columns": [
			
			{ "data": "dateSBal"},
            { "data": "debit", "render": $.fn.dataTable.render.number( ',', '.', 2 ,'')},
			{ "data": "balAmount",  "render": $.fn.dataTable.render.number( ',', '.', 2 ,'') },
			{ "data": "details"},
			{ "data": "fullname"}
		        ],
        "order": [[0, 'asc']]
		
    } );
	
	$('#ds tbody').off();
	
}
function additem(){
	$("#amountModal").modal("show");
	
}
function savethis(xform){
	
var cont = 1;

	
	var x1 = xform.getElementsByTagName("input");
	for (var i = 0; i < x1.length; i++){
		
		if (x1[i].name == 'credit') { if (x1[i].value < 1){ toastr.warning('Invalid Value');  cont = -1; }}
		if (x1[i].name == 'details') { if (x1[i].value==""){ toastr.warning('Invalid Account Details');  cont = -1; }}
		
	}
	
	if (cont > -1){
			
		var data = $(xform).serialize();
		
		$.ajax({
            url: 'controllers/adjustController.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			type: 'GET',
            success: function(data) {
				   
							
							$('#ds').DataTable().ajax.reload(null,false);
							
							
						toastr.success('Record Saved');
					
			}
		});
		
		$("#amountModal").modal("hide");
		
	}
	return false;
}

function startload(){

var otk = document.getElementsByName('tk');
for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
{
    otk[x].value = qs['tk'];
}

	getdetails();	
	
	
}