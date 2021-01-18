<?php
include_once "../config/koneksi.php";
$imei=$_GET["imei"];
$sql_get_nanas = "SELECT * FROM jadwal WHERE imei='$imei'";
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
$response = ['status' => $status, 'jadwal' => $response_data];
echo json_encode($response);
?>