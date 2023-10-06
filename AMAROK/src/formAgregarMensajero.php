<?php include_once "encabezado.php" ?>
<div class="row row-agregar">
	<div class="col-12">
		<br>
		<h1 class="tlo">Agregar Mensajero</h1>
		<form action="insertarMensajero.php" method="POST">
			<div class="form-group">
				<label for="mensajdoc">Documento del mensajero</label>
				<input required name="mensajdoc" type="number" min="10000000" max="9999999999" id="mensajdoc" placeholder="Documento del mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajnom">Nombre</label>
				<input required name="mensajnom" type="text" minlength="10" maxlength="50" id="mensajnom" placeholder="Nombre del mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajdir">Dirección</label>
				<input required name="mensajdir" type="text" minlength="15" id="mensajdir" placeholder="Dirección del mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajtel">Teléfono</label>
				<input required name="mensajtel" type="number" min="3000000000" max="3999999999" id="mensajtel" placeholder="Teléfono del mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajema">Email</label>
				<input required name="mensajema" type="text" id="mensajema" placeholder="Email del mensajero" class="form-control">
			</div>
			<div class="form-group">
				<label for="mensajcon">Password</label>
				<input required name="mensajcon" type="password" minlength="6" id="mensajcon" placeholder="Password del mensajero" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarMensajeros.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>