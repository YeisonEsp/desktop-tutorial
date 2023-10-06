<?php

if (
    !isset($_POST["mensajnom"]) ||
    !isset($_POST["mensajdir"]) ||
    !isset($_POST["mensajtel"]) ||
    !isset($_POST["mensajema"]) ||
    !isset($_POST["mensajdoc"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$mensajdoc     = $_POST["mensajdoc"];
$mensajnom     = $_POST["mensajnom"];
$mensajdir     = $_POST["mensajdir"];
$mensajtel     = $_POST["mensajtel"];
$mensajema     = $_POST["mensajema"];


$sentencia = $base_de_datos->prepare("SELECT fun_update_mensajero(?,?,?,?,?);");

$resultado = $sentencia->execute([$mensajdoc, $mensajnom, $mensajdir, $mensajtel, $mensajema]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listarMensajeros.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el documento del cliente";
}