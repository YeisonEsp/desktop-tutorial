<?php
if(!isset($_POST["idciudad"]))
{
    echo "<script>
        alert('Debe seleccionar una ciudad!');
        window.location = 'formAgregarProveedor.php';
        </script>";
}
?>
<?php
if (!isset($_POST["proveenit"])  ||
    !isset($_POST["idciudad"])   ||
    !isset($_POST["proveenom"])  ||
    !isset($_POST["proveedir"])  ||
    !isset($_POST["proveetel"])  ||
    !isset($_POST["proveeema"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "conexion.php";
$proveenit          = $_POST["proveenit"];
$idciudad           = $_POST["idciudad"];
$proveenom          = $_POST["proveenom"];
$proveedir          = $_POST["proveedir"];
$proveetel          = $_POST["proveetel"];
$proveeema          = $_POST["proveeema"];


$sentencia = $base_de_datos->prepare("SELECT fun_insert_proveedor(?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$proveenit, $idciudad, $proveenom, $proveedir, $proveetel, $proveeema]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listarProveedores.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }