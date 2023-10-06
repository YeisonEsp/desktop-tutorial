<?php include_once "encabezado.php" ?>
<div class="row row-agregar">
	<div class="col-12">
		<br>
		<h1 class="tlo">Agregar Departamento</h1>
		<form action="insertarDepartamento.php" method="POST">
			
			<div class="form-group">
				<label for="departnom">Nombre</label>
				<input required name="departnom" type="text" minlength="3" maxlength="20" id="departnom" placeholder="Nombre del Departamento" class="form-control">
			</div>

			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarDepartamentos.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>