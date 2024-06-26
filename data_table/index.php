<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'perpus'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());    
}

$sql = 'SELECT id_buku, nama_buku, penerbit, tahun_terbit, jumlah, isbn 
        FROM buku';
        
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .btn-edit, .btn-delete {
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-edit:hover, .btn-delete:hover {
            background-color: #45a049;
        }
      </style>';

echo '

<button class="btn-edit" ><a href="http://localhost/perpus/data_table/form.php/">tambahkan</a></button>

<table>
        <thead>
            <tr>
                <th>ID BUKU</th>
                <th>NAMA BUKU</th>
                <th>PENERBIT</th>
                <th>TAHUN TERBIT</th>
                <th>JUMLAH</th>
                <th>ISBN</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_array($query)) {
    echo '<tr>
            <td>' . $row['id_buku'] . '</td>
            <td>' . $row['nama_buku'] . '</td>
            <td>' . $row['penerbit'] . '</td>
            <td>' . $row['tahun_terbit'] . '</td>
            <td>' . $row['jumlah'] . '</td>
            <td>' . $row['isbn'] . '</td>
            <td>
                <button class="btn-edit" onclick="editBook(' . $row['id_buku'] . ')">Edit</button>
                <button class="btn-delete" onclick="deleteBook(' . $row['id_buku'] . ')">Hapus</button>
            </td>
          </tr>';
}

echo '</tbody>
    </table>';

mysqli_free_result($query);
mysqli_close($conn);
?>

<script>
    function editBook(bookId) {
        // Implementasi logika untuk mengedit buku dengan ID tertentu
        // Contoh: redirect ke halaman edit dengan ID buku yang dipilih
        window.location.href = 'form-edit.php?id=' + bookId;
    }

    function deleteBook(bookId) {
        // Implementasi logika untuk menghapus buku dengan ID tertentu
        // Contoh: konfirmasi penghapusan dan kirim request ke server untuk menghapus
        var confirmation = confirm('Anda yakin ingin menghapus buku ini?');
        if (confirmation) {
            window.location.href = 'delete.php?id=' + bookId;
            // Kirim request ke server untuk menghapus buku
            // Anda bisa menggunakan AJAX untuk mengirim request tanpa memuat ulang halaman
            // Contoh: menggunakan fetch API atau jQuery AJAX
            // Setelah berhasil menghapus, reload halaman atau hapus baris tabel secara dinamis
        }
    }
</script>

