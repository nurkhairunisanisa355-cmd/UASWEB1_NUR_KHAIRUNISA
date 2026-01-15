<?php
include '../koneksi.php';

$id = $_GET['id'] ?? '';

if ($id != '') {
    // mode EDIT → ambil data dari database
} else {
    // mode TAMBAH → form kosong
}
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }
        .container {
            width: 400px;
            background: white;
            margin: 50px auto;
            padding: 20px;
            border-radius: 6px;
        }
        input, textarea, button {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
        }
        button {
            background: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #2980b9;
        }
        a {
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Customer</h2>

    <form action="update-customer.php" method="post">
        <input type="hidden" name="id_pelanggan" value="<?= $data['id_pelanggan']; ?>">

        <label>Kode Pelanggan</label>
        <input type="text" name="kode_pelanggan" value="<?= $data['kode_pelanggan']; ?>" required>

        <label>Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan']; ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $data['alamat']; ?></textarea>

        <label>No HP</label>
        <input type="text" name="no_hp" value="<?= $data['no_hp']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $data['email']; ?>">

        <button type="submit">Update</button>
        <a href="list-customer.php">Kembali</a>
    </form>
</div>

</body>
</html>
