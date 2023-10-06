<?php include_once "encabezado.php" ?>
<div class="row row-agregar">
	<div class="col-12">
		<br>
		<h1 class="tlo">Agregar Tipo Pago</h1>
		<form action="insertarTipoPago.php" method="POST">
			
			<div class="form-group">
				<label for="tippagnom">Nombre</label>
				<input required name="tippagnom" type="text" minlength="5" maxlength="20" id="tippagnom" placeholder="Nombre del tipo de pago" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarTiposPagos.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>