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
</head>
<body>
    <div class="formLogin">
        <form>
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
            <input class="registro" type="password" id="password" name="password" placeholder="Vuelva a ingresar su contraseña" required>
            <label>Fecha de nacimiento</label>
            <input class="registro" type="date" id="fechaNac" name="fechaNac" required><br>
            <label>Género:</label>
            <select id="genero" name="genero">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="X">Prefiero no especificar</option>
            </select>
            <!--
            <label for="generoM">
                <input type="radio" id="generoM" name="genero" value="M"> Masculino
            </label>
            <label for="generoF">
                <input type="radio" id="generoF" name="genero" value="F"> Femenino
            </label>
            <label for="generoX">
                <input type="radio" id="generoX" name="genero" value="X"> Prefiero no especificar
            </label>
            -->
            <br>
            <input class="boton" type="button" value="Registrar" >
        </form>
    </div>
</body>
</html>