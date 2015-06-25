<?php  
	include("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">
    <title>Penerbangan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js' type='text/javascript'></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js' type='text/javascript'></script>
</head>
<body background="b.jpg">
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
          <a class="navbar-brand" href="#" style ="color: #76FF1F">Travelokal.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav nav-pills nav-justified">
            <li class="active" style="color: #76FF1F"><a href="index.php" style ="color: #76FF1F"><h4>Home</h4></a></li>
            <li><a href="login.php" style ="color: #76FF1F"><h4>Log In</h4></a></li>
            
           
              <ul class="dropdown-menu" role="menu">
               
              </ul>
              <li><a href="form-registrasi.php" style ="color: #76FF1F"><h4>Sign Up</h4></a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
 	<h1 align="center"><b><font color="#ffffff">Tiket Pesawat</font></b></h1>
        <h3 ><marquee title="Pesan"><font color="#ffffff">Selamat Datang Di Travelokal</font></marquee></h3>
		
		<form method ="post">
		 <div class="jumbotron" style="color: #76FF1F;">
		<table class="table table-striped" style="color: #0f88cc;">
		<tr class ="table">
			<td><center>	
			<select name="bandara1">
				<option>---- Bandara Keberangkatan ----</option>
				<option value="UPG">--------------- Makasar -----------</option>
				<option value="SBY">-------------- Surabaya ------------</option>
				<option value="JKT">------------ Jakarta -----------</option>
				<option value="DPS">------------ Denpasar ----------- </option>
				</center>
			</select></td></tr>
			
			<tr class="table">
			<td><center>
			<select name="bandara2">
				<option>---- Bandara Tujuan ----</option>
				<option value="UPG">---------- Makasar ---------</option>
				<option value="SBY">----------- Surabaya --------</option>
				<option value="JKT">----------- Jakarta --------</option>
				<option value="DPS">---------- Denpasar -------- </option>
			</center>
			</select></td>
			</tr>
			<tr class ="table">
			<td> <center>
			<b><font color="00000">Banyak orang :</font></b></center></td></tr>
			</tr><tr class ="table">
			<td> <center>
			<input type ="number" name ="jumlah" placeholder="Jumlah Orang" required /></center></td> </tr>
			</tr>
			<tr class="table">
			<td> <center>
			<b><font color="#00000">Tanggal Berangkat :</font></b></center></td></tr>
			</tr><tr class ="table">
			<td> <center>
			<input type ="date" name ="tanggal" placeholder="Tanggal" required /></center></td>
			</tr><tr class ="table">
			<td> <center>
			<button class="btn btn-primary" type="submit" name="Cari" >Submit</button></center></td></tr>
		</form>	
		</table>	
		<table class="table table-striped" style="color: #0f88cc;">
			<?php   		
				if(isset($_POST['Cari'])){
					$keberangkatan = $_POST['bandara1'];
					$tujuan = $_POST['bandara2'];
					$jumlah = $_POST['jumlah'];
					$date = $_POST['tanggal'];	

					$queryselect = "SELECT logo, nomerpenerbangan, namapesawat, keberangkatan, bandara1.kotabandara as kotabandara1, bandara1.namabandara as namabandara1, 
									tujuan, bandara2.kotabandara, bandara2.namabandara, waktu, harga
									FROM pesawat
									LEFT JOIN jadwalpenerbangan ON pesawat.idpesawat = jadwalpenerbangan.idpesawat
									LEFT JOIN bandara1 ON bandara1.idbandara = jadwalpenerbangan.keberangkatan
									LEFT JOIN bandara2 ON jadwalpenerbangan.tujuan = bandara2.idbandara where keberangkatan ='$keberangkatan' AND tujuan='$tujuan' ";
					$result= mysqli_query($koneksi, $queryselect);
					
					if (mysqli_query($koneksi, $queryselect)) {
						
						echo "
						<thead>
							<tr class='table'>
								<th> Pesawat </th>
								<th> Nomer Penerbangan</th>
								<th> Nama Pesawat</th>
								<th> Keberangkatan</th>
								<th> Tujuan</th>
								<th> Jam Penerbangan</th>
								<th> Harga</th>
								<th> Action</th>
							</tr>
						</thead>
						<tbody>";

						while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
							$total=$row['harga']*$jumlah;
										
							echo "<tr class='table'>";
								echo "<td><center><img src ='imagespesawat/".$row['logo']."' width=80px</center></td>";
								echo "<td>". $row['nomerpenerbangan']. "</td>";
								echo "<td>". $row['namapesawat']. "</td>";
								echo "<td>". $row['keberangkatan']. "</td>";
								echo "<td>". $row['tujuan']. "</td>";
								echo "<td>". $row['waktu']. "</td>";	
								echo "<td>Rp.". $total. "</td>";				
								echo "<td><a href='pilihpenerbangan.php?nomerpenerbangan=$row[nomerpenerbangan]&total=$total&jumlah=$jumlah&date=$date'><button type='button' class='btn btn-primary'>Pilih Penerbangan Ini</button></a></td>";
							echo "</tr>";
						}
					}else{
						echo "Error: ". $queryselect. "<br>". mysqli_error($koneksi);
					}
					mysqli_close($koneksi);
				}
						
			?>
			</tbody>
		</table>
		</div>
		
	  </div>			
      <!-- Site footer -->
    </div>
	<footer class="footer" >
    	<p align="center" style="color: #ffffff">&copy;Travelokal 2015</p>
    </footer>
</body>
</html>