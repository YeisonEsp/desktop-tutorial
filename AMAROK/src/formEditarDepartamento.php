<?php

if (!isset($_GET["departid"]))
{
	echo "No existe la ciudad a editar";
	exit();
}

include_once 'encabezado.php';

$departid = $_GET["departid"];

include_once "conexion.php";

$sentencia = $base_de_datos->prepare("SELECT departId, departNom FROM departamento WHERE departId = ?;");
$sentencia->execute([$departid]);
$departamentos = $sentencia->fetchObject();
if (!$departamentos)
{
    echo "¡No existe algúna Ciudad con ese código!";
    exit();
}

?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="tlo">Editar</h1>
		<form action="editarDepartamento.php" method="POST">
			<input type="hidden" name="departid" value="<?php echo $departamentos->departid; ?>">

			<div class="form-group">
				<label for="departnom">Nombre</label>
				<input value="<?php echo $departamentos->departnom; ?>" required name="departnom" type="text" minlength="3" maxlength="20" id="departnom" placeholder="Actualizar Nombre del Departamento" class="form-control">
			</div>
		
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarDepartamentos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>