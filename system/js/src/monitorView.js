
function getdetails(){
	var tk = qs['tk'];
	var today = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	var caption = "Adjustment Transactions on Alloment As of "+ stoday;
	let xtitle = "Fund Balance Details";
		var table = $('#ds').DataTable( {"destroy":true, "searching":false, "pageLength": 20,
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
		"ajax": "controllers/monitorController.php?trans=getdetails&tk="+tk,
        "columns": [
			
			{ "data": "dateSBal"},
			{ "data": "credit", "render": $.fn.dataTable.render.number( ',', '.', 2 ,'')},
            { "data": "debit", "render": $.fn.dataTable.render.number( ',', '.', 2 ,'')},
			{ "data": "balAmount",  "render": $.fn.dataTable.render.number( ',', '.', 2 ,'') },
			{ "data": "details"},
				{"data":"balCritLevel", "render": $.fn.dataTable.render.number( ',', '.', 2 ,'')},
			{ "data": "fullname"}
		        ],
        "order": [[0, 'asc']]
		
    } );
	
	$('#ds tbody').off();
	
}

function startload(){

var otk = document.getElementsByName('tk');
for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
{
    otk[x].value = qs['tk'];
}

	getdetails();	
	
	
}