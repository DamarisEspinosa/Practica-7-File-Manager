<?php
session_start();
if (!$_SESSION) {
    header('Location: login.php');
    exit();
} else {
    $usuario_id = $_SESSION['usuario_id'];
    $usuario_correo = $_SESSION['usuario_username'];
    $usuario_nombre = $_SESSION['usuario_nombre'];
    $usuario_apellidos = $_SESSION['usuario_apellidos'];
    $usuario_admin = $_SESSION["usuario_esAdmin"];
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
    <title>Administrador</title>
</head>
<body onload="cargar();" class="different">
    <div class="logoutBtn">
        <form action="logout.php" method="post">
            <button class="boton" type="submit">Cerrar sesión</button>
        </form>
    </div>
    <div class="administrador">
        <h1>Bienvenido</h1>
        <div class="formArchivos" id="containerForm">
            <?php if($usuario_admin) { ?>
                <form action="operaciones/subir_archivo.php" method="post" id="formSubirArchivo" enctype="multipart/form-data">
                    <input type="text" name="nombreArchivo" id="nombreArchivo" placeholder="Nombre del archivo">
                    <input type="text" name="descripcion" id="descripcion" placeholder="Ingrese una descripción">
                    <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png, .gif, .pdf">
                    <input class="boton" type="submit" id="subir" value="Subir archivo">
                </form>
            <?php } ?>
        </div>
        <div id="container"></div>
        
        <script type="text/javascript" src="js/logic.js"></script>
    </div>
</body>
</html>
