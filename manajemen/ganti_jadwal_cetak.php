<?php
include '../koneksi.php';

$id_ganti = isset($_GET["id_ganti"]) ? intval($_GET["id_ganti"]) : 0;
$query = "SELECT * FROM ganti_jadwal WHERE id_ganti = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id_ganti);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Data tersedia
} else {
    // Data tidak ditemukan
    echo "<p>Data tidak ditemukan.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Pengajuan Pergantian Jadwal Penyiar</title>
    <style>
        @media print {
            @page {
                margin: 0;
            }
            body {
                margin: 1cm;
            }
            .no-print {
                display: none;
            }
        }

        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 150px;
        }
        .centered-text {
            text-align: center;
            margin-bottom: 20px;
        }
        .centered-text h3 {
            margin-bottom: 10px;
        }
        .centered-text p {
            margin: 0;
        }
        .main-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        .main-table th, .main-table td {
            padding: 10px;
            text-align: center;
            border: 2px solid #000;
        }
        .main-table th {
            background-color: #f4f4f4;
        }
        .section-title {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }
        .signature-section {
            margin-top: 40px;
            text-align: right;
            margin-right: 50px;
        }
        .signature-section div {
            margin-bottom: 75px;
        }
        .signature-section .name {
            margin-bottom: 0;
        }
        .horizontal-line {
            border: 0;
            border-top: 3px solid black;
            margin: 0 auto;
            width: 100%;
        }
    </style>
</head>
<body onload="window.print();">
    <div class="container-fluid">
        <div class="logo-container">
            <img src="../gambar/user/rripro2.jpg" alt="Logo RRI PRO 2">
        </div>
        <div class="centered-text">
            <h3>RADIO REPUBLIK INDONESIA</h3>
            <p>Jl. A. Yani No.Km. 3.5, RW.No.7, Karang Mekar, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan</p>
            <p>Telp : (0511) 3252601, KodePos : 70234</p>
        </div>

        <!-- Horizontal line above the title -->
        <hr class="horizontal-line">
        
        <div class="centered-text">
            <h4>LAPORAN PENGAJUAN PERGANTIAN JADWAL PENYIAR</h4>
        </div>
        <p>Kepada : STAFF</p>
       
        <p>Nama Penyiar: <?php echo htmlspecialchars($row["nama_penyiar"], ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Dengan Hormat,</p>
        <p>Bersama dengan surat ini saya mengajukan permohonan pergantian jadwal kerja saya, yaitu:</p>

        <div class="section-title">Dari</div>
        <table class="main-table">
            <tr>
                <th>Tanggal</th>
                <th>Daypart</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($row["dari_tanggal"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row["dari_daypart"], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        </table>

        <div class="section-title">Menjadi</div>
        <table class="main-table">
            <tr>
                <th>Tanggal</th>
                <th>Daypart</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($row["menjadi_tanggal"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row["menjadi_daypart"], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        </table>

        <p>Permohonan ini saya ajukan dengan pertimbangan yang matang dan saya berharap agar permohonan ini dapat dipertimbangkan dengan baik.</p>

        <div style="margin-top: 20px; text-align: right; line-height: 1;">
            <p style="margin: 0;">Banjarmasin, <span id="currentDate"></span></p>
            <p style="margin: 0;">RRI Kalimantan Selatan</p>
            <br><br><br><br>
            <p>(........................................)</p>
        </div>

        <script>
            var options = { day: 'numeric', month: 'long', year: 'numeric' };
            var today  = new Date();
            document.getElementById('currentDate').textContent = today.toLocaleDateString('id-ID', options);
        </script>
    </div>
</body>
</html>
