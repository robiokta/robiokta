<?php  
  include ("koneksi.php");
  $nomerpenerbangan = $_GET['nomerpenerbangan'];
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../favicon.ico">
  <title>Delete Data</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="justified-nav.css" rel="stylesheet">
  <script src ="js/ie-emulation-modes-warning.js"></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js' type='text/javascript'></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js' type='text/javascript'></script>
</head>
<body background="bg1.jpg">
  <div class="container">
      <div class="masthead">
        <h1 align="center"><b>Tiket Pesawat</b></h1>
        <h3 ><marquee title="Pesan">Selamat Datang Di Travelokal <?php echo $_SESSION["nama"] ?></marquee></h3>

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
            <li > <a href="insert.php" style ="color: #76FF1F"><h4>Tambah Data</h4></a></li>
            <li class="active" style="color: #76FF1F"><a href="#delete.php" style ="color: #76FF1F"><h4>Hapus Data</h4></a></li>
            
           
              <ul class="dropdown-menu" role="menu">
               
              </ul>
              <li ><a href="logout.php" style ="color: #76FF1F"><h4>Log Out</h4></a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';


          $queryselect = "SELECT * FROM jadwalpenerbangan where nomerpenerbangan='$nomerpenerbangan'";
          $result= mysqli_query($koneksi, $queryselect);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

          if (mysqli_num_rows($result) == " "){
            echo '<center><b><font>Data not found</font></b></center>';
          } else {
        ?>
        <div class="jumbotron">
        	<form method="post" class="form-horizontal">
				<h4>Apakah Anda Yakin data Ini ?</h4>
				<div class="form-group">
				    <label for="inputnomerpenerbangan" class="col-sm-2 control-label">Nomer Penerbangan</label>
				    <div class="col-sm-10">
				        <input type="text" name="nomerpenerbangan" class="form-control" id="inputnomerpenerbangan" disabled value ="<?php echo $row['nomerpenerbangan']; ?>">
				    </div>
				</div>
				<div class="form-group">
	              <label for="inputidpesawat" class="col-sm-2 control-label">ID Pesawat</label>
	              <div class="col-sm-10">
	                <input type="text" name="idpesawat" class="form-control" id="inputidpesawat" disabled value="<?php echo($row['idpesawat']); ?>">
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="inputkeberangkatan" class="col-sm-2 control-label">Keberangkatan</label>
	              <div class="col-sm-10">
	                <input type="text" name="keberangkatan" class="form-control" id="inputkeberangkatan" disabled value="<?php echo($row['keberangkatan']); ?>">
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="inputtujuan" class="col-sm-2 control-label">Tujuan</label>
	              <div class="col-sm-10">
	                <input type="text" name="tujuan" class="form-control" id="inputtujuan" disabled value="<?php echo  $row['tujuan']; ?>">
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="inputwaktu" class="col-sm-2 control-label">Waktu</label>
	              <div class="col-sm-10">
	                <input type="text" name="waktu" class="form-control" id="inputwaktu" disabled value="<?php echo(  $row['waktu']); ?>">
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="inputharga" class="col-sm-2 control-label">Harga Tiket</label>
	              <div class="col-sm-10">
	                <input type="number" name="harga" class="form-control" id="inputharga"disabled value="<?php echo(  $row['harga']); ?>">
	              </div>
	            </div>
				 <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				 		<input type="submit" name="submit"/>
				 		<input type="button" value="cancel" onclick="window.location='welcome.php'">
				    </div>
				 </div>
			</form>
        <?php 
		  }
		 
		 if (isset($_POST['submit'])) {
		 	$query="DELETE FROM jadwalpenerbangan where nomerpenerbangan='$nomerpenerbangan'";
		 	
		 	if (mysqli_query($koneksi,$query)) {
		 		echo "Data Telah Di Hapus";
		 		echo '<META HTTP-EQUIV="Refresh" Content="1; URL=welcome.php">';
		 	}else{
		 		echo "Error : " .$query . "<br>" . mysqli_Error($koneksi);
		 	}
		 	mysqli_close($koneksi);
		 }
	 	 ?>
        </div>       
      </div>
    </div>
</body>
</html>
