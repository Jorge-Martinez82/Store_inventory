<?php
global $conexionProyecto;
// Compruebo si se ha definido id en la URL y de hacerlo, defino la variable 'id'
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Establezco la conexión a la base de datos definida en 'conexion.php'
    require 'conexion.php';

    // Preparo y ejecuto una consulta preparada para evitar la inyeccion SQL
    $consulta = $conexionProyecto->prepare("SELECT * FROM productos WHERE id = :id");
    $consulta->bindParam(':id', $id);
    $consulta->execute();

    // Obtengo el objeto de la consulta
    $producto = $consulta->fetch(PDO::FETCH_OBJ);

    // Imprimo los detalles del objeto producto
    echo "<h2>Detalle del producto</h2>";
    echo "<table>";
    echo "<tr><th>{$producto->nombre}</th></tr>";
    echo "<tr><td>Codigo: {$producto->id}</td></tr>";
    echo "<tr><td>Nombre corto: {$producto->nombre_corto} </br>
                  Codigo Familia: {$producto->familia} </br>
                  PVP (€): {$producto->pvp} </br>
                  Descripcion: {$producto->descripcion}</td></tr>";
    echo "</table>";

    // Boton en formulario para volver a listado.php
    echo "<form action='listado.php' method='post'>
    <input type='submit' value='Volver'>
    </form>";

// Redirijo a la página listado.php si no se proporciona el parámetro 'id'
} else {
    header('Location: listado.php');
}
// Cierro la conexión
$conexionProyecto = null;
?>