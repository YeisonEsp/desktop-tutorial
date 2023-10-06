<?php
if (!isset($_POST["departnom"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "conexion.php";
$departnom      = $_POST["departnom"];

$sentencia = $base_de_datos->prepare("SELECT fun_insert_departamento(?);");
$resultado = $sentencia->execute([$departnom]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listarDepartamentos.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }