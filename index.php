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
<body class="different">
    <div class="logoutBtn">
        <form action="logout.php" method="post">
            <button class="boton" type="submit">Cerrar sesión</button>
        </form>
    </div>
    <div class="administrador">
        <h1>Bienvenido Administrador</h1>
        <div class ="botones">
            <button class="boton" id="list" onclick="mostrarTabla()">Listar archivos</button>
            <button class="boton" id="upload" onclick="mostrarForm()">Subir archivo</button>
        </div>
        <br>
        <div class="table" id="tablaArchivos" style="display: none;">
            <?php
            $archivos = glob(DIR_UPLOAD . "*");
            ?>
            <table>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Tamaño del Archivo (KB)</th>
                    <th>Borrar</th>
                </tr>
                <?php
                foreach ($archivos as $archivo) {
                    $nombreArchivo = basename($archivo);
                    $tamañoArchivoKB = round(filesize($archivo) / 1024, 2);
                ?>
                <tr>
                    <td><a href='operaciones/mostrar_archivo.php?nombre=<?php echo $nombreArchivo; ?>' target='_blank'><?php echo $nombreArchivo; ?></a></td>
                    <td><?php echo $tamañoArchivoKB; ?> KB</td>
                    <td><button class="boton" onclick="borrarArchivo(this.parentNode.parentNode, '<?php echo $nombreArchivo; ?>')">Borrar</button></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="formArchivos" style="display: none;" id="containerForm">
            <form id="formSubirArchivo" enctype="multipart/form-data">
                <input type="text" name="nombreArchivo" placeholder="Nombre del archivo (opcional)">
                <input type="file" name="archivo" accept=".jpg, .jpeg, .png, .gif, .pdf">
                <button class="boton" type="button" onclick="subirArchivo()">Subir archivo</button>
            </form>
        </div>
    </div>
    <script src="logic.js"></script>
</body>
</html>
