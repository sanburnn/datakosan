<?php

/**
* Author : https://www.roytuts.com
*/

require_once 'koneksi.php';
require_once 'jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $data = json_decode(file_get_contents("php://input", true));
	    global $mysqli;
		$query="SELECT * FROM jadwal";
		
			$query.=" WHERE idfutsaljadwal='" . mysqli_real_escape_string($dbConn, $data->idfutsaljadwal) . "' AND idhari='" . mysqli_real_escape_string($dbConn, $data->idhari) . "' ";
            $result = dbQuery($query);
		$data=array();
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get Jadwal Success.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);

}