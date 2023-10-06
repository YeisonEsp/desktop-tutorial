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
		<h1 class="tlo">Agregar Empresa</h1>
		<form action="./insertarEmpresa.php" method="POST">
			<div class="form-group">
				<label for="empretranit">NIT de la Empresa</label>
				<input required name="empretranit" type="number" min="1000000000" max="9999999999" id="empretranit" placeholder="Ingresar NIT Empresa" class="form-control">
			</div>
			<div class="form-group">
				<label for="empretranom">Nombre de la Empresa</label>
				<input required name="empretranom" type="text" minlength="8" maxlength="25" id="empretranom" placeholder="Ingresar Nombre Empresa" class="form-control">
			</div>
			<div class="form-group">
				<label for="empretratel">Telefono de la Empresa</label>
				<input required name="empretratel" type="number" min="3000000000" max="3999999999" id="empretratel" placeholder="Ingresar Telefono Empresa" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarEmpresas.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>