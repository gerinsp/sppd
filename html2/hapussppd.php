<?php 
include"koneksi.php";

$id =$_GET['idsppd'];

$panggildata= $koneksi-> query("SELECT * FROM listsppd WHERE idsppd='$id'");
$data =$panggildata ->fetch_assoc();

$hapus = $koneksi -> query("DELETE FROM listsppd WHERE idsppd='$id'");
header('location:listsppd.php');

?>