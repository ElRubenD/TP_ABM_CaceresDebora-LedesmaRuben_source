<?php

//conexion con la db
include_once('conexion_db_RyD.php');

session_start();
require 'procesos_RyD.php';

$resultados = mysqli_query($db, "SELECT * FROM personas INNER JOIN localidad USING (CP)");


//Verificar si por url vienen un id, o es diferente del index.php

if(isset($_GET['edit'])){
	
	$DNI = $_GET['edit'];
	
	//coloco marca para el boton
	$update = false;
	
/* 	echo 'el id que quiero editar es:'.$id; */
	
	//un array de objetos
	$registro = mysqli_query($db, "SELECT * FROM personas WHERE DNI = $DNI");
	
	//verifico que al editar no sea vacio
	if(!empty($registro) == 1){
		
		//guardo los datos en un array
		$datos = mysqli_fetch_array($registro);
		
		//guardo los datos en variables
		$Apellido = $datos['Apellido'];
		$Nombre = $datos['Nombre'];
		$Fecha_Nto = $datos['Fecha_Nto'];
		$Sexo=$datos['Sexo'];
		$CP=$datos['CP'];
		$Direccion=$datos['Direccion'];
		$Telefono=$datos['Telefono'];	
	}
	
}

//Tabla de registro y formulario
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

		<h2 class="mover">Registros</h2>
		<table class="botones">
			<tr>
				<th>
					<div class="bott">
						<button type="submit" name="nuevo"><a href="Index_RyDAltaoEdicion.php" target="_blank"> Nuevo Registro </a></button>
					</div>
				</th>
				<th>
					<div class="bott">
						<button><a href="panel_RyD.php">Volver</a></button>
					</div>
				</th>
			</tr>
		</table>
		<table border="2" cellpadding="10" class="sec">
			<!-- cellpadding para la distancia en la celdas -->
			<thead>
				<tr class="encabezado">
					<th>DNI</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Fecha Nacimiento</th>
					<th>Sexo</th>
					<th>Codido Postal</th>
					<th>Direcci??n</th>
					<th>Tel??fono</th>
					<th>ACCION</th>
				</tr>	
			</thead>
			<?php
			
				while($fila = mysqli_fetch_array($resultados)) {
			?>
				<tr>
					<td class="esp"><?php echo $fila['DNI']; ?></td>
					<td class="esp"><?php echo $fila['Apellido']; ?></td>
					<td class="esp"><?php echo $fila['Nombre']; ?></td>
					<td class="esp"><?php echo $fila['Fecha_Nto']; ?></td>
					<td class="esp"><?php echo $fila['Sexo']; ?></td>
					<td class="esp"><?php echo $fila['CP']; ?></td>
					<td class="esp"><?php echo $fila['Direccion']; ?></td>
					<td class="esp"><?php echo $fila['Telefono']; ?></td>
					<td class="esp"><a href="index_RyDAltaoEdicion.php?edit=<?php echo $fila['DNI'];?>" target="_blank"><span class="icon-pen"> </span></a> &nbsp &nbsp
					<a href="procesos_RyD.php?delete=<?php echo $fila['DNI']; ?>" ><span class="icon-trash"> </span></a></td>
					<!-- &nbsp CARACTER DE CONTROL para darle mas espacio entre atributos -->
				</tr>
				<?php }?>
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