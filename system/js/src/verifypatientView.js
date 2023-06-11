function searchthis(xform){
	let els =xform.elements;
	let cont = 0;
	
	if (!els.namedItem('lastname').value && !els.namedItem('firstname').value && !els.namedItem('birthdate').value) { toastr.warning('Invalid Entry'); cont = -1;}
	if (cont == -1){ return true; } 
	
	var data = $(xform).serialize();
	filterdata(data);
	//$.get('controllers/verifypatientController.php',data, function (d) { filterdata(d);});
	return true;
}
function getassistperiod(data){
	let xidpatient = data['idpatient'];
	let tk = qs['tk'];
	if (!tk) {tk=localStorage.getItem("tk");}
	$.get('controllers/verifypatientController.php',{"idpatient":xidpatient,"trans":"getassistperiod","tk":tk}, function (d) { filltotalamount(d);},'json').fail(function() {
			offlineerror();
			});	
	return true;
}
function filltotalamount(d){
	let xid = "idtotal"+d['idpatient'];
	let xtotal = Number(d['total']);
	document.getElementById(xid).innerHTML = "<strong>"+xtotal.toLocaleString("en-US", {style:"currency", currency:"Php"})+"</strong>";
	
}
function filterdata(d){
		d = d+"&tk="+qs['tk'];
		
	var today = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	var caption = "As of "+ stoday;
		var table = $('#ds').DataTable( {"destroy":true, 
		dom: 'lfrtBip', 
		buttons: [
            'copy', {extend : 'excelHtml5',title : 'Patient Details'
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}, 
			{extend: 'pdf', 
			title : 'Patient Details'
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true},
			{extend: 'print',
			title : 'Patient Details',
			 messageTop: caption, messageBottom: '<br/> Prepared by: '+ fullname + ' ' +stoday, footer:true
			
			}
        ],
		"ajax": {"url": "controllers/verifypatientController.php?"+d, "error": function (xhr, error, code) {
            offlineerror();
        }},
        "columns": [
			{"className":      'details-control',
												 "orderable":      false,
												 "data":           null,
												 "defaultContent": ''},
			{ "data": "idpatient"},
            { "data": "benLName"},
			{ "data": "benFName"},
			{ "data": "benMName"},
			{ "data": "benBDate"},
			{ "data": "philsysid"},
				{"className":"select","data": null, "defaultContent": '<small><button type="button" class="btn btn-warning btn-sm"><small>Select</small></button></small>'}
			
	
		        ],
        "order": [[0, 'asc']],
		
		
    } );
	
	$('#ds tbody').off();
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
			getassistperiod(row.data())
			
        }
    } );
	$('#ds tbody').on('click', 'td.select', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
		let d = row.data();
		window.opener.setData(d['idpatient']);
	});
	table.on( 'draw', function () {
		if (!qs['select']) {$('.select').hide();} else {$('.select').show();} 
	} );
}
function format(row){
var id = row['idpatient'];

var elem = document.getElementById(id);
if (elem){
  elem.parentNode.removeChild(id);
}
var xcontent = '<table class="table table-responsive" id="idpatient'+id+'">';
    xcontent += '<thead><tr><th>RAFNum</th><th>Provider</th><th>AmountApproved</th><th>DateApproved</th><th>Assistance</th><th>Status</th><th>Canceled</th></tr></thead><tbody></tbody></table>';
	xcontent +='<strong>Total assistance received within the month:</strong>  <span id="idtotal'+id+'" ></span>';
	return xcontent;
}

function getchild(data){
var tableid = '#idpatient'+data['idpatient'];

var tk = qs['tk'];

	var today = new Date();
	var asDate = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	var caption = "As of "+ asDate.toLocaleDateString("en-US", options)+ '\n Patient Name: '+data['benLName']+', '+data['benFName']+' '+data['benMName'];
	let xtitle = "List of Assistance Approved - Patient ID:  "+ data['idpatient'];

	var table = $(tableid).DataTable( {"destroy":true,"searching":false,
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
		"ajax": {"url":"controllers/verifypatientController.php?trans=getdetails&idpatient="+data['idpatient']+"&tk="+tk, 
		         "error": function (xhr, error, code) {offlineerror();}
				},
        "columns": [
			
            { "className":'detail2',"data": "rafnum"},
			{ "className":'details2',"data": "officename"},
			{ "className":'details2',"data": "amtApproved", "render": $.fn.dataTable.render.number( ',', '.', 2 ,'')},
			{ "className":'details2',"data": "dateApproved"},
			{"data": "assistCode"},
			{"data": "status"},
			{ "className":'details2',"data": "tagCan"}
			
			
		        ],
        "order": [[3, 'asc']]
    } );
	
	$(tableid+' tbody').off();
	$(tableid+' tbody').on('click', 'td.details2', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
			alert('show rafdetails');
			//showdetails(row.data());
        
    } );
	
}
function startload(){

var otk = document.getElementsByName('tk');
for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
{
    otk[x].value = qs['tk'];
}

	
	
	
}