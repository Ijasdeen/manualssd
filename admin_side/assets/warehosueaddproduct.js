$(document).ready(function () {
	const base_url = $('#base_url').val();

	const noImage = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png";

	const getfulltime = () => {

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

		$('#submitted_date').val(fullTime);

	}


	getfulltime();

	$("#categories_name").change(function (event) {
		let value = event.target.value;
		let html = null;

		$.ajax({
			url: base_url + 'Controllerunit/choosesubcategories',
			method: 'POST',
			data: {
				value: value
			},
			success: function (data) {
				let getData = JSON.parse(data);
				if (getData == "0") {
					$("#sub_categories").html('<option>--Select main category--</option>');
				} else {
					getData.map(d => {
						html += `<option value="${d.sub_categoryid}">${d.sub_cat_id}</option>`;

					});
					$("#sub_categories").html(html);
				}
			},
			error: function (err) {
				console.error('Error found', err);
			}
		});



	});



	$("#addProductdetails").submit(function (event) {
		event.preventDefault();

		const formdata = new FormData();

		let productName = $('#productsName').val();
		let product_code = $('#product_code').val();
		let brands_name = $('#brands_name').val();
		let submitted_date = $('#submitted_date').val();
		let categories_name = $('#categories_name').val();
		let sub_categories = $('#sub_categories').val();
		let mfd = $('#manugectured_date').val();
		let exp = $('#exp_date').val();
		let product_cost = $('#prudct_cost').val();
		let product_price = $('#product_price').val();

		let quantity = $('#quantity').val();
		let alert_quantity = $('#alert_quantity').val();

		let description = $('#description').val();
		let picture = $('#picture')[0].files[0];

		if(picture==""){
			picture = noImage; 
		}
		if (isNaN(product_cost)) {
			alert('Only numbers are allowed');
			$('#prudct_cost').focus();
			return false;
		}
		if (isNaN(product_price)) {
			alert('Only numbers are allowed');
			$('#product_price').focus();
			return false;
		}

		if (isNaN(quantity)) {
			alert('Only numbers are allowed');
			$("#quantity").focus();
			return false;
		}

		if (isNaN(alert_quantity)) {
			alert('Only numbers are allowed');
			$('#alert_quantity').focus();
			return false;
		}


		formdata.append('productName', productName);
		formdata.append('product_code', product_code);
		formdata.append('brands_name', brands_name);
		formdata.append('submitted_date', submitted_date);
		formdata.append('categories_name', categories_name);
		formdata.append('sub_categories', sub_categories);
		formdata.append('mfd', mfd);
		formdata.append('exp', exp);
		formdata.append('product_cost', product_cost);
		formdata.append('product_price', product_price);
		formdata.append('quantity', quantity);
		formdata.append('alert_quantity', alert_quantity);
		formdata.append('description', description);
		formdata.append('picture', picture);

 		$.ajax({
			url: base_url + 'Controllerunit/saveallproducts',
			type: "post",
			data: formdata,
			processData: false,
			contentType: false,
			cache: false,
			success: function (data) {
	 			window.location.reload(); 
				alert('Saved successfully');

			},
			error: function (err) {
				console.log('Error found', err);
			}
		});




	});


});