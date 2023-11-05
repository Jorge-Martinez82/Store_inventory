<?php
$host = 'localhost';
$usuario = 'gestor';
$contraseña = 'secreto';
$database = 'proyecto';
$conexionProyecto = new mysqli($host, $usuario, $contraseña, $database);
$error = $conexionProyecto->connect_errno;
if ($error != null) {
    echo "<p>Error $error conectando a la base de datos: $conexionProyecto->connect_error</p>";
    die();
}

?>