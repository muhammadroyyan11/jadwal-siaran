<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    DATA ACARA SIARAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Acara</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Acara</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Acara
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="acara_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Acara</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama Acara</label>
                        <input type="text" name="nama_acara" class="form-control" placeholder="Nama Acara ..">
                      </div>

                      <div class="form-group">
                        <label>Durasi Acara</label>
                        <input type="text" name="durasi" class="form-control" placeholder="Durasi Acara ..">
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
                    <th>NAMA ACARA</th>
                    <th>DURASI ACARA</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM acara");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama_acara']; ?></td>
                      <td><?php echo $d['durasi']; ?></td>
                      <td>    


                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_acara_<?php echo $d['id_acara'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_acara_<?php echo $d['id_acara'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>


                      <form action="acara_update.php" method="post">
                        <input type="hidden" name="id_acara" value="<?php echo $d['id_acara']; ?>">
                          <div class="modal fade" id="edit_acara_<?php echo $d['id_acara'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Data Acara</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                     <label>Nama Acara</label>
                                     <input type="hidden" name="id" value="<?php echo $d['id_acara'] ?>">
                                     <input type="text" name="nama_acara" style="width:100%" class="form-control" placeholder="Nama Acara .." value="<?php echo $d['nama_acara']; ?>">
                                      </div>


                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Durasi Acara</label>
                                    <input type="text" name="durasi" style="width:100%" class="form-control" placeholder=" Durasi Acara .." value="<?php echo $d['durasi']; ?>">
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
                      <div class="modal fade" id="hapus_acara_<?php echo $d['id_acara'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="acara_hapus.php?id=<?php echo $d['id_acara'] ?>" class="btn btn-primary">Hapus</a>
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
          </div>
        </div>

      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>s