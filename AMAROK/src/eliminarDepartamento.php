<?php
if (!isset($_GET["departid"]))
{
    exit();
}

session_start();
$usuario = $_SESSION['username'];
if(!isset($usuario)){
    header("location: login.php");
}else{
    $departid = $_GET["departid"];
    include_once "conexion.php";
    $sentencia = $base_de_datos->prepare("SELECT fun_delete_departamento( ? );");
    $resultado = $sentencia->execute([$departid]);
    if ($resultado === true) {
        header("Location: listarDepartamentos.php");
    } else {
        echo "Algo salió mal... Go back to the elemental school";
    }
}
