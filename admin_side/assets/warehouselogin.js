$(document).ready(function(){
	
	const base_url = $('#base_url').val();
	 
	$('#warehouseLogin').submit(function(event){
		event.preventDefault(); 
		
		let mobNumber = $('#mobNumber').val(); 
		let mobPassword = $('#mobPassword').val(); 
		
		 
		
		$.ajax({
			url: base_url + 'Controllerunit/loginintowarehouse',
			method: 'POST',
			data: {
			 	mobNumber:mobNumber,
				mobPassword:mobPassword
			},
			success: function (data) {
				 let getData = JSON.parse(data); 
				if(getData=="0"){
					alert('Mobile number or password incorrect'); 
				}
				else {
					window.location.reload(); 
 				}
			},
			error: function (err) {
				console.error('Error found', err);
			}
		});
		
		
		
		
	}); 
	
	
	
	
})