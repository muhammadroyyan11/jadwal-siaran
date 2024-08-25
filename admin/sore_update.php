<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tgl  = $_POST['tgl'];
$waktu_mulai  = $_POST['waktu_mulai'];
$waktu_selesai  = $_POST['waktu_selesai'];
$nama_penyiar  = $_POST['nama_penyiar'];
$nama_narasumber  = $_POST['nama_narasumber'];
$nama_acara  = $_POST['nama_acara'];
$topik  = $_POST['topik'];
$status  = $_POST['status'];

mysqli_query($koneksi, "update sore set tanggal='$tgl', waktu_mulai='$waktu_mulai', waktu_selesai='$waktu_selesai', nama_penyiar='$nama_penyiar', nama_narasumber='$nama_narasumber',nama_acara='$nama_acara', topik='$topik', status='$status' where id_sore='$id'") or die(mysqli_error($koneksi));
header("location:sore.php");