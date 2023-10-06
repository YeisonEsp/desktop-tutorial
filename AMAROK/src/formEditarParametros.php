<?php

if (!isset($_GET["emprenit"]))
{
	echo "No existe el registro de parámetro a editar";
	exit();
}

include_once 'encabezado.php';

$emprenit = $_GET["emprenit"];

include_once "conexion.php";

$sentencia = $base_de_datos->prepare("SELECT empreNit, empreNom, numFacIni, redPunDes, redPunDom FROM parametros WHERE empreNit = ?;");
$sentencia->execute([$emprenit]);
$parametros = $sentencia->fetchObject();

if (!$parametros)
{
    echo "¡No existe algún registro de parámetros con ese Nit!";
    exit();
}
?>

<br>
<div class="row">
	<div class="col-12">
		<h1 class="tlo">Editar</h1>
		<form action="editarParametros.php" method="POST">
			<input type="hidden" name="emprenit" value="<?php echo $parametros->emprenit; ?>">
			<div class="form-group">
				<label for="emprenom">Nombre</label>
				<input value="<?php echo $parametros->emprenom; ?>" required name="emprenom" type="text" minlength="6" maxlength="40" id="emprenom" placeholder="Nombre de la empresa" class="form-control">
			</div>
			<div class="form-group">
				<label for="numfacini">Número de factura inicial</label>
				<input value="<?php echo $parametros->numfacini; ?>" required name="numfacini" type="number" min="0" max="99999" id="numfacini" placeholder="Número inicial de factura" class="form-control">
			</div>
			<div class="form-group">
				<label for="redpundes">Puntaje mínimo para redención de puntos de descuento</label>
				<input value="<?php echo $parametros->redpundes; ?>" required name="redpundes" type="number" min="0" max="9999" id="redpundes" placeholder="Puntaje mínimo para redención de descuento" class="form-control">
			</div>
			<div class="form-group">
				<label for="redpundom">Puntaje mínimo para redención de puntos de domicilio</label>
				<input value="<?php echo $parametros->redpundom; ?>" required name="redpundom" type="number" min="0" max="9999" id="redpundom" placeholder="Puntaje mínimo para redención de domicilio" class="form-control">
			</div>
            <div class="form-group">
				<label for="admincon">Si desea cambiar la contraseña puede ingresar una nueva</label>
				<input name="admincon" type="password" minlength="6" maxlength="25" id="admincon" placeholder="Nueva Contraseña" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarParametros.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>