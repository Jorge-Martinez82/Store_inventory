<?php
// Esta página PHP define la conexión con la base de datos para que no sea necesario
// definirla en cada página que la necesite.

// Creo variables para guardar los datos por si necesito cambiarlos
$host = 'localhost';
$usuario = 'gestor';
$contraseña = 'secreto';
$database = 'proyecto';

try {
    // Defino los datos de origen nombre del servidor y nombre de la base de datos
    $dsn = "mysql:host=$host;dbname=$database";

    // Instancio el objeto PDO pasándole los datos necesarios
    $conexionProyecto = new PDO($dsn, $usuario, $contraseña);

    // Configura PDO para que lance excepciones en caso de errores
    $conexionProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si ocurre una excepción, la capturamos e imprimimos un mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>

