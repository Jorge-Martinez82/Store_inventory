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
<h2>Gestión de productos</h2>
<?php
require 'conexion.php';
$resultado = $conexionProyecto->query('SELECT id, nombre FROM productos');
echo "<table>
      <tr>
        <th>Detalle</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>";

while ($stock = $resultado->fetch_object()) {
    echo "<tr>";
    echo "<td>
            <form action='detalle.php' method='post'>
                <input type='hidden' name='id' value='{$stock->id}'>
                <input type='submit' value='Detalle'>
            </form>
          </td>";
    echo "<td>" . $stock->id . "</td>"; // Código, muestra el ID
    echo "<td>" . $stock->nombre . "</td>"; // Nombre, muestra el Nombre
    echo "<td></td>"; // Acciones, columna vacía por ahora
    echo "</tr>";
}

echo "</table>";

$conexionProyecto->close();
?>

</body>
</html>
