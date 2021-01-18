<?php
	include '../config/koneksi.php';
	class usr{}
	$imei = $_POST["imei"];
	if ((empty($imei))) { 
		$response = new usr();
		$response->success ="false";
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysqli_query($con, "SELECT * FROM tbdevice WHERE imei='$imei'");
	$row = mysqli_fetch_array($query);
	if (!empty($row)){
		$response = new usr();
		$response->success = "true";
		$response->message = "Berhasil ";
		die(json_encode($response));

	} else { 
		$response = new usr();
		$response->success = "false";
		$response->message = "imei belum terdaftar";
		die(json_encode($response));
	}
	mysqli_close($con);
?>