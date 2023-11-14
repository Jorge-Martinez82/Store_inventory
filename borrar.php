<?php
// Establezco la conexión a la base de datos definida en 'conexion.php'
require 'conexion.php';
global $conexionProyecto;

// Compruebo si se ha enviado el id del producto a traves del método POST y de hacerlo defino una variable
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Creo la consulta, la preparo y la ejecuto para evitar inyección SQL
    $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $conexionProyecto->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo "Producto de código $id borrado correctamente.";
    } else {
        echo "Error al borrar el producto: " . $stmt->errorInfo()[2];// Imprime el error si lo hay
    }
}
// Creo el botón formulario para volver al listado
echo "<form action='listado.php' method='post'>            
      <input type='submit' value='Volver'>
      </form>";