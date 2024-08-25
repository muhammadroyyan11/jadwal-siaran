<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tgl  = $_POST['tgl'];
$dpa  = $_POST['dpa'];
$dpb  = $_POST['dpb'];
$dpc  = $_POST['dpc'];
$dpd  = $_POST['dpd'];

mysqli_query($koneksi, "update jadwal_penyiar set tgl_jadwal='$tgl', daypart1='$dpa',daypart2='$dpb', daypart3='$dpc', daypart4='$dpd' where id_jadwal='$id'") or die(mysqli_error($koneksi));
header("location:jadwal_penyiar.php");