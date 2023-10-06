<?php
if (!isset($_POST["mensajdoc"])  ||
    !isset($_POST["mensajnom"])  ||
    !isset($_POST["mensajdir"])  ||
    !isset($_POST["mensajtel"])  ||
    !isset($_POST["mensajema"])  ||
    !isset($_POST["mensajcon"]))
    {
    exit();
    }

include_once "conexion.php";
$mensajdoc          = $_POST["mensajdoc"];
$mensajnom          = $_POST["mensajnom"];
$mensajdir          = $_POST["mensajdir"];
$mensajtel          = $_POST["mensajtel"];
$mensajema          = $_POST["mensajema"];
$mensajcon          = $_POST["mensajcon"];


$sentencia = $base_de_datos->prepare("SELECT fun_insert_mensajero(?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$mensajdoc, $mensajnom, $mensajdir, $mensajtel, $mensajema, $mensajcon]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listarMensajeros.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }