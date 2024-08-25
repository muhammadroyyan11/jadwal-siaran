<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Survey Kepuasan Pendengar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">


</head>

<body background="">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">E-SURVEY</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#survey" data-toggle="tab">Survey</a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body" style="background-color:#e6e6e6;">

                <div class="col-lg-12">
                    <p align="center" style="background-color:black; color:white;">
                        <font size="5">SURVEY KEPUASAN PENDENGAR</font>
                    </p>
                </div>
                <div class="row">
                    <div class="panel-body">
                        <form method='POST' action='aksi_kuisioner.php' onSubmit=\"return validasisurvey(this)\">
                            <script language="javascript">
                                function validasisurvey(form) {
                                    if (form.nama_responden.value == "") {
                                        alert("Anda belum mengisikan nama Anda.");
                                        form.nama_responden.focus();
                                        return (false);
                                    }
                                    if (form.companyAddress1.value == "") {
                                        alert("Anda belum mengisikan alamat Anda.");
                                        form.companyAddress1.focus();
                                        return (false);
                                    }
                                }
                            </script>
                            <table class="table">
                                <tr>
                                    <td>
                                        <div class="form-horizontal" style="margin-top:20px;background-color:#fff;padding-top:20px;padding-bottom:20px;">
                                            <div class="page-header" style="margin-left:30px;">
                                                <h3>Biodata Pendengar</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pendengar" class="control-label col-sm-2">Nama pendengar</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-user"></span>
                                                        </div>
                                                        <input type="text" id="nama_pendengar" class="form-control" name="nama_responden" placeholder="Nama pendengar">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="alamat_pendengar" class="control-label col-sm-2">Domisili</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-bookmark"></span>
                                                        </div>
                                                        <input type="text" id="alamat_pendengar" class="form-control" name="domisili" placeholder="Kota Domisili">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">

                                                <label for="produk" class="control-label col-sm-2">Produk</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-tags"></span>
                                                        </div>
                                                        <select name="companyProduct" id="produk" class="form-control">
                                                            <option value="Kartu Halo">Kartu Halo</option>
                                                            <option value="Kartu AS">Kartu AS</option>
                                                            <option value="Kartu Simpati">Kartu Simpati</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="97%" valign="top" align="center" colspan="5" style="border-style: none; border-width: medium">
                                        <font face="Arial" size="1"><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic incidunt magni odit quod repudiandae sequi est accusantium praesentium sapiente. Minus maiores ipsa qui possimus laborum quaerat voluptas nam veniam delectus!<br>
                                            </b><i>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor quibusdam ex minus expedita consectetur sed perferendis officia odio eum laborum optio illo eius, voluptates commodi aliquam possimus! Temporibus, placeat officiis.</i></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <th width='3%'><b>
                                                        <font face='Tahoma' size='2'>No</font>
                                                    </b></th>
                                                <th colspan='2'>
                                                    <p align='center'><b>
                                                            <font face='Tahoma' size='2'>PERTANYAAN</font>
                                                        </b>
                                                </th>
                                                <th colspan="5" bgcolor='#FFFF00'>
                                                    <p align='center'>
                                                        <font face='Tahoma' size='2'>JAWABAN</font>
                                                </th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include "koneksi.php";
                                                error_reporting(0);
                                                $no = 1;
                                                $sql = mysqli_query($koneksi, "SELECT * FROM grup_kuisioner");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                    $id = $data[id];
                                                    echo "<tr valign='top'>
                                                          <td><font face='Tahoma' size='2' colspan='1'><b> $no</b></font></td>
                                                          <td colspan='2'><font face='Tahoma' size='2'><b>$data[nama]</b></font></td>
                                                          
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>A<br>(Sangat Baik)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>B<br>(Baik)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>C<br>(Cukup)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>D<br>(Buruk)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>E<br>(Sangat Buruk)</font></td>
                                                      </tr>";

                                                    $hasil = mysqli_query($koneksi, "SELECT * FROM survey_description, grup_kuisioner WHERE survey_description.grup_id = '$id' AND survey_description.grup_id = grup_kuisioner.id ORDER BY grup_kuisioner.id");
                                                    $i = 1;
                                                    while ($r = mysqli_fetch_array($hasil)) {

                                                        echo "<tr>
                                                              <td colspan='1'></td>
                                                             
                                                              <td colspan='2'><font face='Tahoma' size='2'> $r[pertanyaan]</font></td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[id]' value='A'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[id]' value='B'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[id]' value='C'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[id]' value='D'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[id]' value='E'> </td>
                                                              </tr>";
                                                        $i++;
                                                    }
                                                    echo "<br>";
                                                    $no++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <div class="well">
                                            <h4>Komentar / Saran...</h4>

                                            <div class="form-group">
                                                <textarea name='suggestion' class="form-control" rows="3" placeholder="Tulis Komentar dan Saran..."></textarea>
                                            </div>

                                        </div>
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <center><button type="submit" class="btn btn-primary btn-lg">Submit</button></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="97%" valign="top" align="center" colspan="5" style="border-style: none; border-width: medium">
                                        <center class="well">
                                            <font face="Arial" size="1"><b>Terima Kasih Atas Waktu dan Masukan yang anda berikan,Semua masukan yang anda berikan </b> </i></font>
                                            <font face="Arial" size="1"><b>akan kami terima sebagai sarana bagi kami untuk meningkatkan kulaitas pelanan kami</b> </i></font>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    


    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>