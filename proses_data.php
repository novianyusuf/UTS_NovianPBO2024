<?php
include 'koneksi.php';

$action = $_GET['action'];

if ($action == 'create') {
    $id_produk = $_POST['id_produk'];
    $nama_Produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $query = "INSERT INTO produk (id_produk, nama_produk, kategori, ukuran, harga, stok, deskripsi, tanggal_masuk) VALUES ('$id_produk, '$nama_produk', '$kategori', ''$ukuran', '$harga', '$stok','$deskripsi', '$tanggal_masuk')";
    $conn->query($query);

    header("Location: index.php");
} elseif ($action == 'delete') {
    $id = $_GET['id'];
    $query = "DELETE FROM produk WHERE id_produk = $id_produk";
    $conn->query($query);

    header("Location: index.php");
}
?>