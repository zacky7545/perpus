<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dbe6fd; /* Warna latar belakang baru */
            color: #333; /* Warna teks umum */
        }
        .header {
            background-color: #343a40; /* Warna latar belakang header */
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            width: 200px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .card p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .card p a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        footer {
            background-color: #343a40; /* Warna latar belakang footer */
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>PERPUS</h1>
    </div>
    <div class="container">
        <div class="card" style="background-color: #ffc107; color: #333;">
            <h2>PENGARANG</h2>
            <p>
                <a href="http://localhost/perpus/pengarang/">Kunjungi</a>
            </p>
        </div>
        <div class="card" style="background-color: #17a2b8; color: #fff;">
            <h2>FORM PENGARANG</h2>
            <p>
                <a href="http://localhost/perpus/pengarang/form.php/">Kunjungi</a>
            </p>
        </div>
        <div class="card" style="background-color: #28a745; color: #fff;">
            <h2>DATA BUKU</h2>
            <p>
                <a href="http://localhost/perpus/data_table/">Kunjungi</a>
            </p>
        </div>
        <div class="card" style="background-color: #dc3545; color: #fff;">
            <h2>FORM BUKU</h2>
            <p>
                <a href="http://localhost/perpus/data_table/form.php/penerbit_buku.php">Kunjungi</a>
            </p>
        </div>
        <div class="card" style="background-color: #6610f2; color: #fff;">
            <h2>PENERBIT_BUKU</h2>
            <p>
                <a href="http://localhost/perpus/penerbit_buku/">Kunjungi</a>
            </p>
        </div>
        <div class="card" style="background-color: #28a745; color: #fff;">
        <h2>USER MANAGEMENT</h2>
            <p>
                <a href="http://localhost/perpus/user_management/index.php">Kunjungi</a>
              </p>
        </div>
        <div class="card" style="background-color: #6c757d; color: #fff;">
            <h2>FORM PENERBIT</h2>
            <p>
                <a href="http://localhost/perpus/penerbit/form.php">Kunjungi</a>
            </p>
        </div>
    </div>
    <?php
    echo  $_SESSION['username'];
    ?>

    <footer>
        &copy; 2024 Perpus SMK IT AIRLANGGA. All rights reserved.
    </footer>
</body>
</html>



