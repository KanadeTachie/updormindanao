function startload() {

	document.getElementById('details').style.display = "block";
	var today = new Date();
	var asDate = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	var caption = "As of "+ asDate.toLocaleDateString("en-US", options);
	
	$('#ds').dataTable().fnDestroy();
	if ($('#ds tbody').empty()) {
		var tk=qs['tk'];

		var table = $('#ds').DataTable( {
			dom: 'lfrtBip', 
			buttons: [
				'copy', {extend : 'excelHtml5',title : 'PATIENTS'
				, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}, 
				{extend: 'pdf', 
				title : 'PATIENTS'
				, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true},
				{extend: 'print',
				title : 'PATIENS',
				messageTop: caption, messageBottom: '<br/> Prepared by: '+ fullname + ' ' +stoday, footer:true
				
				}
			],
			"ajax": "controllers/providerGLcontroller.php?trans=LIST&tk="+tk+ "&loc=" + soffice,
			"columns": [
				{"className":      'details-control',
													"orderable":      false,
													"data":           null,
													"defaultContent": ''},
				{ "data": "benLName" },
				{ "data": "benFName" },
				{ "data": "benMName" },
				{ "data": "billAmount" },             
				{ "data": "amtApproved"},
				{ "className":'viewGL',"defaultContent": '<button type="button" data-toggle="tooltip" title="View GL" class="btn btn-link" ><span><i class="fa fa-address-card-o" aria-hidden="true"></i></span></button>'}	
			],
			"order": [[0, 'desc']]
		} );
	}
	$('#ds tbody').off();

    $('#ds tbody').on( 'click', 'td.viewGL', function (o) {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
		viewGL(row.data());
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
	});
}

function searchRaf() {
	
	document.getElementById('details').style.display = "block";
	var today = new Date();
	var asDate = new Date();
	var options = { year: 'numeric', month: 'long', day: 'numeric' };
	var stoday = today.toLocaleDateString("en-US", options);
	var caption = "As of "+ asDate.toLocaleDateString("en-US", options);
	var raf = $("#rafSearch").val();	
	var fr= "";
	var to = "";
	var ajx= "";
	var tk=qs['tk'];

	if (raf.trim() == "") {
		fr = $("#dteFrom").val();	
		if (fr == "") {return false;}
		to = $("#dteTo").val();	
		if (to == "") {return false;}
		ajx = "controllers/providerGLcontroller.php?trans=LIST3&tk=" + tk + "&fr=" + fr + "&to=" + to + "&loc=" + soffice;
	}
	else {
		ajx = "controllers/providerGLcontroller.php?trans=LIST2&tk="+tk+"&search=" + raf + "&loc=" + soffice;
	}
  
	$('#ds').dataTable().fnDestroy();
	if ($('#ds tbody').empty()) {

		var table = $('#ds').DataTable( {
			dom: 'lfrtBip', 
			buttons: [
				'copy', {extend : 'excelHtml5',title : 'FOR OVERRIDES'
				, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true}, 
				{extend: 'pdf', 
				title : 'FOR OVERRIDES'
				, messageTop: caption, messageBottom: '\n Prepared by: '+ fullname + ' ' +stoday, footer:true},
				{extend: 'print',
				title : 'FOR OVERRIDES',
				messageTop: caption, messageBottom: '<br/> Prepared by: '+ fullname + ' ' +stoday, footer:true
				
				}
			],
			"ajax": ajx,
			"columns": [
				{"className":      'details-control',
													"orderable":      false,
													"data":           null,
													"defaultContent": ''},
				{ "data": "benLName" },
				{ "data": "benFName" },
				{ "data": "benMName" },
				{ "data": "billAmount" },             
				{ "data": "amtApproved"},
				{ "className":'viewGL',"defaultContent": '<button type="button" data-toggle="tooltip" title="View GL" class="btn btn-link" ><span><i class="fa fa-address-card-o" aria-hidden="true"></i></span></button>'}	
			],
			"order": [[0, 'desc']]
		} );
	}
	$('#ds tbody').off();

    $('#ds tbody').on( 'click', 'td.viewGL', function (o) {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
		viewGL(row.data());
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
	});
	
}

function viewGL(data){
	var id = data['idassistdetails'];
	
	let params = 'menubar=no,width=0, height=0`,location=no, status=no, toolbar=no';
	window.open('controllers/showGLController.php?idassistdetails='+id,'pdfwindow',params);
}

function format(row){
	var id = row['idpatient'];

	var elem = document.getElementById(id);
	if (elem){
  		elem.parentNode.removeChild(id);
	}
  	return '<div class="col-12" id="'+id+'"></div>';
}

function getchild(data){
    var idpatient = '#'+data['idpatient'];
    document.getElementsByName('myfields')[0].disabled = true;
    //var nform = $('#entryform').clone(true);
    var tform = document.getElementById('form'+data['idpatient']);
    if (tform){
        tform.parentNode.removeChild('form'+data['idpatient']);
    }
    var nform = $('#entryform').clone(true).prop('id','form'+data['idpatient']);
    nform.appendTo( idpatient);

    var x = document.getElementById('form'+data['idpatient']);
	x.elements.namedItem('tk').value=qs['tk'];
	x.elements.namedItem('raf').value=data['rafNum'];
	x.elements.namedItem('dte').value=data['dateReceive'];
	x.elements.namedItem('loc').value=data['procloc'];
	x.elements.namedItem('lname').value=data['benLName'];
	x.elements.namedItem('fname').value=data['benFName'];
	x.elements.namedItem('mname').value=data['benMName'];
	x.elements.namedItem('mname').value=data['benMName'];
	x.elements.namedItem('addr').value=data['benAddrSt'];
	x.elements.namedItem('brgy').value=data['brgyCode'];
	x.elements.namedItem('case').value=data['hospCase'];
	x.elements.namedItem('provider').value=data['provCode'];
	x.elements.namedItem('note').value=data['noteTag'];
	x.elements.namedItem('bill').value=data['billAmount'];
	x.elements.namedItem('amt').value=data['amtApproved'];
}

function saveThis(thisform){
	var data =  $("#entryform").serialize();
	var id =  $("#id").val();

	$.ajax({
		url: 'controllers/approvedController.php',
		cache: false,
		type: 'get',
		data : data,
		dataType: 'json',
		success: function(result) {
			if (result == id) {
				$('#ds').DataTable().ajax.reload(null,false);
				toastr.success('Disapprove successfully done...');
				$('#overrideModal').modal("hide");
			} else {
				toastr.error('Disapproved Failed.  Please check details...');
			}  
		},
		error: function(xhr, status, error) {
			console.log(error);
			alert(xhr.responseText);
		}
	});
 }



//setTimeout(checkmodule, 1000);