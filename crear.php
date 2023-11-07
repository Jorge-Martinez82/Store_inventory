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
<?php
?>
<form action="procesar_formulario.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="nombre_corto">Nombre corto:</label>
    <input type="text" id="nombre_corto" name="nombre_corto" required><br><br>

    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="precio" required>

    <label for="familia">Familia:</label>
    <select id="familia" name="familia">
        <option value=""></option>
        <!-- Aquí puedes agregar opciones para el campo Familia -->
    </select><br><br>

    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" name="crear" value="Crear">
    <input type="reset" value="Limpiar">
    <a href="listado.php"><input type="button" value="Volver"></a>
</form>
</body>
</html>

