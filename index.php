<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Jadwal Siaran</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    body {
      background-image: url('gambar/user/bg.png'); /* Ganti dengan path gambar Anda */
      background-size: cover; /* Mengatur gambar agar menutupi seluruh halaman tanpa memperbesar */
      background-repeat: no-repeat; /* Mencegah pengulangan gambar */
      background-position: center; /* Menempatkan gambar di tengah */
      background-attachment: fixed; /* Membuat background tetap saat di-scroll */
    }

    .login-box {
      background-color: rgba(255, 255, 255, 0.8); /* Warna putih dengan transparansi 80% */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-box h2, .login-box h3 {
      color: #4682b4; /* Warna biru muda */
    }
  </style>
</head>
<body class="bg-primary">
  <div class="container">
    <div class="login-box">

      <center>

        <h2>SISTEM INFORMASI</h2>
        <h3>JADWAL SIARAN</h3>

        <br/>

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
          }else if($_GET['alert'] == "logout"){
            echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
          }else if($_GET['alert'] == "belum_login"){
            echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES APLIKASI</div>";
          }
        }
        ?>
      </center>

      <div class="login-box-body">

        <p class="login-box-msg text-bold">LOGIN</p>

        <form action="periksa_login.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
