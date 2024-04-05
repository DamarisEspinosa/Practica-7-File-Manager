<?php

require "login.php";
require "conection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$USERS = [
    [
        "id" => 1,
        "username" => "admin",  
        "nombre" => "Administrador",
        "password" => "Admin1234",
        "passwordEncrypted" => "17D94FA6D235D3B338FC3A696C64A186852ADEDF8A0BE87D1F62227C1192EEB345B717F228278100D690FFFEC5E48D15809E8829F6CAFD3325F3AB09E72248B0",
        "passwordSalt" => "8362C1F926583CAC4A8C617AA1D33CE23F8652C1E5406443D31D0C41808F3835",
        "esAdmin" => true
    ],
    [
        "id" => 2,
        "username" => "user01",  
        "nombre" => "Usuario 01",
        "password" => "user01",
        "passwordEncrypted" => "406D7E2E07B2BBEA0F931B93897600ED4C4D41DFEE46EC02E7316C9CE0E5D82DBA14160AB296A243B6BD2FE2A0179367B45A68B40869172864C996F65FB4D4D0",
        "passwordSalt" => "BCBEFB53EC209EB5F557347C970D87C649E90F9591EA4441A1B378F5A75EBA2C",
        "esAdmin" => false
    ]
];

function autentificar($username, $password) {
    
    if (!$username || !$password) {
        return false;
    }

    global $USERS;  
    $user = NULL;  

    foreach ($USERS as $u) {
        if ($username == $u["username"]) {
            $user = $u;
            break;
        }
    }

    if (!$user) {
        return false;
    }

    $passwordMasSalt = $password . $user["passwordSalt"];
    $passwordEncrypted = strtoupper(hash("sha512", $passwordMasSalt));

    if ($passwordEncrypted != $user["passwordEncrypted"]) {
        return false;
    }

    return [
        "id" => $user["id"],
        "username" => $user["username"],
        "nombre" => $user["nombre"],
        "esAdmin" => $user["esAdmin"]
    ];
}

$autenticarUsuario = autentificar($username, $password);
if($autenticarUsuario) {
    session_start();
    $_SESSION['loggedin'] = true;
    if($username == "admin") {
        header("Location:index.php");
    } else if($username == "user01") {
        header("Location:user.php");
    }
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
?> 
