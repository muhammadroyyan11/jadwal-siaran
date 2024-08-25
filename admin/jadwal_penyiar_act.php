<?php 
include '../koneksi.php';
$tgl  = $_POST['tgl'];
$dpa  = $_POST['dpa'];
$dpb  = $_POST['dpb'];
$dpc  = $_POST['dpc'];
$dpd  = $_POST['dpd'];

mysqli_query($koneksi, "insert into jadwal_penyiar values (NULL,'$tgl','$dpa','$dpb','$dpc','$dpd')");
header("location:jadwal_penyiar.php");