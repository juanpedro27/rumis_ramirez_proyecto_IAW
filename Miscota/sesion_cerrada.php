<?php

// COMPRBAMOS SI HAY ALGUNA SESION ABIERTA

session_start();

if (isset($_SESSION["user"])) { // SI HAY UNA SESION DE CUALQUIER USUARIO ABIERTA SE DESTRUYE
    session_destroy();
    header("Location: login.php"); // NOS REDIRIGE AL LOGIN
} else {

    header("Location: login.php"); // NOS REDIRIGE AL LOGIN
}

?>

