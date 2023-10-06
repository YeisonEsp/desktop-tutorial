<?php
if (!isset($_GET["pedidonum"]))
{
	echo "No existe el pedido a visualizar";
	exit();
}

$pedidonum = $_GET["pedidonum"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("SELECT d.codProduc, p.producNom, d.detPedCan, d.detPedCos, d.detallePedDes, d.detPedValPar FROM detallepedido d JOIN producto p ON d.codProduc=p.producCod WHERE d.numPedido= ? ORDER BY p.producNom;");
$sentencia->execute([$pedidonum]);
$detallesp = $sentencia->fetchAll(PDO::FETCH_OBJ);
if (!$detallesp)
{
    echo "¡No existe detalles para esa venta";
    exit();
}

?>
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">DETALLES DEL PEDIDO</h1><br><br>
		<a class="btn-agregar"  href="listarPedidos.php">Regresar</a><br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
                        <th>CÓDIGO PRODUCTO</th>
						<th>PRODUCTO</th>
						<th>CANTIDAD</th>
						<th>COSTO/UNIDAD</th>
						<th>DESCUENTO</th>
                        <th>VALOR PARCIAL</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($detallesp as $detp)
					{
						?>
						<tr>
							<td><?php echo $detp->codproduc?></td>
							<td><?php echo $detp->producnom ?></td>
							<td><?php echo $detp->detpedcan ?></td>
							<td><?php echo $detp->detpedcos ?></td>
							<td><?php echo $detp->detallepeddes ?></td>
                            <td><?php echo $detp->detpedvalpar ?></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>