<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    LAPORAN EVALUASI PENYIAR
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Evaluasi Kinerja Penyiar</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Evaluasi Kinerja Penyiar</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Evaluasi Kinerja Penyiar
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="evaluasi_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Evaluasi Kinerja Penyiar</h5>
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
                        <label>Daypart</label>
                        <select class="form-control" name="daypart" required="required">
                          <option value=""> - Pilih Jadwal - </option>
                          <option value="Daypart 1"> Daypart 1 </option>
                          <option value="Daypart 2"> Daypart 2 </option>
                          <option value="Daypart 3"> Daypart 3 </option>
                          <option value="Daypart 4"> Daypart 4 </option>
                        </select>
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
                        <label>Evaluasi</label>
                        <input type="text" name="evaluasi" class="form-control" placeholder="Evaluasi Penyiar ..">
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
                    <th>DAYPART</th>
                    <th>NAMA PENYIAR</th>
                    <th>EVALUASI</th>
                    
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM evaluasi");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tgl_evaluasi']; ?></td>
                      <td><?php echo $d['daypart']; ?></td>
                      <td><?php echo $d['nama_penyiar']; ?></td>
                      <td><?php echo $d['evaluasi']; ?></td>
                      <td>    


                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_evaluasi_<?php echo $d['evaluasi_id'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_evaluasi_<?php echo $d['evaluasi_id'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>


                      <form action="evaluasi_update.php" method="post">
                        <div class="modal fade" id="edit_evaluasi_<?php echo $d['evaluasi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Data Evaluasi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal Siaran</label>
                                  <input type="hidden" name="id" value="<?php echo $d['evaluasi_id'] ?>">
                                  <input type="text" style="width:100%" name="tgl" required="required" class="form-control datepicker2" value="<?php echo $d['tgl_evaluasi'] ?>">
                                </div>

                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Daypart</label>
                                    <select class="form-control" name="daypart" required="required">
                                      <option value=""> - Pilih Jadwal - </option>
                                      <option value="Daypart 1" <?php if ($d['daypart'] == 'Daypart 1') { echo 'selected'; } ?>> Daypart 1 </option>
                                      <option value="Daypart 2" <?php if ($d['daypart'] == 'Daypart 2') { echo 'selected'; } ?>> Daypart 2 </option>
                                      <option value="Daypart 3" <?php if ($d['daypart'] == 'Daypart 3') { echo 'selected'; } ?>> Daypart 3 </option>
                                      <option value="Daypart 4" <?php if ($d['daypart'] == 'Daypart 4') { echo 'selected'; } ?>> Daypart 4 </option>
                                    </select>
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
                                    <label>Evaluasi</label>
                                    <input type="text" name="evaluasi" style="width:100%" class="form-control" placeholder="Evaluasi .." value="<?php echo $d['evaluasi']; ?>">
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
                      <div class="modal fade" id="hapus_evaluasi_<?php echo $d['evaluasi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="evaluasi_hapus.php?id=<?php echo $d['evaluasi_id'] ?>" class="btn btn-primary">Hapus</a>
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

            <form method="post" action="evaluasi_report.php" enctype="multipart/form-data" class="p-3">
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
<?php include 'footer.php'; ?>s