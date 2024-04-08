<?php 
require "conection.php";
// para autenticar al usuario 
function verificar($username, $password){
	$GLOBALS["password"] = $password;
	//echo "Contraseña recibida en verificar(): " . $password . "<br>"; 
	include("conection.php");
	//echo "Contraseña recibida en verificar(): " . $GLOBALS["password"] . "<br>"; 

	$stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
	$stmt->execute([$username]);
	$result = $stmt->fetchAll();

	if (!$result) return false;

	$valores = $result[0];

	$passwordMasSalt = $GLOBALS["password"] . $valores["password_salt"];
	$passwordEncrypted = strtoupper(hash("sha512", $passwordMasSalt));

	if ($valores["password_encrypted"] != $passwordEncrypted) return false;

	return [
		"id" => $valores['id'] , 
		"username" => $valores["username"], 
		"nombre" => $valores["nombre"], 
		"apellidos" => $valores["apellidos"],
		"fecha" => $valores["fecha_nacimiento"],
		"es_admin" => $valores["es_admin"]
	];
}

require "config.php";
session_start();

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
//echo "Contraseña recibido en login_helper: " . $username . "<br>"; 
//echo "Contraseña recibida en login_helper: " . $password . "<br>"; 

if ($_POST) {
    
    $datosUsuario = verificar($username, $password);
	//echo json_encode($datosUsuario);
    //echo '<script>console.log('. json_encode($datosUsuario) .')</script>';

    if ($datosUsuario) {

        $_SESSION['usuario_id'] = $datosUsuario['id'];
        $_SESSION['usuario_username'] = $datosUsuario['username'];
        $_SESSION['usuario_nombre'] = $datosUsuario['nombre'];
        $_SESSION['usuario_apellidos'] = $datosUsuario['apellidos'];
        $_SESSION['usuario_fecha'] = $datosUsuario['fecha'];
        $_SESSION["usuario_esAdmin"] = $datosUsuario["es_admin"];

        header("Location: index.php");
        exit();
    } else {
        echo "<script>console.log('No ha iniciado sesión')</script>";
    }
}

?>
