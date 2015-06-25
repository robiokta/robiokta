<?php  
	include("koneksi.php");
	$jumlah = $_GET['jumlah'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validasi Data</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="justified-nav.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
	<form method ="post">
	<table border="0" cellspacing="1">

	<tr>
		<td></td>
		<td></td>
		<td >Kontak Yang Bisa Dihubungi
		</td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
	<td>
	<td>Email : <input type="emai" name="email"><required></td>
	<td>Nomer Telpon : <input type="text" name ="tlp"><required></td>
	
	</tr>
	<tr>
		<?php 
		for ($i=1; $i<=$jumlah; $i++){
			echo "<tr><td>Title <input type ='text' name ='titlepenumpang$i'></td>";
			echo "<td>Nama Penumpang <input type ='text' name ='namapenumpang$i'></td></tr>";
		}
		?>
	</tr>
			
	</tr>
	<td>

<input type ="submit" name="submit" value="submit">
	</td>

	<?php
		if(isset($_POST['submit'])){
	
		$nama=$_POST['nama'];
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
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=pembayaran.php">';
			//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=pembayaran.php">';
		
		} else {
			mysqli_error($koneksi);
		}
		mysqli_close($koneksi);

	?>
	</table>
	</form>
</body>
</html>