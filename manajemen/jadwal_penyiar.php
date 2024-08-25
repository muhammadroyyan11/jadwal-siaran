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

             
            </div>
          </div>
          <div class="box-body">

          


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