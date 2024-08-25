<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from sore where id_sore='$id'");
header("location:sore.php");