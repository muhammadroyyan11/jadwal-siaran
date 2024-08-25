<?php 
include '../koneksi.php';
$nama_grup  = $_POST['nama_grup'];

mysqli_query($koneksi, "insert into grup_kuisioner values (NULL,'$nama_grup')");
header("location:grup_kuisioner.php");