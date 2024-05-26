<?php
include "koneksi.php";

// Ambil nilai idsppd dari parameter GET
$id = $_GET['idsppd'];

// Query untuk mengubah status
$queryUpdate = "UPDATE listsppd SET status = 1 WHERE idsppd='$id'";

$resultUpdate = $koneksi->query($queryUpdate);

if ($resultUpdate) {
    // Query untuk mengambil nosppd setelah update berhasil
    $querySelect = "SELECT nosurat FROM listsppd WHERE idsppd='$id'";
    $resultSelect = $koneksi->query($querySelect);

    if ($resultSelect) {
        $data = $resultSelect->fetch_assoc();
        $nosurat = $data['nosurat'];
        $message = "SPPD nomor $nosurat telah di setujui";
        $status = "success";
    } else {
        $message = "Gagal mengambil nosppd: " . $koneksi->error;
        $status = "error";
    }
} else {
    $message = "Gagal mengubah status: " . $koneksi->error;
    $status = "error";
}

// Mengirimkan data ke file JavaScript dengan mengembalikan respons JSON
$response = array(
    'message' => $message,
    'status' => $status
);
echo json_encode($response);
?>
