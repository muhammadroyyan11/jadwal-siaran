<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard <small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kehadiran Penyiar</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- Form Input Kehadiran -->
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Pencatatan Kehadiran Penyiar</h3>
          </div>

          <!-- Form untuk input kehadiran -->
          <form method="POST" action="">
            <div class="form-group">
              <label for="nama_penyiar">Nama Penyiar</label>
              <select class="form-select form-control" name="nama_penyiar" required>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM user");
                while ($d = mysqli_fetch_array($data)) {
                  echo "<option value='" . htmlspecialchars($d['user_nama'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($d['user_nama'], ENT_QUOTES, 'UTF-8') . "</option>";
                }
                ?>
              </select>
            </div>
            <!-- Hidden field untuk menyimpan waktu check-in -->
            <input type="hidden" name="check_in_time" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Simpan Kehadiran</button>
            </div>
          </form>

          <!-- Proses penyimpanan data kehadiran -->
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nama_penyiar'])) {
              $nama_penyiar = mysqli_real_escape_string($koneksi, $_POST['nama_penyiar']);
              $check_in_time = mysqli_real_escape_string($koneksi, $_POST['check_in_time']);
              $tanggal = date('Y-m-d');

              // Simpan data check-in ke database dengan prepared statements
              $stmt = $koneksi->prepare("INSERT INTO absen (nama_penyiar, tanggal, check_in_time) VALUES (?, ?, ?)");
              $stmt->bind_param('sss', $nama_penyiar, $tanggal, $check_in_time);

              if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Kehadiran berhasil disimpan!</div>";
              } else {
                echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8') . "</div>";
              }
              $stmt->close();
            } else {
              echo "<div class='alert alert-danger'>Form tidak lengkap. Pastikan semua field diisi.</div>";
            }
          }
          ?>
        </div>
      </div>

      <!-- Tabel Data Kehadiran -->
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Kehadiran Penyiar</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Penyiar</th>
                  <th>Tanggal</th>
                  <th>Waktu Check-In</th>
                  <th>Waktu Check-Out</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Ambil data dari tabel absen
                $sql = "SELECT * FROM absen ORDER BY tanggal DESC";
                $result = mysqli_query($koneksi, $sql);

                if (mysqli_num_rows($result) > 0) {
                  $no = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $check_in_time = date('H:i:s', strtotime($row['check_in_time']));
                    $check_out_time = $row['check_out_time'] ? date('H:i:s', strtotime($row['check_out_time'])) : '-';

                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_penyiar'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['tanggal'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($check_in_time, ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($check_out_time, ENT_QUOTES, 'UTF-8') . "</td>";

                    // Jika check-out belum diisi, tampilkan tombol check-out
                    if (!$row['check_out_time']) {
                      echo "<td>
                              <form method='POST' action=''>
                                <input type='hidden' name='absen_id' value='" . htmlspecialchars($row['id_absen'], ENT_QUOTES, 'UTF-8') . "'>
                                <button type='submit' name='check_out' class='btn btn-warning'>Check-Out</button>
                              </form>
                            </td>";
                    } else {
                      echo "<td>-</td>";
                    }
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='6'>Tidak ada data kehadiran</td></tr>";
                }
                ?>
              </tbody>
            </table>

            <?php
            // Pastikan timezone diatur sesuai dengan lokasi server atau sesuai kebutuhan
            date_default_timezone_set('Asia/Singapore'); // Ganti sesuai timezone yang dibutuhkan

            if (isset($_POST['check_out'])) {
              $absen_id = mysqli_real_escape_string($koneksi, $_POST['absen_id']);
              $check_out_time = date('Y-m-d H:i:s'); // Mengambil waktu saat ini dalam format timestamp

              // Update waktu check-out di database dengan prepared statements
              $stmt = $koneksi->prepare("UPDATE absen SET check_out_time = ? WHERE id_absen = ?");
              $stmt->bind_param('si', $check_out_time, $absen_id);

              if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Check-Out berhasil disimpan!</div>";
              } else {
                echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8') . "</div>";
              }
              $stmt->close();
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>
<?php mysqli_close($koneksi); ?>
