<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tgl  = $_POST['tgl'];
$tema  = $_POST['tema'];
$judul  = $_POST['judul'];
$sumber  = $_POST['sumber'];
$lengkap  = $_POST['lengkap'];

mysqli_query($koneksi, "update berita set tgl_berita='$tgl', tema='$tema',judul='$judul', sumber='$sumber', berita_lengkap='$lengkap' where id_berita='$id'") or die(mysqli_error($koneksi));
header("location:berita.php");