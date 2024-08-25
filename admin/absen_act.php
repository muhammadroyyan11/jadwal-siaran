<?php 
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_penyiar = $_POST['nama_penyiar'];
  $check_in_time = $_POST['check_in_time'];
  $tanggal = date('Y-m-d');

  $sql = "INSERT INTO absen (nama_penyiar, tanggal, check_in_time) VALUES ('$nama_penyiar', '$tanggal', '$check_in_time')";

  if (mysqli_query($koneksi, $sql)) {
    echo "Kehadiran berhasil disimpan!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
  }

  mysqli_close($koneksi);
}
?>
