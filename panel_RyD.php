<?php
session_start();
require 'conexion_db_RyD.php';

	// verifico si el usuario tiene creada la sesion previamente, si el email esta en la variable de sesion.
	if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){

		$usuario = $_SESSION['usuario'];
		
		// Traigo los datos del email correspondiente, por ej. nombre de usuario, apellido, nombre ,etc
		$get_datos_usuario = mysqli_query($db, "SELECT * FROM `usuarios` WHERE usuario = '$usuario'");
		$datosUsuario =  mysqli_fetch_assoc($get_datos_usuario);

	}else{
		//si no esta es porque no pasó por el formulario de login, asi que afuera
		header('Location: salir_RyD.php');
	exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="estilos.css" type="text/css" media=screen>
	<link rel=StyleSheet href="fonts/Style2.css" type="text/css" media=screen>
    <title>Banco de Sangre</title>
</head>
<body>
    <header>
        <img src="./Banco de Sangre.png" class="chica">
    </header>

    <div class="container">
		<a href="Index_RyDRegistro.php"><button class="portada">Registros</button></a>
		<a href="index_RyDAltaoEdicion.php"><button class="portada">Nuevo Registro</button></a>
		<a href="index_RyDResultado.php"><button class="portada">Resultado</button></a>
		<a href=".php"><button class="portada">Buscar Registro</button></a>
        <a href="salir_RyD.php"><button class="portada">Cerrar Sección</button></a>
    </div>

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