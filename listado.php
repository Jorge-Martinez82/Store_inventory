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
require 'conexion.php';
global $conexionProyecto;
$resultado = $conexionProyecto->query('SELECT id, nombre FROM productos');
echo "<h2>Gestión de productos</h2>";
echo "<form action='crear.php' method='post'>
        <input type='submit' value='Crear'>
      </form>";
echo "<table>
      <tr>
        <th>Detalle</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>";

while ($stock = $resultado->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>";
    echo "<td>
            <form action='detalle.php' method='get'>
                <input type='hidden' name='id' value='{$stock->id}'>
                <input type='submit' value='Detalle'>
            </form>
          </td>";
    echo "<td>" . $stock->id . "</td>"; // Código, muestra el ID
    echo "<td>" . $stock->nombre . "</td>"; // Nombre, muestra el Nombre
    echo "<td>
            <form action='borrar.php' method='post'>
                <input type='hidden' name='id' value='{$stock->id}'>
                <input type='submit' value='Borrar'>
            </form>
            <form action='update.php' method='get'>
                <input type='hidden' name='id' value='{$stock->id}'>
                <input type='submit' value='Actualizar'>
            </form>
            </td>";
    echo "</tr>";
}

echo "</table>";

$conexionProyecto = null;
?>

</body>
</html>
