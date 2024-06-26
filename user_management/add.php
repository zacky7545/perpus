<?php
// Koneksi ke database
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'perpus'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());    
}

// Proses form jika ada POST data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk menambahkan data baru ke tabel login_perpus
    $insert_sql = "INSERT INTO `login_perpus` (`username`, `password`) VALUES ('$username', '$password')";
    $insert_query = mysqli_query($conn, $insert_sql);

    if (!$insert_query) {
        die ('SQL Error: ' . mysqli_error($conn));
    }

    // Redirect kembali ke halaman utama setelah berhasil menambahkan data
    header('Location: index.php');
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Data User</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        padding: 20px;
    }

    .form-container {
        max-width: 600px;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container label {
        display: block;
        margin-bottom: 10px;
    }

    .form-container input[type="text"], .form-container input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
    }

    .form-container input[type="submit"] {
        background-color: #009879;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-container input[type="submit"]:hover {
        background-color: #007f6e;
    }
</style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Data User</h2>
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" value="Simpan Data">
    </form>
</div>

</body>
</html>
