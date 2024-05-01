<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "sppd";
$mysqli = new mysqli("localhost", "root", "", "sppd");

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Ambil data dari database berdasarkan input pengguna
$sql = "SELECT namakegiatan, norek FROM kegiatan WHERE norek LIKE '%" . $_GET['term'] . "%'";
$result = $mysqli->query($sql);

// Buat array untuk menampung hasil query
$data = array();

// Ambil setiap baris hasil query dan tambahkan ke array data
while ($row = $result->fetch_assoc()) {
    $data[] = array('value' => $row['namakegiatan'], 'label' => $row['norek']);
}

// Konversi array data ke format JSON
echo json_encode($data);

// Tutup koneksi
$mysqli->close();
?>