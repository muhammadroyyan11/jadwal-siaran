<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from acara where id_acara='$id'");
header("location:acara.php");