<?php
$conexionProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
$error = $conexionProyecto->connect_errno;
if ($error != null) {
    echo "<p>Error $error conectando a la base de datos: $conexionProyecto->connect_error</p>";
    die();
}

$resultado = $conexionProyecto->query('SELECT id, nombre FROM productos');
$stock = $resultado->fetch_object();
while ($stock != null) {

    echo "<p>Producto $stock->nombre: $stock->id id.</p>";

    $stock = $resultado->fetch_object();

}

$conexionProyecto->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarea03</title>
</head>
<body>
<h2>Gestión de productos</h2>
<?php

?>

</body>
</html>
