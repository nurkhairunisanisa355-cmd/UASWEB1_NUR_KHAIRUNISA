<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            padding: 20px;
        }

        h2 {
            margin-bottom: 15px;
        }

        /* Tombol tambah */
        .btn-tambah {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 16px;
            background: #27ae60;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-tambah:hover {
            background: #219150;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #eaeaea;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Pelanggan</h2>

    <!-- Tombol Tambah Customer -->
   <a href="pages/tambah-customer.php" class="btn-tambah">+ Tambah Customer</a>


    <table>
        <tr>
            <th>No</th>
            <th>Kode Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
        </tr>

        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['kode_pelanggan']; ?></td>
            <td><?= $data['nama_pelanggan']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['no_hp']; ?></td>
            <td><?= $data['email']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
