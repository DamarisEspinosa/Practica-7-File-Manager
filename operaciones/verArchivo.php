<?php 

require "../conection.php";

$data = json_decode(file_get_contents('php://input'), true);
$hash = $data['valor_hash'];

$stmt = $conn->prepare("SELECT * FROM archivos WHERE hash_sha256 = ?");
$stmt->execute([$hash]);
$result = $stmt->fetchAll();
if (!$result) return false;
$valores = $result[0];

$visible = ($valores['es_publico']) ? 0 : 1;

$sql = "UPDATE `archivos` SET `es_publico` = ? WHERE `hash_sha256` = ?";

$respuesta = "";

try {
	$stmt = $conn->prepare($sql);
	$stmt->execute([$visible, $hash]);

	$respuesta = array('mensaje' => 'Datos recibidos correctamente');
} catch (Exception $e) {
	$respuesta = array('mensaje' => 'Datos no recibidos correctamente');
}	

echo json_encode($respuesta);

?>