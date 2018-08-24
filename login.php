<?php
error_reporting(0);
include("clases.php");
$cnn = $base->devolverCnn();
				//se envia la consulta

if(isset($_POST['usr']) && isset($_POST['pass']) ) {
	$user=$_POST['usr'];
	$pass=$_POST['pass'];
	$result = mysql_query("SELECT * FROM usuario where usuario='$user' and pass='$pass'", $cnn); 
	$row=mysql_fetch_row($result);
	if($_POST['usr']== $row[1] && $_POST['pass']== $row[2]){			//compruebo que el usuario y contraseña ingresado sea igual a lo q se encuentra dentro del if
		session_start();
		$_SESSION['clave']= true;
		$_SESSION['usr']=$_POST['usr'];
		$_SESSION['idUser']=$row[0];
			header('location: dashboard.php');
			exit();	
		
	}
	else{
		echo "<div class=\"col-md-4 col-md-offset-4\"><div class=\"alert alert-danger\">Usuario o contraseña incorrectos </div></div>";
	}

}


?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CUCE</title>

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
						  	<center><h3>LOGIN CUCE</h3></center></div>
				<div class="col-md-4 col-md-offset-4">

					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title">Login</h3>
						  </div>
						  <div class="panel-body">
								<form action="login.php" method="post">
									<input type="text" class="form-control" placeholder="Escriba Usuario" name="usr">
									<br>
									<input type="password" class="form-control" placeholder="Escriba Contraseña" name="pass">
									<br>
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary pull-right">
                                        Ingresar
                                    </button>
								</form>
						  </div>
					</div>
				</div>
			</div>
		</div>





		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>