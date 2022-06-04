<?php
require_once "koneksiuser.php";
require_once 'koneksi.php';
require_once 'jwt_utils.php';
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: GET");


class Mahasiswa 
{

	public  function get_mhss()
	{
		global $mysqli;
		$query="SELECT * FROM tbl_mahasiswa";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Mahasiswa Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	

	public function get_mhs($id=0)
	{
		global $mysqli;
		$query="SELECT * FROM tbl_mahasiswa";
		if($id != 0)
		{
			$query.=" WHERE id=".$id." LIMIT 1";
		}
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get Mahasiswa Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
		 
	}

	public function insert_mhs()
		{
			global $mysqli;
			$arrcheckpost = array('nim' => '', 'nama' => '', 'jk' => '', 'alamat' => '', 'jurusan'   => '');
			$hitung = count(array_intersect_key($_POST, $arrcheckpost));
			if($hitung == count($arrcheckpost)){
			
					$result = mysqli_query($mysqli, "INSERT INTO tbl_mahasiswa SET
					nim = '$_POST[nim]',
					nama = '$_POST[nama]',
					jk = '$_POST[jk]',
					alamat = '$_POST[alamat]',
					jurusan = '$_POST[jurusan]'");
					
					if($result)
					{
						$response=array(
							'status' => 1,
							'message' =>'Mahasiswa Added Successfully.'
						);
					}
					else
					{
						$response=array(
							'status' => 0,
							'message' =>'Mahasiswa Addition Failed.'
						);
					}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match'
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	function update_mhs($id)
		{
			global $mysqli;
			$arrcheckpost = array('nim' => '', 'nama' => '', 'jk' => '', 'alamat' => '', 'jurusan'   => '');
			$hitung = count(array_intersect_key($_POST, $arrcheckpost));
			if($hitung == count($arrcheckpost)){
			
		        $result = mysqli_query($mysqli, "UPDATE tbl_mahasiswa SET
		        nim = '$_POST[nim]',
		        nama = '$_POST[nama]',
		        jk = '$_POST[jk]',
		        alamat = '$_POST[alamat]',
		        jurusan = '$_POST[jurusan]'
		        WHERE id='$id'");
		   
				if($result)
				{
					$response=array(
						'status' => 1,
						'message' =>' Updated Successfully.'
					);
				}
				else
				{
					$response=array(
						'status' => 0,
						'message' =>' Updation Failed.'
					);
				}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match'
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	function delete_mhs($id)
	{
		global $mysqli;
		$query="DELETE FROM tbl_mahasiswa WHERE id=".$id;
		if(mysqli_query($mysqli, $query))
		{
			$response=array(
				'status' => 1,
				'message' =>'Mahasiswa Deleted Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'message' =>'Mahasiswa Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

class Propreti {

	public function get_prop()
	{
		global $mysqli;
		$query="SELECT * FROM tbl_properti";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'message'=>'get sukses',
							'data' => $data
		);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
class Futsal {
	
	public function get_futsal(){
		global $mysqli;
		$query="SELECT * FROM user";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;

		}
		$response=array(
			'message'=>'succes',
			'data'=> $data
		);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function insert_transaksi()
		{
			require_once 'koneksi.php';
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				// get posted data
				$idfutsal=$_POST['idfutsal'];
				$nama=$_POST['nama'];
				$notelp=$_POST['notelp'];
				$tanggal=$_POST['tanggal'];
				$jam=$_POST['jam'];
				$satatus=$_POST['satatus'];
				$data = json_decode(file_get_contents("php://input", true));
				
				$sql = "INSERT INTO transaksi(idfutsal, nama, notelp, tanggal, jam, satatus) VALUES('$idfutsal','$nama','$notelp','$tanggal','$jam','$satatus')";
				
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
		}}
	public function get_transaksiadmin($id=0)
	{
	
		global $mysqli;
		$query="SELECT * FROM transaksi";
		if($id != 0)
		{
			$query.=" WHERE idfutsal= ".$id;
		}
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get Transaksi SUcces.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);

	}
	function update_transaksi($id)
	{
		require_once 'koneksi.php';
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// get posted data
			
			$satatus=$_POST['satatus'];
			$data = json_decode(file_get_contents("php://input", true));
			
			$sql = "UPDATE transaksi SET satatus =('$satatus') WHERE id_transaksi='$id'";
			
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
	}}

	
}

 ?>