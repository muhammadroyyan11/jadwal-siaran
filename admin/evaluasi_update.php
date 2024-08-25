<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tgl  = $_POST['tgl'];
$daypart  = $_POST['daypart'];
$nama_penyiar  = $_POST['nama_penyiar'];
$evaluasi  = $_POST['evaluasi'];

mysqli_query($koneksi, "update evaluasi set tgl_evaluasi='$tgl',daypart='$daypart',nama_penyiar='$nama_penyiar',evaluasi='$evaluasi' where evaluasi_id='$id'") or die(mysqli_error($koneksi));
header("location:evaluasi.php");