<?php 
require_once "method.php";
$mhs = new Futsal();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method){
    case 'POST':
        if(!empty($_GET["id"]))
        {
            $id=intval($_GET["id"]);
            $mhs->update_fotolap($id);
        }else{}
       
        break; 
        default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
        break;
}

?>