<?php include_once "encabezado.php" ?>
<div class="row row-agregar">
	<div class="col-12">
		<br>
		<h1 class="tlo">Agregar Ciudades</h1>
		<form action="insertarCiudad.php" method="POST">
			
			<div class="form-group">
				<label for="ciudadnom">Nombre</label>
				<input required name="ciudadnom" type="text" minlength="3" maxlength="20" id="ciudadnom" placeholder="Nombre de la Ciudad" class="form-control">
			</div>

			<div class="form-group form-select-ciu">
				<label for="iddepart">Departamento</label> 
				<select name="iddepart" type="number" class="select-ciudad" id="iddepart">
					<?php
					include_once "conexion.php";
					$sentencia2 = $base_de_datos->query("SELECT departId, departNom FROM departamento ORDER BY departNom ASC;");
					$departamentos = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					?>
					<option selected disabled> Selecionar un Departamento </option>
					<?php foreach($departamentos as $depart)
					{
						?>
						<option value="<?php echo $depart ->departid; ?>"><?php echo $depart->departnom; ?></option>
					<?php
					} ?>
				</select>
			</div>

			<div class="form-group">
				<label for="preciodom">Precio Domicilio</label>
				<input name="preciodom" type="number" min="0" max="99999" id="preciodom" placeholder="Precio del Domicilio" class="form-control">
			</div>

			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarCiudades.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>