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

// Mengambil id_user dari parameter URL
$id_user = $_GET['id'];

// Query untuk mengambil data user berdasarkan id_user
$sql = "SELECT * FROM `login_perpus` WHERE `id_user` = $id_user";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

// Memeriksa apakah data user ditemukan
if (mysqli_num_rows($query) == 1) {
    $user = mysqli_fetch_assoc($query); // Mendapatkan data user dalam bentuk array asosiatif
} else {
    die('User tidak ditemukan.');
}

// Proses form edit jika ada POST data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    // Query untuk melakukan update data user
    $update_sql = "UPDATE `login_perpus` SET `username` = '$new_username', `password` = '$new_password' WHERE `id_user` = $id_user";
    $update_query = mysqli_query($conn, $update_sql);

    if (!$update_query) {
        die ('SQL Error: ' . mysqli_error($conn));
    }

    // Redirect kembali ke halaman utama setelah berhasil mengedit
    header('Location: index.php');
    exit;
}

mysqli_free_result($query);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data User</title>
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
    <h2>Edit Data User</h2>
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
        </div>
        <input type="submit" value="Simpan Perubahan">
    </form>
</div>

</body>
</html>
