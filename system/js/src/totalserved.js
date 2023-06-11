
function startload(){
	var otk = document.getElementsByName('tk');
	for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
	{
	    otk[x].value = qs['tk'];
	}

	let xform = document.getElementById('searchform').elements;
	xform.namedItem('datefrom').value = configuredate();
	xform.namedItem('dateto').value = configuredate();

	var i = '1434';
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

		
} 

$('#printReport').click(function(){
	var tk = qs['tk'];
	let xform = document.getElementById('searchform').elements;
	let sdatefrom = xform.namedItem('datefrom').value;
	let sdateto = xform.namedItem('dateto').value;
	let trans = xform.namedItem('trans').value;
	let preparedby = xform.namedItem('preparedby').value;
	let notedby = xform.namedItem('notedby').value;
	

	$('#print-container').prop('hidden',false);
	if (trans == 'clientsbybrgy') {
		let provcat = xform.namedItem('provcat').value;
		$('#print-container').attr('src', 'controllers/print/clientsbybrgyPrint.php?tk='+tk+'&datefrom='+sdatefrom+'&dateto='+sdateto+'&preparedby='+preparedby+'&notedby='+notedby+'&provcat='+provcat);  
	}
	else 
	if (trans == 'clientsServedSummary') $('#print-container').attr('src', 'controllers/print/clientsServedSummaryPrint.php?tk='+tk+'&datefrom='+sdatefrom+'&dateto='+sdateto+'&preparedby='+preparedby+'&notedby='+notedby);  
});