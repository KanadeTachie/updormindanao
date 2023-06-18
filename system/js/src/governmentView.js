
function startload(){
$("#raf").load("raf.html", initraf1());

var otk = document.getElementsByName('tk');
for(var x=0; x < otk.length; x++)   // comparison should be "<" not "<="
{
    otk[x].value = qs['tk'];
}

	startattachment();
	
}
function initraf1(){
	

	 
			setTimeout(initraf, 1000);
		
}
function initraf(){
	
						addDependent();		
						getbrgys();
						getproviders();
						getsworkers();
						let arateCode =[];
						let xelements = document.getElementById('rafForm').elements;
						xelements.namedItem('trans').value = "ADD";
						xelements.namedItem('idassistdetails').value = -1;
						xelements.namedItem('dateReceive').value = configuredate();
						xelements.namedItem('myfields').disabled = false;
						xelements.namedItem('rafNum').focus();
						
}				

function getproviders(){
			$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"getproviders"}, function(data, xstatus){ fillproviders(data);},"json").fail(function() {
			offlineerror();
			});	
		}