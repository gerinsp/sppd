<?php 
session_start();
session_destroy();
header('location:/SPPD/index.php');
?>