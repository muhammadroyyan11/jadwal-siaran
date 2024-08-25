<?php 
include '../koneksi.php';
$genre  = $_POST['genre'];
$judul = $_POST['judul'];

mysqli_query($koneksi, "insert into sound values (NULL,'$genre','$judul')");
header("location:sound.php");