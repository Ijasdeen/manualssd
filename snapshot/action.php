<?php
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	if(isset($_POST['booknow']) && isset($_POST['name_section']) && isset($_POST['mobileNumber_section']) && isset($_POST['fullTime'])){
		 $name_section = mysqli_real_escape_string($connection,$_POST['name_section']); 
		$mobileNumber_section = mysqli_real_escape_string($connection,$_POST['mobileNumber_section']); 
		$fullTime = mysqli_real_escape_string($connection,$_POST['fullTime']);
		$notfound='Notfound';
		
		$query = "INSERT INTO booking_details(name,mobile_number,date_time,called) values('$name_section','$mobileNumber_section','$fullTime','$notfound')";
		$result = mysqli_query($connection,$query);
		if($result){
			echo "success"; 
		}
		else {
			echo mysqli_error($connection);
		}
		
	}
	else {
		echo 'Not all fields came';
	}
	 	
	
	
}// End of request method 



?>