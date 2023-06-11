function startload(){
	var otk = document.getElementsByName('tk');
	for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
	{
	    otk[x].value = qs['tk'];
	}

	let xform = document.getElementById('masterlist-bybeneficiary').elements;
	xform.namedItem('datefrom').value = configuredate();
	xform.namedItem('dateto').value = configuredate();

	selectedinput();	
}


function searchbybeneficiary(xform){
	let els =xform.elements;
	let cont = 0;
	
	if (!els.namedItem('datefrom').value && !els.namedItem('dateto').value ) { toastr.warning('Empty Date Entry'); cont = -1;}
	if (els.namedItem('datefrom').value > els.namedItem('dateto').value ) { toastr.warning('Invalid Date Entry'); cont = -1;}
	if (cont == -1){ return true; } 
	
	var data = $(xform).serialize();
	$.get('controllers/masterlistbybeneficiaryController.php',data, function (d) { filterdata(d);});
	return true;
}

function filterdata(d){
	var tk = qs['tk'];
	var today = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	
	let xform = document.getElementById('masterlist-bybeneficiary').elements;
	let ddatefrom = new Date(xform.namedItem('datefrom').value);
	let ddateto = new Date(xform.namedItem('dateto').value);
	var caption = "From "+ ddatefrom.toLocaleDateString("en-US", options) + " to "+ ddateto.toLocaleDateString("en-US", options);
	let sdatefrom = xform.namedItem('datefrom').value;
	let sdateto = xform.namedItem('dateto').value;

	let proclocation = xform.namedItem('procloc').value;
	let location = xform.namedItem('procloc');
	let text= location.options[location.selectedIndex].text;
	let providercat = xform.namedItem('provCat').value;
	
	var table = $('#ds').DataTable( {"destroy":true, 
		dom: 'lfrtBip', 
		buttons: [
            'copy', {extend : 'excelHtml5',title : 'Masterlist of Approved Assistance (Beneficiary)'
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}, 
			{extend: 'pdf', 
			title : 'Masterlist of Approved Assistance (Beneficiary)'
			, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true},
			{extend: 'print',
			title : 'Masterlist of Approved Assistance (Beneficiary)',
			 messageTop: caption, messageBottom: '<br/> Prepared by: '+ fullname + ' ' +stoday, footer:true
			
			}
        ],
		"ajax": "controllers/masterlistbybeneficiaryController.php?trans=search&tk="+tk+"&datefrom="+sdatefrom+"&dateto="+sdateto+
				"&procloc="+proclocation+"&provCat="+providercat,
        "columns": [
			
			{ "className":'details',"data": "rafNum"},
            { "className":'details',"data": "beneficiary"},
			{ "className":'details',"data": "provider" },
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
										total = api.column(3).data().reduce( function (a, b) {
                    						return intVal(a) + intVal(b);
                						}, 0 );
										$( api.column(3).footer() ).html( total.toLocaleString('en-US',{style:'currency',currency:'PHP'}) );
        							}
    } );
	
	$('#ds tbody').off();
	
}

function selectedinput(){
	$.get("controllers/masterlistbybeneficiaryController.php",{trans:"getprocloc",tk:qs['tk']}, function(data){
		var x = document.getElementById('masterlist-bybeneficiary');
		var gl = x.elements.namedItem('procloc');
		var row = data['data'];
		for (a = 0;a < row.length; a++){
			var option = document.createElement("option");
							option.text = row[a]['officename'];
							option.value = row[a]['idoffice'];
							gl.add(option); 
		}
	},"json");

	
}



$("#procloc").change(function(){
		var i = (this.value);
		$.get("controllers/masterlistbybeneficiaryController.php",{trans:"getsignatory",tk:qs['tk'], office:i}, function(data){
		var x = document.getElementById('masterlist-bybeneficiary');
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

$('#printreport').click(function(){ 
	let dtefrom = $('#datefrom').val();
	let dteto = $('#dateto').val();
	let provcat = $('#provCat').val();
	let procloc = $('#procloc').val();
	let preparedby = $('#preparedby').val();
	let notedby = $('#notedby').val();

	$('#print-container').prop('hidden',false);
	$('#print-container').attr('src', 'controllers/print/masterlistbybeneficiaryPrint.php?from='+dtefrom+'&to='+dteto+'&cat='+provcat+'&loc='+procloc+'&preparedby='+preparedby+'&notedby='+notedby);	
});