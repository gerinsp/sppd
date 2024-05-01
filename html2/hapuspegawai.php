<?php 
include"koneksi.php";

$id =$_GET['idpegawai'];

$panggildata= $koneksi-> query("SELECT * FROM data_pegawai WHERE idpegawai='$id'");
$data =$panggildata ->fetch_assoc();

$hapus = $koneksi -> query("DELETE FROM data_pegawai Where idpegawai='$id'");
header('location:pegawai.php');

?>