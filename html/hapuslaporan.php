<?php 
include"koneksi.php";

$id =$_GET['idlaporan'];

$panggildata= $koneksi-> query("SELECT * FROM laporan WHERE idlaporan='$id'");
$data =$panggildata ->fetch_assoc();

$hapus = $koneksi -> query("DELETE FROM laporan WHERE idlaporan='$id'");
header('location:laporan.php');

?>