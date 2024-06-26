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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body bgcolor="green">
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form ">
            <header>form login</header>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">		
                <input type="text" name="username" placeholder="Masukkan email">
                <input type="password" name="password" placeholder="Masukkan password">
                <a href="#">Lupa Password</a>
                <input type="submit" name="login" value="login" class="button">
            </form>
            <?php
            // Tampilkan pesan kesalahan jika ada
            if (isset($error_message)) {
                echo '<div style="color: red;">' . $error_message . '</div>';
            }
            ?>
            <div class="signup">
                <span class="signup">Belum punya akun?
                    <a href="http://localhost/perpus/user_management/add.php">daftar</a>
                </span>
            </div>
        </div>

        <span class="signup">Sudah punya akun?
            <label for="check">login</label>
        </span>
    </div>
</body>

</html>
