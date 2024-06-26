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
$id_penerbit = @$_POST['id_penerbit'];
$nama = @$_POST['nama'];
$alamat = @$_POST['alamat'];
$telp = @$_POST['telp'];
// $query = "INSERT into buku (id_buku, nama_buku, penerbit, tahun_terbit, jumlah, isbn) 
            // VALUES ('$id_buku', '$nama_buku', '$penerbit', '$tahun_terbit', '$jumlah', '$isbn' )";

$query ="UPDATE penerbit_buku SET id_penerbit = '$id_penerbit',nama = '$nama', alamat = '$alamat', telp = '$telp' WHERE penerbit_buku.id_penerbit = '$id_penerbit'";
// UPDATE `buku` SET `jumlah` = '17', 'nama_buku' = $nama_buku WHERE `buku`.`id_buku` = $id_buku;
//Kemudian dapat langsung kita simpan dengan query INSERT
$sql_simpan = mysqli_query ($conn, $query);
if($sql_simpan) {
 echo "Data berhasil disimpan";
} else {
 echo $conn->error;
}