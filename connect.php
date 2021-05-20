<?php
	$servername = "127.0.0.1:55678";
	$username = "azure";
	$password = "6#vWHD_$";
	$db_name = "studentinfosystem";
	
	$con = mysqli_connect($servername,$username,$password,$db_name);
	/*$con = mysqli_connect('127.0.0.1:55678', 'azure', '6#vWHD_$', 'studentinfosystem');*/
	
	if(!$con){
		die("can not access");
	}
	
?>
