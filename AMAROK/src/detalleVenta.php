<?php
if (!isset($_GET["ventanum"]))
{
	echo "No existe la venta a visualizar";
	exit();
}

$ventanum = $_GET["ventanum"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("SELECT d.codProduc, p.producNom, d.detVentaCan, d.detVentaDes, d.detVentaValPar FROM detalleventa d JOIN producto p ON d.codProduc=p.producCod WHERE d.numventa= ?;");
$sentencia->execute([$ventanum]);
$detalles = $sentencia->fetchAll(PDO::FETCH_OBJ);
if (!$detalles)
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
		<h1 class="crud-text">DETALLES DE LA VENTA</h1><br><br>
		<a class="btn-agregar"  href="listarVentas.php">Regresar</a><br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
                        <th>CÓDIGO PRODUCTO</th>
						<th>PRODUCTO</th>
						<th>CANTIDAD</th>
						<th>DESCUENTO</th>
                        <th>VALOR PARCIAL</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($detalles as $det)
					{
						?>
						<tr>
							<td><?php echo $det->codproduc?></td>
							<td><?php echo $det->producnom ?></td>
							<td><?php echo $det->detventacan ?></td>
							<td><?php echo $det->detventades ?></td>
                            <td><?php echo $det->detventavalpar ?></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>