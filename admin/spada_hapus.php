<?php 
include '../koneksi.php';
$id  = $_GET['id'];


mysqli_query($koneksi, "delete from spada where id_spada='$id'");
header("location:spada.php");