<?php
//archivo de conexión a la base de datos
//Conexion con la base de datos
$db = mysqli_connect('localhost', 'root', '', 'bancosangre');

// Verificar la conexiòn
if (mysqli_connect_errno()){
    echo "Error al intentar conectarse con MySQL: " . mysqli_connect_error();
}

?>