<?php include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            DATA GRUPSIARAN
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Grup</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info">

                    <div class="box-header">
                        <h3 class="box-title">Data Pilihan</h3>
                        <div class="btn-group pull-right">



                        </div>
                    </div>
                    <div class="box-body">
                        <center>
                            <canvas id="myChart"></canvas>
                        </center>
                        <table id="myHTMLTable" border="0" cellpadding="5" class="table table-striped">
                            <tr>
                                <th width="15%">
                                    <font size=2 face=tahoma>Data</font>
                                </th>
                                <th width="18%">
                                    <font size=2 face=tahoma>Jawaban A</font>
                                </th>
                                <th width="18%">
                                    <font size=2 face=tahoma>Jawaban B</font>
                                </th>
                                <th width="18%">
                                    <font size=2 face=tahoma>Jawaban C</font>
                                </th>
                                <th width="18%">
                                    <font size=2 face=tahoma>Jawaban D</font>
                                </th>
                                <th>
                                    <font size=2 face=tahoma>Jawaban E</font>
                                </th>
                            </tr>
                            <?php
                            include "../koneksi.php";
                            // include "../parser-php-version.php";
                            $sql = mysqli_query($koneksi, "SELECT
                                                                SUM(CASE WHEN jawaban = 'A' THEN 1 ELSE 0 END) AS total_A,
                                                                SUM(CASE WHEN jawaban = 'B' THEN 1 ELSE 0 END) AS total_B,
                                                                SUM(CASE WHEN jawaban = 'C' THEN 1 ELSE 0 END) AS total_C,
                                                                SUM(CASE WHEN jawaban = 'D' THEN 1 ELSE 0 END) AS total_D,
                                                                SUM(CASE WHEN jawaban = 'D' THEN 1 ELSE 0 END) AS total_E
                                                            FROM hasil_survey;");

                            // $des = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tdescription"));
                            $noo = 1;
                            $oke = mysqli_fetch_array($sql);
                            $a = $oke['total_A'];
                            $b = $oke['total_B'];
                            $c = $oke['total_C'];
                            $d = $oke['total_D'];
                            $e = $oke['total_E'];
                            $tot = $a + $b + $c + $d + $e;

                            $pa = ROUND(($a / $tot) * 100);
                            $pb = ROUND(($b / $tot) * 100);
                            $pc = ROUND(($c / $tot) * 100);
                            $pd = ROUND(($d / $tot) * 100);
                            $pe = ROUND(($e / $tot) * 100);
                            echo "<tr>
						<td><font size=3 face=tahoma>Jumlah Jawaban</font></td>
						<td><font size=2 face=tahoma>$a</font></td>
						<td><font size=2 face=tahoma>$b</font></td>
						<td><font size=2 face=tahoma>$c</font></td>
						<td><font size=2 face=tahoma>$d</font></td>
						<td><font size=2 face=tahoma>$e</font></td>
					  </tr>
					  <tr >
						<td><font size=3 face=tahoma>Prosentase</font></td>
						<td><font size=2 face=tahoma>$pa%</font></td>
						<td><font size=2 face=tahoma>$pb%</font></td>
						<td><font size=2 face=tahoma>$pc%</font></td>
						<td><font size=2 face=tahoma>$pd%</font></td>
						<td><font size=2 face=tahoma>$pe%</font></td>
					  </tr>
					  ";
                            ?>

                        </table>

                    </div>

                </div>
            </section>


        </div>
    </section>

</div>
<?php include 'footer.php'; ?>s