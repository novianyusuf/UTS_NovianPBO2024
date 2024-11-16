<?php
include('koneksi.php');
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>id_produk</th><th>nama_produk</th><th>kategori</th><th>ukuran</th><th>harga</th><th>stok</th><th>deskripsi</th><th>tanggal_masuk</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_produk"] . "</td>";
        echo "<td>" . $row["nama_produk"] . "</td>";
        echo "<td>" . $row["kategori"] . "</td>";
        echo "<td>". $row["ukuran"] . "</td>";
        echo "<td>". $row["harga"] ."</td>" ;
        echo "<td>". $row["stok"] ."</td>";
        echo "<td>". $row["deskripsi"] ."</td>";
        echo "<td>". $row["tanggal_masuk"] ."</td>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan";
}

$conn->close();
?>
