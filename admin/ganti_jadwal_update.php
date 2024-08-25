<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama_penyiar  = $_POST['nama_penyiar'];
$dari_tgl  = $_POST['dari_tgl'];
$menjadi_tgl  = $_POST['menjadi_tgl'];
$dari_daypart  = $_POST['dari_daypart'];
$menjadi_daypart  = $_POST['menjadi_daypart'];

mysqli_query($koneksi, "update ganti_jadwal set nama_penyiar='$nama_penyiar' , dari_tanggal='$dari_tgl', menjadi_tanggal='$menjadi_tgl', dari_daypart='$dari_daypart',menjadi_daypart='$menjadi_daypart' where id_ganti='$id'") or die(mysqli_error($koneksi));
header("location:ganti_jadwal.php");