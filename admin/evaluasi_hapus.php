<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from evaluasi where evaluasi_id='$id'");
header("location:evaluasi.php");