<?php

// Root de la aplicación a partir de http://localhost/
define("APP_ROOT", "\File-Manager\\");

// Ruta física de la aplicación
define("APP_PATH", "C:\\xampp\htdocs\File-Manager\\");

// Directorio donde se van a subir los archivos
define("DIR_UPLOAD", "C:\\xampp\htdocs\File-Manager\archivos\\");

// Extensiones de archivos con su correspondiente content-type.
$CONTENT_TYPES_EXT = [
    "jpg" => "image/jpeg",
    "jpeg" => "image/jpeg",
    "gif" => "image/gif",
    "png" => "image/png",
    "json" => "application/json",
    "pdf" => "application/pdf",
    "bin" => "application/octet-stream"
];

// Para la conexión con la base de datos 
define("DB_DSN", "mysql:host=127.0.0.1;port=3306;dbname=my_db;charset=utf8mb4;");
define("DB_USERNAME", "root"); 
define("DB_PASSWORD", "");

?>