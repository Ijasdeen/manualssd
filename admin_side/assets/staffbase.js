$(document).ready(function () {

	const base_url = $('#base_url').val();





	const showOffStaff = () => {

		let html = null;
		let count = 0;

		$.ajax({
			url: base_url + 'Controllerunit/showOffStaff',
			method: 'POST',
			success: function (data) {
				let getData = JSON.parse(data);
				if (getData == "0") {
					$("#showoffStaff").html('<span class="text text-danger font-weight-bold">No data found</span>');
				} else {
					getData.map(d => {
						count++;
						html += `<tr>
<td>${count}</td>
<td>${d.staff_name}</td>
<td>${d.staff_mobile}</td>
<td>
${d.responsibility}
</td>
<td>
${d.joint_date}
</td>
<td>
<button class="btn btn-primary btn-sm editstaff" staff_id="${d.staff_id}" staff_name="${d.staff_name}" staff_mobile="${d.staff_mobile}" joint_date="${d.joint_date}" responsibility="${d.responsibility}">Edit</button>&nbsp; 
<button class="btn btn-danger btn-sm deleteStaff" staff_id="${d.staff_id}">Delete</button>
</td>
</tr>`;

					});
					$('#showoffStaff').html(html);
				}
			},
			error: function (err) {
				console.error('Error found', err);
			}
		});


	}


	showOffStaff();

	$('body').delegate('.editstaff', 'click', function () {
		let staff_id = parseInt($(this).attr('staff_id'));
		let staff_name = $(this).attr('staff_name').toString();
		let staff_mobile = $(this).attr('staff_mobile');
		let joint_date = $(this).attr('joint_date');
		let responsibility = $(this).attr('responsibility');

		$('#up_save').attr('type', 'button');
		$('#up_save').text('Update');
		$('#up_save').removeClass('btn-success');
		$('#up_save').addClass('btn-primary');

		$('#staffName').val(staff_name);
		$('#hidden_id').val(staff_id);
		$('#staffmob').val(staff_mobile);
		$('#responsibility').val(responsibility);
		$('#joint_date').val(joint_date);
	});

	$('#up_save').click(function () {


		let staffName = $("#staffName").val();
		let responsibility = $("#responsibility").val();
		let joint_date = $('#joint_date').val();
		let staffmob = $('#staffmob').val()

		if (staffName == "") {
			alert('Please enter the staff name');
			return false;
		}


		if (isNaN(staffmob)) {
			alert('Ony numbers are allowed in mobile number');
			return false;
		}

		if (staffmob.length != 10) {
			alert('Mobile number should be 10 digits');
			return false;
		}

		let id = parseInt($('#hidden_id').val());

		$.ajax({
			url: base_url + 'Controllerunit/updatestaffs',
			method: 'POST',
			data: {
				id: id,
				staffName: staffName,
				responsibility: responsibility,
				joint_date: joint_date,
				staffmob: staffmob
			},
			success: function (data) {
				alert('Updated successfully');
				$('#frmstaff')[0].reset();

				$('#up_save').attr('type', 'submit');
				$('#up_save').text('Save');
				$('#up_save').removeClass('btn-primary');
				$('#up_save').addClass('btn-success')

				showOffStaff();
			},
			error: function (err) {
				console.error('Error found', err);
			}
		});


	});



	$('body').delegate('.deleteStaff', 'click', function () {
		let staff_id = parseInt($(this).attr('staff_id'));


		if (confirm("Are you sure you want to delete it")) {
			$.ajax({
				url: base_url + 'Controllerunit/delestaff',
				method: 'POST',
				data: {
					staff_id: staff_id
				},
				success: function (data) {
					alert('Deleted successfully');
					showOffStaff();
				},
				error: function (err) {
					console.error('Error found', err);
				}
			});


		}
	});


	$("#frmstaff").submit(function (event) {
		event.preventDefault();

		let staffName = $("#staffName").val();
		let responsibility = $("#responsibility").val();
		let joint_date = $('#joint_date').val();
		let staffmob = $('#staffmob').val()

		if (staffName == "") {
			alert('Please enter the staff name');
			return false;
		}


		if (isNaN(staffmob)) {
			alert('Ony numbers are allowed in mobile number');
			return false;
		}

		if (staffmob.length != 10) {
			alert('Mobile number should be 10 digits');
			return false;
		}


		$.ajax({
			url: base_url + 'Controllerunit/savestaffs',
			method: 'POST',
			data: {
				staffName: staffName,
				responsibility: responsibility,
				joint_date: joint_date,
				staffmob: staffmob
			},
			success: function (data) {
				alert('Saved successfully');
				$('#frmstaff')[0].reset();
				$('#staffName').focus();
				showOffStaff();
			},
			error: function (err) {
				console.error('Error found', err);
			}
		});



	});


});
