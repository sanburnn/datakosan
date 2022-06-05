<?php

/**
* Author : https://www.roytuts.com
*/

require_once 'koneksi.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	
	$sql = "INSERT INTO userapp(nama,notelp,username, passwords) VALUES('" . mysqli_real_escape_string($dbConn, $data->nama) . "','" . mysqli_real_escape_string($dbConn, $data->notelp) . "','" . mysqli_real_escape_string($dbConn, $data->username) . "', '" . mysqli_real_escape_string($dbConn, $data->passwords) . "')";
	
	$result = dbQuery($sql);
	
	if($result) {
		$response = array('success' => 'Berhasil Daftar');
					header('Content-Type: application/json');
					echo json_encode($response);
	} else {
		echo json_encode(array('error' => 'Something went wrong, please contact administrator'));
	}
}