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
            background-color: #f8f9fa; /* Warna latar belakang */
            color: #333; /* Warna teks umum */
        }

        /* Style untuk form */
        form {
            width: 50%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            background-color: #fff; /* Warna latar belakang form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Style untuk sel tabel */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Style untuk input fields */
        input[type="text"],
        textarea {
            width: calc(100% - 16px); /* 100% width minus padding and border */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensure that padding and border are included in the width */
            margin-bottom: 10px;
            transition: border-color 0.3s ease;
        }

        /* Style untuk input fields saat di-hover */
        input[type="text"]:hover,
        textarea:hover {
            border-color: #007bff;
        }

        /* Style untuk tombol submit */
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Hover effect untuk tombol submit */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1></h1>
    </div>
    <form action="add.php" method="post" enctype="multipart/form-data" id="form1">
        <table cellpadding="10" cellspacing="0">
            <tr>
                <td width="16%">ID_BUKU</td>
                <td width="2%">:</td>
                <td width="82%"><input name="id_buku" type="text" size="20" maxlength="20" value="" required></td>
            </tr>
            <tr>
                <td>NAMA_BUKU</td>
                <td>:</td>
                <td><input name="nama_buku" type="text" size="40" maxlength="50" value="" required></td>
            </tr>
            <tr>
                <td>PENERBIT</td>
                <td>:</td>
                <td><input name="penerbit" type="text" size="40" maxlength="50" value="" required></td>
            </tr>
            <tr>
                <td>TAHUN_TERBIT</td>
                <td>:</td>
                <td><input name="tahun_terbit" type="text" size="40" maxlength="50" value="" required></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td>:</td>
                <td><input name="jumlah" type="text" size="40" maxlength="50" value="" required></td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td>:</td>
                <td><input name="isbn" type="text" size="40" maxlength="50" value="" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3" style="text-align: center;"><input name="simpan" type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
