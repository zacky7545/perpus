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

// Query untuk mengambil data dari tabel login_perpus
$sql = 'SELECT * FROM `login_perpus`';
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Login Perpustakaan</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        padding: 20px;
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
    }

    .styled-table thead th {
        background-color: #009879;
        color: #ffffff;
        font-weight: bold;
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .styled-table tbody td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .styled-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .styled-table tbody tr:hover {
        background-color: #ddd;
    }

    .styled-table tbody td.actions {
        text-align: center;
    }

    .styled-table .edit-btn, .styled-table .delete-btn {
        display: inline-block;
        padding: 5px 10px;
        background-color: #009879;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
        margin-right: 5px;
    }

    .styled-table .edit-btn:hover, .styled-table .delete-btn:hover {
        background-color: #007f6e;
    }

    .add-btn {
        background-color: #009879;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        display: block;
        width: 120px;
        margin: 20px auto;
        text-align: center;
    }

    .add-btn:hover {
        background-color: #007f6e;
    }
</style>
</head>
<body>

<h2>Data Login Perpustakaan</h2>

<!-- Tombol Add untuk menuju ke halaman add.php -->
<a href="add.php" class="add-btn">Add User</a>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID USER</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Menampilkan data dari database ke dalam tabel
        while ($row = mysqli_fetch_array($query)) {
            echo '<tr>
                    <td>'.$row['id_user'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['password'].'</td>
                    <td class="actions">
                        <a href="edit.php?id='.$row['id_user'].'" class="edit-btn">Edit</a>
                        <a href="delete.php?id='.$row['id_user'].'" class="delete-btn">Delete</a>
                    </td>
                </tr>';
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
// Membebaskan hasil query
mysqli_free_result($query);

// Menutup koneksi database hanya jika koneksi telah berhasil dibuka sebelumnya
if ($conn) {
    mysqli_close($conn);
}
?>
