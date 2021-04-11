<?php

//Conexion con la base de datos
require 'conexion_db_RyD.php'; //configuración conexión db

// inicializo las variables que voy a usar
$DNI = '';
$Apellido = '';
$Nombre = '';
$Fecha_Nto = '';
$Sexo= '';
$CP= '';
$Direccion='';
$Telefono = '';
$fila= ''; 

//variable logica solo para chequear si entra o no a editar
$update = true;

//INSERT INTO `miembros` (`id`, `apellido`, `nombre`, `email`, `activo`) VALUES (NULL, 'aaa', 'aaa', 'aaa', '');(codigo de SQL)

//Insertar nuevos registros, si se presiona el boton guardar
if(isset($_POST['save'])){
	
	//recibo las variables del formulario
	$DNI=$_POST['DNI'];
	$Apellido = $_POST['Apellido'];
	$Nombre = $_POST['Nombre'];
	$Fecha_Nto = $_POST['Fecha_Nto'];
	$Sexo = $_POST['Sexo'];
	$CP=$_POST['CP'];
	$Direccion = $_POST['Direccion'];
	$Telefono =$_POST['Telefono'];

	//Muestro que llegaron los campos ingresados
	echo 'llega el campo: '.$DNI;
	echo 'llega el campo : '.$Apellido;
	echo 'llega el nombre : '.$Nombre;
	echo 'llega el campo : '.$Fecha_Nto;
	echo 'llega el campo : '.$Sexo;
	echo 'llega el campo: '.$CP;
	echo 'llega el campo : '.$Direccion;
	echo 'llega el telefono: '.$Telefono;
	
	//exit;
	
	mysqli_query($db, "INSERT INTO personas (DNI, Apellido, Nombre, Fecha_Nto, Sexo, CP, Direccion, Telefono) VALUES ('$DNI', '$Apellido', '$Nombre', '$Fecha_Nto', '$Sexo', '$CP', '$Direccion', '$Telefono')");

	//lo redireccion a la pagina ppal, la que me interesa
	header('location: index_RyDPRegistro.php');
}

//UPDATE `personas` SET `DNI`=[value-1],`Apellido`=[value-2],`Nombre`=[value-3],`Fecha_Nto`=[value-4],`Sexo`=[value-5],`CP`=[value-6],`Direccion`=[value-7],`Telefono`=[value-8] WHERE 1 (codigo de SQL)

//Actualizar un registro ya cargado, al presionar enlace editar
if(isset($_POST['update'])){

	$DNI=$_POST['DNI'];

	//actualizare las variables 
	$Apellido = $_POST['Apellido'];
	$Nombre = $_POST['Nombre'];
	$Fecha_Nto = $_POST['Fecha_Nto'];
	$Sexo = $_POST['Sexo'];
	$CP = $_POST['CP'];
	$Direccion = $_POST['Direccion'];
	$Telefono = $_POST['Telefono'];
	
	echo 'llega el campo : '.$Apellido;
	echo 'llega el nombre : '.$Nombre;
	echo 'llega el campo : '.$Fecha_Nto;
	echo 'llega el campo : '.$Sexo;
	echo 'llega el campo: '.$CP;
	echo 'llega el campo : '.$Direccion;
	echo 'llega el telefono: '.$Telefono;

	//exit;
	
	mysqli_query($db, "UPDATE personas SET Apellido='$Apellido', Nombre='$Nombre', Fecha_Nto='$Fecha_Nto', Sexo='$Sexo', CP='$CP', Direccion='$Direccion', Telefono='$Telefono' WHERE DNI='$DNI' ");
	//lo redireccion a la pagina principal, la que me interesa
	header('location: index_RyDRegistro.php');
}

 //DELETE FROM `miembros` WHERE 0

//Elimina registros al presionar el enlace eliminar.
if(isset($_GET['delete'])){

	$DNI=$_GET['delete'];

	mysqli_query($db, "DELETE FROM personas WHERE DNI = $DNI");
	//Cargo el mensaje de la accion realizada
	//$_SESSION['mensaje'] = 'Registro insertado correctamente';
	//lo redireccion a la pagina ppal, la que me interesa
	header('location: index_RyDRegistro.php');
}

?>