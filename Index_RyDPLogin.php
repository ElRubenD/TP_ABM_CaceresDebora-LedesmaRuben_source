<?php
session_start();
require 'conexion_db_RyD.php'; //configuración conexión db
require 'login_RyD.php';	   //procesos de login

// verifico si el usuario tiene creada la sesion previamente
if(isset($_SESSION['usuario'])){
	header('Location: panel_RyD.php');
	exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login de Usuarios</title>
<link rel="stylesheet" href="estilos.css" media="all" type="text/css">
</head>

<body>
	<header>
		<img src="./Banco de Sangre.png" class="chica">
	</header>
	<table class="prim">
		<tr>
			<th>
				<h1 class="centro">Login de Usuarios</h1>
			</th>
		</tr>
		<tr>
			<th>
				<form action="" method="POST">
					<table class="sec">
						<th class="fijo">
							<div>
								<label for="usuario"><b>Usuario</b></label>
								<br>
								<input type="usuario" placeholder="Ingrese el usuario" id="usuario" name="form_usuario" required>
								<br><br>
								<label for="password"><b>Clave</b></label>
								<br>
								<input type="password" placeholder="Ingrese la clave" id="password" name="form_password" required>
								<br><br>
								<button type="submit">Ingresar</button>
								<br><br>
								<a href="Login_RyDCuentaNueva.php"><button type="button" class="Regbtn">Registrar usuario</button></a>
							</div>
						</th>
						
						<?php
						//mensajes de alerta

						//en caso de exito mostrar mensaje exitoso
						if(isset($success_message)){
							echo '<div class="success_message">'.$success_message.'</div>'; 
						}
						//en caso de error mostrar mensaje con error
						if(isset($error_message)){
							echo '<div class="error_message">'.$error_message.'</div>'; 
						}	
						?>

						<!-- <div class="container">
							<a href="registrar_RyD.php"><button type="button" class="Regbtn">Registrar usuario</button></a>
						</div> -->
					</table>
				</form>
			</th>
		</tr>
	</table>
	<footer>
		<img src="./Twitter_2.png" class="logo">
		<img src="./WhatsApp_2.png" class="logo">
		<img src="./Youtube_2.png" class="logo">
		<img src="./Facebook_2.png" class="logo">
		<img src="./Github_2.png" class="logo">
		<img src="./Instagram_2.png" class="logo">
		<img src="./Linkedin_2.png" class="logo">
	</footer>
</body>
</html>