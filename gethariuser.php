<?php
require_once "method.php";
$mhs = new Futsal();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			
				$id=intval($_GET["id"]);
				$mhs->get_hari($id);
			
			break;
	
	default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>