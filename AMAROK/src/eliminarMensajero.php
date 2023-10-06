<?php

if (!isset($_GET["mensajdoc"]))
{
    exit();
}

session_start();
$usuario = $_SESSION['username'];
if(!isset($usuario)){
    header("location: login.php");
}else{
    $mensajdoc = $_GET["mensajdoc"];
    include_once "conexion.php";
    $sentencia = $base_de_datos->prepare("SELECT fun_delete_mensajero( ? );");
    $resultado = $sentencia->execute([$mensajdoc]);
    if ($resultado === true) {
        header("Location: listarMensajeros.php");
    } else {
        echo "Algo salió mal... Go back to the elemental school";
    }
}