<?php
global $conexionProyecto;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require 'conexion.php';
    $resultado = $conexionProyecto->query("SELECT * FROM productos WHERE id = $id");
    $producto = $resultado->fetch_object();
    echo "<table>";
    echo "<tr><th>{$producto->nombre}</th></tr>";
    echo "<tr><td>Codigo: {$producto->id}</td></tr>";
    echo "<tr><td>Nombre corto: {$producto->nombre_corto} </br>
                  Codigo Familia: {$producto->familia} </br>
                  PVP (€): {$producto->pvp} </br>
                  Descripcion: {$producto->descripcion}</td></tr>";
    echo "</table>";

    $conexionProyecto->close();
}
