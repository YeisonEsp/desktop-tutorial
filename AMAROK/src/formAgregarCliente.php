<?php include_once "encabezado.php" ?>
<div class="row row-agregar">
	<div class="col-12">
		<br>
		<h1 class="tlo">Agregar Clientes</h1>
		<form id="formulario" action="insertarcliente.php" method="POST">

			<div class="form-group" id="grupo-clientdoc-cliente">
				<label for="clientdoc">Documento del cliente</label>
				<input required name="clientdoc" type="number" min="10000000" max="9999999999" id="clientdoc" placeholder="Ej. 1023456789" class="form-control">
				<p class="formulario-texto-error">El documento debe tener de 7 a 10 dígitos sin (.) ni (,)</p>
			</div>
			
			<div class="form-group form-select-ciu" id="grupo-idciudad-cliente">
				<label for="idciudad">Ciudad</label> 
				<select name="idciudad" type="text" class="select-ciudad" id="idciudad">
					<?php
					include_once "conexion.php";
					$sentencia2 = $base_de_datos->query('SELECT c.ciudadid, c.ciudadnom, d.departnom FROM ciudad c JOIN departamento d ON c.iddepart = d.departid ORDER BY d.departNom;');
					$ciudades = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					?>
					<option selected>Seleccionar una Ciudad</option>
					<?php foreach($ciudades as $ciud)
					{
						?>
						<option value="<?php echo $ciud ->ciudadid ?>"><?php echo $ciud->departnom ?> , <?php echo $ciud->ciudadnom ?></option>
					<?php
					} ?>
				</select>
				<p class="formulario-texto-error">No ha selecionado la Ciudad</p>
			</div>

			<div class="form-group" id="grupo-clientnom-cliente">
				<label for="clientnom">Nombre</label>
				<input required name="clientnom" type="text" id="clientnom" minlength="6" maxlength="50" placeholder="Ej. Nombre Apellido" class="form-control input-aaa">
				<p class="formulario-texto-error">El nombre solo debe contener letras y debe tener mínimo 7 caracteres</p>
			</div>
			
			<div class="form-group" id="grupo-clientdir-cliente">
				<label for="clientdir">Dirección</label>
				<input required name="clientdir" type="text" id="clientdir" minlength="12" placeholder="Ej. cra 1 #23-45" class="form-control">
				<p class="formulario-texto-error">La dirección debe tener mínimo 12 caracteres</p> 
			</div>

			<div class="form-group" id="grupo-clienttel-cliente">
				<label for="clienttel">Teléfono</label>
				<input required name="clienttel" type="number" min="3000000000" max="3999999999" id="clienttel" placeholder="Ej. 3214567890" class="form-control">
				<p class="formulario-texto-error">El teléfono solo puede tener 10 dígitos y sin espacio</p>  
			</div>

			<div class="form-group" id="grupo-clientema-cliente">
				<label for="clientema">Email</label>
				<input required name="clientema" type="text" id="clientema" placeholder="Ej. C.o_rr-3@ejemplo.com" class="form-control">
				<p class="formulario-texto-error">El correo deber tener un @ y una dirección válida</p> 
			</div>

			<div class="form-group" id="grupo-clientcon-cliente">
				<label for="clientcon">contraseña</label>
				<input required name="clientcon" type="password" minlength="8" maxlength="20" id="clientcon" placeholder="Ej. _1contr@seNa!" class="form-control">
				<p class="formulario-texto-error">La contraseña deber mínimo 8 caracteres de cualquier tipo</p> 
			</div>

			<button id="btnValidarForm" type="submit" class="btn btn-success">Guardar</button> 
			<a href="listarClientes.php" class="btn btn-warning">Volver</a>
			<br><br><br>
		</form>
	</div>
</div>
<script src="../js/validarFormulario.js"></script>