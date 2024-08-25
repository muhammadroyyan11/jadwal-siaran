<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from jadwal_penyiar where id_jadwal='$id'");
header("location:jadwal_penyiar.php");