<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'perpus'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());    
}

$sql = 'SELECT id_penerbit, nama, alamat, telp 
        FROM penerbit_buku';
        
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

// Styling CSS untuk tabel
echo '<style>
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1em;
            font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
        .styled-table tbody tr:hover {
            background-color: #ececec;
        }
        .styled-table button {
            padding: 8px 12px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            background-color: #009879;
            color: white;
        }
        .styled-table button:hover {
            background-color: #007c6e;
        }
      </style>';

// Output tabel dengan desain yang baru
echo '<table class="styled-table">
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
                <button class="btn-edit" onclick="editBook(' . $row['id_penerbit'] . ')">Edit</button>
                <button class="btn-delete" onclick="deleteBook(' . $row['id_penerbit'] . ')">Hapus</button>
            </td>
          </tr>';
}

echo '</tbody>
    </table>';

// Membebaskan hasil query
mysqli_free_result($query);

// Menutup koneksi
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
