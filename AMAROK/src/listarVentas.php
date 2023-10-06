<?php
include_once "conexion.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('select v.ventaNum, v.docClient, cl.clientNom, t.tipPagNom, v.ventaDom, v.ventaRec, v.ventaPlaRec, v.fec_insert FROM cliente cl JOIN venta v ON cl.clientDoc=v.docClient JOIN tipopago t ON v.idTipPag=t.tipPagId ORDER BY v.ventaNum');
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">VENTAS</h1><br>
		<a class="btn-agregar"  href="agregarVenta.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NÚMERO</th>
						<th>CC CLIENTE</th>
						<th>CLIENTE</th>
						<th>MODO PAGO</th>
                        <th>DOMICILIO</th>
                        <th>RECAUDADA</th>
                        <th>PLAZO RECAUDO</th>
						<th>FECHA</th>
						<th>DETALLE</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($ventas as $ven)
					{
                        if($ven->ventadom){
                            $ven->ventadom='SI';
                        }else{
                            $ven->ventadom='NO';
                        }
                        if($ven->ventarec){
                            $ven->ventarec='SI';
                        }else{
                            $ven->ventarec='NO';
                        }
						?>
						<tr>
							<td><?php echo $ven->ventanum ?></td>
							<td><?php echo $ven->docclient ?></td>
							<td><?php echo $ven->clientnom ?></td>
							<td><?php echo $ven->tippagnom ?></td>
                            <td><?php echo $ven->ventadom ?></td>
                            <td><?php echo $ven->ventarec ?></td>
                            <td><?php echo $ven->ventaplarec ?></td>
							<td><?php echo $ven->fec_insert ?></td>
							<td><a class="btn btn-warning" href="<?php echo "detalleVenta.php?ventanum=" . $ven->ventanum?>">Detalle 📝</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>