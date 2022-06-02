<?php
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting 
$host	= "localhost";
$user	= "root";
$pass	= "";
$db	= "id18351200_db_mahasiswa";


// $host	= "localhost";
// $user	= "id18351200_sanburn";
// $pass	= "D1m4sk1lL!@#";
// $db	= "id18351200_db_mahasiswa";
// Menggunakan objek mysqli untuk membuat koneksi dan menyimpan nya dalam variabel $mysqli	
$mysqli = new mysqli($host, $user, $pass, $db);

?>