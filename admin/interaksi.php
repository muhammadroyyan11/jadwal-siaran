<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    LAPORAN INTERAKSI PENDENGAR
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Interaksi Pendengar</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Interaksi Pendengar</h3>
            <div class="btn-group pull-right">            
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Interaksi Pendengar
              </button>
            </div>
          </div>

          <div class="box-body">

            <!-- Modal -->
            <form action="interaksi_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content shadow-lg rounded">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Interaksi Pendengar</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Tanggal Interaksi</label>
                        <input type="date" name="tgl" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Nama Pendengar</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Pendengar ..">
                      </div>

                      <div class="form-group">
                        <label>Jenis Platform</label>
                        <input type="text" name="platform" class="form-control" placeholder="Jenis Platform Pendengar ..">
                      </div>

                      <div class="form-group">
                        <label>Interaksi</label>
                        <input type="text" name="interaksi" class="form-control" placeholder="Interaksi Pendengar ..">
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
              <table class="table table-bordered table-striped table-hover shadow-lg rounded" id="table-datatable">
                <thead class="thead-dark">
                  <tr>
                    <th width="1%">NO</th>
                    <th>TANGGAL INTERAKSI</th>
                    <th>NAMA PENDENGAR</th>
                    <th>JENIS PLATFORM</th>
                    <th>INTERAKSI</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM interaksi");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tanggal']; ?></td>
                      <td><?php echo $d['nama_pendengar']; ?></td>
                      <td><?php echo $d['jenis_platform']; ?></td>
                      <td><?php echo $d['interaksi']; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_interaksi_<?php echo $d['interaksi_id'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_interaksi_<?php echo $d['interaksi_id'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <form action="interaksi_update.php" method="post">
                          <div class="modal fade" id="edit_interaksi_<?php echo $d['interaksi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content shadow-lg rounded">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Data Interaksi</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="hidden" name="id" value="<?php echo $d['interaksi_id'] ?>">
                                    <input type="date" name="tgl" required="required" class="form-control" value="<?php echo $d['tanggal'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Nama Pendengar</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama pendengar .." value="<?php echo $d['nama_pendengar']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Jenis Platform</label>
                                    <input type="text" name="platform" class="form-control" placeholder="Jenis Platform .." value="<?php echo $d['jenis_platform']; ?>">
                                  </div>

                                  <div class="form-group">
                                    <label>Interaksi</label>
                                    <textarea name="interaksi" class="form-control" rows="4"><?php echo $d['interaksi'] ?></textarea>
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
                        <div class="modal fade" id="hapus_interaksi_<?php echo $d['interaksi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content shadow-lg rounded">
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
                                <a href="interaksi_hapus.php?id=<?php echo $d['interaksi_id'] ?>" class="btn btn-primary">Hapus</a>
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
            <form method="post" action="interaksi_report.php" enctype="multipart/form-data" class="p-3">
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
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>
