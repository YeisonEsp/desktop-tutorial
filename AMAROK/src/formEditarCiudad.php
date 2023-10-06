<?php
if (!isset($_GET["ciudadid"]))
{
	echo "No existe la ciudad a editar";
	exit();
}

include_once 'encabezado.php';

$ciudadid = $_GET["ciudadid"];

include_once "conexion.php";

$sentencia = $base_de_datos->prepare(  "SELECT ci.ciudadId, ci.idDepart, d.departNom, ci.ciudadNom, ci.precioDom FROM ciudad ci
										JOIN departamento d ON ci.idDepart = d.departId
										WHERE ciudadId = ?;");
$sentencia->execute([$ciudadid]);
$ciudades = $sentencia->fetchObject();
if (!$ciudades)
{
    echo "¡No existe algúna Ciudad con ese código!";
    exit();
}
$ciudadCod = $ciudades->iddepart;
?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="tlo">Editar</h1>
		<form action="editarCiudad.php" method="POST">					
			<input type="hidden" name="ciudadid" value="<?php echo $ciudades->ciudadid; ?>">
			<div class="form-group">
				<label for="ciudadnom">Nombre</label>
				<input value="<?php echo $ciudades->ciudadnom; ?>" required name="ciudadnom" type="text" minlength="3" maxlength="20" id="ciudadnom" placeholder="Actualizar Nombre de la ciudad" class="form-control">
			</div>

			<div class="form-group form-select-ciu">
				<label for="iddepart">Departamento</label>
				<select name="iddepart" type="number" class="select-ciudad" id="iddepart">
					<?php
					$sentencia2 = $base_de_datos->prepare( "SELECT departId, departNom FROM departamento
															WHERE departId <> ? ORDER BY departNom;");
					$sentencia2->execute([$ciudadCod]);
					$departamentos = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					?>
					<option class="optselected" value="<?php echo $ciudades->iddepart; ?>"><?php echo $ciudades->departnom; ?></option>
					<?php foreach($departamentos as $depart)
					{?>
						<option value="<?php echo $depart->departid; ?>"><?php echo $depart->departnom; ?></option>
					<?php
					} ?>
				</select>
			</div>

			<div class="form-group">
				<label for="preciodom">Domicilio</label>
				<input value="<?php echo $ciudades->preciodom; ?>" required name="preciodom" type="number" min="0" max="99999" id="preciodom" placeholder="Actualizar Precio del Domicilio" class="form-control">
			</div>
		
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarCiudades.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>