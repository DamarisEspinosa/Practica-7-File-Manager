<?php
// Inicia la sesión (si aún no está iniciada)
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión (o cualquier otra página deseada)
header("Location: login.php");
exit;

?>