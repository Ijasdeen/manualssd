$(document).ready(function (event) {

 
	
	$('#frmbookdetails').submit(function (event) {

		event.preventDefault();


		var months = ["January", "February", "March", "April", "May", "Jun", "Jul", "Aug", "Sep", "October", "November", "December"];
		var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		var d = new Date();
		var day = days[d.getDay()];
		var hr = d.getHours();
		var min = d.getMinutes();
		if (min < 10) {
			min = "0" + min;
		}
		var ampm = "AM";
		if (hr > 12) {
			hr -= 12;
			ampm = "PM";
		}
		var date = d.getDate();
		var month = (d.getMonth() + 1);
		var year = d.getFullYear();


		let fullTime = month + "/" + date + "/" + year + "  " + hr + ":" + min + " " + ampm;



		let name_section = $('#name_section').val();
		let mobileNumber_section = $('#mobileNumber_section').val();


		if (name_section == "") {
			toastr.error('Please enter the name');
			$('#name_section').focus();
			return false;

		}

		if (mobileNumber_section == "") {
			toastr.error('Please enter the mobile number');
			$('#mobileNumber_section').focus();
			return false;
		}

 		$.ajax({
			url: 'action.php',
			method: 'POST',
			data: {
				booknow: 4554,
				name_section: name_section,
				mobileNumber_section: mobileNumber_section,
				fullTime: fullTime
			},
			success: function (data) {
				if (data == "success") {
					toastr.success("Booked successfully");
					$("#frmbookdetails")[0].reset(); 
					$('#modalbooksection').modal('hide');
				} else {
					alert(data);
				}
			},
			error: function (err) {
				console.error('Error found ', err);
			}
		});



	});



});