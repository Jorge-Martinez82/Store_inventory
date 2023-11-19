<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilos.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear producto</title>
</head>
<body>
<?php
// Establezco la conexión a la base de datos definida en 'conexion.php'
require 'conexion.php';
global $conexionProyecto;

// Compruebo que los campos del formulario has sido definidos y de serlo los asigno a variables
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

    // Preparo y ejecuto una consulta preparada para evitar la inyeccion SQL
    $sql = "INSERT INTO productos (nombre, nombre_corto, pvp, familia, descripcion) VALUES (:nombre, :nombre_corto, :precio, :familia, :descripcion)";
    $stmt = $conexionProyecto->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':nombre_corto', $nombre_corto);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':familia', $objetoFamilia);
    $stmt->bindParam(':descripcion', $descripcion);
    if ($stmt->execute()) {
        echo "Producto insertado correctamente.";
    } else {
        echo "Error al insertar el producto: " . $stmt->errorInfo()[2];// Imprime el mensaje de error de haberlo
    }
}
?>

<h2>Crear Producto</h2>
<!-- Creo el formulario para añadir un producto con los campos necesarios
 y los botones crear, limpiar y volver.-->
<form class="formcrear" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="div1">
    <label for="nombre">Nombre:</label><br>
    <input class="inputtext" type="text" name="nombre" required>
    </div>
    <div class="div2">
    <label for="nombre_corto">Nombre corto:</label><br>
    <input class="inputtext" type="text" name="nombre_corto" required>
    </div>
    <div class="div3">
    <label for="precio">Precio (€):</label><br>
    <input class="inputtext" type="number" name="precio" required>
    </div>
    <div class="div4">
    <label for="familia">Familia:</label><br>
    <select name="familia">
        <?php
        // Realizo una consulta de los nombres y códigos de la tabla familias
        $consulta = $conexionProyecto->query('SELECT cod, nombre FROM familias');
        // En cada etiqueta <option> se mostrara el nombre de la familia y su valor será el código
        while ($objetoFamilia = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='$objetoFamilia->cod'>$objetoFamilia->nombre</option>";
        }
        ?>
    </select>
    </div>
    <div class="div5">
    <label for="descripcion">Descripción:</label><br>
    <textarea name="descripcion" rows="5" cols="80" required></textarea>
    </div>
    <div class="div6">
    <input class="crear2" type="submit" name="crear" value="Crear">
    <input class="limpiar" type="reset" value="Limpiar">
    <a href="listado.php"><input class="volver" type="button" value="Volver"></a>
    </div>
</form>
</body>
</html>

