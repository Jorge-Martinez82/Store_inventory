<?php
global $conexionProyecto;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require 'conexion.php';
    $consulta = $conexionProyecto->query("SELECT * FROM productos WHERE id = $id");
    $producto = $consulta->fetch(PDO::FETCH_OBJ);
    echo "<h2>Detalle del producto</h2>";
    echo "<table>";
    echo "<tr><th>{$producto->nombre}</th></tr>";
    echo "<tr><td>Codigo: {$producto->id}</td></tr>";
    echo "<tr><td>Nombre corto: {$producto->nombre_corto} </br>
                  Codigo Familia: {$producto->familia} </br>
                  PVP (€): {$producto->pvp} </br>
                  Descripcion: {$producto->descripcion}</td></tr>";
    echo "</table>";
    echo "<form action='listado.php' method='post'>
    <input type='submit' value='Volver'>
    </form>";


} else {
    header('Location: listado.php');
}
$conexionProyecto = null;
?>