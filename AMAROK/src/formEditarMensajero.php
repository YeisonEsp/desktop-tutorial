<?php

if (!isset($_GET["mensajdoc"]))
{
	echo "No existe el Mensajero a editar";
	exit();
}

include_once 'encabezado.php';

$mensajdoc = $_GET["mensajdoc"];

include_once "conexion.php";

$sentencia = $base_de_datos->prepare("SELECT mensajdoc, mensajnom, mensajdir, mensajtel, mensajema FROM mensajero WHERE mensajdoc = ?;");
$sentencia->execute([$mensajdoc]);
$mensajeros = $sentencia->fetchObject();

if (!$mensajeros)
{
    echo "¡No existe algún Mensajero con ese documento!";
    exit();
}
?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="tlo">Editar</h1>
		<form action="editarMensajero.php" method="POST">
			<input type="hidden" name="mensajdoc" value="<?php echo $mensajeros->mensajdoc; ?>">
			<div class="form-group">
				<label for="mensajnom">Nombre</label>
				<input value="<?php echo $mensajeros->mensajnom; ?>" required name="mensajnom" type="text" minlength="10" maxlength="50" id="mensajnom" placeholder="Nombre del Mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajdir">Dirección</label>
				<input value="<?php echo $mensajeros->mensajdir; ?>" required name="mensajdir" type="text" minlength="15" id="mensajdir" placeholder="Dirección del Mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajtel">Teléfono</label>
				<input value="<?php echo $mensajeros->mensajtel; ?>" required name="mensajtel" type="number" min="3000000000" max="3999999999" id="mensajtel" placeholder="Teléfono del Mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajema">Email</label>
				<input value="<?php echo $mensajeros->mensajema; ?>" required name="mensajema" type="text" id="mensajema" placeholder="Email del Mensajero" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarMensajeros.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>