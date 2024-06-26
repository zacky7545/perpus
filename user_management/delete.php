<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'perpus'; // Nama Database

// Menghubungkan ke database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());    
}

$id_user = $_GET['id']; // Mengambil id_user dari parameter URL

// Query untuk menghapus data user berdasarkan id_user
$sql = "DELETE FROM `login_perpus` WHERE `id_user` = $id_user";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

// Redirect kembali ke halaman utama setelah berhasil menghapus
header('Location: index.php');
exit;

mysqli_close($conn);
?>
