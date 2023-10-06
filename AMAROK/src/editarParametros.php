
<?php

if (
    !isset($_POST["emprenom"]) ||
    !isset($_POST["numfacini"]) ||
    !isset($_POST["redpundes"]) ||
    !isset($_POST["redpundom"]) ||
    !isset($_POST["emprenit"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$emprenit     = $_POST["emprenit"];
$emprenom     = $_POST["emprenom"];
$numfacini     = $_POST["numfacini"];
$redpundes     = $_POST["redpundes"];
$redpundom     = $_POST["redpundom"];
$admincon     = $_POST["admincon"];



$sentencia = $base_de_datos->prepare("SELECT fun_update_parametros(?,?,?,?,?,?);");

$resultado = $sentencia->execute([$emprenit, $emprenom, $numfacini, $redpundes, $redpundom, $admincon]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listarParametros.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el nit de la empresa";
}