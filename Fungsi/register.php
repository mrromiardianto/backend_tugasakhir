<?php

include "../config/koneksi.php";
class usr{}
$imei				= $_POST ["imei"];
$email 				= $_POST ["email"];
$password			= md5($_POST["password"]);
$confirm_password 	= md5($_POST["confirm_password"]);
$role 				= $_POST ["role"];
$kata_pengingat		= $_POST ["kata_pengingat"];
	if ((empty($imei))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom email tidak boleh kosong";
		die(json_encode($response));

	} else if ((empty($email))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom nama tidak boleh kosong";
		die(json_encode($response));

	} else if ((empty($password))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom password tidak boleh kosong";
		die(json_encode($response));

	} else if ((empty($confirm_password)) || $password != $confirm_password) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Password lo salah, Bro!";
		die(json_encode($response));

	} else if ((empty($role))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom role tidak boleh kosong";
		die(json_encode($response));

	} else if ((empty($kata_pengingat))) {
		$response = new usr();
		$response->success = "false";
		$response->message = "Kolom kata pengingat tidak boleh kosong";
		die(json_encode($response));

	} else {
		if (!empty($email) && $password == $confirm_password){
			$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tbdevice WHERE imei='".$imei."'"));
			if ($num_rows == 0){
				$query = mysqli_query($con, "INSERT INTO tbdevice (imei, email, password, role, kata_pengingat) VALUES('$imei','$email','$password','$role','$kata_pengingat')");
				if ($query){
					$response = new usr();
					$response->success = "true";
					$response->message = "Register berhasil, silahkan login.";
					die(json_encode($response));
				} else {
					$response = new usr();
					$response->success = "false";
					$response->message = "Register Gagal";
					die(json_encode($response));
				}
			} else {
				$response = new usr();
				$response->success = "false";
				$response->message = "Email sudah ada";
				die(json_encode($response));
			}
		}
	}
	mysqli_close($con);

?>