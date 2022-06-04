<?php

/**
* Author : https://www.roytuts.com
*/

require_once 'koneksi.php';
require_once 'jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));
	
	$sql = "SELECT * FROM user WHERE username = '" . mysqli_real_escape_string($dbConn, $data->username) . "' AND password = '" . mysqli_real_escape_string($dbConn, $data->password) . "' LIMIT 1";
	
	$result = dbQuery($sql);
	
	if(dbNumRows($result) < 1) {
		echo json_encode(array('error' => 'Invalid User'));
	} else {
		$row = dbFetchAssoc($result);
		
		$username = $row['username'];
        $id = $row['id_futsal'];
		
		$headers = array('alg'=>'HS256','typ'=>'JWT');
		$payload = array('username'=>$username, 'id_futsal'=>$id,'exp'=>(time() + 60 * 60 * 24 * 60));

		$jwt = generate_jwt($headers, $payload);
		$response=array(
            'message' => 'succes',
            'token' => $jwt
        ); 
		echo json_encode($response);
	}
}