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
$sentencia = $base_de_datos->query('select empreTraNit, empreTraNom, empreTraTel FROM empresatransporte ORDER BY empreTraNom');
$empresas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">EMPRESAS DE TRANSPORTE</h1><br>
		<a class="btn-agregar"  href="formAgregarEmpresa.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NIT</th>
						<th>NOMBRE</th>
						<th>TELÉFONO</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($empresas as $empr)
					{
						?>
						<tr>
							<td><?php echo $empr->empretranit ?></td>
							<td><?php echo $empr->empretranom ?></td>
							<td><?php echo $empr->empretratel ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarEmpresa.php?empretranit=" . $empr->empretranit?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarEmpresa.php?empretranit=" . $empr->empretranit?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>