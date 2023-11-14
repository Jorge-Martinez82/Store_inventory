<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarea03</title>
</head>
<body>

<?php
// Establezco la conexión a la base de datos definida en 'conexion.php'
require 'conexion.php';
global $conexionProyecto;

// Realizo la consulta SQL para obtener el listado
$consulta = $conexionProyecto->query('SELECT id, nombre FROM productos');


echo "<h2>Gestión de productos</h2>";

// Creo el botón en formulario que me llevará a la pagina crear.php
echo "<form action='crear.php' method='post'>
        <input type='submit' value='Crear'>
      </form>";

// Creo una tabla que mostrara el nombre y código del producto además de
// los botones que permitiran ir a detalle.php, borrar.php y update.php
echo "<table>
      <tr>
        <th>Detalle</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>";

// Este bucle creará una fila para cada producto que haya en la base de datos
// en la primra columna estará el boton detalle
// en la segunda el código del producto
// en la tercera el nombre
// en la cuarta los botones Actualizar y Borrar
while ($productos = $consulta->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>";
    echo "<td>
            <form action='detalle.php' method='get'>
                <input type='hidden' name='id' value='{$productos->id}'>
                <input type='submit' value='Detalle'>
            </form>
          </td>";
    echo "<td>" . $productos->id . "</td>";
    echo "<td>" . $productos->nombre . "</td>";
    echo "<td>
            <form action='borrar.php' method='post'>
                <input type='hidden' name='id' value='{$productos->id}'>
                <input type='submit' value='Borrar'>
            </form>
            <form action='update.php' method='get'>
                <input type='hidden' name='id' value='{$productos->id}'>
                <input type='submit' value='Actualizar'>
            </form>
            </td>";
    echo "</tr>";
}
echo "</table>";
// Cierro la conexión
$conexionProyecto = null;
?>
</body>
</html>
