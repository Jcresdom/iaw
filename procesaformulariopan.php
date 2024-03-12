<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Procesa formulario panaderia</title>
</head>
<body>
<?php
//Se almacena en esta primera parte del codigo las variables de los formularios para el cliente y para el pan
	$pantipo = $_POST['pantipo'];
	$masatipo = $_POST['masatipo'];
	$elaborciontipo = $_POST['elaboraciontipo'];
	$temperaturahorneado = $_POST['temperaturahorneado'];
	$dni = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
    $numeropedido = $_POST['numeropedido'];
    $unidades = $_POST['unidades'];
    $localizador = $_POST['localizador'];
//Realizamos la conexión a la base de datos poniendo el nombre de la creada en phpmyadmin
	$host = "localhost";
        $user = "phpmyadmin";
        $pass = "phpmyadmin";
        $database = "panaderia";
//Se realiza la conexion a la base de datos
        $con = new mysqli($host, $user, $pass, $database);
//Se selecciona la base de datos en la que insertaremos los datos de los formularios
		mysqli_select_db($con, "panaderia");

		//Comprobar que los campos de los formularios se han rellenado e insertalos.

		if ($pantipo) {
			$insert_pan = "INSERT INTO pan 
			(pantipo, masatipo, elaboraciontipo, temperaturahorneado)
			VALUES('$pantipo', '$masatipo', '$elaboraciontipo', '$temperaturahorneado');";

			if ($result = mysqli_query($con, $insert_pan)) {
			echo "<h3 class='center'>PAN " . $pantipo ." insertado."."<br/>"."</h3>";
					
			} else {
			echo ("Fallo al registrar el pan -> ". mysqli_error($con))."<br/>"."<br/>";
			}
		}
        
		if ($dni) {
			$insert_cli = "INSERT INTO clientes 
			(dni, nombre, apellido, telefono)
			VALUES('$dni', '$nombre', '$apellido', $telefono);";

			if ($result = mysqli_query($con, $insert_cli)) {
			echo "<h3 class='center'>CLIENTE " . $nombre ." insertado correctamente."."<br/>"."</h3>";
					
			} else {
			echo ("Fallo al insertar el cliente -> ". mysqli_error($con))."<br/>"."<br/>";
			}
		}
        if ($pres_pedidos) {
            $insert_pedidos = "INSERT INTO pedidos 
            (numeropedido, pantipo, unidades, localizador)
            VALUES($numeropedido, $pantipo, $unidades, $localizador);";
            //Verificar si se han insertado correctamente
            if ($result = mysqli_query($con, $insert_pedidos)) {
                echo "<h3 class='center'>Pedidos de " . $numeropedido ." insertado correctamente."."<br/>"."</h3>";
                        
            } else {
                echo ("No ha sido posible realizar este pedido -> ". mysqli_error($con))."<br/>"."<br/>";
            }
        }
	?>
</body>
</html>