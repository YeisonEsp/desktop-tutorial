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
		<h1 class="tlo">Agregar Productos</h1>
		<form action="./insertarProducto.php" method="POST">
			<div class="form-group">
				<label for="produccod">Codigo del Producto</label>
				<input required name="produccod" type="text" minlength="5" maxlength="5" id="produccod" placeholder="Código Producto" class="form-control">
			</div>
			<div class="form-group">
				<label for="producnom">Nombre del Producto</label>
				<input required name="producnom" type="text" minlength="10" maxlength="50" id="producnom" placeholder="Nombre Producto" class="form-control">
			</div>
			<div class="form-group">
				<label for="producsto">Stock del Producto</label>
				<input required name="producsto" type="number" min="1" max="999" id="producsto" placeholder="Stock Producto" class="form-control">
			</div>
			<div class="form-group">
				<label for="producpre">Precio del Producto</label>
				<input required name="producpre" type="number" min="100" max="9999999" id="producpre" placeholder="Precio Producto" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarProductos.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>