<?php
include_once "conexion.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('select en.envioNacNum, en.numVenta, m.mensajNom, c.ciudadNom, em.empreTraNom, en.envioNacNomDes, en.envioNacDirDes, en.envioNacTelDes, en.envioNacPre, en.envioNacObs, en.envioNacSal, en.envioNacRec
                                    FROM mensajero m JOIN envionacional en ON m.mensajDoc=en.docMensaj JOIN ciudad c ON en.idCiudad=c.ciudadId JOIN empresatransporte em 
									ON en.nitEmpreTra=em.empreTraNit ORDER BY en.envioNacNum');
$envnacionales = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">ENVÍOS NACIONALES</h1><br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NÚMERO ENVÍO</th>
						<th>VENTA</th>
						<th>MENSAJERO</th>
						<th>CIUDAD DESTINO</th>
						<th>EMPRESA TRANSPORTE</th>
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
					<?php foreach($envnacionales as $nac)
					{
						if($nac->envionacsal){
                            $nac->envionacsal='SI';
                        }else{
                            $nac->envionacsal='NO';
                        }
                        if($nac->envionacent){
                            $nac->envionacent='SI';
                        }else{
                            $nac->envionacent='NO';
                        }
						?>
						<tr>
							<td><?php echo $nac-> envionacnum?></td>
							<td><?php echo $nac-> numventa?></td>
							<td><?php echo $nac-> mensajnom?></td>
							<td><?php echo $nac-> ciudadnom?></td>
							<td><?php echo $nac-> envionacnomdes?></td>
							<td><?php echo $nac-> envionacdirdes?></td>
							<td><?php echo $nac-> envionacteldes?></td>
							<td><?php echo $nac-> envionacpre?></td>
							<td><?php echo $nac-> envionacobs?></td>
							<td><?php echo $nac-> envionacsal?></td>
							<td><?php echo $nac-> envionacent?></td>
							<td><?php echo $nac-> fec_insert?></td>
							<td><a class="btn btn-warning" href="<?php echo "#" . $nac->envionacnum?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "#" . $nac->envionacnum?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>