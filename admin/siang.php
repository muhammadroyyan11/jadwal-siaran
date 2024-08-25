<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    JADWAL SIARAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">SANTAI SIANG (10:00-16:00)</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">SANTAI SIANG (10:00-16:00)</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Jadwal Siaran
              </button>
            </div>
          </div>

          <div class="box-body">

            <!-- Modal -->
            <form action="siang_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal Siaran siang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Tanggal Siaran</label>
                        <input type="date" name="tgl" required="required" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label>Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" required="required" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label>Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" required="required" class="form-control" >
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
                        <label for="nama_narasumber">Nama Narasumber</label>
                        <select class="form-select form-control" name="nama_narasumber">
                          <?php
                          $data = mysqli_query($koneksi, "select * from narasumber");
                          while ($d = mysqli_fetch_array($data)) {
                          ?>
                            <option value="<?= $d['nama_narasumber']; ?>"><?= $d['nama_narasumber']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="nama_acara">Nama Acara</label>
                            <select class="form-select form-control" name="nama_acara">
                                <?php
                                $data = mysqli_query($koneksi, "select * from acara");
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <option value="<?= $d['nama_acara']; ?>">
                                        <?= $d['nama_acara']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                        <label>Topik Siaran</label>
                        <input type="text" name="topik" class="form-control" placeholder="Topik Siaran ..">
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required="required">
                          <option value=""> - Pilih Status - </option>
                          <option value="Terlaksana"> Terlaksana</option>
                          <option value="Belum Terlaksana "> Belum Terlaksana  </option>
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
                    <th>TANGGAL SIARAN</th>
                    <th>WAKTU MULAI</th>
                    <th>WAKTU SELESAI</th>
                    <th>NAMA PENYIAR</th>
                    <th>NAMA NARASUMBER</th>
                    <th>NAMA ACARA</th>
                    <th>TOPIK SIARAN</th>
                    <th>STATUS</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM siang");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tanggal']; ?></td>
                      <td><?php echo $d['waktu_mulai']; ?></td>
                      <td><?php echo $d['waktu_selesai']; ?></td>
                      <td><?php echo $d['nama_penyiar']; ?></td>
                      <td><?php echo $d['nama_narasumber']; ?></td>
                      <td><?php echo $d['nama_acara']; ?></td>
                      <td><?php echo $d['topik']; ?></td>
                      <td><?php echo $d['status']; ?></td>
                      <td>    


                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_siang_<?php echo $d['id_siang'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_siang_<?php echo $d['id_siang'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>


                      <form action="siang_update.php" method="post">
                        <div class="modal fade" id="edit_siang_<?php echo $d['id_siang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Data siang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal Siaran</label>
                                  <input type="hidden" name="id" value="<?php echo $d['id_siang'] ?>">
                                  <input type="text" style="width:100%" name="tgl" required="required" class="form-control datepicker2" value="<?php echo $d['tanggal'] ?>">
                                </div>

                                
                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                     <label>Waktu Mulai</label>
                                     <input type="time" name="waktu_mulai" style="width:100%" class="form-control" placeholder="Waktu Mulai .." value="<?php echo $d['waktu_mulai']; ?>">
                                      </div>

                                      
                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                     <label>Waktu Selesai</label>
                                     <input type="time" name="waktu_selesai" style="width:100%" class="form-control" placeholder="Waktu Selesai .." value="<?php echo $d['waktu_selesai']; ?>">
                                      </div>

                                      <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama Penyiar</label>
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


                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama Narasumber</label>
                                    <input type="text" name="nama_narasumber" style="width:100%" class="form-control" placeholder="Nama Narasumber .." value="<?php echo $d['nama_narasumber']; ?>">
                                  </div>

                                 
                                  <div class="form-group">
                                    <label for="nama_acara">Nama Acara</label>
                                    <select class="form-select form-control" name="nama_acara">
                                      <?php
                                      $data_acara = mysqli_query($koneksi, "SELECT * FROM acara");
                                      while ($acara = mysqli_fetch_array($data_acara)) {
                                        echo "<option value='" . $acara['nama_acara'] . "' " . ($acara['nama_acara'] == $d['nama_acara'] ? 'selected' : '') . ">" . $acara['nama_acara'] . "</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Topik</label>
                                    <input type="text" name="topik" style="width:100%" class="form-control" placeholder="Topik .." value="<?php echo $d['topik']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required="required">
                                      <option value=""> - Pilih Status - </option>
                                      <option value="Terlaksana" <?php if ($d['status'] == 'Terlaksana') { echo 'selected'; } ?>> Terlaksana </option>
                                      <option value="Belum Terlaksana" <?php if ($d['status'] == 'Belum Terlaksana') { echo 'selected'; } ?>> Belum Terlaksana </option>
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
                      <div class="modal fade" id="hapus_siang_<?php echo $d['id_siang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <p>Yakin ingin menghapus data ini ?</p>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <a href="siang_hapus.php?id=<?php echo $d['id_siang'] ?>" class="btn btn-primary">Hapus</a>
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
            <form method="post" action="siang_report.php" enctype="multipart/form-data" class="p-3">
    <h5>Laporan Harian</h5>
    <div class="mb-3">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <button type="submit" name="type" value="daily" class="btn btn-success">Cetak Laporan Harian</button>
</form>
          </div>
        </div>

      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>