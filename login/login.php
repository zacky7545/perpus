<?php 
session_start();
include 'connect.php';

// Jika pengguna sudah login, arahkan ke halaman utama
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: ../index.php");
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($db, "SELECT * FROM login_perpus WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);
if ($cek == 1) {
    // Set variabel sesi untuk menandakan bahwa pengguna telah login
    $_SESSION['logged_in'] = true;
    
    // Simpan username pengguna dalam sesi
    $_SESSION['username'] = $username;
    
    // Redirect ke halaman utama
    header("Location: ../index.php");
    exit();
} else {
    echo "Login Gagal";
}
?>
