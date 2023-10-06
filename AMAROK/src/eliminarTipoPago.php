<?php

if (!isset($_GET["tippagid"]))
{
    exit();
}

session_start();
$usuario = $_SESSION['username'];
if(!isset($usuario)){
    header("location: login.php");
}else{
    $tippagid = $_GET["tippagid"];
    include_once "conexion.php";
    $sentencia = $base_de_datos->prepare("SELECT fun_delete_tipopago( ? );");
    $resultado = $sentencia->execute([$tippagid]);
    if ($resultado === true) {
        header("Location: listarTiposPagos.php");
    } else {
        echo "Algo salió mal... Go back to the elemental school";
    }
}