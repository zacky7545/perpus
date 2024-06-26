<style>
    /* Style for form */
    form {
        width: 50%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }

    /* Style for table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Style for table cells */
    td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    /* Style for input fields */
    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; /* Ensure that padding and border are included in the width */
    }

    /* Style for submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Hover effect for submit button */
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<form action="masukkan_pengarang.php" method="post" enctype="multipart/form-data" id="form1">
    <table cellpadding="10" cellspacing="0">
        <tr>
            <td width="16%">NAMA</td>
            <td width="2%">:</td>
            <td width="82%"><input name="nama" type="text" size="20" maxlength="20" value="" required></td>
        </tr>
        <tr>
        <td>Alamat</td>
            <td>:</td>
            <td><input name="alamat" type="text" size="40" maxlength="50" value="" required></td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>:</td>
            <td><textarea name="telp" cols="39" rows="4"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3"><input name="simpan" type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>
