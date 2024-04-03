<?php
require "../config.php";

if ($_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
    $nombreArchivo = isset($_POST["nombreArchivo"]) ? $_POST["nombreArchivo"] : $_FILES["archivo"]["name"];
    $archivoTemp = $_FILES["archivo"]["tmp_name"];
    $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);

    $extensionesPermitidas = array("jpg", "jpeg", "png", "gif", "pdf");
    if (!in_array(strtolower($extension), $extensionesPermitidas)) {
        echo "Error: Solo se permiten archivos de imágenes (jpg, jpeg, png, gif) y archivos PDF.";
        exit;
    }

    $rutaDestino = DIR_UPLOAD . $nombreArchivo . '.' . $extension;
    if (move_uploaded_file($archivoTemp, $rutaDestino)) {
        echo "success";
    } else {
        echo "Error al subir el archivo.";
    }
} else {
    echo "Error al subir el archivo: " . $_FILES["archivo"]["error"];
}
?>
