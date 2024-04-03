<?php
require "../config.php";

if(isset($_POST['nombre'])) {
    $nombreArchivo = basename($_POST['nombre']);
    
    $rutaArchivo = DIR_UPLOAD . $nombreArchivo;
    
    if(file_exists($rutaArchivo) && is_writable($rutaArchivo)) {
        if(unlink($rutaArchivo)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
} else {
    http_response_code(400);
    echo "Solicitud incorrecta.";
}
?>
