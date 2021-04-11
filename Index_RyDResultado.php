<?php
session_start();
require 'conexion_db_RyD.php'; //configuración conexión db
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resultado</title>
<link rel="stylesheet" href="estilos.css" media="all" type="text/css">
</head>

<body>
	<header>
		<img src="./Banco de Sangre.png" class="chica">
	</header>

    <table class="prim">
        <tr>
			<th>
				<h1>Resultado</h1>
			</th>
		</tr>
        <tr>
            <th>
                <form action="" method="POST">
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
                                <Label>Fecha</Label>
                            </th>
                            <th>
                                <input type="date" name="Fecha" value="<?php echo $Fecha; ?>" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Entrevista Medica</label>
                            </th>
                            <th>
                                <select type="" name="EntrevistaMedica" value="<?php echo $ResEntrevista; ?>" required>
                                    <option value="-"> - </option> 
                                    <option  value="Califica">Califica</option>
                                    <option  value="No Califica">No Califica</option>
                                    <?php

                                    

                                    ?>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Peso</label>
                            </th>
                            <th>
                                <input type="text"name="Peso" value="<?php echo $Peso; ?>" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Temperatura</label>
                            </th>
                            <th>
                                <input type="text"name="Temperatura" value="<?php echo $Temperatura; ?>" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Presion Arterial</label>
                            </th>
                            <th>
                                <input type="text"name="Presion" value="<?php echo $Presion; ?>" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Anemia</label>
                            </th>
                            <th>
                                <select type="" name="Anemia" value="<?php echo $Anemia; ?>" required>
                                    <option value="-"> - </option> 
                                    <option  value="Si">Si</option>
                                    <option  value="No">No</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Califica Clinicamente</label>
                            </th>
                            <th>
                                <input type="text"name="CalClinico" value="<?php echo $CalClinico; ?>" required>
                            </th>
                        </tr>
                        <br>
                        <tr>
							<th>
								<button type="submit" name="save"><a hfer="Index_RyDPRegistro.php" target="_blank"> Guardar </a></button>
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