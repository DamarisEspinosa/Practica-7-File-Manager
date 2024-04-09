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

function generador_ip(){
	$salida = "";
	for ($i=1; $i <= 4 ; $i++) { 
		$salida = $salida . mt_rand(0, 255).(($i != 4) ? ".":"");
	}
	return $salida;
}

?>