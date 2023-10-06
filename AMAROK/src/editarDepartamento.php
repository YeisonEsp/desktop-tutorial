<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["departid"])  ||
    !isset($_POST["departnom"]) 
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "conexion.php";
$departid       = $_POST["departid"];
$departnom      = $_POST["departnom"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_departamento(?,?);");
$resultado = $sentencia->execute([$departid, $departnom]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listarDepartamentos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el codigo de la ciudad";
}