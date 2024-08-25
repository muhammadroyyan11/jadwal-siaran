<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from malam where id_malam='$id'");
header("location:malam.php");