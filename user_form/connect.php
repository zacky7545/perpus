<?php
// Konfigurasi koneksi ke database
$host = 'localhost'; // Nama Server
$user = 'root'; // User Server
$password = ''; // Password Server
$database = 'perpus'; // Nama Database

// Melakukan koneksi ke database MySQL
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die('Koneksi ke database gagal: ' . $conn->connect_error);
}

// Atur encoding karakter ke UTF-8 (opsional)
$conn->set_charset("utf8");
?>
