<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM produk WHERE id_produk = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Data tidak ditemukan</p>";
        echo "<a href='index.php'>Kembali ke halaman utama</a>";
        exit();
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST['id_produk'];
    $nama_Produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $stmt = $conn->prepare("UPDATE produk SET nama_produk = ?, kategori = ?, ukuran = ?, stok = ?, harga = ?,deskripsi = ?, tanggal_masuk = ? WHERE id = ?");
    $stmt->bind_param("ssiiss", $nama_Produk, $kategori, $ukuran, $stok, $harga,$deskripsi, $tanggal_masuk, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id_produk">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('bg/bg.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); 
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin-top: 80px;
        }
        h2 {
            color: #fff;
        }
        label {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2>Edit Data Barang</h2>
        <action="edit_data.php" method="POST">
            <input type="hidden" name="id_produk" value="<?php echo htmlspecialchars($row['id_produk']); ?>">
            
            <div class="mb-3 text-start">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="<?php echo htmlspecialchars($row['nama_produk']); ?>" required>
            </div>
           
            <div class="mb-3 text-start">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="form-control" value="<?php echo htmlspecialchars($row['kategori']); ?>" required>
            </div>

            <div class="mb-3 text-start">
                <label for="ukuran" class="form-label">Ukuran</label>
                <input type="text" id="ukuran" name="ukuran" class="form-control" value="<?php echo htmlspecialchars( $row['ukuran']); ?>" required>   
            </div>

            <div class="mb-3 text-start">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" id="harga" name="harga" class="form-control" value="<?php echo htmlspecialchars($row['harga']); ?>" required>
            </div>

            <div class="mb-3 text-start">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" id="stok" name="stok" class="form-control" value="<?php echo htmlspecialchars($row['stok']); ?>" required>
            </div>

            <div class="mb-3 text-start">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="number" id="deskripsi" name="deskripsi" class="form-control" value="<?php echo htmlspecialchars($row['deskripsi']); ?>" required>
            </div>

            <div class="mb-3 text-start">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="<?php echo htmlspecialchars($row['tanggal_masuk']); ?>" required>
            </div>
            
            <button type="submit" class="btn btn-warning w-100 mt-3">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>
</body>
</html>
