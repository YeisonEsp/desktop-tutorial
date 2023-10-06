<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
============================================================================================
Este archivo muestra un formulario que se envía a insertar.php, el cual guardará los datos
============================================================================================
*/
?>
<?php include_once "encabezado.php" ?>
<div class="row row-agregar">
	<div class="col-12">
		<br>
		<h1 class="tlo">Agregar Proveedor</h1>
		<form action="insertarProveedor.php" method="POST">
			<div class="form-group">
				<label for="proveenit">NIT</label>
				<input required name="proveenit" type="number" min="1000000000" max="9999999999" id="proveenit" placeholder="NIT del Proveedor" class="form-control">
			</div>
			
			<div class="form-group form-select-ciu">
				<label for="idciudad">Ciudad</label>
				<select name="idciudad" type="number" class="select-ciudad" id="idciudad">
					<?php
					include_once "conexion.php";
					$sentencia2 = $base_de_datos->query('SELECT c.ciudadid, c.ciudadnom, d.departnom FROM ciudad c JOIN departamento d ON c.iddepart = d.departid ORDER BY d.departNom;');
					$ciudades = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					?>
					<option selected disabled> Selecionar una Ciudad </option>
					<?php foreach($ciudades as $ciud)
					{
						?>
						<option value="<?php echo $ciud ->ciudadid ?>"><?php echo $ciud->departnom ?> , <?php echo $ciud->ciudadnom ?></option>
					<?php
					} ?>
				</select>
			</div>

			<div class="form-group">
				<label for="proveenom">Nombre</label>
				<input required name="proveenom" type="text" minlength="6" maxlength="40" id="proveenom" placeholder="Nombre del Proveedor" class="form-control">
			</div>

			<div class="form-group">
				<label for="proveedir">Dirección</label>
				<input required name="proveedir" type="text" minlength="15" id="proveedir" placeholder="Dirección del Proveedor" class="form-control">
			</div>

			<div class="form-group">
				<label for="proveetel">Teléfono</label>
				<input required name="proveetel" type="number" min="3000000000" max="3999999999" id="proveetel" placeholder="Teléfono del Proveedor" class="form-control">
			</div>

			<div class="form-group">
				<label for="proveeema">Email</label>
				<input required name="proveeema" type="text" id="proveeema" placeholder="Email del Proveedor" class="form-control">
			</div>
			
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarProveedores.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>