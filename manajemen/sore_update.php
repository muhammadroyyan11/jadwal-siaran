<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$status  = $_POST['status'];

mysqli_query($koneksi, "update sore set status='$status' where id_sore='$id'") or die(mysqli_error($koneksi));
header("location:sore.php");