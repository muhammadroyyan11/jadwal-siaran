<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$status  = $_POST['status'];

mysqli_query($koneksi, "update siang set status='$status' where id_siang='$id'") or die(mysqli_error($koneksi));
header("location:siang.php");