<?php
include '../koneksi.php';

$id = $_GET['id'] ?? '';

if ($id == '') {
    echo "ID pelanggan tidak ditemukan";
    exit;
}

mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");

header("Location: dashboard.php?page=listcustomers");
exit;
