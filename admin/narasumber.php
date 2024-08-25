<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    DATA NARASUMBER
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Narasumber</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Narasumber</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Narasumber
              </button>
            </div>
          </div>

          <div class="box-body">

            <!-- Modal -->
            <form action="narasumber_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Narasumber</h5>
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
                        <label>Nama Narasumber</label>
                        <input type="text" name="nama_narasumber" class="form-control" placeholder="Nama Narasumber ..">
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
                    <th>NAMA NARASUMBER</th>
                    <th>NAMA ACARA</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM narasumber");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tanggal']; ?></td>
                      <td><?php echo $d['nama_narasumber']; ?></td>
                      <td><?php echo $d['nama_acara']; ?></td>
                      <td>    


                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_narasumber_<?php echo $d['id_narasumber'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_narasumber_<?php echo $d['id_narasumber'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>


                      <form action="narasumber_update.php" method="post">
                        <div class="modal fade" id="edit_narasumber_<?php echo $d['id_narasumber'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Data narasumber</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal Siaran</label>
                                  <input type="hidden" name="id" value="<?php echo $d['id_narasumber'] ?>">
                                  <input type="text" style="width:100%" name="tgl" required="required" class="form-control datepicker2" value="<?php echo $d['tanggal'] ?>">
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

                               
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>

                      <!-- modal hapus -->
                      <div class="modal fade" id="hapus_narasumber_<?php echo $d['id_narasumber'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="narasumber_hapus.php?id=<?php echo $d['id_narasumber'] ?>" class="btn btn-primary">Hapus</a>
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

            <form method="post" action="narasumber_report.php" enctype="multipart/form-data" class="p-3">
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
<?php include 'footer.php'; ?>s