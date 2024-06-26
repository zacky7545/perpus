<?php
session_start();
require_once 'connect.php'; // Memanggil file connect.php untuk koneksi ke database

// Inisialisasi variabel error_message
$error_message = '';

// Proses form jika ada POST data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared statement untuk mencari user berdasarkan username
    $sql = "SELECT * FROM `login_perpus` WHERE `username` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Username ditemukan, verifikasi password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password cocok, set session dan redirect ke halaman dashboard
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit;
        } else {
            // Password tidak cocok
            $error_message = "Password yang Anda masukkan salah.";
        }
    } else {
        // Username tidak ditemukan
        $error_message = "Username tidak ditemukan.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .login-container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 10px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .login-container input[type="submit"] {
            background-color: #009879;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-container input[type="submit"]:hover {
            background-color: #007f6e;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login Perpustakaan</h2>

        <?php if (!empty($error_message)) : ?>
            <p class="error-message"><?= $error_message ?></p>
        <?php endif; ?>

        <form method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>
