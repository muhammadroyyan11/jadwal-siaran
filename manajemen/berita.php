<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    LAPORAN DATA BERITA
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Berita</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Berita</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Berita
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="berita_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Berita</h5>
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
                        <label>Tema Berita</label>
                        <input type="text" name="tema" class="form-control" placeholder="Tema Berita ..">
                      </div>

                      <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul Berita ..">
                      </div>

                      <div class="form-group">
                        <label>Sumber Berita</label>
                        <input type="text" name="sumber" class="form-control" placeholder="Sumber Berita ..">
                      </div>

                      
                      <div class="form-group">
                        <label>Berita Lengkap</label>
                        <input type="text" name="lengkap" class="form-control" placeholder="Berita Lengkap ..">
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
                    <th>TANGGAL</th>
                    <th>TEMA BERITA</th>
                    <th>JUDUL BERITA</th>
                    <th>SUMBER BERITA</th>
                    <th>BERITA LENGKAP</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM berita");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tgl_berita']; ?></td>
                      <td><?php echo $d['tema']; ?></td>
                      <td><?php echo $d['judul']; ?></td>
                      <td><?php echo $d['sumber']; ?></td>
                      <td><a href="<?php echo $d['berita_lengkap']; ?>" target="_blank"><?php echo $d['berita_lengkap']; ?></a></td>
                      <td>    


                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_berita_<?php echo $d['id_berita'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_berita_<?php echo $d['id_berita'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>


                      <form action="berita_update.php" method="post">
                        <div class="modal fade" id="edit_berita<?php echo $d['id_berita'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Data berita</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal</label>
                                  <input type="hidden" name="id" value="<?php echo $d['id_berita'] ?>">
                                  <input type="text" style="width:100%" name="tgl" required="required" class="form-control datepicker2" value="<?php echo $d['tgl_berita'] ?>">
                                </div>

                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Tema Berita</label>
                                    <input type="text" name="tema" style="width:100%" class="form-control" placeholder="Tema Berita .." value="<?php echo $d['tema']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Judul Berita</label>
                                    <input type="text" name="judul" style="width:100%" class="form-control" placeholder="Judul Berita .." value="<?php echo $d['judul']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Sumber Berita</label>
                                    <input type="text" name="sumber" style="width:100%" class="form-control" placeholder="Sumber Berita .." value="<?php echo $d['sumber']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Berita Lengkap</label>
                                    <input type="text" name="lengkap" style="width:100%" class="form-control" placeholder="Berita Lengkap .." value="<?php echo $d['berita_lengkap']; ?>">
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
                      <div class="modal fade" id="hapus_berita_<?php echo $d['id_berita'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="berita_hapus.php?id=<?php echo $d['id_berita'] ?>" class="btn btn-primary">Hapus</a>
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
            <form method="post" action="berita_report.php" enctype="multipart/form-data" class="p-3">
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