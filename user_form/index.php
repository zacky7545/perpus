<?php
session_start();

// Check jika form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang di-submit dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_host = 'localhost'; // Nama Server
    $db_user = 'root'; // User Server
    $db_pass = ''; // Password Server
    $db_name = 'perpus'; // Nama Database
    
    // Menghubungkan ke database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die ('Gagal terhubung MySQL: ' . mysqli_connect_error());
    }

    // Query untuk mencari pengguna berdasarkan username
    $query = "SELECT username, password FROM login_perpus WHERE username = $username";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare statement error: ' . $conn->error);
    }

    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    // Bind hasil query ke variabel
    $stmt->bind_result($db_username, $db_password);
    $stmt->fetch();

    // Periksa apakah username yang dimasukkan ada di database dan cocok dengan password
    if ($stmt->num_rows == 1 && password_verify($password, $db_password)) {
        // Jika sesuai, set variabel sesi 'logged_in' ke true
        $_SESSION['logged_in'] = true;

        // Redirect ke halaman utama atau halaman selanjutnya setelah login sukses
        header("Location: ../index.php");
        exit;
    } else {
        // Jika tidak sesuai, beri pesan kesalahan
        $error_message = "Username atau password salah.";
    }

    // Tutup statement dan koneksi database
    $stmt->close();
    $conn->close();
}
?>
