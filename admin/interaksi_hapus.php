<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from interaksi where interaksi_id='$id'");
header("location:interaksi.php");