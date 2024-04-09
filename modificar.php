<?php
session_start();
require "modify_helper.php";

if ($_POST) {
    $userID = $_SESSION['usuario_id'];
    $nombre = filter_input(INPUT_POST, "nombre");
    $apellidos = filter_input(INPUT_POST, "apellidos");
    $password = filter_input(INPUT_POST, "password");
    $genero = filter_input(INPUT_POST, "genero");
    $fechaNac = filter_input(INPUT_POST, "fecha-nacimiento");

    if (modificar($userID, $nombre, $apellidos, $password, $genero, $fechaNac)) {
        echo "<script type='text/javascript'>alert('Se ha modificado satisfactoriamente.')</script>";
    } else {
        echo "<script type='text/javascript'>alert('Ha ocurrido un error.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Modificar</title>
    
</head>
<body>
    <div class="logoutBtn">
        <button class="boton" type="button" onclick="window.location.href='index.php'">Regresar</button>
    </div>
    <div class="formLogin">
        <h2>Modificar datos</h2>
        <form action="modificar.php" method="post">
            <label>Nombre</label>
            <input class="registro" type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['usuario_nombre']; ?>" required>

            <label>Apellidos:</label>
            <input class="registro" type="text" id="apellidos" name="apellidos" value="<?php echo $_SESSION['usuario_apellidos'] ?>" required>

            <label for="password">Contraseña:</label>
            <input class="registro" type="password" id="password" name="password" placeholder="Ingrese su nueva contraseña" required>

            <label for="genero">Género:</label>
            <select class="registro" id="genero" name="genero">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="X">Prefiero no especificar</option>
            </select>

            <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
            <input class="registro" type="date" id="fechaNac" name="fechaNac" value="<?php echo $_SESSION['usuario_fecha'] ?>" required>

            <input class="boton" type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>