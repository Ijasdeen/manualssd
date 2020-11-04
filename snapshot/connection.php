<?php
$connection = mysqli_connect('localhost','root','','ss_studio');

if(!$connection){
  echo mysqli_error($connection);
	exit(); 
}


?>