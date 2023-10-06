<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@2023-05-08
=========================================================================================
Este archivo lista todos los datos de la tabla, obteniendo a los mismos como un arreglo
=========================================================================================
*/
?>
<?php
include_once "conexion.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('select p.proveeNit, c.ciudadNom, P.proveeNom, p.proveeDir, p.proveeTel, 
									p.proveeEma FROM proveedor p JOIN ciudad c ON p.idCiudad=c.ciudadId ORDER BY p.proveeNom');
$proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">PROVEEDORES</h1><br>
		<a class="btn-agregar"  href="formAgregarProveedor.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NIT</th>
						<th>CIUDAD</th>
						<th>NOMBRE</th>
						<th>DIRECCIÓN</th>
						<th>TELÉFONO</th>
						<th>EMAIL</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($proveedores as $proveed)
					{
						?>
						<tr>
							<td><?php echo $proveed->proveenit ?></td>
							<td><?php echo $proveed->ciudadnom ?></td>
							<td><?php echo $proveed->proveenom ?></td>
							<td><?php echo $proveed->proveedir ?></td>
							<td><?php echo $proveed->proveetel ?></td>
							<td><?php echo $proveed->proveeema ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarProveedor.php?proveenit=" . $proveed->proveenit?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarProveedor.php?proveenit=" . $proveed->proveenit?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>