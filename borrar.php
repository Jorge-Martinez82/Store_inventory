<?php
require 'conexion.php';
global $conexionProyecto;
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM productos WHERE id = $id";
    if ($conexionProyecto->exec($sql)) {
        echo "Producto de código $id borrado correctamente.";
    } else {
        echo "Error al borrar el producto: " . $conexionProyecto->error;
    }
}
echo "<form action='listado.php' method='post'>            
      <input type='submit' value='Volver'>
      </form>";
