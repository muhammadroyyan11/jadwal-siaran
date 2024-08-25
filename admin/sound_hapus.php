<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from sound where id_sound='$id'");
header("location:sound.php");