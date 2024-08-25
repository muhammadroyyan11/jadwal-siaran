<?php 
include '../koneksi.php';
$tgl  = $_POST['tgl'];
$daypart  = $_POST['daypart'];
$nama_penyiar  = $_POST['nama_penyiar'];
$evaluasi  = $_POST['evaluasi'];

mysqli_query($koneksi, "insert into evaluasi values (NULL,'$tgl','$daypart','$nama_penyiar','$evaluasi')");
header("location:evaluasi.php");