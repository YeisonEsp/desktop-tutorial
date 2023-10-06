<?php

if (!isset($_GET["proveenit"]))
{
	echo "No existe el Proveedor a editar";
	exit();
}

include_once 'encabezado.php';

$proveenit = $_GET["proveenit"];

include_once "conexion.php";

$sentencia = $base_de_datos->prepare(  "SELECT proveeNit, proveeNom, idCiudad, c.ciudadNom, d.departNom, proveeDir, proveeTel, proveeEma FROM proveedor 
										JOIN ciudad c ON idCiudad = c.ciudadId 
										JOIN departamento d ON idDepart = d.departId 
										WHERE proveeNit = ?;");
$sentencia->execute([$proveenit]);
$proveedores = $sentencia->fetchObject();
if (!$proveedores)
{
    echo "¡No existe algún Cliente con ese documento!";
    exit();
}
$ciudadPro = $proveedores -> idciudad;
?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="tlo">Editar</h1>
		<form action="editarProveedor.php" method="POST">
			<input type="hidden" name="proveenit" value="<?php echo $proveedores->proveenit; ?>">
			<div class="form-group">
				<label for="proveenom">Nombre</label>
				<input value="<?php echo $proveedores->proveenom; ?>" required name="proveenom" type="text" minlength="6" maxlength="40" id="proveenom" placeholder="Nombre del Proveedor" class="form-control">
			</div>

			<div class="form-group form-select-ciu">
				<label for="ciudadnom">Ciudad</label> 
				<select name="ciudadnom" type="text" class="select-ciudad" id="ciudadnom">
					<?php
					$sentencia2 = $base_de_datos->prepare( "SELECT c.ciudadid, c.ciudadnom, d.departnom FROM ciudad c 
															JOIN departamento d ON c.iddepart = d.departid 
															WHERE ciudadid <> ? ORDER BY d.departNom ;");
					$sentencia2->execute([$ciudadPro]);
					$ciudades = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					?>
					<option class="optselected" value="<?php echo $proveedores ->idciudad ?>"><?php echo $proveedores ->departnom ?>, <?php echo $proveedores ->ciudadnom ?></option>
					<?php foreach($ciudades as $ciud)
					{
						?>
						
						<option value="<?php echo $ciud ->ciudadid ?>"><?php echo $ciud->departnom ?> , <?php echo $ciud->ciudadnom ?></option>
					<?php
					} ?>
				</select>
			</div>

			<div class="form-group">
				<label for="proveedir">Dirección</label>
				<input value="<?php echo $proveedores->proveedir; ?>" required name="proveedir" type="text" minlength="15" id="proveedir" placeholder="Dirección del Proveedor" class="form-control">
			</div>

			<div class="form-group">
				<label for="proveetel">Teléfono</label>
				<input value="<?php echo $proveedores->proveetel; ?>" required name="proveetel" type="number" min="3000000000" max="3999999999" id="proveetel" placeholder="Teléfono del Proveedor" class="form-control">
			</div>

			<div class="form-group">
				<label for="proveeema">Email</label>
				<input value="<?php echo $proveedores->proveeema; ?>" required name="proveeema" type="text" id="proveeema" placeholder="Email del Proveedor" class="form-control">
			</div>
			
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarProveedores.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>