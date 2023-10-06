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
$sentencia = $base_de_datos->query('select tipPagId, tipPagNom FROM tipopago ORDER BY tipPagNom');
$tipospagos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">TIPOS DE PAGOS</h1><br>
		<a class="btn-agregar"  href="formAgregarTipoPago.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>TIPO PAGO</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($tipospagos as $tipop)
					{
						?>
						<tr>
							<td><?php echo $tipop->tippagnom ?></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarTipoPago.php?tippagid=" . $tipop->tippagid?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>