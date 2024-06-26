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
$id_penngarang = @$_POST['id_pengarang'];
$nama = @$_POST['nama'];
$alamat = @$_POST['alamat'];
$telp = @$_POST['telp'];


//Kemudian dapat langsung kita simpan dengan query INSERT
$sql_simpan = mysqli_query ($conn, "INSERT into pengarang (id_pengarang, nama, alamat, telp) VALUES ('$id_penagarang', '$nama', '$alamat', '$telp' )");
if($sql_simpan) {
 echo "Data berhasil disimpan";
} else {
 echo $conn->error;
}