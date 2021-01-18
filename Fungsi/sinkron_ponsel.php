<?php

include "../config/koneksi.php";
class usr{}
$imei				= $_POST ["imei"];
$email 				= $_POST ["email"];
	if ((empty($imei))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Gagal";
		die(json_encode($response));

	} else if ((empty($email))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Gagal";
		die(json_encode($response));

	} else {
			$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tbdevice WHERE imei='$imei'"));
			if ($num_rows == 1){
				$query = mysqli_query($con, "UPDATE tbdevice SET email = '$email' WHERE imei = '$imei'");
				if ($query){
					$response = new usr();
					$response->success = "true";
					$response->message = "Sikron Berhasil";
					die(json_encode($response));
				} else {
					$response = new usr();
					$response->success = "false";
					$response->message = "Gagal Sikron";
					die(json_encode($response));
				}
			} else {
					$response = new usr();
					$response->success = "false";
					$response->message = "Device Belum Terdaftar";
					die(json_encode($response));
		}

	}
	
	mysqli_close($con);

?>