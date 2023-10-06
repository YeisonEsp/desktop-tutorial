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
    !isset($_POST["empretranom"]) ||
    !isset($_POST["empretratel"]) 
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$empretranit      = $_POST["empretranit"];
$empretranom      = $_POST["empretranom"];
$empretratel      = $_POST["empretratel"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_empresa(?,?,?);");

$resultado = $sentencia->execute([$empretranit, $empretranom, $empretratel]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listarEmpresas.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el documento del cliente";
}