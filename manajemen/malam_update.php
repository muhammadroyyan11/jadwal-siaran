<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$status  = $_POST['status'];

mysqli_query($koneksi, "update malam set status='$status' where id_malam='$id'") or die(mysqli_error($koneksi));
header("location:malam.php");