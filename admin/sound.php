<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    DATA LAGU
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Lagu</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Lagu</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Lagu
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="sound_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lagu</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Genre Lagu</label>
                        <input type="text" name="genre" class="form-control" placeholder="Genre Lagu..">
                      </div>

                      <div class="form-group">
                        <label>Judul Lagu</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul Lagu ..">
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
                    <th>GENRE LAGU</th>
                    <th>JUDUL LAGU</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM sound");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['genre']; ?></td>
                      <td><?php echo $d['judul']; ?></td>
                      <td>    


                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_sound_<?php echo $d['id_sound'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_sound_<?php echo $d['id_sound'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>


                      <form action="sound_update.php" method="post">
                        <input type="hidden" name="id_sound" value="<?php echo $d['id_sound']; ?>">
                          <div class="modal fade" id="edit_sound_<?php echo $d['id_sound'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Data sound</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                     <label>Genre Lagu</label>
                                     <input type="hidden" name="id" value="<?php echo $d['id_sound'] ?>">
                                     <input type="text" name="genre" style="width:100%" class="form-control" placeholder="Genre Lagu .." value="<?php echo $d['genre']; ?>">
                                      </div>


                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Judul Lagu</label>
                                    <input type="text" name="judul" style="width:100%" class="form-control" placeholder=" Judul Lagu .." value="<?php echo $d['judul']; ?>">
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
                      <div class="modal fade" id="hapus_sound_<?php echo $d['id_sound'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="sound_hapus.php?id=<?php echo $d['id_sound'] ?>" class="btn btn-primary">Hapus</a>
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
<?php include 'footer.php'; ?>