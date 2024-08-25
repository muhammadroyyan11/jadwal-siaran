<?php 
include '../koneksi.php';
$tgl  = $_POST['tgl'];
$tema  = $_POST['tema'];
$judul  = $_POST['judul'];
$sumber  = $_POST['sumber'];
$lengkap  = $_POST['lengkap'];

mysqli_query($koneksi, "insert into berita values (NULL,'$tgl','$tema','$judul','$sumber','$lengkap')");
header("location:berita.php");