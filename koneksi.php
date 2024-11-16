<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "novian_pbo2024";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
