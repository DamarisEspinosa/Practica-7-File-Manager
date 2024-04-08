<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="formLogin">
        <form action="helper.php" method="post">
            <h1>Bienvenido</h1>
            <input class="texto" type="text" id="username" name="username" placeholder="Ingrese el nombre de usuario">
            <input class="texto" type="password" id="password" name="password" placeholder="Ingrese la contraseña">
            <input class="boton" type="submit" value="Iniciar sesión">
            <p>Si no tiene una cuenta puede <a href="registro.php">registrarse</a></p>
        </form>
    </div>
</body>
</html>
