<?php
require 'conexion.php';
global $conexionProyecto;
if (isset($_POST['nombre']) &&
    isset($_POST['nombre_corto']) &&
    isset($_POST['precio']) &&
    isset($_POST['familia']) &&
    isset($_POST['descripcion'])){
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $precio = $_POST['precio'];
    $objetoFamilia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO productos (nombre, nombre_corto, pvp, familia, descripcion) VALUES ('$nombre', '$nombre_corto', '$precio', '$objetoFamilia', '$descripcion')";
    if ($conexionProyecto->exec($sql)) {
        echo "Producto insertado correctamente.";
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
<h2>Crear Producto</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="nombre_corto">Nombre corto:</label>
    <input type="text" name="nombre_corto" required><br><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" required>

    <label for="familia">Familia:</label>
    <select name="familia">
        <?php
        $consulta = $conexionProyecto->query('SELECT cod, nombre FROM familias');
        while ($objetoFamilia = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='$objetoFamilia->cod'>$objetoFamilia->nombre</option>";
        }
        ?>
    </select><br><br>

    <label for="descripcion">Descripción:</label><br>
    <textarea name="descripcion" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" name="crear" value="Crear">
    <input type="reset" value="Limpiar">
    <a href="listado.php"><input type="button" value="Volver"></a>
</form>
</body>
</html>

