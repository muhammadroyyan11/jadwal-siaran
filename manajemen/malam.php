<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    JADWAL SIARAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">JAGA MALAM (20:00-24:00)</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">JAGA MALAM (20:00-24:00)</h3>
            <div class="btn-group pull-right">            

             
            </div>
          </div>

          <div class="box-body">

          


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
      
      </tr>
    </thead>
    <tbody>
      <?php 
      include '../koneksi.php';
      $no=1;
      $data = mysqli_query($koneksi,"SELECT * FROM malam");
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


          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_malam_<?php echo $d['id_malam'] ?>">
            <i class="fa fa-cog"></i>
          </button>
          <form action="malam_update.php" method="post">
<div class="modal fade" id="edit_malam_<?php echo $d['id_malam'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Data malam</h4>
    </div>
    <div class="modal-body">
        <div class="form-group" style="margin-bottom: 15px; width: 100%;">
            <label>Status</label>
            <input type="hidden" name="id" value="<?php echo $d['id_malam'] ?>">
            <select class="form-control" name="status" required="required">
                <option value="">- Pilih Status -</option>
                <option value="Terlaksana" <?php if ($d['status'] == 'Terlaksana') { echo 'selected'; } ?>>Terlaksana</option>
                <option value="Belum Terlaksana" <?php if ($d['status'] == 'Belum Terlaksana') { echo 'selected'; } ?>>Belum Terlaksana</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
</div>
</div>
</form>

         
        

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