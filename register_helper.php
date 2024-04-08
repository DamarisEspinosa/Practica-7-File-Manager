<?php
function registrar($nombre, $apellidos, $username, $password, $genero, $fechaNac){
	$GLOBALS["password"] = $password;
	include("conection.php");

	$passwordSalt = strtoupper(bin2hex(random_bytes(32)));
	$passwordEncrypted = strtoupper(hash("sha512", ($GLOBALS["password"] . $passwordSalt)));

	$sql = "INSERT INTO `usuarios`(`id`, `username`, `password_encrypted`, `password_salt`, `nombre`, `apellidos`, `genero`, `fecha_nacimiento`, `fecha_hora_registro`, `es_admin`, `activo`) VALUES (default, ?, ?, ?, ?, ?, ?, ?, NOW(), 0, 1)";

	$sqlParams = [$username, $passwordEncrypted, $passwordSalt, $nombre, $apellidos, $genero, $fechaNac];

	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute($sqlParams);

		return true;
	} catch (Exception $e) {
		return false;
	}	
}

require "config.php";
session_start();

if($_POST) {

    $nombre = filter_input(INPUT_POST, "nombre");
    $apellidos = filter_input(INPUT_POST, "apellidos");
    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");
    $genero = filter_input(INPUT_POST, "genero");
    $fechaNac = filter_input(INPUT_POST, "fechaNac");
    if (registrar($nombre, $apellidos, $username, $password, $genero, $fechaNac)) {
        echo "<script type='text/javascript'>alert('Se ha registrado satisfactoriamente.')</script>";
        echo "<script>console.log('Registro exitoso')</script>";
        header("Location: registro.php");
    }
}

?>
