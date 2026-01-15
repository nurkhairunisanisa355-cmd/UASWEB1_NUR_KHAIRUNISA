<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #1100fc;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #28a745; /* Hijau untuk success */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #218838;
        }
        .btn-edit {
            background: #2980b9;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 12px;
        }
        .btn-edit:hover {
            background: #21618c;
        }
        .btn-hapus {
            background: #c0392b;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 12px;
        }
        .btn-hapus:hover {
            background: #a93226;
        }
    </style>
</head>
<body>
<h3>List Product</h3>
    <a href="pages/tambah-product.php" class="btn">+ Tambah Produk</a>

<table>
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Satuan</th>
        <th>Aksi</th> <!-- Kolom baru untuk aksi -->
    </tr>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM barang");

while ($data = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>".$data['kode_barang']."</td>";
    echo "<td>".$data['nama_barang']."</td>";
    echo "<td>".$data['kategori']."</td>";
    echo "<td>".$data['harga']."</td>";
    echo "<td>".$data['stok']."</td>";
    echo "<td>".$data['satuan']."</td>";
    echo "<td>";
    echo "<a href='pages/edit-product.php?id=".$data['id_barang']."' class='btn-edit'>Edit</a> ";
    echo "<a href='pages/hapus-product.php?id=".$data['id_barang']."' class='btn-hapus' onclick='return confirm(\"Yakin ingin menghapus produk ini?\")'>Hapus</a>";
    echo "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>