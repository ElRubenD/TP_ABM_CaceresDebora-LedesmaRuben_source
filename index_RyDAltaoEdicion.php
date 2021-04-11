<?php

//conexion con la db
include_once('conexion_db_RyD.php');

session_start();
require 'procesos_RyD.php';

$resultados = mysqli_query($db, "SELECT * FROM personas INNER JOIN localidad USING (CP)");

//print_r($row);

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
		<table class="prim">
			<tr>
				<th>
					<h1> Alta o Edicion de Persona </h1>
				</th>
			</tr>
			<tr>
				<th>
					<form method="POST" action="procesos_RyD.php" >
						<table>
							<tr>
								<th>
									<Label>DNI</Label>
								</th>
								<th>
								<input type="text" name="DNI" value="<?php echo $DNI; ?>" required>
								</th>
							</tr>
							<tr>
								<th>
								<label>Apellido</label>
								</th>
								<th>
									<input type="text" name="Apellido" value="<?php echo $Apellido; ?>" required>
								</th>
							</tr>
							<tr>
								<th>
									<label>Nombre</label>
								</th>
								<th>
									<input type="text" name="Nombre" value="<?php echo $Nombre; ?>" required>
								</th>
							</tr>
							<tr>
								<th>
									<label>Fecha de Nacimiento</label>
								</th>
								<th>
									<input type="date" name="Fecha_Nto" value="<?php echo $Fecha_Nto; ?>" required>
								</th>
							</tr>
							<tr>
								<th>
									<label>Sexo</label>
								</th>
								<th>
									<select type="" name="Sexo" value="<?php echo $Sexo; ?>" required>
										<option value="-"> - </option> 
										<option  value="Femenino">Femenino</option>
										<option  value="Masculino">Masculino</option>
									</select>
								</th>
							</tr>
							<script type="text/javascript">

							// funcion que se ejecuta cada vez que se selecciona una opción

							function cambioOpciones()

							{

								document.getElementById('postal').value=document.getElementById('opciones').value;

							}

							</script>
							<?php
								//traigo todas las localidad de la tabla
								$sqllocalidad = "SELECT * FROM localidad ORDER BY Nombre_L ASC";
								//echo $sqlempresas;
								$result = mysqli_query($db, $sqllocalidad);
								
								//var_dump($result);
								

								//si el registro ya tiene una empresa, mostrar seleccionado
							?>
							<tr> 
								<th><label for="">Localidad</label></th>
								<th>
									<?php
										$marca = $CP;
										echo '<select name="Localidad" id="opciones" onchange="cambioOpciones();" required>';
										echo "<option>-- Seleccione Localidad --</option>";
										while ($fila=mysqli_fetch_array($result))
										{  
											if ($fila['CP'] == $marca) //si es igual mostrar seleccionada la empresa
												{    echo "<option value='".$fila['CP']."' selected>".$fila['Nombre_L']."</option>";
												}
											else
												{    echo "<option value='".$fila['CP']."'>".$fila['Nombre_L']."</option>";
												}
										}
									echo "</select>";
									?>
								</th>	
							</tr>
							<tr>
								<th>
									<label>Codido Postal</label>
								</th>
								<th>
									<input type="text" name="CP" value="<?php echo $CP; ?>" id='postal' required>
								</th>
							</tr>
							<tr>
								<th>
									<label>Dirección</label>
								</th>
								<th>
									<input type="text" name="Direccion" value="<?php echo $Direccion; ?>" required>
								</th>
							</tr>
							<tr>
								<th>
									<label>Teléfono</label>
								</th>
								<th>
									<input type="text" name="Telefono" value="<?php echo $Telefono; ?>" required>
								</th>
							</tr>
							<br>
							<tr>
								<th>
									<!-- Condicion si al presionar boton editar, sino solo queda el guardar -->
									<?php if($update == false ) { ?>
											<button type="submit" name="update"><a hfer="Index_RyDPRegistro.php" target="_blank"> Actualizar existente</a></button>
									<?php } else { ?> 		
											<button type="submit" name="save"><a hfer="Index_RyDPRegistro.php" target="_blank"> Guardar nuevo </a></button>
									<?php } ?> 
								</th>
								<th>
									<button type="submit" name="volver"><a href="Index_RyDRegistro.php"> Volver </a></button>
								</th>
							</tr>
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