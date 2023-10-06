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
    !isset($_POST["producnom"]) ||
    !isset($_POST["producsto"]) ||
    !isset($_POST["producpre"]) 
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$produccod      = $_POST["produccod"];
$producnom      = $_POST["producnom"];
$producsto      = $_POST["producsto"];
$producpre      = $_POST["producpre"];


$sentencia = $base_de_datos->prepare("SELECT fun_update_producto(?,?,?,?);");

$resultado = $sentencia->execute([$produccod, $producnom, $producsto, $producpre]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listarProductos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el documento del cliente";
}