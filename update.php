<?php
require 'conexion.php';
global $conexionProyecto;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

}
if (isset($_POST['nombre']) &&
    isset($_POST['nombre_corto']) &&
    isset($_POST['precio']) &&
    isset($_POST['familia']) &&
    isset($_POST['descripcion'])){
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE productos SET nombre = $nombre, 
                                nombre_corto = nombre_corto,
                                pvp = $precio,
                                familia = $familia,
                                descripcion = $descripcion
            WHERE id = $id";
    if ($conexionProyecto->exec($sql)) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al insertar el producto: " . $conexionProyecto->error;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Modificar Producto</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
    $resultado = $conexionProyecto->query("SELECT * FROM productos WHERE id = $id");
    $producto = $resultado->fetch(PDO::FETCH_OBJ);
    echo "<label for='nombre'>Nombre:</label>
          <input type='text' name='nombre' value = $producto->nombre";
    echo "<label for='nombre_corto'>Nombre corto:</label>
          <input type='text' name='nombre_corto' value = $producto->nombre_corto required><br><br>";
    echo "<label for='precio'>Precio:</label>
          <input type='text' name='precio' value = $producto->pvp required><br><br>";
    echo "<label for='familia'>Familia:</label>
          <input type='text' name='familia' value = $producto->familia required><br><br>";
    echo "<label for='descripcion'>Descripcion:</label>
          <textarea name='descripcion' rows='4' cols='50' required>$producto->descripcion</textarea><br><br>";

    ?>


<!--    <label for="familia">Familia:</label>-->
<!--    <select name="familia">-->
<!--        --><?php
//        $resultado = $conexionProyecto->query('SELECT cod, nombre FROM familias');
//        while ($familia = $resultado->fetch(PDO::FETCH_OBJ)) {
//            echo "<option value='$familia->cod'>$familia->nombre</option>";
//        }
//        ?>
<!--    </select><br><br>-->
    <input type="submit" name="actualizar" value="Actualizar">
    <a href="listado.php"><input type="button" value="Volver"></a>
</form>
</body>
</html>
