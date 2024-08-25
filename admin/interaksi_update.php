<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tgl  = $_POST['tgl'];
$nama  = $_POST['nama'];
$platform  = $_POST['platform'];
$interaksi  = $_POST['interaksi'];

mysqli_query($koneksi, "update interaksi set tanggal='$tgl', nama_pendengar='$nama',jenis_platform='$platform', interaksi='$interaksi' where interaksi_id='$id'") or die(mysqli_error($koneksi));
header("location:interaksi.php");