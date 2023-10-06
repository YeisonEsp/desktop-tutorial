<?php
include_once "conexion.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('select el.envioLocNum, el.numVenta, m.mensajNom, c.ciudadNom, el.envioLocNomDes, el.envioLocDirDes, el.envioLocTelDes, el.envioLocPre, el.envioLocObs, el.envioLocSal, el.envioLocEnt
                                    FROM mensajero m JOIN enviolocal el ON m.mensajDoc=el.docMensaj JOIN ciudad c ON el.idCiudad=c.ciudadId ORDER BY el.envioLocNum');
$envlocales = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">ENVÍOS LOCALES</h1><br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NÚMERO ENVÍO</th>
						<th>VENTA</th>
						<th>MENSAJERO</th>
						<th>CIUDAD DESTINO</th>
						<th>NOMBRE DESTINARIO</th>
						<th>DIRECCIÓN DESTINO</th>
						<th>TELÉFONO DESTINARIO</th>
						<th>PRECIO ENVÍO</th>
						<th>OBSERVACIONES</th>
						<th>SALIÓ</th>
						<th>ENTREGADO</th>
						<th>FECHA ENVÍO</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($envlocales as $loc)
					{
						if($loc->enviolocsal){
                            $loc->enviolocsal='SI';
                        }else{
                            $loc->enviolocsal='NO';
                        }
                        if($loc->enviolocent){
                            $loc->enviolocent='SI';
                        }else{
                            $loc->enviolocent='NO';
                        }
						?>
						<tr>
							<td><?php echo $loc-> enviolocnum?></td>
							<td><?php echo $loc-> numventa?></td>
							<td><?php echo $loc-> mensajnom?></td>
							<td><?php echo $loc-> ciudadnom?></td>
							<td><?php echo $loc-> enviolocnomdes?></td>
							<td><?php echo $loc-> enviolocdirdes?></td>
							<td><?php echo $loc-> enviolocteldes?></td>
							<td><?php echo $loc-> enviolocpre?></td>
							<td><?php echo $loc-> enviolocobs?></td>
							<td><?php echo $loc-> enviolocsal?></td>
							<td><?php echo $loc-> enviolocent?></td>
							<td><?php echo $loc-> fec_insert?></td>
							<td><a class="btn btn-warning" href="<?php echo "#" . $loc->enviolocnum?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "#" . $loc->enviolocnum?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>