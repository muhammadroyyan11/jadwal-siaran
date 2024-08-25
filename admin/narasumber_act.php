<?php 
include '../koneksi.php';
$tgl  = $_POST['tgl'];
$nama_narasumber  = $_POST['nama_narasumber'];
$nama_acara  = $_POST['nama_acara'];

mysqli_query($koneksi, "insert into narasumber values (NULL,'$tgl','$nama_narasumber','$nama_acara')");
header("location:narasumber.php");