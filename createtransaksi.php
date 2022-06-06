<?php

/**
* Author : https://www.roytuts.com
*/

require_once 'koneksi.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get posted data
    // $idfutsal=$_POST['idfutsal'];
    // $idpengguna=$_POST['idpengguna'];
    // $nama=$_POST['nama'];
    // $notelp=$_POST['notelp'];
    // $tanggal=$_POST['tanggal'];
    // $jam=$_POST['jam'];
    // $satatus=$_POST['satatus'];
    $data = json_decode(file_get_contents("php://input", true));
    
    $sql = "INSERT INTO transaksi(idfutsal,idpengguna, nama, notelp, tanggal, jam, satatus) VALUES('" . mysqli_real_escape_string($dbConn , $data->idfutsal) ."',
    '". mysqli_real_escape_string($dbConn, $data->idpengguna)."','".mysqli_real_escape_string($dbConn, $data->nama)."',
    '". mysqli_real_escape_string($dbConn, $data->notelp)."','". mysqli_real_escape_string($dbConn, $data->tanggal)."','". mysqli_real_escape_string($dbConn, $data->jam)."','". mysqli_real_escape_string($dbConn, $data->satatus)."')";
    
    $result = dbQuery($sql);
    
    if($result) {
        //*Add this untuk membuat json lebih bagus
        $response = array('success' => 'Sukses Menambah Data');
        header('Content-Type: application/json');
        echo json_encode($response);
        //===================================
    } else {
        echo json_encode(array('error' => 'Something went wrong, please contact administrator'));
    }
}