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
$id_pengarang = @$_POST['id_pengarang'];
$nama = @$_POST['nama'];
$alamat = @$_POST['alamat'];
$telp = @$_POST['telp'];
// $query = "INSERT into buku (id_buku, nama_buku, penerbit, tahun_terbit, jumlah, isbn) 
            // VALUES ('$id_buku', '$nama_buku', '$penerbit', '$tahun_terbit', '$jumlah', '$isbn' )";

$query ="UPDATE pengarang SET id_pengarang = '$id_pengarang',nama = '$nama', alamat = '$alamat', telp = '$telp' WHERE pengarang.id_pengarang = '$id_pengarang'";
// UPDATE `buku` SET `jumlah` = '17', 'nama_buku' = $nama_buku WHERE `buku`.`id_buku` = $id_buku;
//Kemudian dapat langsung kita simpan dengan query INSERT
$sql_simpan = mysqli_query ($conn, $query);
if($sql_simpan) {
 echo "Data berhasil disimpan";
} else {
 echo $conn->error;
}