<?php 
include '../koneksi.php';
$tgl_pengajuan = $_POST['tgl_pengajuan'];
$nama_penyiar  = $_POST['nama_penyiar'];
$dari_tgl  = $_POST['dari_tgl'];
$menjadi_tgl  = $_POST['menjadi_tgl'];
$dari_daypart  = $_POST['dari_daypart'];
$menjadi_daypart  = $_POST['menjadi_daypart'];

mysqli_query($koneksi, "insert into ganti_jadwal values (NULL,'$tgl_pengajuan','$nama_penyiar','$dari_tgl','$menjadi_tgl','$dari_daypart','$menjadi_daypart')");
header("location:ganti_jadwal.php");