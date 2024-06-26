<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "peminjaman buku";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {

  $_SESSION['username'] = $username;

  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
id_peminjam INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tanggal_pinjam date  NOT NULL,
tanggal_kembali date NOT NULL,
anggota_id INT(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>