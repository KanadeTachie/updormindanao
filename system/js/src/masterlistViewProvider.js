function searchthis(xform){
	let els =xform.elements;
	let cont = 0;
	
	if (!els.namedItem('datefrom').value && !els.namedItem('dateto').value ) { toastr.warning('Empty Date Entry'); cont = -1;}
	if (els.namedItem('datefrom').value > els.namedItem('dateto').value ) { toastr.warning('Invalid Date Entry'); cont = -1;}
	if (cont == -1){ return true; } 
	
	var data = $(xform).serialize();
	$.get('controllers/masterlistViewProviderController.php',data, function (d) { filterdata(d);});
	return true;
}

function filterdata(d){
	var tk = qs['tk'];
	var today = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	
	let xform = document.getElementById('searchform').elements;
	let ddatefrom = new Date(xform.namedItem('datefrom').value);
	let ddateto = new Date(xform.namedItem('dateto').value);
	var caption = "From "+ ddatefrom.toLocaleDateString("en-US", options) + " to "+ ddateto.toLocaleDateString("en-US", options);
	let sdatefrom = xform.namedItem('datefrom').value;
	let sdateto = xform.namedItem('dateto').value;
	let sprocloc = xform.namedItem('procloc').value;
	let sprovider = xform.namedItem('provider').value;
	let sprovcat = xform.namedItem('provcat').value;


	var table = $('#ds').DataTable( {"destroy":true, 
		dom: 'lfrtBip', 
		buttons: [
            'copy', {extend : 'excelHtml5',title : 'Masterlist of Approved Assistance by Provider'
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}, 
			{extend: 'pdf', 
			title : 'Masterlist of Approved Assistance by Provider'
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}
			// {extend: 'print',
			// title : 'Masterlist of Approved Assistance by Provider',
			//  messageTop: caption, messageBottom: '<br/> Prepared by: '+ fullname + ' ' +stoday, footer:true
			
			// }
        ],
		"ajax": "controllers/masterlistViewProviderController.php?trans=search&tk="+tk+"&datefrom="+sdatefrom+"&dateto="+sdateto+"&procloc="+sprocloc+"&provider="+sprovider+"&provcat="+sprovcat,
        "columns": [
			
			{ "className":'details',"data": "rafNum"},
			{ "className":'details',"data": "idpatient"},
            { "className":'details',"data": "patientname"},
			{ "className":'details',"data": "assistCode" },
			{ "className":'details',"data": "amtApproved", "render": $.fn.dataTable.render.number( ',', '.', 2 ,'')},
			{ "className":'details',"data": "dateApproved"}
		        ],
        "order": [[1, 'asc']],
		"footerCallback": function ( row, data, start, end, display ) {
							var api = this.api(), data;
							var intVal = function ( i ) {
   						 		return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 :
        						typeof i === 'number' ?
            					i : 0;
							};
							total = api.column( 4 ).data().reduce( function (a, b) {
        						return intVal(a) + intVal(b);
    						}, 0 );
							$( api.column( 4 ).footer() ).html( total.toLocaleString('en-US',{style:'currency',currency:'PHP'}) );
						}
    } );
	
	$('#ds tbody').off();
	// $('#ds tbody').on('click', 'td.details', function () {
 //        var tr = $(this).closest('tr');
 //        var row = table.row( tr );
	// 		alert('show details');
 //    } );

    $('#printReport').prop('disabled', false);
}

function startload(){
	var otk = document.getElementsByName('tk');
	for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
	{
	    otk[x].value = qs['tk'];
	}

	let xform = document.getElementById('searchform').elements;
	xform.namedItem('datefrom').value = configuredate();
	xform.namedItem('dateto').value = configuredate();
		var x = document.getElementById('searchform');
		$.get("controllers/masterlistViewProviderController.php",{trans:"getprocloc",tk:qs['tk']}, function(data){
			
			var pl = x.elements.namedItem('procloc');
			var row = data['data'];
			for (a = 0;a < row.length; a++){
				var option = document.createElement("option");
								option.text = row[a]['officename'];
								option.value = row[a]['idoffice'];
								pl.add(option); 
			}
		},"json");
} 



$("#procloc").change(function(){
		var i = (this.value);
		$.get("controllers/masterlistViewProviderController.php",{trans:"getsignatory",tk:qs['tk'], office:i}, function(data){
		var x = document.getElementById('searchform');
		var sign = x.elements.namedItem('preparedby');
		var row = data['data'];		
		for (a = 0;a < row.length; a++){
			var option = document.createElement("option");
							option.text = row[a]['fullname'];
							option.value = row[a]['userid'];
							sign.add(option); 
		}

		var sign2 = x.elements.namedItem('notedby');
		var row2 = data['data'];		
		for (a = 0;a < row2.length; a++){
			var option2 = document.createElement("option");
							option2.text = row2[a]['fullname'];
							option2.value = row2[a]['userid'];
							sign2.add(option2); 
		}
	},"json");
});

$("#provcat").change(function(){
		var i = (this.value);
		$.get("controllers/masterlistViewProviderController.php",{trans:"getprovider",tk:qs['tk'], provcat:i}, function(data){
		var x = document.getElementById('searchform');
		var pr = x.elements.namedItem('provider');
		var row2 = data['data'];
		pr.innerHTML = "";
		for (b = 0;b < row2.length; b++){
			var option = document.createElement("option");
							option.text = row2[b]['officename'];
							option.value = row2[b]['officecode'];
							pr.add(option); 
		}
	},"json");
});

$('#printReport').click(function(){
	var tk = qs['tk'];
	let xform = document.getElementById('searchform').elements;
	var today = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	let ddatefrom = new Date(xform.namedItem('datefrom').value);
	let ddateto = new Date(xform.namedItem('dateto').value);
	var caption = "From "+ ddatefrom.toLocaleDateString("en-US", options) + " to "+ ddateto.toLocaleDateString("en-US", options);
	let sdatefrom = xform.namedItem('datefrom').value;
	let sdateto = xform.namedItem('dateto').value;
	let sprocloc = xform.namedItem('procloc').value;
	let sprovider = xform.namedItem('provider').value;
	let sprovcat = xform.namedItem('provcat').value;
	let spreparedby = xform.namedItem('preparedby').value;
	let snotedby = xform.namedItem('notedby').value;


	$('#print-container').prop('hidden',false);
  	$('#print-container').attr('src', 'controllers/print/masterlistbyproviderPrint.php?tk='+tk+'&datefrom='+sdatefrom+'&dateto='+sdateto+'&procloc='+sprocloc+'&provider='+sprovider+'&provcat='+sprovcat+'&preparedby='+spreparedby+'&notedby='+snotedby);  
});