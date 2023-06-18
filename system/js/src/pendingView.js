
function startload(){
$("#raf").load("raf.html", initraf());
startattachment();
var otk = document.getElementsByName('tk');
for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
{
    otk[x].value = qs['tk'];
}
$.get("controllers/pendingController.php",{"trans":"getprocloc","tk":qs['tk']}
	
	
}
function initraf(){
	getprovidersAll();
	
}
function getprovidersAll(){
			$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"getprovidersAll"}, function(data, xstatus){ fillproviders(data);},"json").fail(function() {
			offlineerror();
			});	
			let  x = document.getElementById('rafForm');
			let gl = x.elements.namedItem('provCode');
			gl.disabled = true;
}
function filterdata(){

document.getElementById('details').style.display="none";
document.getElementById('list').style.display="block";
	var tk = qs['tk'];
	var today = new Date();
	var asDate = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	var caption = "As of "+ asDate.toLocaleDateString("en-US", options);
	let xtile = "Pending - Request Assist Form";
	var table = $('#ds').DataTable( {"destroy":true, 
		dom: 'lfrtBip', 
		buttons: [
            'copy', {extend : 'excelHtml5',title : xtitle
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}, 
			{extend: 'pdf', 
			title : xtitle
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true},
			{extend: 'print',
			title : xtitle,
			 messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true
			
			}
        ],
		"ajax": "controllers/raiseissueController.php?trans=getallactive&tk="+tk,
        "columns": [
			{"className":'details-control',
												 "orderable":      false,
												 "data":           null,
												 "defaultContent": ''},
			{ "className":'details',"data": "idissues"},
            { "className":'details',"data": "subject"},
			{ "className":'details',"data": "datefiled" },
			{ "className":'details',"data": "status"},
			{ "data": function (d) {return trash(d);} }
		        ],
        "order": [[1, 'asc']]
    } );
	
	$('#ds tbody').off();
	$('#ds tbody').on('click', 'td.details', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

		
			getdetails(row.data());
     
        
    } );
	$('#ds tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

		if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
			
        }
        else {
            // Open this row
            row.child( format(row.data())).show();
            tr.addClass('shown');
			getchild(row.data());
        }
        
    } );
	setTimeout(checkmodule,1000);
	
}