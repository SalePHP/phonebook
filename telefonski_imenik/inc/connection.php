<?php
	$host = "localhost"
	$name = "root";
	$pass = "";
	$dbName = "phonebook";

	$conn = mysqli_connect($host,$name,$pass,$dbName);
	
	if(!$conn){
		die("Problem sa konekcijom" . mysqli_connect_error($conn));
	}
?>