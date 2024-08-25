<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from narasumber where id_narasumber='$id'");
header("location:narasumber.php");