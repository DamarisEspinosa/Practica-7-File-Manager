<?php

require "config.php";
require_once APP_PATH . "db.php";
require_once APP_PATH . "login_helper.php";

session_start();

// Obtenemos los datos que se enviaron por la petición POST en el form
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

// De los parámetros de username y password los validamos, obtendremos los datos
// del usuario si el login es correcto.
$datosUsuario = autentificar($username, $password);

// Si no obtuvimos datos, regresamos al index
if (!$datosUsuario) {
    header('Location: ' . APP_ROOT);
    exit();
}

// Establecemos variables de sesión con los datos del usuario.
$_SESSION['Usuario_Id'] = $datosUsuario['id'];
$_SESSION['Usuario_Username'] = $datosUsuario['username'];
$_SESSION['Usuario_Nombre'] = $datosUsuario['nombre'];
$_SESSION['Usuario_Apellidos'] = $datosUsuario['apellidos'];
$_SESSION["Usuario_EsAdmin"] = $datosUsuario["es_admin"];

// Redirigimos al home, esto es solo para usuarios validados.
header("Location: index.php");
