<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilos.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar</title>
</head>
<body>
<?php
// Establezco la conexión a la base de datos definida en 'conexion.php'
require 'conexion.php';
global $conexionProyecto;
// Compruebo si se ha definido la id en la URL y de hacerlo, defino la variable 'id'
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparo y ejecuto una consulta preparada para evitar la inyeccion SQL
    $consulta = $conexionProyecto->prepare("SELECT * FROM productos WHERE id = :id");
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    // Obtengo el objeto de la consulta
    $producto = $consulta->fetch(PDO::FETCH_OBJ);

        // Mostrar formulario con detalles del producto
        echo "<h2>Modificar Producto</h2>";
        echo "<form class='formcrear' action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='$producto->id'>";
        echo "<div class='div1'><label for='nombre'>Nombre:</label><br>
              <input class='inputtext' type='text' name='nombre' value='$producto->nombre' required></div>";
        echo "<div class='div2'><label for='nombre_corto'>Nombre corto:</label><br>
              <input class='inputtext' type='text' name='nombre_corto' value = $producto->nombre_corto required></div>";
        echo "<div class='div3'><label for='precio'>Precio (€):</label><br>
                <input class='inputtext' type='text' name='precio' value = $producto->pvp required></div>";

        // Para el campo familia tengo que realizar otra consulta para obtener todos
        // los campos nombre y codigo de la tabla familia y asi poder mostrarlos
        echo "<div class='div4'><label for='familia'>Familia:</label><br>";
        echo "<select name='familia'>";
        // primero muestro la etiqueta <option> con el campo familia del producto utilizando 'selected'
        echo "<option value='$producto->familia' selected>$producto->familia</option>";
        // despues hago la consulta y muestro el resto de resultados
        $consultaFamilia = $conexionProyecto->query('SELECT cod, nombre FROM familias');
        while ($objetoFamilia = $consultaFamilia->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='$objetoFamilia->cod'>$objetoFamilia->nombre</option>";
        }
        echo "</select></div>";
        echo "<div class='div5'><label for='descripcion'>Descripcion:</label><br>
          <textarea name='descripcion' rows='5' cols='80' required>$producto->descripcion</textarea></div>";

        echo "<div class='div6'><input class='crear2' type='submit' name='modificar' value='Modificar'>";
        echo "<form action='listado.php' method='post'>            
              <input class='volver' type='submit' value='Volver'>
              </form></div>";
        echo "</form>";

}
// Redirijo a la página listado.php si no se proporciona el parámetro 'id'
else {
    header('Location: listado.php');
}

// Compruebo que los campos del nuevo formulario has sido definidos y de hacerlo
// defino las variables
if (isset($_POST['nombre']) &&
    isset($_POST['nombre_corto']) &&
    isset($_POST['precio']) &&
    isset($_POST['familia']) &&
    isset($_POST['descripcion'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];

    // Creo, preparo y ejecuto la consulta preparada
    $sql = "UPDATE productos SET nombre = :nombre, 
                                    nombre_corto = :nombre_corto,
                                    pvp = :precio,
                                    familia = :familia,
                                    descripcion = :descripcion
            WHERE id = :id";
    $stmt = $conexionProyecto->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':nombre_corto', $nombre_corto);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':familia', $familia);
    $stmt->bindParam(':descripcion', $descripcion);
    if ($stmt->execute()) {
        echo "Producto actualizado correctamente.";
    }
    echo "<form action='listado.php' method='post'>            
      <input type='submit' value='Volver'>
      </form>";
}
$conexionProyecto = null;
?>

</body>
</html>
