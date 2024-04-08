<?php
$nombreServidor = "localhost";
$userBD = "root";
$password = "";
$nombreBD = "my_db";

try {
  $conn = new PDO("mysql:host=$nombreServidor;dbname=$nombreBD", $userBD, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
