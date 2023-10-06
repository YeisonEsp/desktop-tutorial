<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query('select c.ciudadId, c.ciudadNom, c.precioDom, d.departNom FROM ciudad c JOIN departamento d ON c.idDepart=d.departId ORDER BY c.ciudadNom');
$ciudades = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="crud-text">CIUDADES</h1><br>
		<a class="btn-agregar"  href="formAgregarCiudad.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>NOMBRE</th>
                        <th>PRECIO DOMICILIO</th>
                        <th>DEPARTAMENTO</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($ciudades as $ciud)
					{
						?>
						<tr>
							<td><?php echo $ciud->ciudadid ?></td>
							<td><?php echo $ciud->ciudadnom ?></td>
                            <td><?php echo $ciud->preciodom ?></td>
                            <td><?php echo $ciud->departnom ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarCiudad.php?ciudadid=" . $ciud->ciudadid?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarCiudad.php?ciudadid=" . $ciud->ciudadid?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>