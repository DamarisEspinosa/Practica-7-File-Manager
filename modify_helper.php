<?php

function modificar($id, $name, $apellidos, $contra, $genero, $fecha_nacimiento){
	include("conection.php");

	$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
	$stmt->execute([$id]);
	$result = $stmt->fetchAll();

	if (!$result) return false;

	$valores = $result[0];

	$passwordSalt = $contra . $valores["password_salt"];
	$passwordEncrypted = strtoupper(hash("sha512", $passwordSalt));

	if ($valores["password_encrypted"] != $passwordEncrypted){
		$passwordSalt = strtoupper(bin2hex(random_bytes(32)));
		$passwordEncrypted = strtoupper(hash("sha512", ($contra . $passwordSalt)));
	}else{
		$passwordSalt = $valores["password_salt"];
	}

	$sql = "UPDATE `usuarios` SET `password_encrypted`= ?,`password_salt`= ?,`nombre`= ?,`apellidos`= ?,`genero`= ?,`fecha_nacimiento`= ? WHERE `id` = ?";

	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute([$passwordEncrypted, $passwordSalt, trim($name, " "), trim($apellidos, " "), $genero, $fecha_nacimiento, $id]);
		return true;
	} catch (Exception $e) {
		return false;
	}	

}

require 'config.php';
session_start();
if ($_POST) {
    $id = $_SESSION['usuario_id'];
    $name = filter_input(INPUT_POST, "nombre");
    $ape = filter_input(INPUT_POST, "apellidos");
    $pass = filter_input(INPUT_POST, "password");
    $genero = filter_input(INPUT_POST, "genero");
    $fecha = filter_input(INPUT_POST, "fecha-nacimiento");

    if (modificar($id, $name, $ape, $pass, $genero, $fecha)) {
        echo "<script type='text/javascript'>alert('Se ha modificado satisfactoriamente.')</script>";
    }
}

?>