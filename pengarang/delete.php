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
$id_pengarang = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_pengarang !== null) {
    // $query = "INSERT into buku (id_buku, nama_buku, penerbit, tahun_terbit, jumlah, isbn) 
    // VALUES ('$id_buku', '$nama_buku', '$penerbit', '$tahun_terbit', '$jumlah', '$isbn' )";

    // $query = "DELETE FROM pengarang WHERE buku.id_pengarang = '$id_pengarang'";
    $query = "DELETE FROM pengarang WHERE pengarang.id_pengarang = '$id_pengarang'";

    //Kemudian dapat langsung kita simpan dengan query INSERT
    $sql_simpan = mysqli_query($conn, $query);
    if ($sql_simpan) {
        echo "Data berhasil dihapus";
    } else {
        echo "Terjadi kesalahan saat menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID pengarang tidak ditemukan";
}
