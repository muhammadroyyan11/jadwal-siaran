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
if ($_GET['act'] == 'detail') {
	error_reporting(1);
	session_start();


	include "../../../koneksi.php";
	include "../../../parser-php-version.php";
	include "../../../fungsi/fungsi_indotgl.php";
	include "../../../fungsi/fungsi_rubah_tanda.php";

	$hasil = mysqli_query($koneksi, "SELECT * FROM survey_description");
	$date = date('Y-m-d');
	$time = date('H:i:s');


	// $responden = mysql_fetch_array(mysql_query("SELECT * FROM tanswer, tcompany WHERE tanswer.companyId = '$_GET[id]' AND tcompany.companyId = tanswer.companyId"));
	$responden = mysqli_query($koneksi, "SELECT * FROM responden WHERE id = '$_GET[id]'");
	// var_dump($hasil);

	$res = mysqli_fetch_assoc($responden);
	$dateIndo = date('Y-m-d');

	echo "<center><table border=0 cellpadding=10 cellspacing=3 bgcolor= #e6e6e6>
		<tr >
			<td colspan='8'  bgcolor=#337ab7 style='border: none ;color:white;'>
			<a href='../../master.php?module=hasil&sub=laporan'>
			<button style='margin-right:220px;' class='btn'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			<b><font size=5>LAPORAN KUISIONER RESPONDEN</font></b>
			<button style='margin-left:230px;' class='btn' onclick='window.print()'>
			<span class='glyphicon glyphicon-print'></span> Cetak
		</button>
			</td>
		</tr>
		<tr>
			<td >Nama Responden</td> <td>:</td><td colspan='6'><b>$res[nama]</b></td>
		</tr>
		<tr>
			<td >Alamat</td><td width='1'>:</td><td><b>$res[domisili]</b></td>
		</tr>
		<tr>
			<td >Kritik dan Saran</td> <td>:</td><td> <b>$res[saran]</b></td>
		</tr>
		
		<tr>
			<td  colspan=8 >
				<table border=1 cellpadding=2 bgcolor='#fff' style='width:100%'>
					<tr>
					<td bgcolor=#c6e1f2 align=center><b>NO</b></td>
					<td bgcolor=#c6e1f2 align=center><b>DESCRIPTION</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN A</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN B</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN C</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN D</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN E</b></td>
					</tr>
				
			";
	$no = 1;
	while ($data = mysqli_fetch_array($hasil)) {
		$descriptionId = $data[id_survey];
		$sql = mysqli_query($koneksi, "SELECT
								T2.pertanyaan,
								SUM(CASE WHEN T1.jawaban = 'A' THEN 1 ELSE 0 END) AS total_A,
								SUM(CASE WHEN T1.jawaban = 'B' THEN 1 ELSE 0 END) AS total_B,
								SUM(CASE WHEN T1.jawaban = 'C' THEN 1 ELSE 0 END) AS total_C,
								SUM(CASE WHEN T1.jawaban = 'D' THEN 1 ELSE 0 END) AS total_D,
								SUM(CASE WHEN T1.jawaban = 'E' THEN 1 ELSE 0 END) AS total_E
								FROM hasil_survey T1
								JOIN survey_description T2 ON T1.survey_id = T2.id_survey
							WHERE survey_id = '$descriptionId' AND responden_id = '$_GET[id]'
							GROUP BY T2.pertanyaan");

		// $query = "SELECT
		// 			T2.pertanyaan,
		// 			SUM(CASE WHEN T1.jawaban = 'A' THEN 1 ELSE 0 END) AS total_A,
		// 			SUM(CASE WHEN T1.jawaban = 'B' THEN 1 ELSE 0 END) AS total_B,
		// 			SUM(CASE WHEN T1.jawaban = 'C' THEN 1 ELSE 0 END) AS total_C,
		// 			SUM(CASE WHEN T1.jawaban = 'D' THEN 1 ELSE 0 END) AS total_D,
		// 			SUM(CASE WHEN T1.jawaban = 'E' THEN 1 ELSE 0 END) AS total_E
		// 			FROM hasil_survey T1
		// 			JOIN survey_description T2 ON T1.survey_id = T2.id_survey
		// 			GROUP BY T2.pertanyaan";

		while ($oke = mysqli_fetch_array($sql)) {
			$a = rubah($oke[total_A]);
			$b = rubah($oke[total_B]);
			$c = rubah($oke[total_C]);
			$d = rubah($oke[total_D]);
			$e = rubah($oke[total_E]);
			echo "<tr valign=top >
					<td align='center'>$no</td>
					<td>$data[pertanyaan]</td>
					<td align='center'>$a</td>
					<td align='center'>$b</td>
					<td align='center'>$c</td>
					<td align='center'>$d</td>
					<td align='center'>$e</td>
				  </tr>
			  ";

			$no++;
		}
	}
	
	echo "	
				</table>
			</td>
		</tr>
	</table>
</center>";
}


if ($_GET['act'] == 'hapus') {
	include "../../../koneksi.php";
	mysql_query("DELETE FROM tcompany WHERE companyId='$_GET[id]'");

	header('location:../../master.php?module=hasil&sub=laporan');
}
?>