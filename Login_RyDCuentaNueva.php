<?php 
session_start();
require 'conexion_db_RyD.php';	 //conexion a db
require 'alta_usuario_RyD.php';  //procesos de alta

// verifico si el usuario tiene creada la sesion previamente
if(isset($_SESSION['user_email'])){
	header('Location: index_RyD.php');
	exit;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de usuario - Banco de Sangre</title>
<link rel="stylesheet" href="estilos.css" media="all" type="text/css">
</head>

<body>
	<header>
		<img src="./Banco de Sangre.png" class="chica">
	</header>
	<table class="prim">
		<tr>
			<th>
				<h1>Crear una cuenta de usuario</h1>
			</th>
		</tr>
		<tr>
			<th>
				<form action="" method="POST">
					<table class="sec">
						<th class="fijo">
							<div>
								<br>
								<label for="username"><b>Usuario</b></label>
								<br>
								<input type="text" placeholder="Ingrese el nombre de usuario" id="username" name="form_usuario" required>
								<br><br>
								<label for="email"><b>Email</b></label>
								<br>
								<input type="email" placeholder="Ingrese el email" id="email" name="form_email" required>
								<br><br>
								<label for="password"><b>Clave</b></label>
								<br>
								<input type="password" placeholder="Ingrese la clave" id="password2" name="form_password" required>
								<br><br>
								<button type="submit">Registrar</button>
								<a href="Index_RyDPLogin.php"><button type="button" class="Regbtn">Acceder</button></a>
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
							</div>
						</th>
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