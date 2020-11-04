$(document).ready(function () {

	const base_url = $('#base_url').val();


	const showOffSupplier = () => {
		let html = null;
		let count = 0;

		$.ajax({
			url: base_url + 'Controllerunit/showOffSupplier',
			method: 'POST',
			success: function (data) {
				let getData = JSON.parse(data);
				if (getData == "0") {
					html = "No data found";
				} else {
					getData.map(d => {
						count++;
						html += `<tr>
<td>${count}</td>
<td>${d.supplier_name}</td>
<td>${d.mobile_number}</td>
<td>${d.org_name}</td>
<td>
<button class="btn btn-primary btn-sm editSupplier" supplier_id="${d.supplier_id}" supplier_name="${d.supplier_name}" mobileNumber="${d.mobile_number}" orgName="${d.org_name}">EDIT</button>
			   					<button class="btn btn-danger btn-sm deleteSupplier" supplier_id="${d.supplier_id}">Delete</button>
</td>
</tr>`;
					});

					$('#showOffSuppliers').html(html);

				}



			},
			error: function (err) {
				console.error('Error found', err);
			}
		});


	}

	showOffSupplier();

	$('body').delegate('.editSupplier','click',function(){
		let supplier_id = parseInt($(this).attr('supplier_id')); 
		let supplier_name = $(this).attr('supplier_name'); 
		let mobileNumber = $(this).attr('mobileNumber'); 
		let orgName = $(this).attr('orgName'); 
		
		
		$('#hidden_id').val(supplier_id); 
		$('#u_supplierName').val(supplier_name); 
		$('#u_mobileNumber').val(mobileNumber); 
		$('#u_orgName').val(orgName); 
		
		$('#updatesuppliers').modal('show'); 
		
			
		
		
	});
	
	$('#frmUpdatesupplier').submit(function(){
		
	 	let u_supplierName = $('#u_supplierName').val(); 
		let u_mobileNumber = $('#u_mobileNumber').val(); 
		let u_orgName = $('#u_orgName').val(); 
		let id = parseInt($('#hidden_id').val()); 
		
		
		if(u_supplierName==""){
			alert('Supplier name is required'); 
			return false; 
		}
	
		if(u_mobileNumber==""){
			alert('Mobile number is required'); 
			return false; 
		}
		
		if(u_orgName==""){
			alert('Organization is required'); 
			return false; 
		}
		
		if(id==""){
			alert('Id is required'); 
			return false; 
		}
		
		$.ajax({
				url: base_url + 'Controllerunit/updateSuppliers',
				method: 'POST',
				data: {
					u_supplierName: u_supplierName,
					u_mobileNumber:u_mobileNumber,
					u_orgName:u_orgName,
					id:id
				},
				success: function (data) {
					alert('Updated successfully');
					window.location.reload();

				},
				error: function (err) {
					console.error('Error found', err);
				}
			});
		
		
		
		
	}); 
	
	
	
	
	$('body').delegate('.deleteSupplier', 'click', function () {
		let supplier_id = parseInt($(this).attr('supplier_id'));

		if (confirm("Are you sure you want to delete it?")) {
			$.ajax({
				url: base_url + 'Controllerunit/deleteSuppliers',
				method: 'POST',
				data: {
					supplier_id: supplier_id
				},
				success: function (data) {
					alert('Deleted successfully');
					window.location.reload();

				},
				error: function (err) {
					console.error('Error found', err);
				}
			});

		}
	});

	$('#frmsaveSupplier').submit(function (e) {
		e.preventDefault();

		let supplierName = $('#supplierName').val();
		let mobileNumber = $('#mobileNumber').val();
		let orgName = $("#orgName").val();

		if (supplierName == "") {
			alert('Supplier name is required');
			return false;
		}

		if (mobileNumber == "") {
			alert('Supplier number is required');
			return false;
		}

		if (isNaN(mobileNumber)) {
			alert('Only number is required');
			return false;
		}


		$.ajax({
			url: base_url + 'Controllerunit/addSuppliers',
			method: 'POST',
			data: {
				supplierName: supplierName,
				mobileNumber: mobileNumber,
				orgName: orgName
			},
			success: function (data) {
				alert('Saved successfully');
				window.location.reload();

			},
			error: function (err) {
				console.error('Error found', err);
			}
		});


	});


});