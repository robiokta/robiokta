<?php  
	include("koneksi.php");
	$jumlah = $_GET['jumlah'];
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validasi Data</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="justified-nav.css" rel="stylesheet">
    <script src ="js/ie-emulation-modes-warning.js"></script>
</head>
<body background="bg1.jpg">
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
            
            
           
              <ul class="dropdown-menu" role="menu">
               
              </ul>
              <li class="active" style="color: #76FF1F"><a href="#" style ="color: #76FF1F"><h4>Penginputan Data</h4></a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="container">
      <div class="masthead">
        <h1 align="center"><b>Tiket Pesawat</b></h1>
        <h3 ><marquee title="Pesan">Selamat Datang Di Travelokal</marquee></h3>
	
	
		<div class="jumbotron">
			<h4 align="center">Kontak Yang bisa dihubungi</h4>			
	        <form method="post" class="form-horizontal">
	        <div class="form-group">
	              <label for="inputemail" class="col-sm-2 control-label">Nama</label>
	              <div class="col-sm-10">
	                <input type="text" name="nama" class="form-control" id="inputemail" placeholder="Nama">
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="inputemail" class="col-sm-2 control-label">Email</label>
	              <div class="col-sm-10">
	                <input type="text" name="email" class="form-control" id="inputemail" placeholder="Email">
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="inputnotelp" class="col-sm-2 control-label">No Telp</label>
	              <div class="col-sm-10">
	                <input type="text" name="tlp" class="form-control" id="inputnotelp" maxlength="12" placeholder="No Telp">
	              </div>
	            </div>	
				<?php 
					for ($i=1; $i<=$jumlah; $i++){
					echo '<h4 align="center">Penumpang '.$i.'</h4>
			            <div class="form-group">
			              <label for="inputtitle" class="col-sm-2 control-label">Title</label>
			              <div class="col-sm-10">
			                <input type="text" name="titlepenumpang'.$i.'" class="form-control" id="inputtitle" placeholder="Title">
			              </div>
			            </div>
			            <div class="form-group">
			              <label for="inputnama" class="col-sm-2 control-label">Nama</label>
			              <div class="col-sm-10">
			                <input type="text" name="namapenumpang'.$i.'" class="form-control" id="inputnama" placeholder="Nama">
			              </div>
			            </div>';
			        }
		        ?>
		        <div class="form-group">
	              <div class="col-sm-offset-2 col-sm-10">
	                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
	              </div>
	            </div>
	        </form>

	        <?php
				if(isset($_POST['submit'])){
			
				$nama = $_POST['nama'];
				$title = $_POST['title'];
				$email = $_POST['email'];
				$notlp = $_POST['tlp'];
				
				$query = "INSERT INTO customer (namacustomer, tittle, nomertlp, email) VALUES ('$nama','$title','$notlp','$email')";
						
				if(mysqli_query($koneksi, $query)){
					for ($i=1; $i<=$jumlah; $i++){
					  $namapenumpang = $_POST["namapenumpang$i"];
					  $titlepenumpang = $_POST["titlepenumpang$i"];

					  $query = "INSERT INTO customer (namacustomer,tittle) VALUES ('$namapenumpang','$titlepenumpang');";
							
					  if(mysqli_query($koneksi, $query)){
						echo "penginputan berhasil";
					  } else {
						echo "terjadi error";
					  }
					}
						echo "penginputan berhasil";
					
					} else {
					echo "terjadi error";
					}
					echo '<META HTTP-EQUIV="Refresh" Content="1; URL=pembayaran.php">';	
				} else {
					mysqli_error($koneksi);
				}
				mysqli_close($koneksi);
			?>
		</div>
	  </div>
	</div>
</body>
</html>