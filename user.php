<?php
require "config.php";
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
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
    <title>Usuario</title>
    <script>
        function mostrarTabla() {
            var tabla = document.getElementById("tablaArchivos");
            if (tabla.style.display === "none") {
                tabla.style.display = "block";
            } else {
                tabla.style.display = "none";
            }
        }

        function borrarArchivo(nombreArchivo) {
            alert("Borrando archivo: " + nombreArchivo);
        }
    </script>
</head>
<body class="different">
    <div class="logoutBtn">
        <form action="logout.php" method="post">
            <button class="boton" type="submit">Cerrar sesión</button>
        </form>
    </div>
    <div class="administrador">
        <h1>Bienvenido Usuario</h1>
        <button class="boton" id="list" onclick="mostrarTabla()">Listar archivos</button>
        <br>
        <div class="table" id="tablaArchivos" style="display: none;">
            <?php
            $archivos = glob(DIR_UPLOAD . "*");
            ?>
            <table>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Tamaño del Archivo (KB)</th>
                </tr>
                <?php
                foreach ($archivos as $archivo) {
                    $nombreArchivo = basename($archivo);
                    $tamañoArchivoKB = round(filesize($archivo) / 1024, 2);
                ?>
                <tr>
                    <td><a href='operaciones/mostrar_archivo.php?nombre=<?php echo $nombreArchivo; ?>' target='_blank'><?php echo $nombreArchivo; ?></a></td>
                    <td><?php echo $tamañoArchivoKB; ?> KB</td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
