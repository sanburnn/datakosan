<?php
require_once "method.php";
$mhs = new Futsal();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	
	case 'DELETE':
		    $id=intval($_GET["id"]);
            $mhs->delete_transaksi($id);
            break;
	default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>