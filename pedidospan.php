<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDOS</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">añadir pedido</h2>
  <form id="formupedido" name="formupedido" method="post" action="procesaformulariopan.php">
    <div class="form-group">
      <?php
          //Variables para la conexión a la base de datos
          $servername = 'localhost';
          $username = 'phpmyadmin';
          $password = 'phpmyadmin';

          //Establecemos conexión
        $conn = new mysqli($servername, $username, $password);

        if (!$conn){
            echo "Conexión fallida";
         }

         // Seleccionar base de datos
         mysqli_select_db ($conn, "panaderia");

         //A continuación se crea la sql

         $consultar2 = "SELECT pantipo FROM pan, clientes WHERE pedidos.numeropedido 
         = pan.pantipo";

         //Ejecutamos la sentencia

         $registros2=mysqli_query($conn,$consultar2);
	
        echo "<label for='seleccionar2'>Elige el nombre del pan:</label>";
        echo "<select name='seleccionar2' id='seleccionar2'>";
        while($registro2=mysqli_fetch_row($registros2)){
            
        echo "<option value='$registro2[0]'>".$registro2[0] ."</option>";
            
        }
        echo "</select>";

      ?>
    </div>

    <div class="form-group">

      <?php
          //Variables para la conexión a la base de datos
          $servername = 'localhost';
          $username = 'phpmyadmin';
          $password = 'phpmyadmin';

          //Establecemos conexión
        $conn = new mysqli($servername, $username, $password);

        if (!$conn){
            echo "Conexión fallida";
         }

         // Seleccionar base de datos
         mysqli_select_db ($conn, "panaderia");

         //Creamos la consulta SQL

         $consultar = "SELECT nombre FROM pedidos, clientes WHERE pedidos.numeropedido
         = clientes.dni";

         //Ejecutamos la sentencia

         $registros=mysqli_query($conn,$consultar);
	
        echo "<label for='seleccionar'>Elige el nombre del cliente:</label>";
        echo "<select name='seleccionar' id='seleccionar'>";
        while($registro=mysqli_fetch_row($registros)){
            
            echo "<option value='$registro[0]'>".$registro[0] ."</option>";
            
        }
        echo "</select>";
      ?>
    </div>
    <button type="submit" class="btn btn-primary" name="Enviar" id="Enviar" formaction="procesapedido.php">Agregar prestamo</button>   

  </form>
</div>

</body>
</html>