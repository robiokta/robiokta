<!DOCTYPE html>
<html>
<head>
	<title>registrasi</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Theme Template for Bootstrap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
 <div class="jumbotron">
      <form class ="form-signin" method ="post">
	  <h2 class ="form-signin-heading"> Please Sign in </h2>
	  <label class ="sr-only"> username </label>
	  <input type= "text" name="email" class ="form-control" placeholder = "password" required autofocus>
	  <label class ="sr-only"> Password </label>
 <input type= "password" name="notran" class ="form-control" placeholder ="password" required>	  
	<div class ="checkbox">
	<label>
	<input type ="checkbox" value="remember-me"> Remember Me
	</label>
	</div>
	<button class "btn btn-lg btn-primary btn-block" type ="submit" name="signin">Sign In</button>
	
	</form>
      </div>
       <?php
	include "koneksi.php";

	if (isset ($_POST['signin'])){
	$username = $_POST['email'];
	$password = $_POST['notran'];
	$select="SELECT * FROM registrasi WHERE email ='$username' AND notran ='$password';";
	$result= mysqli_query($koneksi,$select);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if (mysqli_num_rows($result)==1){
	$_SESSION['username']= $row ['email'];
	echo '<meta http-equiv="refresh" content="0; url=registrasicomplete.php">';
	}
	else {
	echo "<div class ='alert alert-danger' role='alert'> Login Gagal !! Periksa kembali username dan password anda </div>";
	}

}
  ?>

</body>
</html>