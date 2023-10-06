<?php

if (!isset($_GET["clientdoc"]))
{
    exit();
}

session_start();
$usuario = $_SESSION['username'];
if(!isset($usuario)){
    header("location: login.php");
}else{
    $clientdoc = $_GET["clientdoc"];
    include_once "conexion.php";
    $sentencia = $base_de_datos->prepare("SELECT fun_delete_cliente( ? );");
    $resultado = $sentencia->execute([$clientdoc]);
    if ($resultado === true) {
        header("Location: listarClientes.php");
    } else {
        echo "Algo salió mal... Go back to the elemental school";
    }
}
