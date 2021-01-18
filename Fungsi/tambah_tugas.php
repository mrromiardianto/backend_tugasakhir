<?php

include "../config/koneksi.php";
class usr{}
$nama_tugas			= $_POST ["nama_tugas"];
$imei				= $_POST ["imei"];
$email 				= $_POST ["email"];

	if ((empty($nama_tugas))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom email tidak boleh kosong";
		die(json_encode($response));

	} else if ((empty($imei))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom nama tidak boleh kosong";
		die(json_encode($response));

	} else if ((empty($email))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom nama tidak boleh kosong";
		die(json_encode($response));


	} else {
			// $num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tbtugas WHERE imei='".$imei."'"));
			// if ($num_rows == 0){
				$query = mysqli_query($con, "INSERT INTO tbtugas (nama_tugas, imei, email) VALUES('$nama_tugas','$imei','$email')");
				if ($query){
					$response = new usr();
					$response->success = "true";
					$response->message = "Berhasil Menambahkan Tugas";
					die(json_encode($response));
				} else {
					$response = new usr();
					$response->success = "false";
					$response->message = "Gagal Menambahkan Tugas";
					die(json_encode($response));
				}
			// } else {
			// 	$response = new usr();
			// 	$response->success = "false";
			// 	$response->message = "Email sudah ada";
			// 	die(json_encode($response));
			// }
	}
	mysqli_close($con);

?>