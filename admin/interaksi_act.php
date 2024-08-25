<?php 
include '../koneksi.php';
$tgl  = $_POST['tgl'];
$nama  = $_POST['nama'];
$platform  = $_POST['platform'];
$interaksi  = $_POST['interaksi'];

mysqli_query($koneksi, "insert into interaksi values (NULL,'$tgl','$nama','$platform','$interaksi')");
header("location:interaksi.php");