<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from berita where id_berita='$id'");
header("location:berita.php");