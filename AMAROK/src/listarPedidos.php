<?php
include_once "conexion.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('select pe.pedidoNum, pr.proveeNom, t.tipPagNom, pe.pedidoDesEsp, pe.pedidopag, pe.pagoPlazo, pe.fec_insert FROM proveedor pr JOIN pedidoproveedor pe ON pr.proveeNit=pe.nitProvee JOIN tipopago t ON pe.idTipPag=t.tipPagId ORDER BY pe.pedidoNum');
$pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">PEDIDOS A PROVEEDORES</h1><br>
		<a class="btn-agregar"  href="formAgregarPedido.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>NÚMERO</th>
						<th>PROVEEDOR</th>
						<th>MODO PAGO</th>
                        <th>DESCUENTO ESPECIAL</th>
                        <th>PAGO</th>
						<th>PLAZO PAGO</th>
						<th>FECHA PEDIDO</th>
						<th>DETALLE</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($pedidos as $ped)
					{
                        if($ped->pedidopag){
                            $ped->pedidopag='SI';
                        }else{
                            $ped->pedidopag='NO';
                        }
						?>
						<tr>
							<td><?php echo $ped->pedidonum ?></td>
							<td><?php echo $ped->proveenom ?></td>
							<td><?php echo $ped->tippagnom ?></td>
                            <td><?php echo $ped->pedidodesesp ?></td>
                            <td><?php echo $ped->pedidopag ?></td>
							<td><?php echo $ped->pagoplazo ?></td>
							<td><?php echo $ped->fec_insert ?></td>
							<td><a class="btn btn-warning" href="<?php echo "detallePedido.php?pedidonum=" . $ped->pedidonum?>">Detalle 📝</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>