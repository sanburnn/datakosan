<?php


// require_once 'koneksi.php';
// require_once 'jwt_utils.php';

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: GET");

// $bearer_token = get_bearer_token();
// // NOT USED

// #echo $bearer_token;

// $is_jwt_valid = is_jwt_valid($bearer_token);

// if($is_jwt_valid) {
    
// 	$sql = "SELECT * FROM transaksi WHERE idfutsal = '1'";
    
// 	$results = dbQuery($sql);

// 	$rows = array();

// 	while($row = dbFetchAssoc($results)) {
// 		$rows[] = $row;
// 	}
// $response=array(
//     'message' => 'succes',
//     'data' => $rows
// );
// header('Content-Type: application/json');
// echo json_encode($response);
// } else {
// 	echo json_encode(array('error' => 'Access denied'));
// }
