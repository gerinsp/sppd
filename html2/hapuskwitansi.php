<?php 
include"koneksi.php";

$id =$_GET['idkwitansi'];

$panggildata= $koneksi-> query("SELECT * FROM kwitansi WHERE idkwitansi='$id'");
$data =$panggildata ->fetch_assoc();

$hapus = $koneksi -> query("DELETE FROM kwitansi WHERE idkwitansi='$id'");
header('location:rincian.php');

?>