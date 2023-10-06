<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["iddepart"])  ||
    !isset($_POST["ciudadnom"]) ||
    !isset($_POST["preciodom"]) 
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$ciudadid       = $_POST["ciudadid"];
$iddepart       = $_POST["iddepart"];
$ciudadnom      = $_POST["ciudadnom"];
$preciodom      = $_POST["preciodom"];


$sentencia = $base_de_datos->prepare("SELECT fun_update_ciudad(?,?,?,?);");
$resultado = $sentencia->execute([$ciudadid, $ciudadnom, $iddepart, $preciodom]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listarCiudades.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el codigo de la ciudad";
}