<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from ganti_jadwal where id_ganti='$id'");
header("location:ganti_jadwal.php");