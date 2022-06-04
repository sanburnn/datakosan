<?php


require_once 'koneksi.php';
require_once 'jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$bearer_token = get_bearer_token();


#echo $bearer_token;

$is_jwt_valid = is_jwt_valid($bearer_token);
$token = $bearer_token;

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    try{
     $allheaders=getallheaders();
     $jwt=$allheaders['Authorization'];
 
     
     $user_data=json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))));
     $data=$user_data;
     $rows = array();
  
    $response=array(
        'message' => 'succes',
        'data' => $data
    );
    header('Content-Type: application/json');
echo json_encode($response);
    }catch(Exception $e){
     echo json_encode([
         'status' => 0,
         'message' => $e->getMessage(),
     ]);
    }
 }else {
     echo json_encode([
         'status' => 0,
         'message' => 'Access Denied',
     ]);
 
}
