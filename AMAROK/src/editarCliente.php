
<?php
session_start();

if (
    !isset($_POST["clientnom"]) ||
    !isset($_POST["ciudadnom"]) ||
    !isset($_POST["clientdir"]) ||
    !isset($_POST["clienttel"]) ||
    !isset($_POST["clientema"]) ||
    !isset($_POST["clientdoc"])
) {
    exit();
}

if($_SESSION['username']=='admin'){
	include_once "conexion.php";
}else{
	include_once "conexion_cliente.php";
}

$clientdoc     = $_POST["clientdoc"];
$ciudadnom     = $_POST["ciudadnom"];
$clientnom     = $_POST["clientnom"];
$clientdir     = $_POST["clientdir"];
$clienttel     = $_POST["clienttel"];
$clientema     = $_POST["clientema"];



$sentencia = $base_de_datos->prepare("SELECT fun_update_cliente(?,?,?,?,?,?);");

$resultado = $sentencia->execute([$clientdoc, $ciudadnom, $clientnom, $clientdir, $clienttel, $clientema]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    if($_SESSION['username']=='admin'){
        header("Location: listarClientes.php");
    }else{
        header("Location: perfil-cliente.php?clientdoc=" .$clientdoc);
    }
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el documento del cliente";
}