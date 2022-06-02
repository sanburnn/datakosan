<?php

$dbConn = mysqli_connect("localhost", "root", "", "id18351200_db_mahasiswa") or die('Mysql connect failed '. mysqli_connect_error());
function dbQuery($sql){
    global $dbConn;
    $result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
    return $result;

}

function dbFetchAssoc($result){
    return mysqli_fetch_assoc($result);

}
function dbNumRows($result){
    return mysqli_num_rows($result);
}
function closeConn(){
    global $dbConn;
    mysqli_close($dbConn);
}
//<=======================================================================>
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting 
// $host	= "localhost";
// $user	= "root";
// $pass	= "";
// $db	= "id18351200_db_mahasiswa";


// $host	= "localhost";
// $user	= "id18351200_sanburn";
// $pass	= "D1m4sk1lL!@#";
// $db	= "id18351200_db_mahasiswa";
//Menggunakan objek mysqli untuk membuat koneksi dan menyimpan nya dalam variabel $mysqli	
// $mysqli = new mysqli($host, $user, $pass, $db);
//<=======================================================================>
?>
