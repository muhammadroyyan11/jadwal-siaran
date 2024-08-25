<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$genre  = $_POST['genre'];
$judul = $_POST['judul'];


mysqli_query($koneksi, "update sound set genre='$genre',judul='$judul' where id_sound='$id'") or die(mysqli_error($koneksi));
header("location:sound.php");