<?php
// Ambil id penerbit dari parameter GET
if (isset($_GET['id'])) {
    $id_penerbit = $_GET['id'];

    // Koneksi ke database
    $db_host = 'localhost'; // Nama Server
    $db_user = 'root'; // User Server
    $db_pass = ''; // Password Server
    $db_name = 'perpus'; // Nama Database

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die ('Gagal terhubung MySQL: ' . mysqli_connect_error());    
    }

    // Query untuk mengambil data penerbit berdasarkan id
    $sql = "SELECT id_penerbit, nama, alamat, telp FROM penerbit_buku WHERE id_penerbit = $id_penerbit";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die ('SQL Error: ' . mysqli_error($conn));
    }

    // Pastikan data ditemukan
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $telp = $row['telp'];
    } else {
        die('Data tidak ditemukan');
    }

    // Membebaskan hasil query
    mysqli_free_result($query);

    // Menutup koneksi
    mysqli_close($conn);
} else {
    die('ID Penerbit tidak ditemukan');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Penerbit</title>
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: calc(100% - 10px);
            padding: 8px;
            font-size: 1em;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #009879;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #007c6e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Penerbit</h2>
        <form action="update.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
            </div>
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" id="telp" name="telp" value="<?php echo htmlspecialchars($telp); ?>" required>
            </div>
            <input type="hidden" name="id_penerbit" value="<?php echo $id_penerbit; ?>">
            <div class="form-group">
                <button type="submit">Simpan Perubahan</button>
                <button type="button" onclick="window.history.back()">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>
