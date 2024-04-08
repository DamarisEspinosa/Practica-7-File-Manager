<?php 

require "config.php";
require "Config/conexion.php";

$nombre = $_POST['archivo'];
$id = $_POST['id_val'];
$val_hash = $_POST['hash_val'];

$sql = "UPDATE `archivos` SET `fecha_borrado`= NOW(), `usuario_borro_id` = ? WHERE `hash_sha256` = ?";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id, $val_hash]);
    if (unlink(DIR_UPLOAD.$nombre)) {
        echo "El archivo se ha eliminado correctamente en la carpeta: " . DIR_UPLOAD;
    } else {
        echo "Ocurrió un error al intentar borrar el archivo. ". $id;
    }
} catch (Exception $e) {
    echo 'Datos no recibidos correctamente';
}
?>