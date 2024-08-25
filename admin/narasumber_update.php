<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tgl  = $_POST['tgl'];
$nama_narasumber  = $_POST['nama_narasumber'];
$nama_acara  = $_POST['nama_acara'];

mysqli_query($koneksi, "update narasumber set tanggal='$tgl', nama_narasumber='$nama_narasumber',nama_acara='$nama_acara' where id_narasumber='$id'") or die(mysqli_error($koneksi));
header("location:narasumber.php");