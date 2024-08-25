<?php 
include '../koneksi.php';
$tgl  = $_POST['tgl'];
$waktu_mulai  = $_POST['waktu_mulai'];
$waktu_selesai  = $_POST['waktu_selesai'];
$nama_penyiar  = $_POST['nama_penyiar'];
$nama_narasumber  = $_POST['nama_narasumber'];
$nama_acara  = $_POST['nama_acara'];
$topik  = $_POST['topik'];
$status  = $_POST['status'];

mysqli_query($koneksi, "insert into malam values (NULL,'$tgl','$waktu_mulai','$waktu_selesai','$nama_penyiar','$nama_narasumber','$nama_acara','$topik','$status')");
header("location:malam.php");