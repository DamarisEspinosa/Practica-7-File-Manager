<?php

require_once APP_PATH . "sesion.php";

if (!$USUARIO_AUTENTICADO) {
    header('Location: ' . APP_ROOT . "login.php");
    exit();
}
?>