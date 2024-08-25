<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      JADWAL PENYIAR
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Jadwal Penyiar</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Jadwal Penyiar</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Jadwal Penyiar
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="jadwal_penyiar_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal Penyiar</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" required="required" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label>DAYPART 1 (04:55-11:00)</label>
                        <input type="text" name="dpa" class="form-control" placeholder="Nama penyiar ..">
                      </div>

                      <div class="form-group">
                        <label>DAYPART 2 (10:00-16:00)</label>
                        <input type="text" name="dpb" class="form-control" placeholder="Nama penyiar ..">
                      </div>

                      <div class="form-group">
                        <label>DAYPART 3 (14:00-20:00)</label>
                        <input type="text" name="dpc" class="form-control" placeholder="Nama penyiar ..">
                      </div>

                      <div class="form-group">
                        <label>DAYPART 4 (18:00-24:00)</label>
                        <input type="text" name="dpd" class="form-control" placeholder="Nama penyiar ..">
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
                    <th>Tanggal</th>
                    <th>DAYPART 1 (04:55-11:00)</th>
                    <th>DAYPART 2 (10:00-16:00)</th>
                    <th>DAYPART 3 (14:00-20:00)</th>
                    <th>DAYPART 4 (18:00-24:00)</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM jadwal_penyiar");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tgl_jadwal']; ?></td>
                      <td><?php echo $d['daypart1']; ?></td>
                      <td><?php echo $d['daypart2']; ?></td>
                      <td><?php echo $d['daypart3']; ?></td>
                      <td><?php echo $d['daypart4']; ?></td>
                      <td>    

                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_jadwal_<?php echo $d['id_jadwal'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_jadwal_<?php echo $d['id_jadwal'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>

                        <form action="jadwal_penyiar_update.php" method="post">
                          <div class="modal fade" id="edit_jadwal_<?php echo $d['id_jadwal'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Jadwal Penyiar</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal Siaran</label>
                                  <input type="hidden" name="id" value="<?php echo $d['id_jadwal'] ?>">
                                  <input type="text" style="width:100%" name="tgl" required="required" class="form-control datepicker2" value="<?php echo $d['tgl_jadwal'] ?>">
                                </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>DAYPART 1 (04:55-11:00) </label>
                                    <input type="text" name="dpa" style="width:100%" class="form-control" placeholder="Nama Penyiar .." value="<?php echo $d['daypart1']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>DAYPART 2 (10:00-16:00)</label>
                                    <input type="text" name="dpb" style="width:100%" class="form-control" placeholder="Nama Penyiar .." value="<?php echo $d['daypart2']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>DAYPART 3 (14:00-20:00)</label>
                                    <input type="text" name="dpc" style="width:100%" class="form-control" placeholder="Nama Penyiar .." value="<?php echo $d['daypart3']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>DAYPART 4 (18:00-24:00)</label>
                                    <input type="text" name="dpd" style="width:100%" class="form-control" placeholder="Nama Penyiar .." value="<?php echo $d['daypart4']; ?>">
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
                        <div class="modal fade" id="hapus_jadwal_<?php echo $d['id_jadwal'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>
                              

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="jadwal_penyiar_hapus.php?id=<?php echo $d['id_jadwal'] ?>" class="btn btn-primary">Hapus</a>
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
              <form method="post" action="jadwal_penyiar_report.php" enctype="multipart/form-data" class="p-3">
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