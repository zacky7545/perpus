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
$id_buku = @$_POST['id_buku'];
$nama_buku = @$_POST['nama_buku'];
$penerbit = @$_POST['penerbit'];
$tahun_terbit = @$_POST['tahun_terbit'];
$jumlah = @$_POST['jumlah'];
$isbn = @$_POST['isbn'];

// $query = "INSERT into buku (id_buku, nama_buku, penerbit, tahun_terbit, jumlah, isbn) 
            // VALUES ('$id_buku', '$nama_buku', '$penerbit', '$tahun_terbit', '$jumlah', '$isbn' )";

$query ="UPDATE buku SET jumlah = '$jumlah', nama_buku = '$nama_buku', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', jumlah = '$jumlah', isbn = '$isbn' WHERE buku.id_buku = '$id_buku'";
// UPDATE `buku` SET `jumlah` = '17', 'nama_buku' = $nama_buku WHERE `buku`.`id_buku` = $id_buku;
//Kemudian dapat langsung kita simpan dengan query INSERT
$sql_simpan = mysqli_query ($conn, $query);
if($sql_simpan) {
 echo "Data berhasil disimpan";
} else {
 echo $conn->error;
}