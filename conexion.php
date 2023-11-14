<?php
// Esta pagina php define la conexion con la base de dato asi no tengo que definirla en
// cada pagina que la necesite.
// Creo variables para guardar los datos por si necesito cambiarlos
$host = 'localhost';
$usuario = 'gestor';
$contraseña = 'secreto';
$database = 'proyecto';

    // Defino los datos de origen nombre del servidor y nombre de la base de datos
    $dsn = "mysql:host=$host;dbname=$database";

    // Instancion el objeto PDO pasandole los datos necesarios
    $conexionProyecto = new PDO($dsn, $usuario, $contraseña);

    // Configura PDO para que lance excepciones en caso de errores
    $conexionProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>
