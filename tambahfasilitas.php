<?php


//===========================================

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include 'koneksi.php'; // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
	
$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];
$idfutsalap=$_POST['idfutsalap'];
$nama=$_POST['nama'];
$deskripsi=$_POST['deskripsi'];
		
if(empty($fileName))
{
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$upload_path = 'fotofasilitas/'; // set upload folder path 
	
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $fileName))
		{
			// check file size '5MB'
			if($fileSize < 5000000){
				move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
			}
			else{		
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}
	}
	else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$query = mysqli_query($dbConn,'INSERT into fasilitas (idfutsalap,nama,foto,deskripsi) VALUES("'.$idfutsalap.'","'.$nama.'","'.$fileName.'","'.$deskripsi.'")');
			
	echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	
}
// /**
// * Author : https://www.roytuts.com
// */

// require_once 'koneksi.php';

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // get posted data
//     $idfutsalap=$_POST['idfutsalap'];
//     $nama=$_POST['nama'];
//     $deskripsi=$_POST['deskripsi'];
    
    

//     $nama_file = $_FILES['uploadgambar']['name'];
//     $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
//     $random = crypt($nama_file, time());
//     $ukuran_file = $_FILES['uploadgambar']['size'];
//     $tipe_file = $_FILES['uploadgambar']['type'];
//     $tmp_file = $_FILES['uploadgambar']['tmp_name'];
//     $path = "../fotofasilitas/".$random.'.'.$ext;
//     $pathdb = "fotofasilitas/".$random.'.'.$ext;

//     // $data = json_decode(file_get_contents("php://input", true));
//     if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
//         if($ukuran_file <= 5000000){
//             if(move_uploaded_file($tmp_file, $path)){
//                 $sql = "INSERT INTO fasilitas(idfutsalap, nama, foto, deskripsi) VALUES('$idfutsalap','$nama','$pathdb','$deskripsi')";
    
//                 $result = dbQuery($sql);
//                 if($result) {
//                     //*Add this untuk membuat json lebih bagus
//                     $response = array('success' => 'Sukses Menambah Data');
//                     header('Content-Type: application/json');
//                     echo json_encode($response);
//                     //===================================
//                 } else {
//                     $response = array('success' => 'Error');
//                     header('Content-Type: application/json');
//                     echo json_encode($response);
//                 }
//             }else{
//                 $response = array('success' => 'Eror ga ero');
//                     header('Content-Type: application/json');
//                     echo json_encode($response);
//             }
//         }else{
//             $response = array('success' => 'Foto Tidak lebih dari 1 MB');
//                     header('Content-Type: application/json');
//                     echo json_encode($response);
//         }
//     }else{
//         $response = array('success' => 'Foto Harus Mengunakan Format JPG/PNG');
//                     header('Content-Type: application/json');
//                     echo json_encode($response);
//     }
    
  
    
// }
?>



