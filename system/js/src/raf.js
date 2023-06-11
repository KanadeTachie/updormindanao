function addDependent(){
			var nform = $('#divDependent').clone(true);
			nform.appendTo( '#divDependents' );
			nform.show();

		}
		function removeDependent(el){
			let pDiv = el.parentNode;
			let ppDiv = pDiv.parentNode;
			ppDiv.parentNode.removeChild(ppDiv);
		}
		function getbrgys(){
			$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"getbrgys"}, function(data, xstatus){ fillbrgys(data);},"json").fail(function() {
			offlineerror();
			});	
		}
		function getsworkers(){
			$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"getsworkers"}, function(data, xstatus){ fillsworkers(data);},"json").fail(function() {
			offlineerror();
			});	
		}
		
		function getassistcode(el){
			let officecode = el.value;
			el.title = el.options[el.selectedIndex].text;
			$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"getassistcode","officecode":officecode}, function(data, xstatus){ fillassistcode(data);},"json").fail(function() {
			offlineerror();
			});
		}
		function fillbrgys(data){
			let  x = document.getElementById('rafForm');
			let gl = x.elements.namedItem('brgyCode');
			
			let  row = data['brgys'];
				gl.innerHTML = "";
				for (a = 0;a < row.length; a++){
					var option = document.createElement("option");
							option.text = row[a]['brgyName'] +', '+ row[a]['distName'];
							option.value = row[a]['brgyCode'];
							gl.add(option); 
				
				}	
			gl.selectedIndex = 0;				
		}
		function fillsworkers(data){
			let  x = document.getElementById('rafForm');
			let gl = x.elements.namedItem('sworker');
			
			let  row = data['sworkers'];
				gl.innerHTML = "";
				for (a = 0;a < row.length; a++){
					var option = document.createElement("option");
							option.text = row[a]['fullname'];
							option.value = row[a]['fullname'];
							gl.add(option); 
				
				}	
			gl.selectedIndex = 0;
		}
		function fillproviders(data){
			let  x = document.getElementById('rafForm');
			let gl = x.elements.namedItem('provCode');
			
			let  row = data['providers'];
				gl.innerHTML = "";
				for (a = 0;a < row.length; a++){
					var option = document.createElement("option");
							option.text = row[a]['officename'] +', '+ row[a]['location'];
							option.value = row[a]['officecode'];
							gl.add(option); 
				
				}	
				gl.selectedIndex = 0;
				
				getassistcode(gl);
				
		}
		function fillassistcode(data){
			let  x = document.getElementById('rafForm');
			let gl = x.elements.namedItem('idassistsched');
			let erateCode = x.elements.namedItem('rateCode');
			
			let  row = data['assistCode'];
			arateCode = data['assistCode'];
				gl.innerHTML = "";
				for (a = 0;a < row.length; a++){
					var option = document.createElement("option");
							option.text = row[a]['assistCode']+", "+row[a]['assistDesc'];
							option.value = row[a]['idassistsched'];
							gl.add(option); 
				
				}	
				gl.selectedIndex = 0;
				erateCode.value = arateCode[0]['rateCode'];
				gl.title = gl.options[gl.selectedIndex].text;
				let billAmount = x.elements.namedItem('billAmount');
				computerate(billAmount);
				
		}
		function setrateCode(el){
			let  x = document.getElementById('rafForm');
			let gl = x.elements.namedItem('idassistsched');
			let i = gl.selectedIndex;
			let erateCode = x.elements.namedItem('rateCode');
			erateCode.value = arateCode[i]['rateCode'];
			gl.title = gl.options[gl.selectedIndex].text;
			let billAmount = x.elements.namedItem('billAmount');
			computerate(billAmount);
		}
		function computerate(el){
			let xform = el.form.elements;
			let xbillAmount = Number(el.value);
			let xrateCode = xform.namedItem('rateCode').value;
			
			$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"getrate","billAmount":xbillAmount,"rateCode":xrateCode}, function(data){ 
					let  x = document.getElementById('rafForm').elements;
					x.namedItem('amtApproved').value = data['amtApproved'];
					let cont = 1;
					if (!x.namedItem('rafNum').value){  cont = -1;}
					if (!x.namedItem('benLName').value){  cont = -1;}
					if (!x.namedItem('benFName').value){  cont = -1;}
					if (!x.namedItem('benMName').value){  cont = -1;}
					if (!x.namedItem('benBDate').value){ cont = -1;}
					if (!x.namedItem('requestor').value){  cont = -1;}
					if (!x.namedItem('billAmount').value){ ; cont = -1;}
					if (!x.namedItem('remarks').value){  cont = -1;}
					if (cont > -1){	document.getElementById('controlbuttons').style.display = "inline";
						x.namedItem('approvebutton').style.display ="none";
						x.namedItem('overridebutton').style.display ="none";
					}
				},"json").fail(function() {
					offlineerror();
				});
		}
		function loadpatient(el){
		let els = el.form.elements;
		let xidpatient = els.namedItem('idpatient').value;
			if (Number(xidpatient)> 0){
				$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"loadpatient","idpatient":xidpatient}, function(d){ 
					if(d['error']){
						toastr.error('No Record Found');
						return false;
					}
					let data = d['patient'];
					let  els = document.getElementById('rafForm').elements;
					els.namedItem('benLName').value = data['benLName'];
					els.namedItem('benFName').value = data['benFName'];
					els.namedItem('benMName').value = data['benMName'];
					els.namedItem('suffix').value = data['suffix'];
					els.namedItem('benAddrSt').value = data['benAddrSt'];
					els.namedItem('brgyCode').value = data['brgyCode'];
					els.namedItem('benSex').value = data['benSex'];
					els.namedItem('benPHealth').value = data['benPHealth'];
					els.namedItem('benBDate').value = data['benBDate'];
					els.namedItem('philsysid').value = data['philsysid'];
					els.namedItem('benContact').value = data['benContact'];
					els.namedItem('effectivitydate').value = data['effectivitydate'];
					getassistperiod(xidpatient);
				},"json").fail(function() {
					offlineerror();
				});
			}
		}
		function getassistperiod(xidpatient){
			
			let tk = qs['tk'];
			$.get('controllers/verifypatientController.php',{"idpatient":xidpatient,"trans":"getassistperiod","tk":tk}, function (d) { filltotalamount(d);},'json').fail(function() {
			offlineerror();
			});	
			return true;
		}
		function filltotalamount(d){
			let xid = "idtotal"+d['idpatient'];
			let xtotal = Number(d['total']);
			document.getElementById('idtotal').innerHTML = "<strong>"+xtotal.toLocaleString("en-US", {style:"currency", currency:"Php"})+"</strong>";
	
		}
		function newpatient(){
			let  els = document.getElementById('rafForm').elements;
					els.namedItem('idpatient').value = -1;
					els.namedItem('benLName').value = '';
					els.namedItem('benFName').value = '';
					els.namedItem('benMName').value = '';
					els.namedItem('suffix').value = '';
					els.namedItem('benAddrSt').value = '';
					els.namedItem('brgyCode').selectedIndex = 0;
					els.namedItem('benSex').value = '';
					els.namedItem('philhealthno').value = '';
					els.namedItem('benBDate').value = '';
					els.namedItem('philsysid').value = '';
					els.namedItem('benContact').value = '';
					els.namedItem('effectivitydate').value = configuredate();
		}
		function savethis(xform, xtag){
		let cont = 1;
		let els = xform.elements;
			els.namedItem('tag').value = xtag;
			if (!els.namedItem('rafNum').value){ toastr.error('RAF Number is empty'); cont = -1;}
			if (!els.namedItem('benLName').value){ toastr.error('Patient Last name is empty'); cont = -1;}
			if (!els.namedItem('benFName').value){ toastr.error('Patient First name is empty'); cont = -1;}
			if (!els.namedItem('benMName').value){ toastr.error('Patient Middle name is empty'); cont = -1;}
			if (!els.namedItem('benBDate').value){ toastr.error('Patient Birthday is empty'); cont = -1;}
			if (!els.namedItem('requestor').value){ toastr.error('Requestor is empty'); cont = -1;}
			if (!els.namedItem('billAmount').value){ toastr.error('Bill Amount is empty'); cont = -1;}
			if (!els.namedItem('remarks').value){ toastr.error('Interview remarks is empty'); cont = -1;}
			if (cont == -1){
				return false;
			}
			let tk = '';
			if (qs['tk']) {tk = qs['tk'];} else {tk = localStorage.getItem('tk');}
			if (! els.namedItem('tk').value) { els.namedItem('tk').value = tk;}
			els.namedItem('assistCode').value = els.namedItem('idassistsched').options[els.namedItem('idassistsched').selectedIndex].text;
			var data = new FormData(xform);
			$.ajax({
				url: 'controllers/rafController.php',
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				dataType: 'json',
				type: 'POST',
				success: function(data) {
				    
						let  x = document.getElementById('rafForm');
						x.elements.namedItem('idassistdetails').value = data['idassistdetails'];
						x.elements.namedItem('idpatient').value = data['idpatient'];
						x.elements.namedItem('idintake').value = data['idintake'];
						x.elements.namedItem('trans').value = "UPDATE";
						let xamtApproved = x.elements.namedItem('amtApproved').value;
						let xrafNum = x.elements.namedItem('rafNum').value;
						document.getElementById('divattachment').style.display = "block";
						document.getElementById('keyvalue').value = data['idassistdetails'];
						document.getElementById('keyname').value = 'idassistdetails';
						getattachments(data['idassistdetails']);
						if (data['tag']=='save'){
							document.getElementById('controlbuttons').style.display = "inline";
							x.elements.namedItem('approvebutton').style.display ="inline";
							x.elements.namedItem('overridebutton').style.display ="inline";
							toastr.success('RAF saved');
						}
						
						if (data['tag']=='approve'){
							$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"approve","idassistdetails":data['idassistdetails'],"amtApproved":xamtApproved,"rafNum":xrafNum}, function(d){ 
								if (d['id'] > -1){
									toastr.success('RAF Approved');
									//alert('balance: '+d['balAmount']+' critical level: '+d['balCritLevel']);
									$.get("controllers/renderGuaranteeLetterController.php",{"tk":qs['tk'],"idassistdetails":d['idassistdetails']},"json");
									$.get("controllers/renderCertEligibilityController.php",{"tk":qs['tk'],"idassistdetails":d['idassistdetails']},"json");
									$.get("controllers/renderCertIndigencyController.php",{"tk":qs['tk'],"idassistdetails":d['idassistdetails']},"json");
									$.get("controllers/renderIntakeFormController.php",{"tk":qs['tk'],"idassistdetails":d['idassistdetails']},"json");
									document.getElementById('controlbuttons').style.display ="none";
									document.getElementById('reportbuttons').style.display ="block";
									document.getElementById('myfields').disabled = true;
									let xdiff =  Number(d['balAmount']) - Number(d['balCritLevel']);
									
									if (xdiff < 1){
										$.get("controllers/extractrolesController.php",{"tk":qs['tk'],"trans":"getroles","roles[]":["SUPERVISOR","COS"]}, function (d){
									
											let i = 0;

											while (i < d.length) {
												let d1 = d[i];
												let xmessage ="Good day "+ d1['fullname']+" CPAMS ver 2.0 is informing you that Lingap fund is within the critical level. Thank you";
												let xdata = {"trans":"sendmsg", "tk":qs['tk'], "message":xmessage, "cellno":d1['cellno'],"email":d1['emailaddress']}
												let xdata1 = {"trans":"add_notification", "tk":qs['tk'], "message":xmessage, "user_id":d1['userid'],"title":"CPAMS - Funds in Critical Level"};
	
												$.post("controllers/notifyController.php",xdata,"json").fail(function() {offlineerror();}); 
												$.post("https://cpams2.davaocity.gov.ph/controllers/notificationController.php",xdata1,"json").fail(function() {offlineerror();}); 
												i++;
											}
											toastr.success('Fund balance on critical level');
									
									
								
										},"json").fail(function() {offlineerror();});
									}
									
								} else { 
									toastr.error('Cannot approve RAF, insufficient fund balance');
								
									$.get("controllers/extractrolesController.php",{"tk":qs['tk'],"trans":"getroles","roles[]":"SUPERVISOR"}, function (d){
									
										let i = 0;

										while (i < d.length) {
											let d1 = d[i];
											let xmessage ="Good day "+ d1['fullname']+" CPAMS ver 2.0 is informing you that Lingap cannot approve assistance due to insufficient Fund. thank you";
											let xdata = {"trans":"sendmsg", "tk":qs['tk'], "message":xmessage, "cellno":d1['cellno'],"email":d1['emailaddress']}
											let xdata1 = {"trans":"add_notification", "tk":qs['tk'], "message":xmessage, "user_id":d1['userid'],"title":"CPAMS - Insufficient Fund"};
	
											$.post("controllers/notifyController.php",xdata,"json").fail(function() {offlineerror();}); 
											$.post("https://cpams2.davaocity.gov.ph/controllers/notificationController.php",xdata1,"json").fail(function() {offlineerror();}); 
											i++;
										}
										toastr.success('Supervisors already notified');
									
									
								
									},"json").fail(function() {offlineerror();});
									
								}
							},"json").fail(function() {offlineerror();});
						}
						if (data['tag']=='override'){
							$.get("controllers/rafController.php",{"tk":qs['tk'],"trans":"override","idassistdetails":data['idassistdetails']}, function(d){ 
								$.get("controllers/extractrolesController.php",{"tk":qs['tk'],"trans":"getroles","roles[]":"TEAM LEADER"}, function (d){
									let  x = document.getElementById('rafForm').elements;
									let xrafNum = x.namedItem('rafNum').value;
									let xpatient = x.namedItem('benFName').value+' '+x.namedItem('benMName').value+' '+x.namedItem('benLName').value+' '+x.namedItem('suffix').value;

									let i = 0;

									while (i < d.length) {
										let d1 = d[i];
										let xmessage ="Good day "+ d1['fullname']+" CPAMSver2 is requesting for override for patient "+xpatient+" with RAF#: "+xrafNum+", thank you";
										let xdata = {"trans":"sendmsg", "tk":qs['tk'], "cellno":d1['cellno'],"email":d1['emailaddress'],"message":xmessage }
										let xdata1 = {"trans":"add_notification", "tk":qs['tk'], "message":xmessage, "user_id":d1['userid'],"title":"CPAMS - Override"};
	
										$.post("controllers/notifyController.php",xdata,"json").fail(function() {offlineerror();}); 
										$.get("https://cpams2.davaocity.gov.ph/controllers/notificationController.php",xdata1,"json").fail(function() {offlineerror();}); 
										i++;
									}
														
									toastr.success('Team Leaders already notified');
									
								},"json").fail(function() {offlineerror();});
									toastr.success('RAF forwarded for override');
									newRaf();
									
								
							});
						}
						
					},	
				error: function (d){ offlineerror();}
			}
				
			);

		}
		function newRaf(){
			location.reload();
		}
		function intakeform(){
			let  x = document.getElementById('rafForm').elements;
			let params = 'menubar=no,width=0, height=0`,location=no, status=no, toolbar=no';
			let xidassistdetails = x.namedItem('idassistdetails').value;
			window.open('controllers/showIntakeFormController.php?idassistdetails='+xidassistdetails,'pdfwindow',params); 
		
		}
		function gletter(){
				let  x = document.getElementById('rafForm').elements;
				let params = 'menubar=no,width=0, height=0`,location=no, status=no, toolbar=no';
				let xidassistdetails = x.namedItem('idassistdetails').value;
				window.open('controllers/showGLController.php?idassistdetails='+xidassistdetails,'pdfwindow',params);
		}
		function celigibility(){
			let params = 'menubar=no,width=0, height=0`,location=no, status=no, toolbar=no';
			let  x = document.getElementById('rafForm').elements;
			let xidassistdetails = x.namedItem('idassistdetails').value;
			window.open('controllers/showCertEligibilityController.php?idassistdetails='+xidassistdetails,'pdfwindow',params); 
		
		}
		function cindigency(){
			let params = 'menubar=no,width=0, height=0`,location=no, status=no, toolbar=no';
			let  x = document.getElementById('rafForm').elements;
			let xidassistdetails = x.namedItem('idassistdetails').value;
			window.open('controllers/showCertIndigencyController.php?idassistdetails='+xidassistdetails,'pdfwindow',params); 
		
		}
		let patientWindow;
		function verifypatient(){
			let params = 'menubar=no,width=0, height=0`,location=no, status=no, toolbar=no';
			let  x = document.getElementById('rafForm').elements;
			let xidassistdetails = x.namedItem('idassistdetails').value;
			let tk = qs['tk'];
			patientWindow = window.open('patientView.html?tk='+tk+'&select=1','patientwindow',params); 
		
		}
		function setData(data){
			let  x = document.getElementById('rafForm').elements;
			x.namedItem('idpatient').value = Number(data);
			patientWindow.close();
			
		}