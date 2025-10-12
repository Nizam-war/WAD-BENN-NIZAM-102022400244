<?php
// ===========1============
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$db = "db_tp_modul2";
$port = 3307;

// ===========2============
// Definisikan $conn untuk melakukan koneksi ke database
$conn = new mysqli($host, $username, $password, $db, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
