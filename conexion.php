<?php
$host = 'localhost';
$usuario = 'gestor';
$contraseña = 'secreto';
$database = 'proyecto';

    $dsn = "mysql:host=$host;dbname=$database";
    $conexionProyecto = new PDO($dsn, $usuario, $contraseña);

    // Configura PDO para que lance excepciones en caso de errores
    $conexionProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>
