<?php
//Ini untuk koneksi saja
$dbhost= "localhost";
$dbuser= "root";
$dbpassword = "";
$dbname= "perpus";

// Membuat koneksi
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Mengecek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
//Akhir Koneksi

//Pertama ambil data kiriman dari form
$id_user = @$_POST['id_user'];
$username = @$_POST['username'];
$password = @$_POST['password'];

//Kemudian dapat langsung kita simpan dengan query INSERT
$sql_simpan = mysqli_query ($conn, "INSERT into login_perpus (id_user, username, password) VALUES ('$id_user', '$username', '$password')");
if($sql_simpan) {
 echo "Data berhasil disimpan";
} else {
 echo "Data gagal disimpan";
}
?>