<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query('select departId, departNom FROM departamento ORDER BY departNom');
$departamentos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="crud-text">DEPARTAMENTOS</h1><br>
		<a class="btn-agregar"  href="formAgregarDepartamento.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NOMBRE</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($departamentos as $depart)
					{
						?>
						<tr>
							<td><?php echo $depart->departnom ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarDepartamento.php?departid=" . $depart->departid?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarDepartamento.php?departid=" . $depart->departid?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>