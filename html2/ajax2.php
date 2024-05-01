<?php
// Koneksi ke database (ganti dengan informasi koneksi sesuai kebutuhan)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sppd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil parameter nama dari URL
$nama = $_GET['nama'];

// Query untuk mendapatkan data berdasarkan nama
$sql = "SELECT nip, pangkat, jabatan FROM data_pegawai WHERE nama = '$nama'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = array(
        'nip' => $row['nip'],
        'pangkat' => $row['pangkat'],
        'jabatan' => $row['jabatan']
    );
    echo json_encode($data);
} else {
    $data = array('nip' => null, 'pangkat' => null, 'jabatan' => null);
    echo json_encode($data);
}

$conn->close();


?>



