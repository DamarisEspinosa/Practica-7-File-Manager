<?php
require "helper.php";

if($_POST) {
    $nombre = filter_input(INPUT_POST, "nombre");
    $apellidos = filter_input(INPUT_POST, "apellidos");
    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");
    $genero = filter_input(INPUT_POST, "genero");
    $fechaNac = filter_input(INPUT_POST, "fechaNac");
    if (registrar($nombre, $apellidos, $username, $password, $genero, $fechaNac)) {
        echo "<script type='text/javascript'>alert('Se ha registrado satisfactoriamente.')</script>";
        //header("Location: user.php");
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
    <title>Registro nuevo usuario</title>
    <script src="js/revisarPass.js"></script>
</head>
<body>
    <div class="botonVolver">
        <button class="boton" type="button" onclick="window.location.href='login.php'">Volver</button>
    </div>
    <div class="formLogin">
        <form action="helper.php" method="post">
            <h2>Ingrese sus datos</h2>
            <label>Nombre</label>
            <input class="registro" type="text" id="nombre" name="nombre" placeholder="Ingrese su(s) nombre(s)" required>
            <label>Apellidos</label>
            <input class="registro" type="text" id="apellidos" name="apellidos" placeholder="Ingrese su(s) apellido(s)" required>
            <label>Username</label>
            <input class="registro" type="email" id="username" name="username" placeholder="Ingrese su correo" required>
            <label>Contraseña</label>
            <input class="registro" type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
            <label>Confirmar contraseña</label>
            <input class="registro" type="password" onkeyup="verificar();" id="confirm-password" name="confirm-password" placeholder="Vuelva a ingresar su contraseña" required>
            <label>Fecha de nacimiento</label>
            <input class="registro" type="date" id="fechaNac" name="fechaNac" required><br>
            <label>Género:</label>
            <select class="registro" id="genero" name="genero">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="X">Prefiero no especificar</option>
            </select>
            <br>
            <input class="boton" type="button" value="Registrar" >
        </form>
    </div>
</body>
</html>