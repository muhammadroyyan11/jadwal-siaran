<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$status  = $_POST['status'];

mysqli_query($koneksi, "update spada set status='$status' where id_spada='$id'") or die(mysqli_error($koneksi));
header("location:spada.php");