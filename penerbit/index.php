<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'perpus'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}
//  TODO; tampilkan column yang lain
$sql = 'SELECT * FROM `penerbit`';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
// TODO: TAMPILKAN COLUMN DENGAN NAMA UPPERCASE 
echo '<table>
		<thead>
			<tr>
				<th>ID PENERBIT</th>
				<th>NAMA</th>
                <th>ALAMAT</th>
                <th>TELP</th>
			</tr>
		</thead>
		<tbody>';      
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['id_penerbit'].'</td>
			<td>'.$row['nama'].'</td>
            <td>'.$row['alamat'].'</td>
            <td>'.$row['telp'].'</td>
		</tr>';
}
echo '
	</tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($conn);