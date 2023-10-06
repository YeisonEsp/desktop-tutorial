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
$sentencia = $base_de_datos->query('select empreNit, empreNom, numFacIni, redPunDes, redPunDom
									 FROM parametros');
$parametros = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">PARÁMETROS</h1><br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NIT</th>
						<th>EMPRESA</th>
						<th>NÚMERO FACTURA INICIAL</th>
						<th>PUNTAJE DESCUENTO</th>
						<th>PUNTAJE DOMICILIO</th>
						<th>EDITAR</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($parametros as $param)
					{
						?>
						<tr>
							<td><?php echo $param->emprenit ?></td>
							<td><?php echo $param->emprenom ?></td>
							<td><?php echo $param->numfacini ?></td>
							<td><?php echo $param->redpundes ?></td>
							<td><?php echo $param->redpundom ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarParametros.php?emprenit=" . $param->emprenit?>">Editar 📝</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>