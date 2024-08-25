<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      DATA PENGAJUAN PERGANTIAN JADWAL
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Pengajuan Pergantian Jadwal</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Pengajuan Pergantian Jadwal</h3>
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Pengajuan Pergantian Jadwal
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="ganti_jadwal_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengajuan Pergantian Jadwal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>Tanggal Pengajuan</label>
                        <input type="date" name="tgl_pengajuan" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="nama_penyiar">Nama Penyiar</label>
                        <select class="form-select form-control" name="nama_penyiar">
                          <?php
                          $data = mysqli_query($koneksi, "select * from user");
                          while ($d = mysqli_fetch_array($data)) {
                          ?>
                            <option value="<?= $d['user_nama']; ?>"><?= $d['user_nama']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dari_tgl" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Menjadi Tanggal</label>
                        <input type="date" name="menjadi_tgl" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Dari Daypart</label>
                        <select class="form-control" name="dari_daypart" required="required">
                          <option value=""> - Pilih Jadwal - </option>
                          <option value="Daypart 1"> Daypart 1 </option>
                          <option value="Daypart 2"> Daypart 2 </option>
                          <option value="Daypart 3"> Daypart 3 </option>
                          <option value="Daypart 4"> Daypart 4 </option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Menjadi Daypart</label>
                        <select class="form-control" name="menjadi_daypart" required="required">
                          <option value=""> - Pilih Jadwal - </option>
                          <option value="Daypart 1"> Daypart 1 </option>
                          <option value="Daypart 2"> Daypart 2 </option>
                          <option value="Daypart 3"> Daypart 3 </option>
                          <option value="Daypart 4"> Daypart 4 </option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>TANGGAL PENGAJUAN</th>
                    <th>NAMA PENYIAR</th>
                    <th>DARI TANGGAL</th>
                    <th>MENJADI TANGGAL</th>
                    <th>DARI DAYPART</th>
                    <th>MENJADI DAYPART</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi, "SELECT * FROM ganti_jadwal");
                  while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tgl_pengajuan']; ?></td>
                      <td><?php echo $d['nama_penyiar']; ?></td>
                      <td><?php echo $d['dari_tanggal']; ?></td>
                      <td><?php echo $d['menjadi_tanggal']; ?></td>
                      <td><?php echo $d['dari_daypart']; ?></td>
                      <td><?php echo $d['menjadi_daypart']; ?></td>

                      <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_ganti_jadwal_<?php echo $d['id_ganti'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_ganti_jadwal_<?php echo $d['id_ganti'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <form action="ganti_jadwal_update.php" method="post">
                          <div class="modal fade" id="edit_ganti_jadwal_<?php echo $d['id_ganti'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama Penyiar</label>
                                    <input type="hidden" name="id" value="<?php echo $d['id_ganti'] ?>">
                                    <select class="form-select form-control" name="nama_penyiar">
                                      <?php
                                      $data_user = mysqli_query($koneksi, "select * from user");
                                      while ($user = mysqli_fetch_array($data_user)) {
                                        $selected = ($user['user_nama'] == $d['nama_penyiar']) ? 'selected' : '';
                                        echo "<option value='{$user['user_nama']}' {$selected}>{$user['user_nama']}</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>Dari Tanggal</label>
                                    <input type="text" style="width:100%" name="dari_tgl" required="required" class="form-control datepicker2" value="<?php echo $d['dari_tanggal'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>Menjadi Tanggal</label>
                                    <input type="text" style="width:100%" name="menjadi_tgl" required="required" class="form-control datepicker2" value="<?php echo $d['menjadi_tanggal'] ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Dari Daypart</label>
                                    <select class="form-control" name="dari_daypart" required="required">
                                      <option value=""> - Pilih Jadwal - </option>
                                      <option value="Daypart 1" <?php if ($d['dari_daypart'] == 'Daypart 1') { echo 'selected'; } ?>> Daypart 1 </option>
                                      <option value="Daypart 2" <?php if ($d['dari_daypart'] == 'Daypart 2') { echo 'selected'; } ?>> Daypart 2 </option>
                                      <option value="Daypart 3" <?php if ($d['dari_daypart'] == 'Daypart 3') { echo 'selected'; } ?>> Daypart 3 </option>
                                      <option value="Daypart 4" <?php if ($d['dari_daypart'] == 'Daypart 4') { echo 'selected'; } ?>> Daypart 4 </option>
                                    </select>
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Menjadi Daypart</label>
                                    <select class="form-control" name="menjadi_daypart" required="required">
                                      <option value=""> - Pilih Jadwal - </option>
                                      <option value="Daypart 1" <?php if ($d['menjadi_daypart'] == 'Daypart 1') { echo 'selected'; } ?>> Daypart 1 </option>
                                      <option value="Daypart 2" <?php if ($d['menjadi_daypart'] == 'Daypart 2') { echo 'selected'; } ?>> Daypart 2 </option>
                                      <option value="Daypart 3" <?php if ($d['menjadi_daypart'] == 'Daypart 3') { echo 'selected'; } ?>> Daypart 3 </option>
                                      <option value="Daypart 4" <?php if ($d['menjadi_daypart'] == 'Daypart 4') { echo 'selected'; } ?>> Daypart 4 </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_ganti_jadwal_<?php echo $d['id_ganti'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Yakin ingin menghapus data ini?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="ganti_jadwal_hapus.php?id=<?php echo $d['id_ganti'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
              <form method="post" action="ganti_jadwal_report.php" enctype="multipart/form-data" class="p-3">
    <h5>Laporan Berdasarkan Tanggal</h5>
    <div class="mb-3">
        <label for="tanggal_mulai">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_akhir">Tanggal Akhir</label>
        <input type="date" name="tanggal_akhir" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <button type="submit" class="btn btn-success" name="type" value="range" class="btn btn-dark w-100">Cetak Laporan</button>
</form>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>
