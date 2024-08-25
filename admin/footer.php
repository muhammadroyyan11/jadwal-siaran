<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; 2024</strong> - Sistem Informasi Penjadwalan Siaran
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/bower_components/raphael/raphael.min.js"></script>
<script src="../assets/bower_components/morris.js/morris.min.js"></script>
<script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/dist/js/pages/dashboard.js"></script>
<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/bower_components/ckeditor/ckeditor.js"></script>
<!-- <script src="../assets/bower_components/chart.js/Chart.min.js"></script> -->

<script>
  $(document).ready(function() {
    // Initialize DataTable
    $('#table-datatable').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      'pageLength': 50
    });

    // Initialize DatePicker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    }).datepicker("setDate", new Date());

    $('.datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });

    // Search functionality for table
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('table-datatable');
    const tableBody = table.querySelector('tbody');

    searchInput.addEventListener('input', function() {
      const query = searchInput.value.toLowerCase();
      const rows = tableBody.getElementsByTagName('tr');

      for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let match = false;

        for (let j = 0; j < cells.length; j++) {
          if (cells[j].textContent.toLowerCase().includes(query)) {
            match = true;
            break;
          }
        }

        rows[i].style.display = match ? '' : 'none';
      }
    });
  });
</script>

<!-- <script>
  <?php
  include '../koneksi.php';
  $jawaban = mysqli_query($koneksi, "SELECT DISTINCT jawaban FROM hasil_survey");
  while ($dr = mysqli_fetch_array($jawaban)) {
    $nama_pilihan[] = $dr['jawaban'];
    // $id_dokter = $dr['dokter_id'];

    $pasien = mysqli_query($koneksi, "select * from pasien where pasien_dokter='$id_dokter'");
    $jumlah_pasien[] = mysqli_num_rows($pasien);
  }
  ?>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama_pilihan); ?>,
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 71, 1)',
          'rgba(9, 31, 242, 0.8)',
          'rgba(240, 255, 45, 0.8)',
          'rgba(17, 231, 42, 0.8)',
          'rgba(201, 30, 255, 0.8)',
          'rgba(255, 128, 6, 0.8)'
        ],
        borderColor: [
          'rgba(255, 99, 71, 1)',
          'rgba(9, 31, 242, 0.8)',
          'rgba(240, 255, 45, 0.8)',
          'rgba(17, 231, 42, 0.8)',
          'rgba(201, 30, 255, 0.8)',
          'rgba(255, 128, 6, 0.8)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script> -->
<?php
include '../koneksi.php';

// Fetch distinct jawaban
$jawaban_query = mysqli_query($koneksi, "SELECT DISTINCT jawaban FROM hasil_survey");

// Initialize arrays
$nama_pilihan = [];
$jumlah_pasien = [];

// Fetch the jawaban and count occurrences
while ($dr = mysqli_fetch_array($jawaban_query)) {
  $jawaban = $dr['jawaban'];
  $nama_pilihan[] = $jawaban;

  // Count occurrences of the current jawaban
  $count_query = mysqli_query($koneksi, "SELECT
                                          COUNT('jawaban') as total
                                          FROM hasil_survey T1 where jawaban = '$jawaban'");
  $count_result = mysqli_fetch_array($count_query);
  $jumlah_pasien[] = $count_result['total'];
}

var_dump(json_encode($jumlah_pasien));

// Convert PHP arrays to JSON for use in JavaScript
?>
<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama_pilihan); ?>,
      datasets: [{
        label: '# of Votes',
        data: <?php echo json_encode($jumlah_pasien); ?>,
        backgroundColor: [
          'rgba(255, 99, 71, 1)',
          'rgba(9, 31, 242, 0.8)',
          'rgba(240, 255, 45, 0.8)',
          'rgba(17, 231, 42, 0.8)',
          'rgba(201, 30, 255, 0.8)',
          'rgba(255, 128, 6, 0.8)'
        ],
        borderColor: [
          'rgba(255, 99, 71, 1)',
          'rgba(9, 31, 242, 0.8)',
          'rgba(240, 255, 45, 0.8)',
          'rgba(17, 231, 42, 0.8)',
          'rgba(201, 30, 255, 0.8)',
          'rgba(255, 128, 6, 0.8)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</body>

</html>