<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'perpus'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());    
}

$sql = 'SELECT id_pengarang, nama, alamat, telp 
        FROM pengarang';
        
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f8f9fa; /* Warna latar belakang tabel */
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Gaya untuk tombol */
        button {
            background-color: #007bff; /* Warna latar belakang tombol */
            color: #fff; /* Warna teks tombol */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        button:hover {
            background-color: #0056b3; /* Warna latar belakang tombol saat dihover */
        }
      </style>';

// Tombol Add di luar tabel
echo '<button onclick="addBook()">Add</button>';

echo '<table>
        <thead>
            <tr>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>TELP</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_array($query)) {
    echo '<tr>
            <td>' . $row['nama'] . '</td>
            <td>' . $row['alamat'] . '</td>
            <td>' . $row['telp'] . '</td>
            <td>
            <button class="btn-edit" onclick="editBook(' . $row['id_pengarang'] . ')">Edit</button>
            <button class="btn-delete" onclick="deleteBook(' . $row['id_pengarang'] . ')">Hapus</button>
        </td>
          </tr>';
}

echo '</tbody>
    </table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
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

    function addBook() {
        // Implementasi logika untuk menuju ke halaman tambah buku
        window.location.href = 'form.php';
    }
</script>
