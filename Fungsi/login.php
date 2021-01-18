<?php
	include '../config/koneksi.php';
	class usr{}
	$email = $_POST["imei"];
	$password =md5($_POST["password"]);
	if ((empty($email)) || (empty($password))) { 
		$response = new usr();
		$response->success ="false";
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysqli_query($con, "SELECT * FROM tbdevice WHERE imei='$email' AND password='$password'");
	$row = mysqli_fetch_array($query);
	if (!empty($row)){
		$response = new usr();
		$response->success = "true";
		$response->message = "Selamat datang ".$row['email'];
		$response->id = $row['id'];
		$response->imei = $row['imei'];
		$response->email = $row['email'];
		$response->password = $row['password'];
		$response->role = $row['role'];
		$response->kata_pengingat = $row['kata_pengingat'];
		die(json_encode($response));
	} else { 
		$response = new usr();
		$response->success = "false";
		$response->message = "imei atau password salah";
		die(json_encode($response));
	}
	mysqli_close($con);
?>