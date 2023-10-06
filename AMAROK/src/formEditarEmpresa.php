<?php

if (!isset($_GET["empretranit"]))
{
	echo "No existe la Empresa a editar";
	exit();
}

include_once 'encabezado.php';

$empretranit = $_GET["empretranit"];

include_once "conexion.php";

$sentencia = $base_de_datos->prepare("SELECT empretranit, empretranom, empretratel FROM empresatransporte WHERE empretranit = ?;");
$sentencia->execute([$empretranit]);
$empresas = $sentencia->fetchObject();
if (!$empresas)
{
    echo "¡No existe alguna Empresa con ese Nit!";
    exit();
}

?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="tlo">Editar</h1>
		<form action="editarEmpresa.php" method="POST">					
			<input type="hidden" name="empretranit" value="<?php echo $empresas->empretranit; ?>">
			<div class="form-group">
				<label for="empretranom">Nombre de la Empresa</label>
				<input value="<?php echo $empresas->empretranom; ?>" required name="empretranom" type="text" minlength="8" maxlength="25" id="empretranom" placeholder="Actualizar Nombre Empresa" class="form-control">
			</div>

			<div class="form-group">
				<label for="empretratel">Telefono de la Empresa</label>
				<input value="<?php echo $empresas->empretratel; ?>" required name="empretratel" type="number" min="3000000000" max="3999999999" id="empretratel" placeholder="Actualizar Telefono Empresa" class="form-control">
			</div>

			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarEmpresas.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>