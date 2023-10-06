<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
==================================================================
Este archivo inserta los datos enviados a través de formulario.php
==================================================================
*/
?>
<?php
if (!isset($_POST["produccod"])  ||
    !isset($_POST["producnom"])  ||
    !isset($_POST["producsto"])  ||
    !isset($_POST["producpre"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "conexion.php";
$produccod      = $_POST["produccod"];
$producnom      = $_POST["producnom"];
$producsto      = $_POST["producsto"];
$producpre      = $_POST["producpre"];
/*
Al incluir el archivo "conexion.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_producto(?, ?, ?, ?);");
$resultado = $sentencia->execute([$produccod, $producnom, $producsto, $producpre]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listarProductos.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }