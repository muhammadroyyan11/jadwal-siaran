<?php 
include '../koneksi.php';
$nama_acara  = $_POST['nama_acara'];
$durasi = $_POST['durasi'];

mysqli_query($koneksi, "insert into acara values (NULL,'$nama_acara','$durasi')");
header("location:acara.php");