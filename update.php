<?php
require 'conexion.php';
global $conexionProyecto;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $resultado = $conexionProyecto->query("SELECT * FROM productos WHERE id = $id");
    $producto = $resultado->fetch(PDO::FETCH_OBJ);

    if ($producto) {
        // Mostrar formulario con detalles del producto
        echo "<form action='update.php' method='post'>";
              echo "<input type='hidden' name='id' value='$producto->id'>";

        echo "<label for='nombre'>Nombre:</label>
          <input type='text' name='nombre' value = '$producto->nombre'>";
        echo "<label for='nombre_corto'>Nombre corto:</label>
          <input type='text' name='nombre_corto' value = $producto->nombre_corto required><br><br>";
        echo "<label for='precio'>Precio:</label>
          <input type='text' name='precio' value = $producto->pvp required><br><br>";
        echo "<label for='familia'>Familia:</label>";
        echo "<select name='familia'>";
        echo "<option value='$producto->familia' selected>$producto->familia</option>";
        $resultadoFamilias = $conexionProyecto->query('SELECT familia FROM productos');
        while ($filaFamilia = $resultadoFamilias->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='$filaFamilia->familia'>$filaFamilia->familia</option>";
        }
        echo "</select><br><br>";

        echo "<label for='descripcion'>Descripcion:</label>
          <textarea name='descripcion' rows='4' cols='50' required>$producto->descripcion</textarea><br><br>";
            echo   "<input type='submit' name='modificar' value='Modificar'>";
              echo "</form>";
        echo "<form action='listado.php' method='post'>            
      <input type='submit' value='Volver'>
      </form>";
    }
}   else {
    header('Location: listado.php');
    }

if (isset($_POST['id'])) {
    // Procesar el formulario y actualizar la base de datos
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];
    $sql = "UPDATE productos SET nombre = '$nombre', 
                            nombre_corto = '$nombre_corto',
                            pvp = '$precio',
                            familia = '$familia',
                            descripcion = '$descripcion'
        WHERE id = $id";
    echo "<form action='listado.php' method='post'>            
      <input type='submit' value='Volver'>
      </form>";

}
?>