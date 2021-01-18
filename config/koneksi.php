<?php
	$server		= "localhost"; 
	$user		= "root"; 
	$password	= "";
	$database	= "dbskripsi"; 
	$con = mysqli_connect($server,$user,$password,$database);
	if (mysqli_connect_errno()) {
		echo "Gagal Terhubung" . mysqli_connect_error();
	}
?>