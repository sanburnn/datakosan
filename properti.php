<?php 
require_once "method.php";
$mhs = new Propreti();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method){
    case 'GET':
        $mhs->get_prop();
        break;
        default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
        break;
}



?>