<?php

$conn = mysqli_connect("localhost","root","","my_db");
if(!$conn) {
    header("Location: login.php?error=1");
    exit;
} 

?>