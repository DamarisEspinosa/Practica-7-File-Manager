<?php
require "../config.php";

if(isset($_GET['nombre'])) {
    $nombreArchivo = basename($_GET['nombre']);
    
    $rutaArchivo = DIR_UPLOAD . $nombreArchivo;
    
    if(file_exists($rutaArchivo) && is_readable($rutaArchivo)) {
        $tipoMIME = mime_content_type($rutaArchivo);
        
        header("Content-Type: $tipoMIME");
        header("Content-Disposition: inline; filename=\"$nombreArchivo\"");
        
        readfile($rutaArchivo);
        exit();
    } else {
        http_response_code(404);
        echo "Archivo no encontrado.";
    }
} else {
    http_response_code(400);
    echo "Solicitud incorrecta.";
}
?>
