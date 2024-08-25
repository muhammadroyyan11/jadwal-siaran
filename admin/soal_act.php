<?php 
include '../koneksi.php';
$pertanyaan  = $_POST['pertanyaan'];
$grup_id = $_POST['grup_id'];

mysqli_query($koneksi, "insert into survey_description values (NULL,'$pertanyaan','$grup_id')");
header("location:soal_survey.php");