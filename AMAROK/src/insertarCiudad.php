<?php
if(!isset($_POST["iddepart"]))
{
    echo "<script>
        alert('Debe seleccionar un departamento!');
        window.location = 'formAgregarCiudad.php';
        </script>";
}
?>
<?php
if($_POST["preciodom"]=='')
{
    $preciodom=0;
}else{
    $preciodom      = $_POST["preciodom"];
}
?>
<?php
if (!isset($_POST["ciudadnom"])  ||
    !isset($_POST["iddepart"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "conexion.php";
$ciudadnom      = $_POST["ciudadnom"];
$iddepart       = $_POST["iddepart"];

$sentencia = $base_de_datos->prepare("SELECT fun_insert_ciudad(?, ?, ?);");
$resultado = $sentencia->execute([$ciudadnom, $iddepart, $preciodom]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listarCiudades.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }