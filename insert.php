<?php  
  include ("koneksi.php");
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../favicon.ico">
	<title>Tambah Penerbangan</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="justified-nav.css" rel="stylesheet">
  <script src ="js/ie-emulation-modes-warning.js"></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js' type='text/javascript'></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js' type='text/javascript'></script>
</head>
<body background="bg1.jpg">
  <div class="container">
      <div class="masthead">
        <h1 align="center"><b>Inpukan Data Penerbangan Baru</b></h1>
        <h3 align="center" >Inpukan Data Penerbangan Baru</h3>

        <?php  
        echo '

        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="welcome.php" style ="color: #76FF1F">Travelokal.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav nav-pills nav-justified">
          <li class="active" style="color: yellow"><h3>'.$_SESSION["level"].' : '.$_SESSION["nama"].'</h3></a></li> 
            <li ><a href="welcome.php" style ="color: #76FF1F"><h4>Home</h4></a></li>
            <li class="active" style="color: #76FF1F"> <a href="insert.php" style ="color: #76FF1F"><h4>Tambah Data</h4></a></li>
            
           
              <ul class="dropdown-menu" role="menu">
               
              </ul>
              <li ><a href="logout.php" style ="color: #76FF1F"><h4>Log Out</h4></a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';
      
        ?>
        <div class="jumbotron">
          <form method="post" class="form-horizontal">
            <div class="form-group">
              <label for="inputnopenerbangan" class="col-sm-2 control-label">No Penerbangan</label>
              <div class="col-sm-10">
                <input type="text" name="nomerpenerbangan" class="form-control" id="inputnopenerbangan" placeholder="No Penerbangan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputidpesawat" class="col-sm-2 control-label">ID Pesawat</label>
              <div class="col-sm-10">
                <input type="text" name="idpesawat" class="form-control" id="inputidpesawat" placeholder="ID Pesawat">
              </div>
            </div>
            <div class="form-group">
              <label for="inputkeberangkatan" class="col-sm-2 control-label">Keberangkatan</label>
              <div class="col-sm-10">
                <input type="text" name="keberangkatan" class="form-control" id="inputkeberangkatan" placeholder="keberangkatan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputtujuan" class="col-sm-2 control-label">Tujuan</label>
              <div class="col-sm-10">
                <input type="text" name="tujuan" class="form-control" id="inputtujuan" placeholder="tujuan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputwaktu" class="col-sm-2 control-label">Waktu</label>
              <div class="col-sm-10">
                <input type="text" name="waktu" class="form-control" id="inputwaktu" placeholder="waktu keberangkatan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputharga" class="col-sm-2 control-label">Harga Tiket</label>
              <div class="col-sm-10">
                <input type="number" name="harga" class="form-control" id="inputharga" placeholder="harga Tiket">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="ok" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>

          <?php 
              if (isset($_POST['ok'])) {
                $idpesawat = $_POST['idpesawat'];
                $nomerpenerbanagan = $_POST['nomerpenerbangan'];
                $keberangkatan = $_POST['keberangkatan'];
                $tujuan = $_POST['tujuan'];
                $waktu  = $_POST ['waktu'];
                $harga = $_POST ['harga'];
                
                $query = "INSERT INTO jadwalpenerbangan (idpesawat, nomerpenerbangan, keberangkatan, tujuan,waktu,harga)
                          values ('$idpesawat','$nomerpenerbanagan','$keberangkatan','$tujuan','$waktu',$harga)";
                     
                if(mysqli_query($koneksi, $query)){
                  echo '<META HTTP-EQUIV="Refresh" Content="1; URL=welcome.php">';
                  echo "New Data has been Created";
                } else {
                  echo "terjadi error";
                }
              
              } else {
                mysqli_error($koneksi);
              }
              mysqli_close($koneksi);
          ?>
        </div>     
    </div>
  </div>

  <footer class="footer" >
    <p align="center">&copy;Travelokal 2015</p>
  </footer>

</body>
</html>