<?php  
  include("koneksi.php");
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../favicon.ico">
  <title>Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js' type='text/javascript'></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js' type='text/javascript'></script>
</head>
<body background="b.jpg">
  <div class="container">
    <div class="masthead">
      <h1 align="center"><b><font color="#ffffff">Tiket Pesawat</font></b></h1>
      <h1 align="center"><b><font color="#ffffff">Tiket Pesawat</font></b></h1>
      <h1 align="center"><b><font color="#ffffff">Tiket Pesawat</font></b></h1>
      <h3 align="center" ><font color="#ffffff">Silahkan Masukkan Password Dan Username Anda </font></h3>
   <div class="container">
      <div class="masthead">
       
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style ="color: #76FF1F">Travelokal.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav nav-pills nav-justified">
            <li ><a href="index.php" style ="color: #76FF1F"><h4>Home</h4></a></li>
            <li class="active" style="color: #0f88cc"> <a href="login.php" style ="color: #76FF1F"><h4>Log In</h4></a></li>
            
           
              <ul class="dropdown-menu" role="menu">
               
              </ul>
              <li><a href="form-registrasi.php" style ="color: #76FF1F"><h4>Sign Up</h4></a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

      <div class="jumbotron">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label for="inputusername" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="inputusername" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-default">Sign in</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              Belum punya Akun? <a href='form-registrasi.php'>Sign Up</a>
            </div>
          </div>
        </form>
      </div>

      <?php
        if(isset($_POST['submit'])){
          $username =$_POST['username'];
          $password = md5($_POST['password']);
              
          $sqlselect = "SELECT * FROM user WHERE username='$username' AND password='$password'";
          $result =mysqli_query($koneksi,$sqlselect);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
              
          if (mysqli_num_rows($result)==1) { 
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = $row['level'];
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=welcome.php">';
          } else {
            echo "<div class='alert alert-danger' role='alert'> Login gagal! Perikswa kembali username password anda";
          }
          mysqli_close($koneksi); 
        }  
      ?>
    </div>
  </div> 
  <footer class="footer" >
    <p align="center" style="color: #ffffff">&copy;Travelokal 2015</p>
  </footer>
</body>
</html>