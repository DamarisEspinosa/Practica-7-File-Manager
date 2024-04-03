<?php
require "../config.php";

$archivos = glob(DIR_UPLOAD . "*");

echo "<table>";
echo "<tr><th>Nombre del Archivo</th><th>Tamaño del Archivo (KB)</th><th>Borrar</th></tr>";

foreach ($archivos as $archivo) {
    $nombreArchivo = basename($archivo);
    $tamañoArchivoKB = round(filesize($archivo) / 1024, 2);
    echo "<tr>";
    echo "<td><a href='operaciones/mostrar_archivo.php?nombre=$nombreArchivo' target='_blank'>$nombreArchivo</a></td>";
    echo "<td>$tamañoArchivoKB KB</td>";
    echo "<td><button class='boton' onclick='borrarArchivo(this.parentNode.parentNode, \"$nombreArchivo\")'>Borrar</button></td>";
    echo "</tr>";
}

echo "</table>";
?>
