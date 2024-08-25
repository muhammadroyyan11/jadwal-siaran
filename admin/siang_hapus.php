<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from siang where id_siang='$id'");
header("location:siang.php");