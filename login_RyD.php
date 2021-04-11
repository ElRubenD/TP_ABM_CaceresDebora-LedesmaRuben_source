<?php

//Archivo con las consultas para ingreso al registro de datos de donantes


//verifico si ingreso usuario y clave para consultar a mi tabla en la db
if(isset($_POST['form_usuario']) && isset($_POST['form_password'])){

	// Quito espacios en blanco y verifico que no esten vacios
	if(!empty(trim($_POST['form_usuario'])) && !empty(trim($_POST['form_password']))){

		// Escapo caracteres especiales en el usuario ingresado para evitar hacking SQL injection
		$form_usuario = mysqli_real_escape_string($db, htmlspecialchars(trim($_POST['form_usuario'])));
	
		// realizo la consulta para ver si existe el usuario ingresado	
		$query = mysqli_query($db, "SELECT * FROM `usuarios` WHERE usuario = '$form_usuario'");

		//si la consulta tiene valores, existe ese usuario, entonces procedo a consultar por la clave
		if(mysqli_num_rows($query) > 0){

				$row = mysqli_fetch_assoc($query);
				
				//asigno el valor de la clave ingresada en el formulario de login a un variable para mejor vista
				$usuario_db_pass = $row['password'];

				// Verifico que la clave ingresada sea igual a la almacenada en la tabla de la db.
				$verifico_password = password_verify($_POST['form_password'], $usuario_db_pass);

				
				// si la verificación es cierta 
				if($verifico_password === TRUE){

					//Actualizo el id de sesión actual con uno generado más reciente 
					session_regenerate_id(true);

					//coloco el email del usuario en una variable de sesión para poder acceder en otras páginas				
					$_SESSION['usuario'] = $form_usuario;

					// direcciono al panel de administración o pagina del logueo exitoso.
					header('Location: panel_RyD.php');
					exit;

				}
				else{
					// Configuro mensaje de error
					$error_message = "Clave o email incorrectos.";

				}
		}
		else{
			// Si el email no existe, no esta registrado, mando error
			$error_message = "Password o email incorrectos.";
		}
	}
		else{

			// En caso que no haya completado los campos del formulario
			$error_message = "Por favor complete los campos vacios.";
		}

}
?>