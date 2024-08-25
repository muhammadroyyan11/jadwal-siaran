<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
error_reporting(0);
include "koneksi.php";
// include "fungsi/fungsi_indotgl.php";
$nama_responden	= $_POST[nama_responden];
$domisili = $_POST[domisili];
$saran		= $_POST[saran];
$created_at			= date('Y-m-d');

// var_dump($_POST);

$no_hitung = 1;
$sql_hitung = mysqli_query($koneksi, "SELECT * FROM grup_kuisioner");
// var_dump($sql_hitung);
while ($data_hitung = mysqli_fetch_array($sql_hitung)) {
	$id_hitung = $data_hitung[id];
	// var_dump($data_hitung);
	$hasil_hitung = mysqli_query($koneksi, "SELECT * FROM survey_description, grup_kuisioner WHERE survey_description.grup_id = '$id_hitung' AND survey_description.grup_id = grup_kuisioner.id ORDER BY grup_kuisioner.id");
	$i_hitung = 1;
	while ($r_hitung = mysqli_fetch_array($hasil_hitung)) {
		$id_hitung = $data_hitung[id];
		$asfa_hitung = $_POST['asfa' . $i_hitung . $id_hitung];

		if (empty($asfa_hitung)) {
			echo "<script lang=javascript>
		 		window.alert('Anda belum mengisi kuisioner atau ada kuisioner yang belum terisi..!');
		 		history.back();
		 		</script>";
			exit;
		}


		$i_hitung++;
	}
	echo "<br>";
	$no_hitung++;
}

if (empty($nama_responden)) {
	echo "<script lang=javascript>
		 		window.alert('Isi Nama Anda');
		 		history.back();
		 		</script>";
	exit;
} elseif (empty($domisili)) {
	echo "<script lang=javascript>
		 		window.alert('Isi Domisili Anda');
		 		history.back();
		 		</script>";
	exit;
} else {
	// var_dump('sini');
	$no = 1;
	$sql = mysqli_query($koneksi, "SELECT * FROM grup_kuisioner");
	// var_dump(mysqli_fetch_array($sql));
	// mysqli_query($koneksi,"INSERT INTO responden(nama,domisili,saran,created_at) VALUES('$nama_responden','$dom	isili','$saran','$created_at')");
	$id_responden = mysqli_query($koneksi, "INSERT INTO responden (nama, domisili, saran, survey_id, created_at) 
VALUES ('$nama_responden','$domisili', '$saran', '1', '$created_at')");

	if ($id_responden) {
		if ($koneksi->affected_rows > 0) {
			// Get the last inserted respondent ID
			$last_insert_id = mysqli_insert_id($koneksi);
			echo "Insert successful! ID: " . $last_insert_id;

			// Fetch the survey group data
			while ($data = mysqli_fetch_array($sql)) {
				$id = $data['id'];  // Correct array key syntax

				$hasil = mysqli_query($koneksi, "SELECT * FROM survey_description, grup_kuisioner 
            WHERE survey_description.grup_id = '$id' AND survey_description.grup_id = grup_kuisioner.id 
            ORDER BY grup_kuisioner.id");

				$i = 1;
				// Loop through the survey results
				while ($r = mysqli_fetch_array($hasil)) {
					$id = $data['id'];  // Correct array key syntax
					$asfa = $_POST['asfa' . $i . $id];

					// Insert the survey result
					if (in_array($asfa, ['A', 'B', 'C', 'D'])) {
						mysqli_query($koneksi, "INSERT INTO hasil_survey (survey_id, responden_id, jawaban) 
                    VALUES('$r[id_survey]', '$last_insert_id', '$asfa')");
					} else {
						mysqli_query($koneksi, "INSERT INTO hasil_survey (survey_id, responden_id, jawaban) 
                    VALUES('$r[id_survey]', '$last_insert_id', '$asfa')");
					}
					$i++;
				}
				echo "<br>";
				$no++;
			}
		} else {
			echo "Insert failed. No rows affected.";
		}
	} else {
		echo "Error: " . mysqli_error($koneksi);
	}

	echo "<center><font face='Tahoma' size='2'>
			Terima kasih </font><br>
			<a href='./survey.php'>
			<button  class='btn btn-lg btn-info'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			</center>";
}

?>