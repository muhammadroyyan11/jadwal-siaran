<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    DATA PENYIAR
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Penyiar</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Penyiar</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Penyiar
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="data_penyiar_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penyiar</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Penyiar</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Penyiar ..">
                      </div>

                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="kelamin" required="required">
                        <option value=""> - Pilih Jenis Kelamin - </option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl" required="required" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat Penyiar ..">
                      </div>

                      <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto">
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
                    <th>NAMA PENYIAR</th>
                    <th>JENIS KELAMIN</th>
                    <th>TANGGAL LAHIR</th>
                    <th>ALAMAT</th>
                    <th width="15%">FOTO</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM penyiar");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama_penyiar']; ?></td>
                      <td><?php echo $d['kelamin']; ?></td>
                      <td><?php echo $d['tgl_lahir']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td>
                      <center>
                          <?php if($d['foto'] == ""){ ?>
                            <img src="../gambar/sistem/user.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/user/<?php echo $d['foto'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
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
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Data Interaksi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal</label>
                                  <input type="hidden" name="id" value="<?php echo $d['interaksi_id'] ?>">
                                  <input type="text" style="width:100%" name="tgl" required="required" class="form-control datepicker2" value="<?php echo $d['tgl_interaksi'] ?>">
                                </div>

                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama Pendengar</label>
                                    <input type="text" name="nama" style="width:100%" class="form-control" placeholder="Nama pendengar .." value="<?php echo $d['nama_pendengar']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Jenis Platform</label>
                                    <input type="text" name="platform" style="width:100%" class="form-control" placeholder="Jenis Platform .." value="<?php echo $d['jenis_platform']; ?>">
                                  </div>

                                <div class="form-group" style="width:100%">
                                  <label>Interaksi</label>
                                  <textarea name="interaksi" style="width:100%" class="form-control" rows="4"><?php echo $d['interaksi'] ?></textarea>
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
          </div>
        </div>

      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>s