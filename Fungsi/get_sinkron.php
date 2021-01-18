<?php

include_once "../config/koneksi.php";
$email = $_GET["email"];
$sql_get_nanas = "SELECT * FROM tbdevice WHERE email = '$email' AND role = 'Anak' ";
$query = $con->query($sql_get_nanas);
$response_data = null;
while ($data = $query->fetch_assoc()) {
	$response_data[] = $data;
}
if (is_null($response_data)) {
	$status = false;
} else {
	$status = true;
}
header('Content-Type: application/json');
$response = ['status' => $status, 'device' => $response_data];
echo json_encode($response);
?>