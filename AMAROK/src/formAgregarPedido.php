<?php include_once "encabezado.php";
	include_once "conexion.php";?>
<div class="row row-agregar">
	<div class="col-12">
		<br>
		<h1 class="tlo">Agregar Pedido</h1>
		<form action="insertarcliente.php" method="POST">
			
			<div class="form-group form-select-ciu">
				<label for="nitprovee">Proveedor</label> 
				<select name="nitprovee" type="text" class="select-ciudad" id="nitprovee">
					<?php
					$sentencia = $base_de_datos->query("SELECT proveeNit, proveeNom FROM proveedor;");
					$proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
					?>
					<option selected disabled> Selecionar un Proveedor </option>
					<?php foreach($proveedores as $prov)
					{?>
						<option value="<?php echo $prov ->proveenit ?>"><?php echo $prov->proveenom ?></option>
					<?php
					} ?>
				</select>
			</div>

			<div class="form-group form-select-ciu">
				<label for="idtippag">Tipo de Pago</label> 
				<select name="idtippag" type="text" class="select-ciudad" id="idtippag">
					<?php
					$sentencia2 = $base_de_datos->query("SELECT tipPagId, tipPagNom FROM tipopago;");
					$tipopago = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					?>
					<option selected disabled> Selecionar un Tipo de Pago </option>
					<?php foreach($tipopago as $tipp)
					{?>
						<option value="<?php echo $tipp->tippagid ?>"><?php echo $tipp->tippagnom ?></option>
					<?php
					} ?>
				</select>
			</div>

			<div class="form-group">
				<label for="pedidodesesp">Descuento</label>
				<input required name="pedidodesesp" type="number" id="pedidodesesp" min="0" max="999999" placeholder="Ingresar el Valor del Descuento" class="form-control">
			</div>
			
			<div class="form-group">
				<label for="clienttel">Plazo de pago</label>
				<input required name="clienttel" type="date" id="clienttel" placeholder="Teléfono del cliente" class="form-control">
			</div>
			
			
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarClientes.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>