<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
=================================================================
Este archivo guarda los datos del formulario en donde se editan
=================================================================
*/
?>

<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["proveenom"]) ||
    !isset($_POST["ciudadnom"]) ||
    !isset($_POST["proveedir"]) ||
    !isset($_POST["proveetel"]) ||
    !isset($_POST["proveeema"]) 
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$proveenit     = $_POST["proveenit"];
$ciudadnom     = $_POST["ciudadnom"];
$proveenom     = $_POST["proveenom"];
$proveedir     = $_POST["proveedir"];
$proveetel     = $_POST["proveetel"];
$proveeema     = $_POST["proveeema"];


$sentencia = $base_de_datos->prepare("SELECT fun_update_proveedor(?,?,?,?,?,?);");

$resultado = $sentencia->execute([$proveenit, $ciudadnom, $proveenom, $proveedir, $proveetel, $proveeema]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listarProveedores.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el documento del cliente";
}