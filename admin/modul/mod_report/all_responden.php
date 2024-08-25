<style>
	.btn {
		display: inline-block;
		padding: 6px 12px;
		font-size: 14px;
		font-weight: normal;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
		background-color: #5cb85c;
		padding: 5px 10px;
		font-size: 12px;
		line-height: 1.5;
		border-radius: 3px;
		margin-top: 10px;
		margin-bottom: 10px;
		color: white;
	}

	@font-face {
		font-family: 'Glyphicons Halflings';

		src: url('../../../fonts/glyphicons-halflings-regular.eot');
		src: url('../../../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../../../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../../../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../../../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../../../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
	}

	.glyphicon {
		position: relative;
		top: 1px;
		display: inline-block;
		font-family: 'Glyphicons Halflings';
		font-style: normal;
		font-weight: normal;
		line-height: 1;

		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}

	.glyphicon-print:before {
		content: "\e045";
	}

	.glyphicon-arrow-left:before {
		content: "\e091";
	}
</style>
<?php
error_reporting(0);


include "../../../koneksi.php";
include "../../../parser-php-version.php";
include "../../../fungsi/fungsi_indotgl.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM survey_description");
$date = date('Y-m-d');
$time = date('H:i:s');
$dateIndo = tgl_indo($date);

// var_dump($hasil);

echo "<center><table border=0 cellpadding=10 cellspacing=5 bgcolor= #e6e6e6>
		<tr >
			<td colspan='8'  bgcolor=#337ab7 style='border: none ;color:white;'>
			<a href='../../rekap_survey.php?module=hasil&sub=laporan'>
			<button style='margin-right:230px;' class='btn'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			<b><font size=5>REKAP KUISIONER RESPONDEN</font></b>
			<button style='margin-left:230px;' class='btn' onclick='window.print()'>
			<span class='glyphicon glyphicon-print'></span> Cetak
		</button>
			</td>
		</tr>
		<tr>
			<td colspan=2>Dicetak : <b>$dateIndo $time</b></td>
		</tr>
		
		<tr>
			<td>
				<table cellpadding=2 border=2 bgcolor='#fff' style='width:100%'>
					<tr>
					<td bgcolor=#c6e1f2 align=center><b>NO</b></td>
					<td bgcolor=#c6e1f2 align=center><b>PERTANYAAN</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN A</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN B</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN C</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN D</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN E</b></td>
					<tr>
		";
$no = 1;
while ($data = mysql_fetch_array($hasil)) {
	$descriptionId = $data[id_survey];
	// $sql = mysql_query("SELECT SUM(jawabanA) As TotalA,
	// 					SUM(jawabanB) As TotalB,
	// 					SUM(jawabanC) As TotalC,
	// 					SUM(jawabanD) As TotalD,
	// 					SUM(jawabanE) As TotalE
	// 					FROM hasil_survey WHERE descriptionId = '$descriptionId'");

	$sql = mysqli_query($koneksi, "SELECT
							T2.pertanyaan,
							SUM(CASE WHEN T1.jawaban = 'A' THEN 1 ELSE 0 END) AS total_A,
							SUM(CASE WHEN T1.jawaban = 'B' THEN 1 ELSE 0 END) AS total_B,
							SUM(CASE WHEN T1.jawaban = 'C' THEN 1 ELSE 0 END) AS total_C,
							SUM(CASE WHEN T1.jawaban = 'D' THEN 1 ELSE 0 END) AS total_D,
							SUM(CASE WHEN T1.jawaban = 'E' THEN 1 ELSE 0 END) AS total_E
						FROM hasil_survey T1
						JOIN survey_description T2 ON T1.survey_id = T2.id_survey
						WHERE survey_id = '$descriptionId'
						GROUP BY T2.pertanyaan;");

	while ($oke = mysql_fetch_array($sql)) {
		echo "<tr valign=top>
			<td align='center'>$no</td>
			<td >$data[pertanyaan]</td>
			<td align='center'>$oke[total_A]</td>
			<td align='center'>$oke[total_B]</td>
			<td align='center'>$oke[total_C]</td>
			<td align='center'>$oke[total_D]</td>
			<td align='center'>$oke[total_E]</td>
		  </tr>";
		$no++;
	}
}
?>