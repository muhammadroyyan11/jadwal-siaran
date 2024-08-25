<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama_acara  = $_POST['nama_acara'];
$durasi  = $_POST['durasi'];

mysqli_query($koneksi, "update acara set nama_acara='$nama_acara',durasi='$durasi' where id_acara='$id'") or die(mysqli_error($koneksi));
header("location:acara.php");