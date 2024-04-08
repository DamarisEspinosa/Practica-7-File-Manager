<?php
require "../config.php";
require "../conection.php";

session_start();

$id = $_SESSION['usuario_id'];

$nombre = $_POST['new_name'];
$descrip = $_POST['new_desc'];
$archivo = $_FILES['archivo'];

$ruta_archivo_destino = DIR_UPLOAD . $archivo['name'];
$nombre_archivo = $archivo['name'];

if (move_uploaded_file($archivo['tmp_name'], $ruta_archivo_destino)) {
    
    $sql = "INSERT INTO `archivos`(`id`, `descripcion`, `nombre_archivo`, `extension`, `nombre_archivo_guardado`, `tamaño`, `hash_sha256`, `fecha_subido`, `usuario_subio_id`, `fecha_borrado`, `usuario_borro_id`, `cant_descargas`, `es_publico`) VALUES (default, ?, ?, ?, ?, ?, ?, NOW(), ?, null, null, 0, 1)";

    $extens = explode(".", $nombre_archivo);
    $tamaño = filesize("./Subidas/".$nombre_archivo)/1024;
    $hash_sha256 = strtoupper(hash("sha256", ($nombre_archivo . bin2hex(random_bytes(32)))));

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$descrip, $nombre, $extens[1], $nombre_archivo, $tamaño, $hash_sha256, $id]);

        return true;
    } catch (Exception $e) {
        return false;
    }

    echo "El archivo se guardó correctamente en la carpeta: " . DIR_UPLOAD;
} else {
    echo "Ocurrió un error al intentar guardar el archivo.";
}

?>
