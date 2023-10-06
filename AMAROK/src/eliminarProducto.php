<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/

if (!isset($_GET["produccod"]))
{
    exit();
}

session_start();
$usuario = $_SESSION['username'];
if(!isset($usuario)){
    header("location: login.php");
}else{
    $produccod = $_GET["produccod"];
    include_once "conexion.php";
    $sentencia = $base_de_datos->prepare("SELECT fun_delete_producto( ? );");
    $resultado = $sentencia->execute([$produccod]);
    if ($resultado === true) {
        header("Location: listarProductos.php");
    } else {
        echo "Algo salió mal... Go back to the elemental school";
    }
}
