<?php
if(!isset($_POST["idciudad"]))
{
    echo "<script>
        alert('Debe seleccionar una ciudad!');
        window.location = 'formAgregarCliente.php';
        </script>";
}
?>
<?php
if (!isset($_POST["clientdoc"])  ||
    !isset($_POST["idciudad"])   ||
    !isset($_POST["clientnom"])  ||
    !isset($_POST["clientdir"])  ||
    !isset($_POST["clienttel"])  ||
    !isset($_POST["clientema"])  ||
    !isset($_POST["clientcon"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "conexion.php";
$clientdoc          = $_POST["clientdoc"];
$idciudad           = $_POST["idciudad"];
$clientnom          = $_POST["clientnom"];
$clientdir          = $_POST["clientdir"];
$clienttel          = $_POST["clienttel"];
$clientema          = $_POST["clientema"];
$clientcon          = $_POST["clientcon"];
/*
Al incluir el archivo "conexion.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_cliente(?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$clientdoc, $idciudad, $clientnom, $clientdir, $clienttel, $clientema, $clientcon]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listarClientes.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }