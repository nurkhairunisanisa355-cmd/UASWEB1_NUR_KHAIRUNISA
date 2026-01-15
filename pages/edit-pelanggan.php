<?php
include "../koneksi.php";

// ambil id dari URL
$id = $_GET['id'] ?? '';


// ambil data pelanggan berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_assoc($query);


// proses update
if (isset($_POST['update'])) {
    $kode   = $_POST['kode_pelanggan'];
    $nama   = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    $update = mysqli_query($koneksi, "
        UPDATE pelanggan SET
            kode_pelanggan='$kode',
            nama_pelanggan='$nama',
            alamat='$alamat',
            no_hp='$no_hp',
            email='$email'
        WHERE id_pelanggan='$id'
    ");

    if ($update) {
        // kembali ke list customer di dashboard
        header("Location: list-customer.php");
        exit;
    } else {
        echo "Gagal mengupdate data!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }
        .container {
            width: 450px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 6px;
        }
        h2 {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 12px;
        }
        button {
            padding: 10px 15px;
            background: #3498db;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #2980b9;
        }
        .btn-back {
            display: inline-block;
            margin-top: 10px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Pelanggan</h2>

    <form method="POST">
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

        <button type="submit" name="update">Update</button>
    </form>

 <a href="../dashboard.php" class="btn-back">⬅ Kembali ke Dashboard</a></div>

</body>
</html>
