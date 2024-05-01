<?php 
include"koneksi.php";

$id =$_GET['idkegiatan'];

$panggildata= $koneksi-> query("SELECT * FROM kegiatan WHERE idkegiatan='$id'");
$data =$panggildata ->fetch_assoc();

$hapus = $koneksi -> query("DELETE FROM kegiatan Where idkegiatan='$id'");
header('location:kegiatan.php');

?>