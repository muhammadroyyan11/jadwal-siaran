<?php
include '../koneksi.php';

// Memeriksa apakah tanggal dikirim dari formulir
if (isset($_POST['tanggal_mulai']) && isset($_POST['tanggal_akhir'])) {
    $tanggal_awal = $_POST['tanggal_mulai'];
    $tanggal_akhir = $_POST['tanggal_akhir'];

    // Mengambil data laporan berdasarkan tanggal yang diberikan
    $query = "SELECT * FROM narasumber WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    $result = mysqli_query($koneksi, $query);
} else {
    // Jika tidak ada tanggal yang diberikan, redirect atau tampilkan pesan error
    echo "Tanggal tidak tersedia!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Narasumber</title>
    <style>
        @media print {
            /* Hides all elements that are not needed for print */
            @page {
                margin: 0;
            }
            body {
                margin: 1cm; /* Adjust margins as needed */
            }
            .no-print {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
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
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 2px solid #000; /* Border lebih tebal */
        }
        th {
            background-color: #f4f4f4;
        }
        .signature-section {
            margin-top: 40px;
            text-align: right;
            margin-right: 50px;
        }
        .signature-section div {
            margin-bottom: 75px; /* Jarak antara data */
        }
        .signature-section .name {
            margin-bottom: 0; /* Menghapus jarak antara YEDI YULISTIADI dan NIP */
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
            <h3>RADIO REPUBLIK INDONESIA KOTA BANJARMASIN</h3>
            <p>Jl. A. Yani No.Km. 3.5, RW.No.7, Karang Mekar, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan</p>
            <p>Telp : (0511) 3252601, KodePos : 70234</p>
            <hr class="horizontal-line">
            <h5>DATA NARASUMBER RRI</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>TANGGAL SIARAN</th>
                            <th>NAMA NARASUMBER</th>
                            <th>NAMA ACARA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo htmlspecialchars($row["tanggal"]); ?></td>
                                <td><?php echo htmlspecialchars($row["nama_narasumber"]); ?></td>
                                <td><?php echo htmlspecialchars($row["nama_acara"]); ?></td>
                            </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
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
        </div>
    </div>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>
</html>
